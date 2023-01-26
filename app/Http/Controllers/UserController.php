<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Blog_Tag;
use App\Models\Comblog;
use App\Models\Commentaire;
use App\Models\Panier;
use App\Models\Produitpanier;
use App\Models\ProduitUser;
use App\Models\Role;
use App\Models\User;
use App\Rules\Aucun;
use App\Rules\OneOf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * 
     * 
     */

    public function __construct()
    {
        $this->middleware('IsAdmin');
        
    }

    public function index()
    {
        $users = User::all();
        return view('pages.backend.user',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $edit = User::find($id);
        $this->authorize('user-edit',$edit);
        $roles = Role::all();
        return view('pages.backend.user.edit',compact('edit','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $update = User::find($id);
        if ($request->image && $request->imageFile) {
            $request->validate([
           'username' => ['required', 'string', 'max:255',$request->username != $update->username ? 'unique:'.User::class : ""],
           'image' => ['required'],
           'email' => ['required', 'string', 'email', 'max:255', $request->email != $update->email ? 'unique:'.User::class : ""],
           'image' => ['required',new OneOf() ],
           'imageFile' => ['required',new OneOf() ],
       ]);
       } elseif ($request->image == true && $request->imageFile == false) {
            $request->validate([
               'username' => ['required', 'string', 'max:255',$request->username != $update->username ? 'unique:'.User::class : ""],
               'image' => ['required'],
               'email' => ['required', 'string', 'email', 'max:255', $request->email != $update->email ? 'unique:'.User::class : ""],
           ]);
       }
       
        elseif ($request->imageFile == true && $request->image == false) {
            $request->validate([
               'username' => ['required', 'string', 'max:255',$request->username != $update->username ? 'unique:'.User::class : ""],
               'imageFile' => ['required'],
               'email' => ['required', 'string', 'email', 'max:255', $request->email != $update->email ? 'unique:'.User::class : ""],
           ]);
       }
       else{
           $request->validate([
               'username' => ['required', 'string', 'max:255',$request->username != $update->username ? 'unique:'.User::class : ""],
               'imageFile' => ['required'],
               'email' => ['required', 'string', 'email', 'max:255', $request->email != $update->email ? 'unique:'.User::class : ""],
               'image' => [new Aucun() ],
               'imageFile' => [new Aucun() ]
           ]);
       }

        $update = User::find($id);
        $update->username = $request->username;
        $update->email = $request->email;
        $update->role_id = $request->role;

        if ($update->image && $update->id > 4) {
            Storage::delete('public/users/'.$update->image);
        }
        if ($update->imageFile && $update->id > 4) {
            Storage::delete('public/users/'.$update->imageFile);
        } 

        if ($request->image == true) {
            $update->image = $request->image;
            $update->imageFile = null;
            $image = Image::make($request->image)->resize(50, 50);
            $update->image = time().'.jpg';
            Storage::disk('local')->put('public/users/'.$update->image, $image->stream(), 'public');
        }
        elseif ($request->file('imageFile') == true) {
            $update->imageFile = $request->file('imageFile')->hashname();
            $update->image = null;
            $image = Image::make($request->file('imageFile'))->resize(50, 50);
            Storage::disk('local')->put('public/users/'.$update->imageFile, $image->stream(), 'public');
        }
        $update->save();

        return redirect('/users')->with('success','User modifié.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = User::find($id);
        
        foreach (ProduitUser::all()->where('user_id',$delete->id) as $value) {
            $value->delete();
        }
        foreach (Produitpanier::all()->where('panier_id',$delete->panier->id) as $value) {
            $value->delete();
        }
        Panier::all()->where('user_id',$delete->id)->first()->delete();
        foreach (Comblog::all()->where('user_id',$delete->id) as $value) {
            $value->delete();
        }
        foreach (Commentaire::all()->where('user_id',$delete->id) as $value) {
            $value->delete();
        }
        foreach (Blog_Tag::all() as $value) {
            foreach (Blog::all()->where('user_id',$delete->id )as $item) {
                if ($value->blog_id == $item->id) {
                    $value->delete();
                }
            }
        }

        foreach (Blog::all()->where('user_id',$delete->id) as $value) {
            if ($value->id > 6) {
                if ($value->image) {
                    Storage::delete('public/blog/'.$delete->image);
                    Storage::delete('public/recentPost/'.$delete->image);
                }
                if ($value->imageFile) {
                    Storage::delete('public/blog/'.$delete->imageFile);
                    Storage::delete('public/recentPost/'.$delete->imageFile);
                }
            }
            $value->delete();
        }
        if ($delete->image) {
            if ($delete->id > 4) {
                Storage::delete('public/users/'.$delete->image);
            }
        }
        if ($delete->imageFile) {
            Storage::delete('public/users/'.$delete->imageFile);
        }
        $delete->delete();
        return redirect()->back()->with('success','Utilisateur supprimé');

        


    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Categoryblog;
use Illuminate\Http\Request;

class BlogCategorieController extends Controller
{

    public function __construct()
    {
        $this->middleware('IsAdmin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogcategory = Categoryblog::all();
        return view('pages.backend.blogcategories.blogcategory',compact('blogcategory'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.backend.blogcategories.store');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "nom" => ["required"]
        ]);
        $store = new Categoryblog();
        $store->categorie = $request->nom;
        $store->save();
        return redirect('/blogcategory')->with('success','Blog Category ajouté');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        foreach (Blog::all()->where('categoryblog_id',$id) as $blog) {
            $blog->categoryblog_id = null;
            $blog->save();
        }
        $cat = Categoryblog::find($id);
        $cat->delete();
        return redirect('/blogcategory')->with('success','Blog Category supprimé');

    }
}

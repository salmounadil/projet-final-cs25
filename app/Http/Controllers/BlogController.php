<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Blog_Tag;
use App\Models\Categoryblog;
use App\Models\Comblog;
use App\Models\Tag;
use App\Models\User;
use App\Rules\Aucun;
use App\Rules\OneOf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('blog-confirm')->only('confirm');
        $this->middleware('Backoffice')->only('all','create');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::all();
        $blogs = Blog::orderBy('id','desc')->where('confirmation',true)->paginate(4);
        $recentBlogs = Blog::all()->where('confirmation',true)->reverse()->take(4);
        $categoryBlogs = Categoryblog::all();
        return view('pages.frontend.blog',compact('blogs','tags','recentBlogs','categoryBlogs'));
    }

    public function filterByTags(Request $request){
        $tags = Tag::all();
        $blogs= Tag::all()->find($request->id)->blog->where('confirmation',true);
        $recentBlogs = Blog::all()->where('confirmation',true)->reverse()->take(4);
        $categoryBlogs = Categoryblog::all();
        return view('pages.frontend.blog',compact('blogs','recentBlogs','tags','categoryBlogs'));
    }

    public function filterBySearch(Request $request){
        $tags = Tag::all();
        $blogs= Blog::where('titre','LIKE',"%$request->recherche%")->orWhere('texte','LIKE',"%$request->recherche%")->get();
        $blogs = $blogs->where('confirmation',true);
        $recentBlogs = Blog::all()->where('confirmation',true)->reverse()->take(4);
        $categoryBlogs = Categoryblog::all();
        return view('pages.frontend.blog',compact('blogs','recentBlogs','tags','categoryBlogs'));
    }

    public function filterByCategory(Request $request){
        $tags = Tag::all();
        $blogs= Categoryblog::find($request->id)->blog->where('confirmation',true);
        $recentBlogs = Blog::all()->where('confirmation',true)->reverse()->take(4);
        $categoryBlogs = Categoryblog::all();
        return view('pages.frontend.blog',compact('blogs','recentBlogs','tags','categoryBlogs'));
    }

    public function all(){
        $blogs = Blog::all();
        return view('pages.backend.blog.blog',compact('blogs'));
    }
   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categoryBlogs = Categoryblog::all();
        $tags = Tag::all();
        return view('pages.backend.blog.store',compact('tags','categoryBlogs'));
    }

    public function confirm($id){
        $blog = Blog::find($id);
        $blog->confirmation = true;
        $blog->save();
        return redirect()->back()->with('success','Blog affiché dans la partie client');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if ($request->image && $request->imageFile) {
            $request->validate([
                "titre"=> ["required"],
                "texte"=> ["required"],
                "image" =>[ new OneOf()  ],
                
            ]);
        }
       elseif($request->image == false && $request->imageFile == false) {
            $request->validate([
                "titre"=> ["required"],
                "texte"=> ["required"],
                "image" =>[ new Aucun()  ],
            ]);
       } 

       else{
        $request->validate([
            "titre"=> ["required"],
            
            "texte"=> ["required"],
        ]);

       }

       
        
        $store = new Blog();
        $store->user_id = Auth::user()->id;
        $store->titre = $request->titre;
        $store->texte = $request->texte;
        if (Auth::user()->role_id == 1 || Auth::user()->role_id == 2 ) {
            $store->confirmation = true;
        }
        $store->dateM = date('M');
        $store->dateJ = date('j');
        $store->categoryblog_id = $request->categorie;
        $store->save();
        if ($request->image) {
            $store->image = $request->image;
        }
        if ($request->imageFile) {
            $store->imageFile = $request->file('imageFile')->hashName();
        }

        foreach (Tag::all() as $tag) {
            $d = $tag->tag;
            if ($request->$d) {
                $blogtag =  new Blog_Tag();
                $blogtag->blog_id = $store->id;
                $blogtag->tag_id = $request->tag.$tag->id;
                $blogtag->save();
            }
        }

  
        
        
        if ($request->image == true) {
            $image = Image::make($request->image)->resize(750, 375);
            $store->image = time().'.jpg';
            Storage::disk('local')->put('public/blog/'.$store->image, $image->stream(), 'public');
            $image = Image::make($request->image)->resize(80,80);
            Storage::disk('local')->put('public/recentPost/'.$store->image, $image->stream(), 'public');


        }
        elseif ($request->file('imageFile') == true) {
            $image = Image::make($request->file('imageFile'))->resize(750, 375);
            Storage::disk('local')->put('public/blog/'.$store->imageFile, $image->stream(), 'public');
            $image = Image::make($request->file('imageFile'))->resize(80,80);
            Storage::disk('local')->put('public/recentPost/'.$store->imageFile, $image->stream(), 'public');
         
        }
        $store->save();
        return redirect('/backoffice/blogs')->with('success','Blog ajouté');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        $users = User::all();
        $comBlogs = Comblog::all();
        $show = $blog;
        $tags = Tag::all();
        $blogs = Blog::orderBy('id','desc')->paginate(4);
        $recentBlogs = Blog::all()->reverse()->take(4);
        $categoryBlogs = Categoryblog::all();
        return view('pages.frontend.singleBlog',compact('blogs','users','tags','recentBlogs','categoryBlogs','show','comBlogs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        $edit = $blog;
        $this->authorize('blog-redac',$edit);
        $categoryBlogs = Categoryblog::all();
        $tags = Tag::all();
        return view('pages.backend.blog.edit',compact('blog','categoryBlogs','tags','edit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        if ($request->image && $request->imageFile) {
            $request->validate([
                "titre"=> ["required"],
                "texte"=> ["required"],
                "image" =>[ new OneOf()  ],
                
            ]);
        }
       elseif($request->image == false && $request->imageFile == false) {
            $request->validate([
                "titre"=> ["required"],
                "texte"=> ["required"],
                "image" =>[ new Aucun()  ],
            ]);
       } 

       else{
        $request->validate([
            "titre"=> ["required"],
            
            "texte"=> ["required"],
        ]);

       }
        
        
        $blog->user_id = Auth::user()->id;
        $blog->titre = $request->titre;
        $blog->texte = $request->texte;
        $blog->dateM = date('M');
        $blog->dateJ = date('j');
        $blog->categoryblog_id = $request->categorie;
        $blog->save();
        if ($request->image) {
            $blog->image = $request->image;
        }
        if ($request->imageFile) {
            $blog->imageFile = $request->file('imageFile')->hashName();
        }
        if ($blog->image) {
            if ($blog->id > 6) {
                Storage::delete('public/blog/'.$blog->image);
                Storage::delete('public/recentPost/'.$blog->image);
            }
        }
        if ($blog->imageFile) {
                Storage::delete('public/blog/'.$blog->imageFile);
                Storage::delete('public/recentPost/'.$blog->imageFile);
        }
        if (Blog_Tag::all()->where('blog_id',$blog->id)->count() > 0) {
            foreach (Blog_Tag::all()->where('blog_id',$blog->id) as $item) {
            $item->delete();
        }
    }

    if ($request->image) {
        $blog->image = $request->image;
        $blog->imageFile = null;
    }
    if ($request->imageFile) {
        $blog->imageFile = $request->file('imageFile')->hashname();
        $blog->image = null;
    }  
    foreach (Tag::all() as $tag) {
        $d = $tag->tag;
        if ($request->$d) {
            $blogtag =  new Blog_Tag();
            $blogtag->blog_id = $blog->id;
            $blogtag->tag_id = $request->tag.$tag->id;
            $blogtag->save();
        }
    }
        
        if ($request->image == true) {
            $image = Image::make($request->image)->resize(750, 375);
            $blog->image = time().'.jpg';
            Storage::disk('local')->put('public/blog/'.$blog->image, $image->stream(), 'public');
            $image = Image::make($request->image)->resize(80,80);
            Storage::disk('local')->put('public/recentPost/'.$blog->image, $image->stream(), 'public');


        }
        elseif ($request->file('imageFile') == true) {
            $image = Image::make($request->file('imageFile'))->resize(750, 375);
            Storage::disk('local')->put('public/blog/'.$blog->imageFile, $image->stream(), 'public');
            $image = Image::make($request->file('imageFile'))->resize(80,80);
            Storage::disk('local')->put('public/recentPost/'.$blog->imageFile, $image->stream(), 'public');
         
        }
        $blog->save();
        return redirect('/backoffice/blogs')->with('success','Blog mis à jour');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        if ($blog->image) {
            if ($blog->id > 6) {
                Storage::delete('public/blog/'.$blog->image);
                Storage::delete('public/recentPost/'.$blog->image);
            }
        }
        if ($blog->imageFile) {
                Storage::delete('public/blog/'.$blog->imageFile);
                Storage::delete('public/recentPost/'.$blog->imageFile);
        }
        if (Blog_Tag::all()->where('blog_id',$blog->id)->count() > 0) {
            foreach (Blog_Tag::all()->where('blog_id',$blog->id) as $item) {
            $item->delete();
        }
    }

        $blog->delete();
        return redirect()->back()->with('success','Blog supprimé');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Blog_Tag;
use App\Models\Categoryblog;
use App\Models\Comblog;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::all();
        $blogs = Blog::orderBy('id','desc')->paginate(4);
        $recentBlogs = Blog::all()->reverse()->take(4);
        $categoryBlogs = Categoryblog::all();
        return view('pages.frontend.blog',compact('blogs','tags','recentBlogs','categoryBlogs'));
    }

    public function filterByTags(Request $request){
        $tags = Tag::all();
        $blogs= Tag::all()->find($request->id)->blog;
        $recentBlogs = Blog::all()->reverse()->take(4);
        $categoryBlogs = Categoryblog::all();
        return view('pages.frontend.blog',compact('blogs','recentBlogs','tags','categoryBlogs'));
    }

    public function filterBySearch(Request $request){
        $tags = Tag::all();
        $blogs= Blog::where('titre','LIKE',"%$request->recherche%")->orWhere('texte','LIKE',"%$request->recherche%")->get();
        $recentBlogs = Blog::all()->reverse()->take(4);
        $categoryBlogs = Categoryblog::all();
        return view('pages.frontend.blog',compact('blogs','recentBlogs','tags','categoryBlogs'));
    }

    public function filterByCategory(Request $request){
        $tags = Tag::all();
        $blogs= Categoryblog::find($request->id)->blog;
        $recentBlogs = Blog::all()->reverse()->take(4);
        $categoryBlogs = Categoryblog::all();
        return view('pages.frontend.blog',compact('blogs','recentBlogs','tags','categoryBlogs'));
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        //
    }
}

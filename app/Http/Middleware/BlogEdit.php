<?php

namespace App\Http\Middleware;

use App\Models\Blog;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogEdit
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // if (Auth::check()) {
        //     if (Auth::user()->role_id == 1 || (Auth::user()->role_id == 2 &&(Blog::find($request->route('id'))->user_id == Auth::user()->id || Blog::find($request->route('id'))->user_id == 3 )) || (Auth::user()->role_id == 3 && Blog::find($request->route('id'))->user_id == Auth::user()->id)) {
        //     return $next($request);
        // }
        // else {
        //     return redirect()->back()->with('danger','Vous n\'êtes pas autorisé à accéder à cette page');
        // }
        // }
        // else{
        //     return redirect()->back()->with('danger','Vous n\'êtes pas autorisé à accéder à cette page');
        // }
        
    }
}

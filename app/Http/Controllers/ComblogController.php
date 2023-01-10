<?php

namespace App\Http\Controllers;

use App\Models\Comblog;
use App\Models\User;
use App\Rules\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComblogController extends Controller
{
    public function store(Request $request){
        $store = new Comblog();
        if ((User::all()->where('email', $request->email)->count() > 0 || User::all()->where('username', $request->nom)->count() > 0) && Auth::check() == false) {
            $request->validate([
                "nom" => ["required"],
                "site" => ["required"],
                "email" => ["required", "email", new Comment],
                "message" => ["required"]
            ]);
        }
        if (User::all()->where('email', $request->email)->count() > 0 && User::all()->where('username', $request->nom)->count() > 0 && Auth::check()) {
            $request->validate([
                "nom" => ["required"],
                "site" => ["required"],
                "email" => ["required", "email"],
                "message" => ["required"]
            ]);
            $store->user_id = Auth::user()->id;
        } else {
            $request->validate([
                "nom" => ["required"],
                "site" => ["required"],
                "email" => ["required", "email"],
                "message" => ["required"]
            ]);
        }

        $t = now();
        $date = date_format($t, "dS M, Y \a\\t h:i a");

        $store->nom = $request->nom;
        $store->email = $request->email;
        $store->message = $request->message;
        $store->site = $request->site;
        $store->date = $date;
        $store->blog_id = $request->id;
        $store->save();
        return redirect()->back();
    }
}

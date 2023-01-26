<?php

namespace App\Http\Controllers;

use App\Models\Blog_Tag;
use App\Models\Produit;
use App\Models\ProduitUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function __construct(){
        $this->middleware('AdminWebmaster')->only('index');
    }
    public function like(Request $request){

        $produit = Produit::find($request->id);
        if (Auth::user()->produits->where('id',$request->id)->count() == 0 ) {
            
            $like = new ProduitUser();
            $like->user_id = Auth::user()->id;
            $like->produit_id = $produit->id;
            $like->save();
            return redirect()->back()->with('success','Produit liké');
        }
        else{
            ProduitUser::all()->where('produit_id',$produit->id)->where('user_id',Auth::user()->id)->first->delete();
            return redirect()->back()->with('success','Produit déliké');
        }
    }
    public function index(){
        $produits = Produit::all();
        return view('pages.backend.produits.produits',compact('produits'));
    }
}

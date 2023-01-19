<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Categorie;
use App\Models\Couleur;
use App\Models\Produit;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function home(){

    $produits = Produit::all();
    $produitsBest = Produit::all();
    return view('welcome',compact('produits','produitsBest'));
    }

    public function category(Request $request){
        $couleurs = Couleur::all();
        $categories = Categorie::all();
        $produits = Produit::paginate(9);
        $produitsBest = Produit::all();
        return view('pages.frontend.shopCategory',compact('produits','produitsBest','categories','couleurs'));
    }

    public function viewByCategory(Request $request){
        $couleurs = Couleur::all();
        $categories = Categorie::all();
        $categorie = Categorie::find($request->id);
        $produits = $categorie->produit;
        $produitsBest = Produit::all();
        return view('pages.frontend.shopCategory',compact('produits','produitsBest','categories','couleurs','categorie'));
    }

    public function viewByColor(Request $request){
        $couleurs = Couleur::all();
        $couleur = Couleur::find($request->id);
        $categories = Categorie::all();
        $produits = Produit::all();
        $produits = $couleur->produit;
        $produitsBest = Produit::all();
        return view('pages.frontend.shopCategory',compact('produits','produitsBest','categories','couleurs','couleur'));
    }
    public function viewBySearch(Request $request){
        $couleurs = Couleur::all();
        $couleur = Couleur::find($request->id);
        $categories = Categorie::all();
        $produits = Produit::all();
        $produitsBest = Produit::all();
        $categoryID = "";
        if (Categorie::where('categorie','LIKE',"%$request->recherche%")->count()>0) {
                    $categoryID = Categorie::where('categorie','LIKE',"%$request->recherche%")->get()[0]->id;
        }
        $produits = Produit::where('nom','LIKE',"%$request->recherche%")->orWhere('categorie_id','LIKE',$categoryID)->get();
        return view('pages.frontend.shopCategory',compact('produits','produitsBest','categories','couleurs','couleur'));
    }

    public function like(){
        $produits = Auth::user()->produits;
        return view('pages.frontend.like',compact('produits'));
    }

  

    
}

<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Couleur;
use App\Models\Produit;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){

    $produits = Produit::all();
    return view('welcome',compact('produits'));
    }

    public function category(Request $request){
        $couleurs = Couleur::all();
        $categories = Categorie::all();
        $produits = Produit::all();
        $produitsPagi = Produit::paginate(9);
        return view('pages.frontend.shopCategory',compact('produits','categories','couleurs','produitsPagi'));
    }

    public function viewByCategory(Request $request){
        $couleurs = Couleur::all();
        $categories = Categorie::all();
        $produits = Produit::all();
        $categorie = Categorie::find($request->id);
        $produitsCat = $categorie->produit;
        return view('pages.frontend.shopCategoryCat',compact('produits','categories','couleurs','categorie','produitsCat'));
    }

    public function viewByColor(Request $request){
        $couleurs = Couleur::all();
        $couleur = Couleur::find($request->id);
        $categories = Categorie::all();
        $produits = Produit::all();
        $produitsCol = $couleur->produit;
        return view('pages.frontend.shopCategoryCol',compact('produits','categories','couleurs','couleur','produitsCol'));
    }
    public function viewBySearch(Request $request){
        $couleurs = Couleur::all();
        $couleur = Couleur::find($request->id);
        $categories = Categorie::all();
        $produits = Produit::all();
        $categoryID = "";
        if (Categorie::where('categorie','LIKE',"%$request->recherche%")->count()>0) {
                    $categoryID = Categorie::where('categorie','LIKE',"%$request->recherche%")->get()[0]->id;
        }
        $produitsSearch = Produit::where('nom','LIKE',"%$request->recherche%")->orWhere('categorie_id','LIKE',$categoryID)->get();
        return view('pages.frontend.shopCategorySearch',compact('produits','categories','couleurs','couleur','produitsSearch'));
    }

    
}

<?php

namespace App\Http\Controllers;

use App\Models\Panier;
use App\Models\Produit;
use App\Models\Produitpanier;
use App\Rules\Produitdoublon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PanierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produits = Produit::all();
        return view('pages.frontend.panier',compact('produits'));
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
        if (Auth::user()->panier->produitsPanier->where('idproduit',$request->id)->count() == 0) {
                  $produitPanier = new Produitpanier();
        $produit = Produit::find($request->id);
        $produitPanier->nom = $produit->nom;
        if ($produit->image) {
            $produitPanier->image = $produit->image;
        }
        if ($produit->imageFile) {
            $produitPanier->image = $produit->imageFile;
        }
        $produitPanier->idproduit = $produit->id;
        $produitPanier->prixfinal = $produit->prixfinal;
        $produitPanier->quantité = 1;
        $produitPanier->prixtotal = $produitPanier->prixfinal * $produitPanier->quantité ;
        $produitPanier->panier_id = Auth::user()->panier->id;
        $produitPanier->save();
        $panier = Panier::find(Auth::user()->panier->id);
        $panier->paniertotal += $produitPanier->prixtotal;
        $panier->save();
        return redirect()->back()->with('success','Article ajouté au panier');  
        }
        else {

            $request->validate([
              "id"=> [new Produitdoublon()] 
            ]);
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Panier  $panier
     * @return \Illuminate\Http\Response
     */
    public function show(Panier $panier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Panier  $panier
     * @return \Illuminate\Http\Response
     */
    public function edit(Panier $panier)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Panier  $panier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Panier $panier)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Panier  $panier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Panier $panier)
    {
        //
    }
}

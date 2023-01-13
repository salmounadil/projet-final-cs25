<?php

namespace App\Http\Controllers;

use App\Models\Panier;
use App\Models\Produit;
use App\Models\Produitpanier;
use App\Rules\Produitdoublon;
use App\Rules\Quantité;
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
        $test = Produitpanier::find(9);
        $produitsPanier = Auth::user()->panier->produitsPanier;
        $produits = Produit::all();
        return view('pages.frontend.panier',compact('produits','produitsPanier','test'));
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
        if (Auth::user()->panier->produitsPanier->where('produit_id',$request->id)->count() == 0) {
                  $produitPanier = new Produitpanier();
        $produit = Produit::find($request->id);
        $produitPanier->nom = $produit->nom;
        if ($produit->image) {
            $produitPanier->image = $produit->image;
        }
        if ($produit->imageFile) {
            $produitPanier->image = $produit->imageFile;
        }
        $produitPanier->produit_id = $produit->id;
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

    public function addToPanier(Request $request){
        if (Auth::user()->panier->produitsPanier->where('produit_id', $request->idd)->count() == 0) {
            if ($request->quantité > 0) {
                $produitPanier = new Produitpanier();
            $produit = Produit::find($request->idd);
            $produitPanier->nom = $produit->nom;
            if ($produit->image) {
                $produitPanier->image = $produit->image;
            }
            if ($produit->imageFile) {
                $produitPanier->image = $produit->imageFile;
            }
            $produitPanier->produit_id = $produit->id;
            $produitPanier->prixfinal = $produit->prixfinal;
            $produitPanier->quantité = $request->quantité;
            $produitPanier->prixtotal = $produitPanier->prixfinal * $produitPanier->quantité ;
            $produitPanier->panier_id = Auth::user()->panier->id;
            $produitPanier->save();
            $panier = Panier::find(Auth::user()->panier->id);
            $panier->paniertotal += $produitPanier->prixtotal;
            $panier->save();
            return redirect('/panier')->with('success','Article ajouté au panier');  
            }
            else {
                 $request->validate([
                    "idd"=>[new Quantité()]
                ]);
            }
            
        }
        else{
            $pr = Auth::user()->panier->produitsPanier->where('produit_id', $request->idd)->first() ;
            $pr->quantité = $request->quantité;
            $panier = Panier::find(Auth::user()->panier->id);
            if ($pr->quantité > 0) {
                $panier->paniertotal -= $pr->prixtotal;
                $pr->prixtotal = $pr->quantité * $pr->prixfinal; 
                $panier->paniertotal +=  $pr->prixtotal;
                $panier->paniertotal = $panier->paniertotal;
                $pr->save();  
                $panier->save(); 
                return redirect('/panier')->with('success','Quantité mise à jour') ;
            }
            else{

                $request->validate([
                    "idd"=>[new Quantité()]
                ]);
               
            };

        }
    }


    public function quantité(Request $request){
        $pr = Auth::user()->panier->produitsPanier->where('produit_id',$request->idd)->first();
        $pr->quantité = $request->quantité;
        $panier = Panier::find(Auth::user()->panier->id);

        if ($pr->quantité > 0) {
            $panier->paniertotal -= $pr->prixtotal;
            $pr->prixtotal = $pr->quantité * $pr->prixfinal; 
            $panier->paniertotal +=  $pr->prixtotal;
            $panier->paniertotal = $panier->paniertotal;
            $pr->save();  
            $panier->save();  
        }
        else {
            $panier->paniertotal -= $pr->prixtotal;
            $panier->save(); 
            $pr->delete();
        }
        
        return redirect()->back();
    }
  

    public function checkout(){
        return view('pages.frontend.checkout');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Panier  $panier
     * @return \Illuminate\Http\Response
     */
    public function show(Panier $panier)
    {
 
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

<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Commentaire;
use App\Models\Couleur;
use App\Models\Panier;
use App\Models\Produit;
use App\Models\Produitpanier;
use App\Models\ProduitUser;
use App\Models\User;
use App\Rules\Aucun;
use App\Rules\OneOf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categorie::all();
        $couleurs = Couleur::all();
        return view('pages.backend.produits.store',compact('couleurs','categories'));
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
                "nom"=> ["required"],
                "categorie_id"=> ["required"],
                "couleur_id"=> ["required"],
                "prix"=> ["required","integer"],
                "stock"=> ["required","integer"],
                "description"=> ["required"],
                "image" =>[ new OneOf()  ],
                
            ]);
        }
       elseif($request->image == false && $request->imageFile == false) {
            $request->validate([
                "nom"=> ["required"],
                "categorie_id"=> ["required"],
                "couleur_id"=> ["required"],
                "prix"=> ["required","integer"],
                "stock"=> ["required","integer"],
                "description"=> ["required"],
                "image" =>[ new Aucun()  ],
            ]);
       } 

       else{
        $request->validate([
            "nom"=> ["required"],
            "categorie_id"=> ["required"],
            "couleur_id"=> ["required"],
            "prix"=> ["required","integer"],
            "stock"=> ["required","integer"],
            "description"=> ["required"],
        ]);

       }
       
        $store =  new Produit();
        $store->nom = $request->nom;
        $store->categorie_id = $request->categorie_id;
        $store->couleur_id = $request->couleur_id;
        if ($request->image) {
            $store->image = $request->image;
        }
        if ($request->imageFile) {
            $store->imageFile = $request->file('imageFile')->hashname();
        }        
        
        $store->prix = $request->prix;
        $store->promo = $request->promo;
        $store->stock = $request->stock;
        $store->prixfinal = ($store->prix / 100) * (100 - $store->promo);
        $store->description = $request->description;
        $store->save();

        if ($request->image == true) {
            $image = Image::make($request->image)->resize(400, 400);
            $store->image = time().'.jpg';
            Storage::disk('local')->put('public/feature1/'.$store->image, $image->stream(), 'public');
            $image = Image::make($request->image)->resize(300, 300);
            Storage::disk('local')->put('public/feature2/'.$store->image, $image->stream(), 'public');
            $image = Image::make($request->image)->resize(500, 500);
            Storage::disk('local')->put('public/section1/'.$store->image, $image->stream(), 'public');
            $image = Image::make($request->image)->resize(263, 280);
            Storage::disk('local')->put('public/awesome/'.$store->image, $image->stream(), 'public');
            $image = Image::make($request->image)->resize(145, 98);
            Storage::disk('local')->put('public/panier/'.$store->image, $image->stream(), 'public');


        }
        elseif ($request->file('imageFile') == true) {
            $image = Image::make($request->file('imageFile'))->resize(400, 400);
            Storage::disk('local')->put('public/feature1/'.$store->imageFile, $image->stream(), 'public');
            $image = Image::make($request->file('imageFile'))->resize(300, 300);
            Storage::disk('local')->put('public/feature2/'.$store->imageFile, $image->stream(), 'public');
            $image = Image::make($request->file('imageFile'))->resize(500, 500);
            Storage::disk('local')->put('public/section1/'.$store->imageFile, $image->stream(), 'public');
            $image = Image::make($request->file('imageFile'))->resize(263, 280);
            Storage::disk('local')->put('public/awesome/'.$store->imageFile, $image->stream(), 'public');
            $image = Image::make($request->file('imageFile'))->resize(145, 98);
            Storage::disk('local')->put('public/panier/'.$store->imageFile, $image->stream(), 'public');
        }
        $store->save();
        return redirect('/backoffice/produits')->with('success','Produit ajouté');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function show(Produit $produit)
    {
        $commentaires = Commentaire::all();
        $users = User::all();
        $produits = Produit::all();
        $produitsBest = Produit::all();
        return view('pages.frontend.singleProduct',compact('produit','produits','produitsBest','users','commentaires'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function edit(Produit $produit)
    {
        $categories = Categorie::all();
        $couleurs = Couleur::all();
        $edit = $produit ;
        return view('pages.backend.produits.edit',compact('edit','categories','couleurs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produit $produit)
    {
        
        if ($request->image && $request->imageFile) {
            $request->validate([
                "nom"=> ["required"],
                "categorie_id"=> ["required"],
                "couleur_id"=> ["required"],
                "prix"=> ["required","integer"],
                "stock"=> ["required","integer"],
                "description"=> ["required"],
                "image" =>[ new OneOf()  ],
                
            ]);
        }
       elseif($request->image == false && $request->imageFile == false) {
            $request->validate([
                "nom"=> ["required"],
                "categorie_id"=> ["required"],
                "couleur_id"=> ["required"],
                "prix"=> ["required","integer"],
                "stock"=> ["required","integer"],
                "description"=> ["required"],
                "image" =>[ new Aucun()  ],
            ]);
       } 

       else{
        $request->validate([
            "nom"=> ["required"],
            "categorie_id"=> ["required"],
            "couleur_id"=> ["required"],
            "prix"=> ["required","integer"],
            "stock"=> ["required","integer"],
            "description"=> ["required"],
        ]);

       }
       $produit->nom = $request->nom;
        $produit->categorie_id = $request->categorie_id;
        $produit->couleur_id = $request->couleur_id;

        if ($produit->image) {
            Storage::delete('public/feature1/'.$produit->image);
            Storage::delete('public/feature2/'.$produit->image);
            Storage::delete('public/section1/'.$produit->image);
            Storage::delete('public/awesome/'.$produit->image);
            Storage::delete('public/panier/'.$produit->image);
        }
        if ($produit->imageFile) {
            Storage::delete('public/feature1/'.$produit->imageFile);
            Storage::delete('public/feature2/'.$produit->imageFile);
            Storage::delete('public/section1/'.$produit->imageFile);
            Storage::delete('public/awesome/'.$produit->imageFile);
            Storage::delete('public/panier/'.$produit->imageFile);
        }


        if ($request->image) {
            $produit->image = $request->image;
            $produit->imageFile = null;
        }
        if ($request->imageFile) {
            $produit->imageFile = $request->file('imageFile')->hashname();
            $produit->image = null;
        }   
        if ($request->image == true) {
            $image = Image::make($request->image)->resize(400, 400);
            $produit->image = time().'.jpg';
            Storage::disk('local')->put('public/feature1/'.$produit->image, $image->stream(), 'public');
            $image = Image::make($request->image)->resize(300, 300);
            Storage::disk('local')->put('public/feature2/'.$produit->image, $image->stream(), 'public');
            $image = Image::make($request->image)->resize(500, 500);
            Storage::disk('local')->put('public/section1/'.$produit->image, $image->stream(), 'public');
            $image = Image::make($request->image)->resize(263, 280);
            Storage::disk('local')->put('public/awesome/'.$produit->image, $image->stream(), 'public');
            $image = Image::make($request->image)->resize(145, 98);
            Storage::disk('local')->put('public/panier/'.$produit->image, $image->stream(), 'public');


        }
        elseif ($request->file('imageFile') == true) {
            $image = Image::make($request->file('imageFile'))->resize(400, 400);
            Storage::disk('local')->put('public/feature1/'.$produit->imageFile, $image->stream(), 'public');
            $image = Image::make($request->file('imageFile'))->resize(300, 300);
            Storage::disk('local')->put('public/feature2/'.$produit->imageFile, $image->stream(), 'public');
            $image = Image::make($request->file('imageFile'))->resize(500, 500);
            Storage::disk('local')->put('public/section1/'.$produit->imageFile, $image->stream(), 'public');
            $image = Image::make($request->file('imageFile'))->resize(263, 280);
            Storage::disk('local')->put('public/awesome/'.$produit->imageFile, $image->stream(), 'public');
            $image = Image::make($request->file('imageFile'))->resize(145, 98);
            Storage::disk('local')->put('public/panier/'.$produit->imageFile, $image->stream(), 'public');
        }
        
        $produit->prix = $request->prix;
        $produit->promo = $request->promo;
        $produit->stock = $request->stock;
        $produit->prixfinal = ($produit->prix / 100) * (100 - $produit->promo);
        $produit->description = $request->description;
        $produit->save();
        return redirect('/backoffice/produits')->with('success','Produit mis à jour');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produit $produit)
    {

        if ($produit->image) {
            Storage::delete('public/feature1/'.$produit->image);
            Storage::delete('public/feature2/'.$produit->image);
            Storage::delete('public/section1/'.$produit->image);
            Storage::delete('public/awesome/'.$produit->image);
            Storage::delete('public/panier/'.$produit->image);
        }
        if ($produit->imageFile) {
            Storage::delete('public/feature1/'.$produit->imageFile);
            Storage::delete('public/feature2/'.$produit->imageFile);
            Storage::delete('public/section1/'.$produit->imageFile);
            Storage::delete('public/awesome/'.$produit->imageFile);
            Storage::delete('public/panier/'.$produit->imageFile);
        }

        if (ProduitUser::all()->where('produit_id',$produit->id)->count() > 0) {
            foreach (ProduitUser::all()->where('produit_id',$produit->id) as $item) {
            $item->delete();
        }
        }
        if (Produitpanier::all()->where('produit_id',$produit->id)->count() > 0) {
            $total = Produitpanier::all()->where('produit_id',$produit->id)->first()->prixtotal;
            $ind = Produitpanier::all()->where('produit_id',$produit->id)->first()->panier_id ; 
            $panier = Panier::find($ind);
            $panier->paniertotal -= $total ;
            $panier->save();
            foreach (Produitpanier::all()->where('produit_id',$produit->id) as $item) {
            $item->delete();
        }
        }
        

        $produit->delete();
        return redirect()->back()->with('success','Produit supprimé');
    }
}

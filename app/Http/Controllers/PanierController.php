<?php

namespace App\Http\Controllers;

use App\Mail\OrderConfirm;
use App\Mail\OrderMail;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\Panier;
use App\Models\Produit;
use App\Models\Produitpanier;
use App\Rules\Condition;
use App\Rules\Produitdoublon;
use App\Rules\Quantité;
use App\Rules\Conditions;
use App\Rules\Method;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class PanierController extends Controller
{

    public function __construct(){
        $this->middleware('PanierFull')->only('checkout');
    }
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

    public function coupon(Request $request){
        if (Coupon::all()->where('nom',$request->coupon)->count()>0) {
            $coupon = Coupon::all()->where('nom',$request->coupon)->first();
            $user = Auth::user();
            $user->panier->prixOrder = $user->panier->paniertotal / 100 * ( 100 + $coupon->réduction);
            $user->panier->coupon_id = $coupon->id;
            $user->panier->save();
            return redirect()->back()->with('success',"Coupon appliqué");
        }
        else{
            return redirect()->back()->with('danger',"Ce coupon n'existe pas");
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $produit = Produit::find($request->id);
        if ($produit->stock > 0) {
           if (Auth::user()->panier->produitsPanier->where('produit_id',$request->id)->count() == 0) {
                  $produitPanier = new Produitpanier();
        $produitPanier->nom = $produit->nom;
        if ($produit->image) {
            $produitPanier->image = $produit->image;
        }
        if ($produit->imageFile) {
            $produitPanier->image = $produit->imageFile;
        }
        $produitPanier->produit_id = $produit->id;
        $produitPanier->prixfinal = $produit->prixfinal;
        $produitPanier->quantité = 1.00;
        $produitPanier->prixtotal = $produitPanier->prixfinal * $produitPanier->quantité ;
        $produitPanier->panier_id = Auth::user()->panier->id;
        $produitPanier->save();
        $panier = Panier::find(Auth::user()->panier->id);
        $panier->paniertotal += $produitPanier->prixtotal;
        $panier->prixOrder = $panier->paniertotal;
        $panier->save();
        return redirect()->back()->with('success','Article ajouté au panier');  
        }
        else {

            $request->validate([
              "id"=> [new Produitdoublon()] 
            ]);
        }
        }
        else {
            return redirect()->back()->with('danger','Nous n\'avons plus ce produit en stock.' );
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
            $panier->prixOrder= $panier->paniertotal;
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
                $panier->prixOrder = $panier->paniertotal;
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
            $panier->prixOrder = $panier->paniertotal;
            $pr->save();  
            $panier->save();  
        }
        else {
            $panier->paniertotal -= $pr->prixtotal;
            $panier->prixOrder = $panier->paniertotal;
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
      
    }

    public function payer(Request $request){
        if ($request->methode == true && $request->condition == true) {
            
            $request->validate([
            'firstname' => ['required',],
            'lastname' => ['required',],
            'tel' => ['required'],
            'email' => ['required','email'],
            'pays'=> ['required'],
            'adresse' => ['required'],
            'ville' => ['required'],
            'codepostal' => ['required','integer'],
            
            
        ]);
        }
        if ($request->methode == true && $request->condition == false) {
            
            $request->validate([
                'firstname' => ['required',],
                'lastname' => ['required',],
                'tel' => ['required'],
                'email' => ['required','email'],
                'pays'=> ['required'],
                'adresse' => ['required'],
                'ville' => ['required'],
                'codepostal' => ['required','integer',],
                'test' => [new Condition()]
                
            ]);
        }
        if ($request->methode == false && $request->condition == true) {
            
            $request->validate([
                'firstname' => ['required',],
                'lastname' => ['required',],
                'tel' => ['required'],
                'email' => ['required','email'],
                'pays'=> ['required'],
                'adresse' => ['required'],
                'ville' => ['required'],
                'codepostal' => ['required','integer',],
                'test' => [new Method()]
            ]);
        }
        if ($request->methode == false && $request->condition == false) {
            $request->validate([
                'firstname' => ['required',],
                'lastname' => ['required',],
                'tel' => ['required'],
                'email' => ['required','email'],
                'pays'=> ['required'],
                'adresse' => ['required'],
                'ville' => ['required'],
                'codepostal' => ['required','integer',],
                'test' => [new Method(),new Condition()]
   
            ]);
        }
       
        $user = Auth::user();
        $order = new Order();
        $order->firstname = $request->firstname;
        $order->lastname = $request->lastname;
        $order->tel = $request->tel;
        $order->email = $request->email;
        $order->produits = $user->panier->produitsPanier;
        $order->date = date('F j, Y');
        $order->total = $user->panier->prixOrder;
        $order->pays = $request->pays;
        $order->adresse = $request->adresse;
        $order->ville = $request->ville;
        $order->codepostal = $request->codepostal;
        $order->methode = $request->methode;
        $order->total = $user->panier->prixOrder;
        foreach ($user->panier->produitsPanier as $item) {
            $order->quantité += $item->quantité;
        }
        $user->panier->coupon_id = null;
        $user->panier->prixOrder = 0;
        $user->panier->paniertotal = 0;
        foreach ($user->panier->produitsPanier as $produit) {
            $produit->delete();
        }
        $user->panier->save();
        $order->save();
        Mail::to($request->email)->send(new OrderConfirm($order));
        return redirect('/')->with('success','Nous avons bien reçu votre commande, nous la traiterons dans les plus brefs délais');
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

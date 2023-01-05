<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){
    $produits = Produit::all();
    return view('welcome',compact('produits'));
    }
}

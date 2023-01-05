<?php

namespace App\Http\Controllers;

use App\Mail\ProductMail;
use App\Models\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function productmail(Request $request){
        $produit = Produit::all()[$request->id];
        Mail::to($request->mail)->send(new ProductMail($produit));
        return redirect()->back();
    }

    
}

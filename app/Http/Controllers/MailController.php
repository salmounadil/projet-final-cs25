<?php

namespace App\Http\Controllers;

use App\Mail\NewsletterMail;
use App\Mail\ProductMail;
use App\Models\Newsletter;
use App\Models\Produit;
use App\Rules\Newsletter as RulesNewsletter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function productmail(Request $request)
    {
            $request->validate([
                "mail" => ["required", "email"]
            ]);
            $produit = Produit::all()[$request->id];
            Mail::to($request->mail)->send(new ProductMail($produit));
            return redirect()->back()->with('success','Nous vous avons envoyé un émail contenant toutes les informations concernant le produit.');
        }

    public function newsletterMail(Request $request){

        if (Newsletter::all()->where('email',$request->email)->count() == 0) {
              $request->validate([
            "email"=>["required","email"]
        ]);
            Mail::to($request->email)->send(new NewsletterMail);
            $store = new Newsletter();
            $store->email = $request->email;
            $store->save();
            return redirect()->back()->with('success','Vous etes inscrit à la Newsletter');
        }

        else {
            $request->validate([
                "email"=>["required","email",new RulesNewsletter]
            ]);
        }
    }

    }


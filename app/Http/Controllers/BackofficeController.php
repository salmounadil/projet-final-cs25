<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Categorie;
use App\Models\Categoryblog;
use App\Models\Contact;
use App\Models\Couleur;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\Produit;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class BackofficeController extends Controller
{
    public function __construct(){
        $this->middleware('Backoffice')->only('backoffice');
        $this->middleware('IsAdmin')->only('mailbox','archives');

    }
  

    public function backoffice (){
        $users = User::all();
        $blogs = Blog::all();
        $categories = Categorie::all();
        $categoryblogs = Categoryblog::all();
        $contacts = Contact::all();
        $couleurs = Couleur::all();
        $produits = Produit::all();
        $orders = Order::all();
        $tags = Tag::all();
        $coupons = Coupon::all();

        return view('pages.backend.home',compact('users','blogs','categories','categoryblogs','contacts','couleurs','produits','orders','tags','coupons'));
    }

    public function mailbox(){
        $contacts = Contact::all();
        return view('pages.backend.mailbox',compact('contacts'));
    }
    public function archives(){
        $contacts = Contact::all();
        return view('pages.backend.archives',compact('contacts'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Mail\OrderMail;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function __construct(){
        $this->middleware('IsAdmin')->only('orders');
    }
    public function index()
    {
        return view('pages.frontend.searchorder');
    }
    public function show(Request $request)
    {
        if (Auth::check()) {
            if (Order::all()->where('id', $request->id)->count() > 0) {
                if (Order::all()->where('id', $request->id)->first()->confirmé == true) {
                    if (Auth::user()->role_id == 1 || (Order::all()->where('id', $request->id)->first()->user_id == Auth::user()->id) ) {
                        $order = Order::find($request->id);
                    return view('pages.frontend.order', compact('order'));
                    }
                    else{
                        return redirect()->back()->with('danger', 'Vous n\'avez pas l\'autorisation de voir cette commande');
                    }
                    
                } else {
                    if (Auth::user()->role_id == 1 || (Order::all()->where('id', $request->id)->first()->user_id == Auth::user()->id)) {
                        return redirect()->back()->with('danger', 'Cette commande n\'a pas encore été confirmée');
                    }
                    else
                    {
                        return redirect()->back()->with('danger', 'Vous n\'avez pas l\'autorisation de suivre cette commande');
                    }
                
                }
            } else {
                return redirect()->back()->with('danger', 'Ce numéro de commande est inconnu.');
            } 
        }
        else{
            return redirect()->back()->with('danger', 'Veuillez vous connecter pour rechercher votre commande.');
        }
        
    }
    public function orders()
    {
        $orders = Order::all();
        return view('pages.backend.orders', compact('orders'));
    }
    public function destroy(Order $id)
    {
        $id->delete();
        return redirect()->back()->with('success', 'Order a bien été supprimé');
    }

    public function confirm(Order $id)
    {
        $id->confirmé = true;
        $id->save();
        Mail::to($id->email)->send(new OrderMail($id));
        return redirect()->back()->with('success', 'Order Confirmé.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Mail\OrderMail;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function index(){
        return view('pages.frontend.searchorder');
    }
    public function show(Request $request){
        if (Order::all()->where('id',$request->id)->count()>0) {
            if (Order::all()->where('id',$request->id)->first()->confirmé == true) {
                $order = Order::find($request->id);
            return view('pages.frontend.order',compact('order'));
            }
            else {
                return redirect()->back()->with('danger','Votre commande n\'a pas encore été confirmée');
            }
        }
        else {
            return redirect()->back()->with('danger','Ce numéro de commande est inconnu.');
        }
        
    }
    public function orders(){
        $orders = Order::all();
        return view('pages.backend.orders',compact('orders'));
    }
    public function destroy(Order $id){
        $id->delete();
        return redirect()->back()->with('success','Order a bien été supprimé');
    }

    public function confirm(Order $id){
        $id->confirmé = true;
        $id->save();
        Mail::to($id->email)->send(new OrderMail($id));
        return redirect()->back()->with('success','Order Confirmé.');
    }
}

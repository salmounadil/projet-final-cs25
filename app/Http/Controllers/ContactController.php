<?php

namespace App\Http\Controllers;

use App\Mail\Contact as MailContact;
use App\Models\Contact;
use App\Models\Map;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $map = Map::all()[0];
        return view('pages.frontend.contact',compact('map'));
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
        $request->validate([
            "nom"=> ["required"],
            "email"=> ["required","email"],
            "sujet"=> ["required"],
            "message"=> ["required"],
        ]);
        $store = new Contact();
        $store->message = $request->message;
        $store->nom = $request->nom;
        $store->email = $request->email;
        $store->sujet = $request->sujet;
        $store->save();
        $contact = $store;
        Mail::to('salmoun.adil93@gmail.com')->send(new MailContact($contact));
        return redirect()->back()->with('success','Votre Mail a bien été envoyé, nous vous recontacterons dans les plus brefs délais.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {   $show = $contact;
        $show->vu = true ;
        $show->save();
        return view('pages.backend.showMail',compact('show'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        //
    }
}

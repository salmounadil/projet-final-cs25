<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class BackofficeController extends Controller
{
    public function __construct(){
        $this->middleware('Backoffice')->only('backoffice');
    }

    public function backoffice (){
        
        return view('pages.backend.home');
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

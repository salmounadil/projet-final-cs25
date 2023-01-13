<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\Confirmation;
use App\Mail\NewsletterMail;
use App\Models\Newsletter;
use App\Models\Panier;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use App\Rules\Aucun;
use App\Rules\OneOf;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Mail;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        if ($request->image && $request->imageFile) {
             $request->validate([
            'username' => ['required', 'string', 'max:255','unique:'.User::class],
            'image' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'image' => ['required',new OneOf() ],
            'imageFile' => ['required',new OneOf() ],
        ]);
        } elseif ($request->image == true && $request->imageFile == false) {
             $request->validate([
                'username' => ['required', 'string', 'max:255','unique:'.User::class],
                'image' => ['required'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
            ]);
        }
        
         elseif ($request->imageFile == true && $request->image == false) {
             $request->validate([
                'username' => ['required', 'string', 'max:255','unique:'.User::class],
                'imageFile' => ['required'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
            ]);
        }
        else{
            $request->validate([
                'username' => ['required', 'string', 'max:255','unique:'.User::class],
                'imageFile' => ['required'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
                'image' => [new Aucun() ],
                'imageFile' => [new Aucun() ]
            ]);
        }
        
       if ($request->file('imageFile')) {
        $panier = new Panier();
        $user = User::create([
            'username' => $request->username,
            'imageFile' => $request->file('imageFile')->hashName(),
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'panier_id'=> $panier->id
        ]);
        $panier->user_id = $user->id;
        $panier->save();
        Mail::to($user->email)->send(new Confirmation);
       }
       elseif ($request->image) {
        $panier = new Panier();
        $user = User::create([
            'username' => $request->username,
            'image' => $request->username.'.jpg',
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'panier_id'=> $panier->id
        ]);
        $panier->user_id = $user->id;
        $panier->save();
        Mail::to($user->email)->send(new Confirmation);
       }

       if ($request->newsletter && Newsletter::all()->where('email',$request->email)->count() == 0 ) {
        Mail::to($user->email)->send(new NewsletterMail);
        $store = new Newsletter();
        $store->email = $request->email;
        $store->save();

       }


        

        if ($request->image == true) {
            $image = Image::make($request->image)->resize(50, 50);
            // Storage::put('public/', $image);
            Storage::disk('local')->put('public/'.$request->username.'.jpg', $image->stream(), 'public');

        }
        elseif ($request->file('imageFile') == true) {
            $image = Image::make($request->file('imageFile'))->resize(50, 50);
            // Storage::put('public/',$request->file('imageFile'));
            Storage::disk('local')->put('public/'.$user->imageFile, $image->stream(), 'public');
        }

        



        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}

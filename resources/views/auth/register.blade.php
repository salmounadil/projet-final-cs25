{{-- <x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}
@extends('layouts.frontend.app')
@section('content')
   <section class="login_part padding_top">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6">
                <div class="login_part_form">
                    <div class="login_part_form_iner">
                        <h3>Welcome ! <br>
                            Please register now</h3>
                            <form class="row contact_form" method="POST" action="{{ route('register') }}" novalidate="novalidate" enctype="multipart/form-data">
                                @csrf
                                <div class="col-md-12 form-group p_star">
                                    <input type="text" class="form-control" id="name" name="username" value="{{ old('username') ? old('username') : null }}"
                                    placeholder="Username">
                                    <x-input-error :messages="$errors->get('username')" class="mt-2 text-danger" />

                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <input type="text" class="form-control" id="name" name="image" 
                                    placeholder="Image URL">
                                    <x-input-error :messages="$errors->get('image')" class="mt-2 text-danger" />

                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <input type="file" class="form-control" id="name" name="imageFile" 
                                    placeholder="Image">
                                    <x-input-error :messages="$errors->get('imageFile')" class="mt-2 text-danger" />

                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <input type="text" class="form-control" id="email" name="email" value="{{ old('email') ? old('email') : null }}"
                                    placeholder="Email">
                                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-danger" />

                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <input type="password" class="form-control" id="password" name="password" value=""
                                    placeholder="Password">
                                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-danger" />
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" value=""
                                    placeholder="Confirm Password">
                                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-danger" />
                                </div>
                                <div class="col-md-12 form-group">
                                    <div class="creat_account d-flex align-items-center">
                                        <input type="checkbox" id="f-option" name="newsletter">
                                        <label for="f-option">Subscribe to newsletter</label>
                                    </div>
                                    <button type="submit" value="submit" class="btn_3">
                                        Register
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="login_part_text text-center">
                        <div class="login_part_text_iner">
                            <h2>You are new ? <br> Create new account here</h2>
                            <p>There are advances being made in science and technology
                                everyday, and a good example of this is the</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section> 
@endsection

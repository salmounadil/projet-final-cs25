<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                "username"=>"admin",
                "image"=>"benzema.jpg",
                "role_id"=>1,
                "email"=>"admin@admin.com",
                "password"=>Hash::make("admin@admin.com"),
                
            ],
            [
                "username"=>"redacteur",
                "image"=>"valverde.jpg",
                "role_id"=>2,
                "email"=>"redacteur@redacteur.com",
                "password"=>Hash::make("redacteur@redacteur.com"),
                
            ],
            [
                "username"=>"webmaster",
                "image"=>"ceballos.jpg",
                "role_id"=>3,
                "email"=>"webmaster@webmaster.com",
                "password"=>Hash::make("webmaster@webmaster.com"),
                
            ],
            [
                "username"=>"membre",
                "image"=>"kroos.jpg",
                "role_id"=>4,
                "email"=>"membre@membre.com",
                "password"=>Hash::make("membre@membre.com"),
                
            ],
        ]);
    }
}

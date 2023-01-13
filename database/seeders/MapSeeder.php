<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MapSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('maps')->insert([
            [
                "adresse"=>"Place de la minoterie 10",
                "ville"=>"Molenbeek-Saint-Jean",
                "codepostal"=>"1080",
                "tel"=>"00(32)25317545",
                "email"=>"Molengeek@molengeek.com",
            ]
        ]);
    }
}

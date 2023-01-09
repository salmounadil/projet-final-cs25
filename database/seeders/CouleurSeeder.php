<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CouleurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('couleurs')->insert([
            [
                "couleur"=>"Blanc"
            ],
            [
                "couleur"=>"Bleu"
            ],
            [
                "couleur"=>"Rouge"
            ],
            [
                "couleur"=>"Orange"
            ],
            [
                "couleur"=>"Violet"
            ],
            [
                "couleur"=>"Rose"
            ],
            [
                "couleur"=>"Jaune"
            ],
            [
                "couleur"=>"Noir"
            ],
            [
                "couleur"=>"Gris"
            ],
            [
                "couleur"=>"Beige"
            ],
            [
                "couleur"=>"Vert"
            ],
            [
                "couleur"=>"Marron"
            ],
            [
                "couleur"=>"Bordeaux"
            ],
        ]);
    }
}

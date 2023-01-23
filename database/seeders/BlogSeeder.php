<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('blogs')->insert([
            [
                "dateJ"=>15,
                "dateM"=>'Jan',
                "confirmation"=> true,
                "image"=>'1.jpg',
                "user_id"=>1,
                "categoryblog_id"=>3,
                "titre"=>"Cap sur les Canaries",
                "texte"=>"Que vous soyez à la recherche de plages de sable fin, de volcans à gravir, de forêts dans lesquelles se perdre, d'espaces naturels et préservés, de repos ou de nuits sans sommeil, l'une des îles de l'archipel saura vous satisfaire et combler vos souhaits.",
            ],
            [
                "dateJ"=>16,
                "dateM"=>'Jan',
                "confirmation"=> true,
                "image"=>'2.jpg',
                "user_id"=>1,
                "categoryblog_id"=>4,
                "titre"=>"La semaine de la SuperCoupe",
                "texte"=>"Le Real Madrid joue cette semaine le second trophée de la saison : la Supercoupe d'Espagne. Notre équipe tentera de conserver son titre à Riyad (Arabie saoudite) de super-champion d'Espagne remporté la saison passée dans ce même lieu. L'édition 2023 a pour participants la formation dirigée par Ancelotti (champion de Liga), le Betis (vainqueur de la Coupe du Roi), Barcelone (vice-champion de Liga) et Valence (finaliste de la Coupe du Roi).",
            ],
            [
                "dateJ"=>17,
                "dateM"=>'Jan',
                "confirmation"=> true,
                "image"=>'3.jpg',
                "user_id"=>1,
                "categoryblog_id"=>1,
                "titre"=>"Cristiano Ronaldo et Messi vont se retrouver très prochainement !",
                "texte"=>"Le Paris SG de Lionel Messi sera à Ryad le jeudi 19 janvier pour y affronter une sélection composée des meilleurs joueurs des clubs saoudiens d'Al-Hilal et Al-Nassr, où a récemment été transféré Cristiano Ronaldo, a indiqué le club champion de France lundi.",
            ],
            [
                "dateJ"=>20,
                "dateM"=>'Jan',
                "confirmation"=> true,
                "image"=>'4.jpg',
                "user_id"=>2,
                "categoryblog_id"=>2,
                "titre"=>"Une évolution technologique qui peut faire toute la différence",
                "texte"=>"La semelle est en général en polyuréthane et comporte des inserts en fibre de carbone pour en augmenter la solidité. Les crampons sont immergés dans la semelle au moment du moulage. Leur nombre et leur longueur varient selon le type de jeu. En plus des crampons traditionnels à section conique, on trouve désormais des crampons triangulaires, à lamelles, en virgule, voire pivotants. Cette variété a pour origine les différentes natures des terrains de jeu, qui peuvent être artificiels ou naturels, secs, compacts ou gras. Les crampons doivent garantir une bonne adhérence au sol sans bloquer excessivement le pied, afin d'éviter distorsions et autres blessures. Ils ont également une fonction d'amortisseur.",
            ],
            [
                "dateJ"=>21,
                "dateM"=>'Jan',
                "confirmation"=> true,
                "image"=>'5.jpg',
                "user_id"=>2,
                "categoryblog_id"=>3,
                "titre"=>"Last Minute Egypte",
                "texte"=>"Partez à la découverte de l'Egypte lors d'un voyage en last minute. Ce pays fascinant regorge de trésors historiques et culturels à explorer. Vous pourrez admirer les Pyramides de Gizeh, les temples de Louxor et la Vallée des Rois, témoins de la grandeur de l'ancienne civilization égyptienne. Vous pourrez également vous détendre sur les plages de la Mer Rouge et découvrir la ville animée de Le Caire.",
            ],
            [
                "dateJ"=>23,
                "dateM"=>'Jan',
                "confirmation"=> true,
                "image"=>'6.jpg',
                "user_id"=>1,
                "categoryblog_id"=>4,
                "titre"=>"APRÈS PELÉ, LE MONDE DU FOOTBALL BRÉSILIEN À NOUVEAU EN DEUIL",
                "texte"=>"Quelques jours après la légende Pelé, le football brésilien est à nouveau en deuil. Dimanche, Roberto Dinamite est décédé à l'âge de 68 ans des suites d'un cancer.
                La nouvelle a été confirmée par le club Vasco de Gama : \"C'est avec une grande douleur que Vasco da Gama a appris que le plus grand de tous nous avait quittés ce dimanche. Carlos Roberto de Oliveira, alias Dinamite, a dédié 29 de ses 68 ans au club, en tant que joueur et président. Repose en paix.
                Véritable légende au pays, Dinamite détient toujours aujourd'hui le record du nombre de buts dans le championnat brésilien avec 190 pions inscrits. Il possède également plusieurs trophées à son palmarès : un titre national en 1974 et cinq titres de Rio.",
            ],
        ]);
    }
}

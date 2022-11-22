<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdvantageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('advantages')->insert([
            [
                'icon_url' => "storage/advantages/restaurant-outline.png",
                'title_french' => "Une restauration responsable et de qualité",
                'title_english' => "",
                'description_french' => "Nos cuisiniers sélectionnent chaque matin des produits frais venant de producteurs de la région, en privilégiant des produits issus de l’agriculture biologique.",
                'description_english' => ""
            ],
            [
                'icon_url' => "storage/advantages/car-outline.png",
                'title_french' => "Un parking pour tous !",
                'title_english' => "",
                'description_french' => "Voiture de luxe ou citadine, un parking en plein ou souterrain attends votre véhicule à l’hôtel !",
                'description_english' => ""
            ],
            [
                'icon_url' => "storage/advantages/bed-outline.png",
                'title_french' => "Un confort kingsize",
                'title_english' => "",
                'description_french' => "Des lits optimum pour un confort optimal : même les plus grands y trouvent leur compte !",
                'description_english' => ""
            ],
            [
                'icon_url' => "storage/advantages/wifi-outline.png",
                'title_french' => "Connectivité optimale",
                'title_english' => "",
                'description_french' => "Vous pouvez profiter gratuitement de la fibre optique dans tout l’hôtel, ainsi que d’un rétro-projecteur dans chaque chambre.",
                'description_english' => ""
            ],
            [
                'icon_url' => "storage/advantages/star-outline.png",
                'title_french' => "Des étoiles à partée de main",
                'title_english' => "",
                'description_french' => "Grâce à l’emplacement de notre hôtel , profite du ciel étoilé un verre à la main sur une chaise longue de notre rooftop !",
                'description_english' => ""
            ],
            [
                'icon_url' => "storage/advantages/airplane-outline.png",
                'title_french' => "Un avion à prendre ?",
                'title_english' => "",
                'description_french' => "Soyez sûrs de ne pas le rater grâce à notre équipe qui s’occupera de vous réveiller avec une chanson de Carlos et de vous trouver un taxi !",
                'description_english' => ""
            ],

        ]);
    }
}

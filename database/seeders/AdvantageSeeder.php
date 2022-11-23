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
                'title' => json_encode(["fr" => "Une restauration responsable et de qualité",
                "en" => ""]),
                'description' => json_encode(["fr" => "Nos cuisiniers sélectionnent chaque matin des produits frais venant de producteurs de la région, en privilégiant des produits issus de l’agriculture biologique.",
                "en" => ""])
            ],
            [
                'icon_url' => "storage/advantages/car-outline.png",
                'title' => json_encode(["fr" => "Un parking pour tous !",
                    "en" => ""]),
                'description' => json_encode(["fr" => "Voiture de luxe ou citadine, un parking en plein ou souterrain attends votre véhicule à l’hôtel !",
                    "en" => ""])
            ],
            [
                'icon_url' => "storage/advantages/bed-outline.png",
                'title' => json_encode(["fr" => "Un confort kingsize",
                    "en" => ""]),
                'description' => json_encode(["fr" => "Des lits optimum pour un confort optimal : même les plus grands y trouvent leur compte !",
                    "en" => ""])
            ],
            [
                'icon_url' => "storage/advantages/wifi-outline.png",
                'title' => json_encode(["fr" => "Connectivité optimale",
                    "en" => ""]),
                'description' => json_encode(["fr" => "Vous pouvez profiter gratuitement de la fibre optique dans tout l’hôtel, ainsi que d’un rétro-projecteur dans chaque chambre.",
                    "en" => ""])
            ],
            [
                'icon_url' => "storage/advantages/star-outline.png",
                'title' => json_encode(["fr" => "Des étoiles à partée de main",
                    "en" => ""]),
                'description' => json_encode(["fr" => "Grâce à l’emplacement de notre hôtel , profite du ciel étoilé un verre à la main sur une chaise longue de notre rooftop !",
                    "en" => ""])
            ],
            [
                'icon_url' => "storage/advantages/airplane-outline.png",
                'title' => json_encode(["fr" => "Un avion à prendre ?",
                    "en" => ""]),
                'description' => json_encode(["fr" => "Soyez sûrs de ne pas le rater grâce à notre équipe qui s’occupera de vous réveiller avec une chanson de Carlos et de vous trouver un taxi !",
                    "en" => ""])
            ]
        ]);
    }
}

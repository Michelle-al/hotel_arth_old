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
                "en" => "Quality and responsible food"]),
                'description' => json_encode(["fr" => "Nos cuisiniers sélectionnent chaque matin des produits frais venant de producteurs de la région, en privilégiant des produits issus de l’agriculture biologique.",
                "en" => "Our cooks select every morning fresh products coming from local producers, they choose products from organic farming."]),
                "icon_alt" => json_encode([
                    "fr" => "Couteau et fourchette",
                    "en" => "Knife and fork"
                ])
            ],
            [
                'icon_url' => "storage/advantages/car-outline.png",
                'title' => json_encode(["fr" => "Un parking pour tous !",
                    "en" => "Car park for everyone !"]),
                'description' => json_encode(["fr" => "Voiture de luxe ou citadine, un parking en plein air ou souterrain attends votre véhicule à l’hôtel !",
                    "en" => "Luxury car or city car, an open-air car park and an underground parking are waiting for your car at the hotel."]),
                "icon_alt" => json_encode([
                    "fr" => "Voiture",
                    "en" => "Car"
                ])
            ],
            [
                'icon_url' => "storage/advantages/bed-outline.png",
                'title' => json_encode(["fr" => "Un confort kingsize",
                    "en" => "Comfortable bedding kingsize"]),
                'description' => json_encode(["fr" => "Des lits optimum pour un confort optimal : même les plus grands y trouvent leur compte !",
                    "en" => "Optimum beds for optimal comfort : taller ones will also benefit."]),
                "icon_alt" => json_encode([
                    "fr" => "Lit",
                    "en" => "Voiture"
                ])
            ],
            [
                'icon_url' => "storage/advantages/wifi-outline.png",
                'title' => json_encode(["fr" => "Connectivité optimale",
                    "en" => "Optimal connectivity"]),
                'description' => json_encode(["fr" => "Vous pouvez profiter gratuitement de la fibre optique dans tout l’hôtel, ainsi que d’un rétro-projecteur dans chaque chambre.",
                    "en" => "You can enjoy free fibre optic connection in all the hotel as well as an overhead projector in each room."]),
                "icon_alt" => json_encode([
                    "fr" => "Wifi",
                    "en" => "Wifi"
                ])
            ],
            [
                'icon_url' => "storage/advantages/star-outline.png",
                'title' => json_encode(["fr" => "Des étoiles à partée de main",
                    "en" => "Stars at hand"]),
                'description' => json_encode(["fr" => "Grâce à l’emplacement de notre hôtel , profite du ciel étoilé un verre à la main sur une chaise longue de notre rooftop !",
                    "en" => "Due to the location of our hotel, enjoy the starry sky on a chair and a glass on hand."]),
                "icon_alt" => json_encode([
                    "fr" => "Étoile",
                    "en" => "Star"
                ])
            ],
            [
                'icon_url' => "storage/advantages/airplane-outline.png",
                'title' => json_encode(["fr" => "Un avion à prendre ?",
                    "en" => "a plane to catch ?"]),
                'description' => json_encode(["fr" => "Soyez sûrs de ne pas le rater grâce à notre équipe qui s’occupera de vous réveiller avec une chanson de Carlos et de vous trouver un taxi !",
                    "en" => "Be sure not to miss it thanks to our team who will wake you up with a song of Carlos and will find you a taxi."]),
                "icon_alt" => json_encode([
                    "fr" => "Avion",
                    "en" => "Airplane"
                ])
            ]
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news')->insert([
            [
                "title" => json_encode(["fr" => "Rooftop en folie !", "en" => "Rooftop unlimited!"]),
                "media_url" => 'storage/news/rooftop-event.jpg',
                "description" => json_encode(
                    ["fr" => "Vendredi 26 août, pour fêter ses dix ans d’ouverture, une fête aura lieu sur le rooftop de l’hôtel, avec piscine, traiteurs et musiciens !",
                "en" => "On Friday August 26th, a party with pool, caterer and musicians will be held to celebrate the ten years of opening !"]),
                "media_alt" => json_encode([
                    "fr" => "Des gens qui font la fête sur le toit de l'hôtel avec des feux d'atifices en fond",
                    "en" => "People partying on the rooftop of the hotel with fireworks in the background"
                ]),
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => date("Y-m-d H:i:s")
            ],
            [
                "title" => json_encode(["fr" => "Un nouveau chef à l'hôtel", "en" => "A new chef in the hotel"]),
                "media_url" => 'storage/news/restaurant-event.jpg',
                "description" => json_encode(
                    ["fr" => "Le nouveau chef Noël Dugoujon prendra le contrôle des cuisines de l'hôtel ! Fin connaisseur du terroir et des producteurs locaux, il permettra à l'hôtel Arth de se rapprocher de son exigence de durabilité et de responsabilité écologique.",
                "en" => "New chef Noël Dugoujon will be the new master of the hotel's kitchen ! Fine connoisseur of the region's terroir and local growers, he will bring the hotel closer to its exigency of durability and ecological responsability."]),
                "media_alt" => json_encode([
                    "fr" => "Chef qui prépare un repas gourmet sain",
                    "en" => "Chef preparing a healthy and gourmet meal"
                ]),
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => date("Y-m-d H:i:s")
            ]
        ]
        );
    }
}

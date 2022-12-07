<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('room_categories')->insert([
            [
            "media_url" => "storage/room_categories/hotel-room-g512f9f1ee_1920.jpg",
            "title" => json_encode(["fr" => "La suite royale",
            "en" => "The Royal Suite"]),
            "description" => json_encode(["fr" => "Une suite qui enchantera votre lune de miel et comblera vos désirs les plus fous.",
            "en" => "A suite perfectly suited for your honeymoon, and which can also satisfy your fanciest desires."]),
            "media_alt" => json_encode(["fr" => "La belle suite Royale aux tons gris et doré baignant dans le coucher du soleil.", "en" => "The beautiful royal suite with grey and golden tones bathing in the sunset"])
        ],
        [
            "media_url" => "storage/room_categories/arth_chambre_luxe.jpeg",
            "title" => json_encode(["fr" => "La chambre de luxe",
            "en" => "Luxury Room"]),
            "description" => json_encode(["fr" => "Vous préférez les draps en soie et un mini-bar plus remplie dans votre chambre ? Nos chambres de luxe sont faites pour vous !",
            "en" => "Your heart goes to silk sheets and a full mini-bar in your room? The luxury room is made for you!"]),
            "media_alt" => json_encode(["fr" => "La chambre de luxe aux tons bleus avec vue sur le lac", "en" => "The luxury room with its blue tones with a view on the lake."])
        ],
        [
            "media_url" => "storage/room_categories/arth_chambre_classique.jpeg",
            "title" => json_encode(["fr" =>"La chambre classique",
            "en" => "The Classic"]),
            "description" => json_encode(["fr" => "Nous faisons attention à ce que nos chambres soient spacieuses et aérées afin de vous offrir une respiration pendant votre séjour.",
            "en" => "We make a point for our rooms to be spacious and airy so that your stay feels like a breath of fresh air."]),
            "media_alt" => json_encode(["fr" => "La chambre classique avec sa petite lampe de chevet allumée en soirée.", "en" => "The classic room and its bed lamp lightening the evening."])
        ]
        ]);
    }
}

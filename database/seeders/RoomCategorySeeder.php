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
            "url" => "storage/room_categories/hotel-room-g512f9f1ee_1920.jpg",
            "title_french" => "La suite royale",
            "title_english" => "The Royal Suite",
            "description_french" => "Une suite qui enchantera votre lune de miel et comblera vos désirs les plus fous.",
            "description_english" => "A suite perfectly suited for your honeymoon, and which can also satisfy your fanciest desires."
        ],
        [
            "url" => "storage/room_categories/arth_chambre_luxe.jpeg",
            "title_french" => "La chambre de luxe",
            "title_english" => "Luxury Room",
            "description_french" => "Vous préférez les draps en soie et un mini-bar plus remplie dans votre chambre ? Nos chambres de luxe sont faites pour vous !",
            "description_english" => "Your heart goes to silk sheets and a full mini-bar in your room? The luxury room is made for you!"
        ],
        [
            "url" => "storage/room_categories/arth_chambre_classique.jpeg",
            "title_french" => "La chambre classique",
            "title_english" => "The Classic",
            "description_french" => "Nous faisons attention à ce que nos chambres soient spacieuses et aérées afin de vous offrir une respiration pendant votre séjour.",
            "description_english" => "We make a point for our rooms to be spacious and airy so that your stay feels like a breath of fresh air."
        ]
        ]);
    }
}

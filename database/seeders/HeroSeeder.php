<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class HeroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        DB::table('heroes')->insert([
//            'title' => ,
//            'title_english' => ,
//            'media_url' => '/storage/hero/hotel-room-g512f9f1ee_1920.jpg',
//            'subtitle' => ,
//            'subtitle_english' => ,
//        ]);
        \App\Models\RoomCategory::factory()->create();
    }
}

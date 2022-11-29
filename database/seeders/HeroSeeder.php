<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class HeroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('heroes')->insert([
            'title' => json_encode(["fr" => "Hôtel Arth", "en" => "Hôtel Arth"]),
            'media_url' => '/storage/hero/hotel-room-g512f9f1ee_1920.jpg',
            'subtitle' => json_encode(["fr" => "Un hôtel où revenir", "en" => "An hotel where you come back"]),
            'slug' => 'default-hero'
        ]);
    }
}

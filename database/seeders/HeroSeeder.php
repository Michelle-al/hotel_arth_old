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
            'title' => Str::random(10),
            'title_english' => '',
            'media_url' => '/storage/hero/hotel-room-g512f9f1ee_1920.jpg',
            'subtitle' => Str::random(20),
            'subtitle_english' => '',
        ]);
    }
}

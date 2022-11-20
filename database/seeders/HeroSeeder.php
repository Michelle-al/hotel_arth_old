<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HeroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // TODO - Retirer les valeurs "TEST pour Emi" nécessaires pour faire fonctionner la commande php artisan migrate:fresh --seed
        DB::table('heroes')->insert([
            'title' => 'TEST pour Emi',
            'title_english' => '',
            'media_url' => '/storage/hero/hotel-room-g512f9f1ee_1920.jpg',
            'subtitle' => 'TEST pour Emi',
            'subtitle_english' => '',
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PromotionalBannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('promotional_banners')->insert([
            'text_french' => "-10% à partir de la 10ème nuit passée à l'Hôtel Arth",
            'text_english' => "-10% after the 10th night spent at Hôtel Arth"
        ]);
    }
}

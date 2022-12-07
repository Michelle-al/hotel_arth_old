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
            "text" => json_encode(["fr" => "-10% à partir de la 10ème nuit passée à l'Hôtel Arth",
            "en" => "-10% after the 10th night spent at Hôtel Arth"]),
            "slug" => "default-banner"
        ]);
    }
}

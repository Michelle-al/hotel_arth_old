<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PresentationVideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('presentation_videos') -> insert([
            "title" => json_encode(["fr" => "Séjour de rêve", "en" => "Dream stay"]),
            "description" => json_encode(["fr" => "Découvrez les délices de notre chef au restaurant de l'Hôtel Arth.",
            "en" => "Discover the delights of our chef at the Hotel Arth's restaurant."]),
            "video_url" => "storage/video/presentation_video.mp4",
        ]);
    }
}

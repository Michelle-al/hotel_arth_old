<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;class PresentationVideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('presentation_videos') -> insert([
            "title" => "Séjour de rêve",
            "title_english" => "",
            "description" => "Découvrez les différentes activités aux alentours de l'hôtel Arth.",
            "description_english" => "",
            "video_url" => "storage/video/presentation_video.mp4",
        ]);
    //        \App\Models\PresentationVideo::factory()->create();
    }
}

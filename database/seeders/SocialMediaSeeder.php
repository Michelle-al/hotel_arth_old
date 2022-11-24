<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SocialMediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('social_medias')->insert([
            [
                'logo_url' => "storage/socialMedias/logo-instagram.png",
                'social_url' => "https://www.instagram.com"
            ],
            [
                'logo_url' => "storage/socialMedias/logo-facebook.png",
                'social_url' => "https://fr-fr.facebook.com/"
            ],
            [
                'logo_url' => "storage/socialMedias/logo-twitter.png",
                'social_url' => "https://twitter.com/"
            ],

        ]);
    }
}

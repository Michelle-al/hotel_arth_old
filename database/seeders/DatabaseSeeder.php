<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            HeroSeeder::class,
            PresentationVideoSeeder::class,
            PromotionalBannerSeeder::class,
            RoomCategorySeeder::class,
            // AvantagesSeeder::class,
            CustomerSeeder::class,
            ReviewSeeder::class,

        ]);
    }
}

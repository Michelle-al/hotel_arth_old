<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PresentationVideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\PresentationVideo::factory()->create();
    }
}

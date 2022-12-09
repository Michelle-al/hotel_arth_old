<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ReservationsOptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ReservationsOptionSeeder::factory(10)->create();
    }
}

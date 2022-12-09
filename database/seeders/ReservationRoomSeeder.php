<?php

namespace Database\Seeders;

use App\Models\ReservationRoom;
use Illuminate\Database\Seeder;

class ReservationRoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ReservationRoom::factory(32)->create();
    }
}

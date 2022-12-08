<?php

namespace Database\Seeders;

use App\Models\Rooms;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rooms')->insert([
            [
                'room_number' => 101,
                'style' => 'La classique',
                'price' => 70,
            ],
            [
                'room_number' => 102,
                'style' => 'La classique',
                'price' => 70,
            ],
            [
                'room_number' => 103,
                'style' => 'La classique',
                'price' => 70,
            ],
            [
                'room_number' => 104,
                'style' => 'La classique',
                'price' => 70,
            ],
            [
                'room_number' => 105,
                'style' => 'La classique',
                'price' => 70,
            ],
            [
                'room_number' => 106,
                'style' => 'La classique',
                'price' => 70,
            ],
            [
                'room_number' => 107,
                'style' => 'La classique',
                'price' => 70,
            ],
            [
                'room_number' => 108,
                'style' => 'La classique',
                'price' => 70,
            ],
            [
                'room_number' => 109,
                'style' => 'La classique',
                'price' => 70,
            ],
            [
                'room_number' => 110,
                'style' => 'La classique',
                'price' => 70,
            ],
            [
                'room_number' => 201,
                'style' => 'La classique',
                'price' => 70,
            ],
            [
                'room_number' => 202,
                'style' => 'La classique',
                'price' => 70,
            ],
            [
                'room_number' => 203,
                'style' => 'La classique',
                'price' => 70,
            ],
            [
                'room_number' => 204,
                'style' => 'La classique',
                'price' => 70,
            ],
            [
                'room_number' => 205,
                'style' => 'La classique',
                'price' => 70,
            ],
            [
                'room_number' => 206,
                'style' => 'La classique',
                'price' => 70,
            ],
            [
                'room_number' => 207,
                'style' => 'La classique',
                'price' => 70,
            ],
            [
                'room_number' => 208,
                'style' => 'La classique',
                'price' => 70,
            ],
            [
                'room_number' => 209,
                'style' => 'La classique',
                'price' => 70,
            ],
            [
                'room_number' => 210,
                'style' => 'La classique',
                'price' => 70,
            ],
            [
                'room_number' => 301,
                'style' => 'La classique',
                'price' => 70,
            ],
            [
                'room_number' => 302,
                'style' => 'La classique',
                'price' => 70,
            ],
            [
                'room_number' => 303,
                'style' => 'La classique',
                'price' => 70,
            ],
            [
                'room_number' => 304,
                'style' => 'La classique',
                'price' => 70,
            ],
            [
                'room_number' => 305,
                'style' => 'La classique',
                'price' => 70,
            ],
            [
                'room_number' => 111,
                'style' => 'La suite de luxe',
                'price' => 140,
            ],
            [
                'room_number' => 211,
                'style' => 'La suite de luxe',
                'price' => 140,
            ],
            [
                'room_number' => 306,
                'style' => 'La suite de luxe',
                'price' => 140,
            ],
            [
                'room_number' => 307,
                'style' => 'La suite de luxe',
                'price' => 140,
            ],
            [
                'room_number' => 308,
                'style' => 'La suite de luxe',
                'price' => 140,
            ],
            [
                'room_number' => 309,
                'style' => 'La suite Royale',
                'price' => 280,
            ],
            [
                'room_number' => 310,
                'style' => 'La suite Royale',
                'price' => 280,
            ],
        ]);
    }
}

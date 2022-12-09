<?php

namespace Database\Factories;

use App\Models\Reservation;
use App\Models\Rooms;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReservationRoomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $reservation_id = Reservation::all()->pluck('id')->toArray();
        $room_number = Rooms::all()->pluck('room_number')->toArray();
        return [
            'reservation_id' => $this->faker->randomElement($reservation_id),
            'room_number' => $this->faker->unique()->randomElement($room_number)
        ];
    }
}

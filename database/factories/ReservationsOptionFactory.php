<?php

namespace Database\Factories;

use App\Models\Option;
use App\Models\Reservation;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReservationsOptionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $reservation_id = Reservation::all()->pluck('id')->toArray();
        $option_id = Option::all()->pluck('id')->toArray();
        return [
            'reservation_id' => $this->faker->randomElement($reservation_id),
            'option_id' => $this->faker->randomElement($option_id)
        ];
    }
}

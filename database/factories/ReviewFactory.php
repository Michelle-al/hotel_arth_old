<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $user_id = User::all()->pluck('id')->toArray();
        return [
            'user_id'=> $this->faker->randomElement($user_id),
            'rating' => $this->faker->numberBetween(3, 5),
            'title' => $this->faker->realText(30),
            'body' => $this->faker->realText(200),
            'is_displayed' => $this->faker->boolean(60),
            'created_at' => $this->faker->date(),

        ];
    }
}

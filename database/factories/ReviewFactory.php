<?php

namespace Database\Factories;

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
        return [
            'customer_id'=>$this->faker->randomNumber(3),
            'rating' => $this->faker->randomNumber(1),
            'title' => $this->faker->realText(30),
            'body' => $this->faker->realText(),
            'is_displayed' => $this->faker->boolean(60),
            'created_at' => $this->faker->date(),

        ];
    }
}

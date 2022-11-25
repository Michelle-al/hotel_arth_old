<?php

namespace Database\Factories;

use App\Models\Customer;
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
        $customer_id = Customer::all()->pluck('id')->toArray();
        return [
            'customer_id'=> $this->faker->randomElement($customer_id),
            'rating' => $this->faker->numberBetween(3, 5),
            'title' => $this->faker->realText(30),
            'body' => $this->faker->realText(200),
            'is_displayed' => $this->faker->boolean(60),
            'created_at' => $this->faker->date(),

        ];
    }
}

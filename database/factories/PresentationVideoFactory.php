<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PresentationVideoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'video_url' => 'storage/video/presentation_video.mp4',
            'title' => $this->faker->title(30),
            'title_english' => $this->faker->title(50),
            'description' => $this->faker->text(200),
            'description_english' => $this->faker->text(200),
        ];
    }
}

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
    public function definition()
    {
        return [
            'video_url' => 'storage/video/presentation_video.mp4',
            'title' => $this->faker->text(50),
            'title_english' => $this->faker->text(50),
            'description' => $this->faker->text(500),
            'description_english' => $this->faker->text(500),
        ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Slide>
 */
class SlideFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title'=> $this->faker->word(4),
            'description' => $this->faker->sentence(8),
            'image'=> $this->faker->image('public/storage/images/slides', 1920, 1080, null, false, false),
            'status'    => $this->faker->randomElement(['active','inactive']),
            //'link_title'    => $this->faker->randomElement(['click','click here','Read More']),
        ];
    }
}

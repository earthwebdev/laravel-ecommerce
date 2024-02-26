<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Page>
 */
class PageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->words(3, true),
            'slug'=> $this->faker->slug,
            'description'=> $this->faker->paragraph(3),
            'image' => $this->faker->image('public/storage/images/pages', 640, 480, null, false, false),
        ];
    }
}

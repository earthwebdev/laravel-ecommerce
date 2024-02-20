<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->title,
            'slug'=> $this->faker->slug,
            'description'=> $this->faker->paragraph(2),
            'image' => $this->faker->image('public/storage/images/categories', 640, 480, null, false, false),
        ];
    }
}

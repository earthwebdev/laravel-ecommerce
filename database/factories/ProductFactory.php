<?php

namespace Database\Factories;

use App\Models\category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
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
            'description'=> $this->faker->paragraph(2),
            'image' => $this->faker->image('public/storage/images/products', 640, 480, null, false, false),
            'price' => $this->faker->randomFloat(2,1,999),
            "status"    => $this->faker->randomElement(["active","inactive"]),
            "category_id"   => category::get()->random()->id,
        ];
    }
}

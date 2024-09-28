<?php

namespace Database\Factories;

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
    public function definition()
    {
        return [
            //
            'name_product' => fake()->name(),
            'img_prod' => 'test.jpg',
            'quantity' => fake()->numberBetween(1, 100),
            'desc' => fake()->text(),
            'price' => fake()->numberBetween(),
            'cate_id' => fake()->numberBetween(1, 4),
            'promotion_id' => '1',
            'views' => '0',
        ];

    }
}

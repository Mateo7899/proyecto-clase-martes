<?php

namespace Database\Factories;

use App\Models\category;
use App\Models\product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = product::class;
    public function definition(): array
    {
        return [
            'name' => fake()->word(),
            'description' => fake()->paragraph(),
            'price' => fake()->randomFloat(2, 100, 100000),
            'category_id' => category::inRandomOrder()->first()->id,
        ];
    }
}

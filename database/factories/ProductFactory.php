<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


class ProductFactory extends Factory
{
    
    public function definition(): array
    {
        return [
            'name' => $this->faker->word,
            'product_price' => $this->faker->randomFloat(2, 1, 100),
            'created_at' => $this->faker->dateTime,
            'updated_at' => $this->faker->dateTime,    
        ];
    }
}

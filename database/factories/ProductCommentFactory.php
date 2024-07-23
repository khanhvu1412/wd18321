<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Product;



class ProductCommentFactory extends Factory
{
    public function definition(): array
    {
        return [
            'userID' => User::all()->random()->id,
            'productId' => Product::all()->random()->id,
            'comment' => $this->faker->paragraph,
            'created_at' => $this->faker->dateTime,
            'updated_at' => $this->faker->dateTime,
        ];
    }
}

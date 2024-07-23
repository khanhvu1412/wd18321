<?php

namespace Database\Factories;

use App\Models\OrdersLab3;
use App\Models\Product;
use App\Models\ProductsLab3;
use Illuminate\Database\Eloquent\Factories\Factory;


class OrdersDetailLab3Factory extends Factory
{
    public function definition(): array
    {
        return [
            'order_id' => OrdersLab3::all()->random()->order_id,
            'product_id' => ProductsLab3::all()->random()->product_id,
            'quantity' => $this->faker->randomNumber(),
            'price' => $this->faker->randomFloat(2, 1, 100),
            'created_at' => $this->faker->dateTime,
            'updated_at' => $this->faker->dateTime,
        ];
    }
}

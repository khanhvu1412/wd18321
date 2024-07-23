<?php

namespace Database\Factories;

use App\Models\UsersLab3;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrdersLab3Factory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => UsersLab3::all()->random()->user_id,
            'totalPrice' => $this->faker->randomFloat(2, 1, 100),
            'created_at' => $this->faker->dateTime,
            'updated_at' => $this->faker->dateTime,
        ];
    }
}

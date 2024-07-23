<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;


class UsersLab3Factory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->word,
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => $this->faker->randomFloat(10),
            'address' => $this->faker->address,
            'phone' => $this->faker->phoneNumber,
            'created_at' => $this->faker->dateTime,
            'updated_at' => $this->faker->dateTime,
        ];
    }
}

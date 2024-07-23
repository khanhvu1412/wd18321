<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\UsersLab3;

class UsersLab3Seeder extends Seeder
{

    public function run(): void
    {
        UsersLab3::factory()->count(10)->create();

    }
}

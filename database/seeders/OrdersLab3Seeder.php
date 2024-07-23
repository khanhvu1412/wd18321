<?php

namespace Database\Seeders;

use App\Models\OrdersLab3;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrdersLab3Seeder extends Seeder
{
    
    public function run(): void
    {
        OrdersLab3::factory()->count(10)->create();
    }
}

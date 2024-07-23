<?php

namespace Database\Seeders;

use App\Models\OrdersDetailLab3;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrdersDetailLab3Seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        OrdersDetailLab3::factory()->count(10)->create();
    }
}

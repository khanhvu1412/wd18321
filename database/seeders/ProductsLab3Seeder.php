<?php

namespace Database\Seeders;

use App\Models\ProductsLab3;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductsLab3Seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProductsLab3::factory()->count(10)->create();
    }
}

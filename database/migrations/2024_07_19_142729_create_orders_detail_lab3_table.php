<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders_detail_lab3', function (Blueprint $table) {
            $table->increments('order_detail_id');
            $table->unsignedInteger('order_id');
            $table->unsignedInteger('product_id');
            $table->integer('quantity')->default(1);
            $table->float('price', 10, 2);
            $table->foreign('order_id')->references('order_id')->on('orders_lab3')->onDelete('cascade');
            $table->foreign('product_id')->references('product_id')->on('products_lab3')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders_detail_lab3');
    }
};

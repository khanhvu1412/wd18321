<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    
    public function up(): void
    {
        Schema::create('orders_lab3', function (Blueprint $table) {
            $table->increments('order_id');
            $table->unsignedInteger('user_id');
            $table->float('totalPrice', 10, 2);
            $table->foreign('user_id')->references('user_id')->on('users_lab3')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders_lab3');
    }
};

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
        Schema::create('users_lab3', function (Blueprint $table) {
            $table->increments('user_id');
            $table->string('name', 20);
            $table->string('email', 30)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password', 100);
            $table->string('remember_token', 100);
            $table->string('address', 100)->nullable();
            $table->string('phone', 20)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users_lab3');
    }
};

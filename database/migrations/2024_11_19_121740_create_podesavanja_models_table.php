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
        Schema::create('podesavanja', function (Blueprint $table) {
            $table->id();
            $table->string('firma')->default('*');
            $table->string('drajver')->default('*');
            $table->string('putanja')->default('*');
            $table->string('email')->default('*');
            $table->boolean('zvuk')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('podesavanja');
    }
};

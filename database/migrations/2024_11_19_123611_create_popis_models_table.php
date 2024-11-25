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
        Schema::create('popis', function (Blueprint $table) {
            $table->id();
            $table->integer('broj')->default(1);
            $table->integer('magacin')->default(1);
            $table->integer('operater')->nullable();
            $table->float('vrednost')->nullable();
            $table->text('naziv')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('popis');
    }
};

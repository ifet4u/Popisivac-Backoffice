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
        Schema::create('magacin', function (Blueprint $table) {
            $table->unsignedBigInteger('id'); // Define ID without auto-increment
            $table->primary('id'); // Set 'id' as the primary key
            $table->text('naziv');
            $table->text('broj');
            $table->text('adresa');
            $table->text('grad');

           // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('magacin');
    }
};

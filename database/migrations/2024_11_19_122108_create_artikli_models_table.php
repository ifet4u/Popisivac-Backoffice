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
        Schema::create('artikli', function (Blueprint $table) {
            $table->unsignedBigInteger('id'); // Define ID without auto-increment
            $table->primary('id'); // Set 'id' as the primary key
            $table->text('naziv')->nullable();
            $table->text('barcode');
            $table->integer('jm');
            $table->integer('ps');
            $table->float('cena')->nullable();
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('artikli');
    }
};

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
        Schema::create('barkod', function (Blueprint $table) {
            $table->id();
            $table->integer('id_artikal');
            $table->text('barcode');
            //$table->timestamps();

//            $table->foreign('id_artikal')->references('id')->on('artikli')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barkod');
    }
};

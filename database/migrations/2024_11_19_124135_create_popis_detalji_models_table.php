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
        Schema::create('popis_detalji', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_popis');
            $table->integer('barcode');
            $table->text('naziv')->nullable();
            $table->float('kolicina');
            $table->integer('jm')->nullable();
            $table->integer('st')->nullable();

            $table->timestamps();

            //$table->foreign('id_artikal')->references('id')->on('artikli')->onDelete('cascade');
            $table->foreign('id_popis')->references('id')->on('popis')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('popis_detalji');
    }
};

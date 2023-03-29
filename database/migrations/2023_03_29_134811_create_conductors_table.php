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
        Schema::create('conductors', function (Blueprint $table) {
            $table->id();

            $table->string('nombre');

            $table->foreignId('dni_id')->references('id')->on('dnis');
            
            $table->foreignId('agenciatransporte_id')->references('id')->on('agenciatransportes')->nullable();

            $table->foreignId('vehiculo_id')->references('id')->on('vehiculos')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('conductors');
    }
};

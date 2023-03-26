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
        Schema::create('dnis', function (Blueprint $table) {
            $table->id();
            $table->string('codigo_pais', 10);
            $table->string('dni', 255);
            $table->string('direccion1', 255);
            $table->string('direccion2', 255);
            $table->string('comunidad', 255);
            $table->string('provincia', 45)->nullable();
            $table->string('localidad', 45)->nullable();
            
            $table->string('codigo_postal', 10);
            $table->string('pais', 10);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dnis');
    }
};

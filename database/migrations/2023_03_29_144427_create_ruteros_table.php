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
        Schema::create('ruteros', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->foreignId('conductor_id')->references('id')->on('conductors');
            $table->foreignId('ruta_id')->references('id')->on('rutas');

            $table->boolean('activo')->default(true);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ruteros');
    }
};

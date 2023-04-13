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
        Schema::create('vehiculos', function (Blueprint $table) {
            $table->id();

            $table->string('marca');
            $table->string('modelo');
            $table->string('matricula');
            
            

            $table->foreignId('letraq_id')->references('id')->on('letraqs')->nullable()->onDelete('cascade');

            $table->foreignId('remolque_id')->references('id')->on('letraqs')->nullable()->onDelete('cascade');
          
            $table->foreignId('dni_id')->references('id')->on('dnis')->nullable()->onDelete('cascade');

            $table->boolean('active')->default(true);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehiculos');
    }
};

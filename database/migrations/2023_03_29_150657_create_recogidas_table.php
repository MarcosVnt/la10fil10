<?php

use App\Models\Remolque;
use App\Models\Conductor;
use Illuminate\Foundation\Auth\User;

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
        Schema::create('recogidas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('documento');


            
            $table->foreignId('ruta_id')->references('id')->on('rutas');

            $table->foreignId('conductor_id')->references('id')->on('conductors');


            $table->foreignId('vehiculo_id')->references('id')->on('vehiculos');

            
            $table->foreignIdFor(Remolque::class, 'remolques')->nullable();


            $table->foreignIdFor(Conductor::class, 'conductor_2')->nullable();

            $table->foreignIdFor(User::class, 'created_by')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recogidas');
    }
};

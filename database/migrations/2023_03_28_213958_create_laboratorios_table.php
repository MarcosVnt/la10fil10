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
        Schema::create('laboratorios', function (Blueprint $table) {
            $table->id();
            
           
            $table->string('descripcion');

            $table->string('pais');
            $table->string('dni');
            $table->string('nombre');

            $table->string('direccion1');
            $table->string('direccion2')->nullable();

            $table->string('localidad')->nullable();;
            $table->string('municipio')->nullable();;
            $table->string('provincia')->nullable();;
            $table->integer('codigo_postal')->nullable();;

            $table->string('telefono')->nullable();;
            $table->string('fax')->nullable();;
            $table->integer('movil')->nullable();;

            $table->string('codigo_laboratorio')->nullable();;

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laboratorios');
    }
};

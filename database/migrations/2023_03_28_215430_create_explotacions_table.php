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
        Schema::create('explotacions', function (Blueprint $table) {
            $table->id();

            $table->string('pais');
            $table->string('dni');
            $table->string('nombre');
            
            $table->date('fecha_alta')->nullable();
            $table->date('fecha_baja')->nullable();

            $table->string('causa_baja')->nullable();

            $table->string('provincia')->nullable();
            $table->string('municipio')->nullable();
            $table->string('comarca')->nullable();
            $table->string('poblacion')->nullable();

           

            $table->string('telefono')->nullable();
            $table->string('fax')->nullable();
            $table->integer('movil')->nullable();

            $table->string('email')->unique()->nullable();

            $table->string('codigo_rega')->nullable();
            $table->string('codigo_simogan')->nullable();
           
            //$table->foreignId('empresa_id')->references('id')->on('empresas');
            $table->foreignId('empresa_id')->constrained()->cascdeOnDelete();

            $table->string('status', 45)->nullable();
        

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('explotacions');
    }
};

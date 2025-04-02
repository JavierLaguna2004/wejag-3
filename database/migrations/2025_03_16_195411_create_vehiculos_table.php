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
        Schema::create('vehiculo', function (Blueprint $table) {
            $table->id('codigo_200');
            $table->string('grupo_200');
            $table->string('marca_200');
            $table->string('modelo_200');
            $table->integer('cant_puertas_200');
            $table->integer('cant_plazas_200');
            $table->integer('cap_maletero_200');
            $table->integer('edad_min_200');
            $table->string('estado_200');
            $table->date('fecha_ing_200');
            $table->string('matricula_200');
            $table->foreignId('codigo_100');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehiculo');
    }
};

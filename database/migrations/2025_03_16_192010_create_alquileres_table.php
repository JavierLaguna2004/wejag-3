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
        Schema::create('alquiler', function (Blueprint $table) {
            $table->id('id_500');
            $table->date('fecha_ini_500');
            $table->date('fecha_fin_500');
            $table->boolean('seguro_500');
            $table->double('precio_500');
            $table->foreignId('id_400');
            $table->foreignId('codigo_100');
            $table->foreignId('dni_300');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alquiler');
    }
};

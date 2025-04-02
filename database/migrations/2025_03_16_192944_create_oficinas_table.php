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
        Schema::create('oficina', function (Blueprint $table) {
            $table->id('id');
            $table->string('ciudad_100');
            $table->integer('calle_100');
            $table->integer('numero_100');
            $table->integer('cod_postal_100');
            $table->string('telefono_100');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('oficina');
    }
};

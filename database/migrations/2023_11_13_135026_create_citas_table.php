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
        Schema::create('citas', function (Blueprint $table) {
            $table->id();
            $table->time('hora_inicio')->nullable();
            $table->time('hora_fin')->nullable();
            $table->date('fecha')->nullable();
            $table->unsignedBigInteger('paciente')->nullable();
            $table->unsignedBigInteger('agendo')->nullable();
            $table->unsignedBigInteger('atiende')->nullable();
            $table->boolean('confirmada')->nullable();


            $table->foreign('paciente')->references('id')->on('pacientes');
            $table->foreign('agendo')->references('id')->on('usuarios');
            $table->foreign('atiende')->references('id')->on('usuarios');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('citas');
    }
};

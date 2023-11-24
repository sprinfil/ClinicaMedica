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
        Schema::create('pacientes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('apellido_1')->nullable();
            $table->string('apellido_2')->nullable();
            $table->string('correo')->nullable();
            $table->string('numero')->nullable();
            $table->date('fecha_nac')->nullable();
            $table->enum('Genero', ['Masculino','Femenino','Otro'])->nullable();
            $table->string('contacto_nombre')->nullable();
            $table->string('contacto_numero')->nullable();
            $table->string('contacto_correo')->nullable();
            $table->string('contacto_parentesco')->nullable();
            $table->string('nombre_completo')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pacientes');
    }
};

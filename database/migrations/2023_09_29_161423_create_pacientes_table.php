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
            $table->string('apellido_1');
            $table->string('apellido_2');
            $table->string('correo');
            $table->string('numero');
            $table->string('fecha_nac');
            $table->enum('Genero', ['Masculino','Femenino','Otro']);
            $table->string('contacto_nombre');
            $table->string('contacto_numero');
            $table->string('contacto_correo');
            $table->string('contacto_parentesco');

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

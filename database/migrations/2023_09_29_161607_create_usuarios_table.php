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
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('usuario');
            $table->string('clave');
            $table->string('nombre');
            $table->string('apellido_1')->nullable();
            $table->string('apellido_2')->nullable();
            $table->enum('Puesto', ['Medico','Recepcionista'])->nullable();
            $table->enum('Tipo', ['Admin','Empleado']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};

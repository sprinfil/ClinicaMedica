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
        Schema::create('historial_clinicos', function (Blueprint $table) {
            $table->id();
            $table->string('Diabetes')->nullable();
            $table->string('Tuberculosis')->nullable();
            $table->string('Presion')->nullable();
            $table->string('Hepatitis')->nullable();
            $table->string('Anemia')->nullable();
            $table->string('Asma')->nullable();
            $table->string('Neumonia')->nullable();
            $table->string('Migrana')->nullable();
            $table->string('Fuma')->nullable();
            $table->string('Alcohol')->nullable();
            $table->string('Ejercicio')->nullable();
            $table->string('PDF')->nullable();

            
            $table->foreignId('paciente_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historial_clinicos');
    }
};

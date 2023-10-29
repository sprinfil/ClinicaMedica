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
            $table->boolean('Diabetes')->nullable();
            $table->boolean('Tuberculosis')->nullable();
            $table->boolean('Presion')->nullable();
            $table->boolean('Hepatitis')->nullable();
            $table->boolean('Anemia')->nullable();
            $table->boolean('Asma')->nullable();
            $table->boolean('Neumonia')->nullable();
            $table->boolean('Migrana')->nullable();
            $table->boolean('Fuma')->nullable();
            $table->boolean('Alcohol')->nullable();
            $table->boolean('Ejercicio')->nullable();
            
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

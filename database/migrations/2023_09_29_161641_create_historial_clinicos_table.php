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
            $table->string('Diabetes');
            $table->string('Tuberculosis');
            $table->string('Presion');
            $table->string('Hepatitis');
            $table->string('Anemia');
            $table->string('Asma');
            $table->string('Neumonia');
            $table->string('Migrana');
            $table->string('Fuma');
            $table->string('Alcohol');
            $table->string('Ejercicio');
            $table->string('PDF');

            
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

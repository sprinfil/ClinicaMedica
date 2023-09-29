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
        Schema::create('tratamientos', function (Blueprint $table) {
            $table->id();
            $table->string('tratamiento');
            $table->dateTime('fecha');
            $table->string('nota');
            $table->string('atendio');
            $table->string('monto');
            $table->string('metodo_pago');
            $table->timestamps();

            $table->foreignId('usuario_id')->constrained();
            $table->foreignId('paciente_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tratamientos');
    }
};

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
        Schema::create('configuraciones', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_empresa')->nullable()->default('SurCode');;
            $table->integer('impuesto')->nullable()->default(10);
            $table->integer('dolar')->nullable()->default(16);
            $table->Time('horario_inicio')->nullable()->default('09:00:00');
            $table->Time('horario_final')->nullable()->default('13:00:00');;
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('configuracions');
    }
};

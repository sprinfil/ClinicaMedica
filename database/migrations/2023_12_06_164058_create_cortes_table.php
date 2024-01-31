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
        Schema::create('cortes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('usuario_id')->nullable();
            $table->date('fecha')->nullable();
            $table->integer('efectivo')->nullable();
            $table->integer('tarjeta_credito')->nullable();
            $table->integer('tarjeta_debito')->nullable();
            $table->integer('dolares')->nullable();
            $table->integer('cheques')->nullable();
            $table->integer('total_bruto')->nullable();
            $table->integer('total_neto')->nullable();

            $table->foreign('usuario_id')->references('id')->on('usuarios');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cortes');
    }
};

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
            $table->dateTime('fecha')->nullable();
            $table->string('nota')->nullable();
            $table->decimal('monto',8 ,2)->nullable();
            $table->string('metodo_pago')->nullable();
            $table->string('referencia_pago_tarjeta_debito')->nullable();
            $table->string('referencia_pago_tarjeta_credito')->nullable();
            $table->decimal('pago_con_mxn',8 ,2)->nullable();
            $table->decimal('pago_con_usd',8 ,2)->nullable();

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

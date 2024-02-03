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
        Schema::table('cortes', function (Blueprint $table) {
            $table->decimal('efectivo_impuestos',8 ,2)->nullable();
            $table->decimal('tarjeta_credito_impuestos',8 ,2)->nullable();
            $table->decimal('tarjeta_debito_impuestos',8 ,2)->nullable();
            $table->decimal('dolares_impuestos',8 ,2)->nullable();

            $table->decimal('total_impuestos',8 ,2)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cortes', function (Blueprint $table) {
            //
        });
    }
};

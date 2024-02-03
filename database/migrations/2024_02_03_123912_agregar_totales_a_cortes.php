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

            $table->renameColumn('efectivo', 'efectivo_subtotal');
            $table->renameColumn('tarjeta_credito', 'tarjeta_credito_subtotal');
            $table->renameColumn('tarjeta_debito', 'tarjeta_debito_subtotal');
            $table->renameColumn('dolares', 'dolares_subtotal');

            $table->renameColumn('total_bruto', 'subtotal');
            $table->renameColumn('total_neto', 'total');
          
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

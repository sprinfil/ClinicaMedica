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
        Schema::table('historial_clinicos', function (Blueprint $table) {
            //
            $table->boolean('gastricos')->nullable()->nullable()->after('ejercicio');
            $table->boolean('renales')->nullable()->after('gastricos');
            $table->boolean('artritis')->nullable()->after('renales');
            $table->boolean('epilepsia')->nullable()->after('artritis');
            $table->boolean('cancer')->nullable()->after('epilepsia');

            $table->enum('atencion_medica', ['SI', 'NO'])->default('NO')->nullable()->after('cancer');
            $table->string('porque_atencion_medica')->nullable()->nullable()->after('atencion_medica');
            
            $table->enum('toma_medicamento', ['SI', 'NO'])->default('NO')->nullable()->after('porque_atencion_medica');
            
            $table->enum('es_alergico_medicamento', ['SI', 'NO'])->default('NO')->nullable()->after('toma_medicamento');
            $table->string('cual_medicamento_alergico')->nullable()->nullable()->after('es_alergico_medicamento');
            
            $table->enum('es_alergico_alimento', ['SI', 'NO'])->default('NO')->nullable()->after('cual_medicamento_alergico');
            $table->string('cual_alimento_alergico')->nullable()->nullable()->after('es_alergico_alimento');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('historial_clinicos', function (Blueprint $table) {
            //Schema::table('tu_tabla', function (Blueprint $table) {
            // Eliminar las columnas agregadas
            $table->dropColumn([
                'gastricos', 
                'renales', 
                'artritis', 
                'epilepsia', 
                'cancer', 
                'atencion_medica', 
                'toma_medicamento', 
                'es_alergico_medicamento', 
                'es_alergico_alimento', 
                'porque_atencion_medica', 
                'cual_medicamento_alergico', 
                'cual_alimento_alergico'
            ]);
        });
    }
};

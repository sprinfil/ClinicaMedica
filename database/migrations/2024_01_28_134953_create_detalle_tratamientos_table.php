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
        Schema::create('detalle_tratamientos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tratamiento_id')->nullable();
            $table->unsignedBigInteger('servicio_id')->nullable();


            $table->foreign('tratamiento_id')->references('id')->on('tratamientos');
            $table->foreign('servicio_id')->references('id')->on('servicios');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_tratamientos');
    }
};

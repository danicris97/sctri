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
        Schema::create('controles_pagos_alumno', function (Blueprint $table) {
            $table->id();
            $table->foreingId('pasantias_id')->constrained('pasantias')->onDelete('cascade');
            $table->string('periodo', 45)->nullable();
            $table->strign('monto_estimulo', 45)->nullable();
            $table->string('monto_recibo_de_sueldo', 45)->nullable();
            $table->string('monto_deposito', 45)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('controles_pagos_alumno');
    }
};

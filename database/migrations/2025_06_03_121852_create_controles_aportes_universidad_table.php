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
        Schema::create('controles_aportes_universidad', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pasantia_id')->constrained('pasantias')->onDelete('cascade');
            $table->string('periodo', 45)->nullable();
            $table->string('monto_aporte', 45)->nullable();
            $table->date('fecha_pago_tesoreria', 45)->nullable();
            $table->foreignId('expediente_tesoreria_id')->constrained('expedientes')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('controles_aportes_universidad');
    }
};

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
        Schema::create('actas_pasantias', function (Blueprint $table) {
            $table->id();
            $table->foreignId('control_documentacion_id')->constrained('controles_documentacion_pasantia')->onDelete('cascade');
            $table->string('numero_de_pase', 45);
            $table->date('fecha_pase');
            $table->string('tramite', 45)->nulleable();
            $table->string('observaciones', 120)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('actas_pasantias');
    }
};

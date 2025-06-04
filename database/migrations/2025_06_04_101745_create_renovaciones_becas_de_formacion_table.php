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
        Schema::create('renovaciones_becas_de_formacion', function (Blueprint $table) {
            $table->id();
            $table->foreignId('beca_de_formacion_id')->constrained('becas_de_formacion')->onDelete('cascade');
            $table->date('fecha_renovacion');
            $table->integer('duracion');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('renovaciones_becas_de_formacion');
    }
};

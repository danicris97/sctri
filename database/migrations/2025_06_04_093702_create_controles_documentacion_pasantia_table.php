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
        Schema::create('controles_documentacion_pasantia', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pasantia_id')->constrained('pasantias')->onDelete('cascade');
            $table->date('fecha_firma_secretaria');
            $table->string('observaciones', 120)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('controles_documentacion_pasantia');
    }
};

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
        Schema::create('becas_de_formacion', function (Blueprint $table) {
            $table->id();
            $table->foreignId('alumno_carrera_id')->constrained('alumno_carrera')->onDelete('cascade');
            $table->foreignId('responsable_becario_id')->constrained('responsables_becario')->onDelete('cascade');
            $table->date('fecha_inicio');
            $table->integer('duracion');
            $table->string('estado', 45)->nullable();
            $table->string('dependencia', 45)->nullable();
            $table->string('observaciones', 120)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('becas_de_formacion');
    }
};

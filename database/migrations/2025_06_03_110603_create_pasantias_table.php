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
        Schema::create('pasantias', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_acta')->nulleable();
            $table->date('fecha_inicio')->nulleable();
            $table->integer('duracion')->nulleable();
            $table->date('fecha_fin')->nulleable();
            $table->string('estado', 45)->nulleable();
            $table->string('domicilio', 45)->nulleable();
            $table->string('tareas', 45)->nulleable();
            $table->foreignId('alumno_carrera_id')->constrained('alumno_carrera')->onDelete('cascade');
            $table->foreignId('docente_id')->constrained('docentes')->onDelete('cascade');
            $table->foreignId('responsable_empresa_id')->constrained('responsables_empresa')->onDelete('cascade');
            $table->foreignId('convenio_id')->constrained('convenios')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pasantias');
    }
};

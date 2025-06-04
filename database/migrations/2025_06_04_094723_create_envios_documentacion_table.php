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
        Schema::create('envios_documentacion', function (Blueprint $table) {
            $table->id();
            $table->foreignId('control_documentacion_id')->constrained('controles_documentacion_pasantia')->onDelete('cascade');
            $table->string('numero_de_nota',45);
            $table->date('fecha_envio');
            $table->date('fecha_recepcion')->nullable();
            $table->date('fecha_devolucion')->nullable();
            $table->string('dirigido_a', 45);
            $table->string('observaciones', 120)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('envios_documentacion');
    }
};

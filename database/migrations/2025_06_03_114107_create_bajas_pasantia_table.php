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
        Schema::create('bajas_pasantia', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_baja');
            $table->string('motivo', 120)->nullable();
            $table->foreignId('pasantia_id')->constrained('pasantias')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bajas_pasantia');
    }
};

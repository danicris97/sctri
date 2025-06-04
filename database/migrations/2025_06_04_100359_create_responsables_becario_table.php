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
        Schema::create('responsables_becario', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 45);
            $table->string('apellido', 45);
            $table->string('dni', 9)->unique()->nullable();
            $table->string('cargo', 45)->nulleable();
            $table->string('dependencia', 45)->nulleable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('responsables_becario');
    }
};

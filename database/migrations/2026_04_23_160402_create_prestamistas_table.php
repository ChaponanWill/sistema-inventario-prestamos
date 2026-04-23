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
        Schema::create('prestamistas', function (Blueprint $table) {
            $table->id();

            // DNI
            $table->string('dni')->unique();
            // Nombres
            $table->string('primer_nombre');
            $table->string('segundo_nombre')->nullable();

            // Apellidos
            $table->string('primer_apellido');
            $table->string('segundo_apellido');

            // Estado
            $table->boolean('estado')->default(1);

            // Area
            $table->foreignId('area_id')->constrained()->restrictOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prestamistas');
    }
};

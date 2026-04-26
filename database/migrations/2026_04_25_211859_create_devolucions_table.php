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
        Schema::create('devolucions', function (Blueprint $table) {
            $table->id();

            // prestamo id
            $table->foreignId('prestamo_id')->constrained()->restrictOnDelete();
            // Cantidad devuelta, decimal de 2 dígitos para permitir fracciones
            $table->decimal('cantidad_devuelta', 10, 2);
            // Cantidad en mal estado, decimal de 2 dígitos para permitir fracciones
            $table->decimal('cantidad_mal_estado', 10, 2);
            // fecha de devolución
            $table->date('fecha_devolucion');
            // descripción
            $table->text('descripcion')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('devolucions');
    }
};

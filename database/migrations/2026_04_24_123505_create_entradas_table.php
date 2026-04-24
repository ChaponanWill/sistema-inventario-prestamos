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
        Schema::create('entradas', function (Blueprint $table) {
            $table->id();

            // Fecha de la entrada
            $table->date('fecha');

            // Relación con productos
            $table->foreignId('producto_id')->constrained()->restrictOnDelete();

            // Cantidad de productos ingresados, decimal de 2 dígitos para permitir fracciones
            $table->decimal('cantidad', 10, 2);

            // Descripción opcional de la entrada
            $table->text('descripcion')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entradas');
    }
};

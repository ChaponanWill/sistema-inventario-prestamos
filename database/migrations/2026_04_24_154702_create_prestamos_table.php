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
        Schema::create('prestamos', function (Blueprint $table) {
            $table->id();

            // fecha del préstamo
            $table->date('fecha_prestamo');
            // producto ---
            $table->foreignId('producto_id')->constrained()->restrictOnDelete();
            // cantidad prestada, decimal de 2 dígitos para permitir fracciones
            $table->decimal('cantidad', 10, 2);
            // fecha de devolución, nullable
            $table->date('fecha_devolucion')->nullable();

            // prestamista ---
            $table->foreignId('prestamista_id')->constrained()->restrictOnDelete();
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
        Schema::dropIfExists('prestamos');
    }
};

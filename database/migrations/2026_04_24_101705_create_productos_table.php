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
        Schema::create('productos', function (Blueprint $table) {
            $table->id();

            // nombre, único
            $table->string('nombre')->unique();
            // descripción, nullable
            $table->text('descripcion')->nullable();
            // imagen, nullable
            $table->string('image')->nullable();
            // cantidad, decimal con 2 decimales
            $table->decimal('cantidad', 10, 2);
            // unidad_id, clave foránea a unidads
            $table->foreignId('unidad_id')->constrained()->restrictOnDelete();
            // categoria_id, clave foránea a categorias
            $table->foreignId('categoria_id')->constrained()->restrictOnDelete();


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};

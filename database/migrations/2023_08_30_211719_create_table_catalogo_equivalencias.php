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
        Schema::create('table_catalogo_equivalencias', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('catalogo_id');
            $table->decimal('cantidad_origen', 10, 2);
            $table->unsignedBigInteger('empaque_origen');
            $table->decimal('cantidad_destino', 10, 2);
            $table->unsignedBigInteger('empaque_destino');
            $table->boolean('es_empaque_compra');
            $table->boolean('es_empaque_venta');
            $table->decimal('utilidad_minima_empaque', 10, 2);
            $table->text('comentarios')->nullable();
            $table->timestamps();

            // Clave foránea para empaque_origen
            $table->foreign('empaque_origen')->references('id')->on('table_empaques');

            // Clave foránea para empaque_destino
            $table->foreign('empaque_destino')->references('id')->on('table_empaques');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_catalogo_equivalencias');
    }
};

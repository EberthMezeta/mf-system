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
        Schema::create('table_catalogo_productos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('producto_id');
            $table->unsignedBigInteger('tipo_id');
            $table->unsignedBigInteger('tamano_id');
            $table->unsignedBigInteger('marca_id');
            $table->unsignedBigInteger('presentacion_id');
            $table->unsignedBigInteger('calidad_id');
            $table->string('url_foto');
            $table->string('nomenclatura');
            $table->string('nombre_corto');
            $table->text('comentarios')->nullable();
            $table->timestamps();

            $table->foreign('producto_id')->references('id')->on('table_productos');
            $table->foreign('tipo_id')->references('id')->on('table_tipos');
            $table->foreign('tamano_id')->references('id')->on('table_tamanos');
            $table->foreign('marca_id')->references('id')->on('table_marcas');
            $table->foreign('presentacion_id')->references('id')->on('table_presentaciones');
            $table->foreign('calidad_id')->references('id')->on('table_calidades');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_catalogo_productos');
    }
};

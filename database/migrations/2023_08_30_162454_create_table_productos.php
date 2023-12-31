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
        Schema::create('table_productos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('familia_id');
            $table->foreign('familia_id')->references('id')->on('table_families');
            $table->string('nombre');
            $table->string('url_foto')->nullable();
            $table->text('comentarios')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_productos');
    }
};

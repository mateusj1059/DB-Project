<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('items', function (Blueprint $table) {
            $table->increments('id_item');
            $table->string('nombre_item');
            $table->string('descripcion');
            $table->integer('stack_maximo');
            $table->unsignedInteger('id_rareza');
            $table->unsignedInteger('id_categoria');
            $table->unsignedInteger('id_imagen')->nullable();
            $table->unsignedInteger('id_ubicacion')->nullable();
            $table->unsignedInteger('id_receta')->nullable();
            $table->foreign('id_rareza')->references('id_rareza')->on('rareza')->onDelete('cascade');
            $table->foreign('id_categoria')->references('id_categoria')->on('categorias')->onDelete('cascade');
            $table->foreign('id_imagen')->references('id_imagen')->on('imagen')->onDelete('set null');
            $table->foreign('id_ubicacion')->references('id_ubicacion')->on('ubicacion_items')->onDelete('set null');
            $table->foreign('id_receta')->references('id_receta')->on('recetas_crafteo')->onDelete('set null');
            $table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('items');
    }
};

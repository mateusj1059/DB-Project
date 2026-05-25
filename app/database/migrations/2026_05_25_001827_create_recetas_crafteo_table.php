<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('recetas_crafteo', function (Blueprint $table) {
            $table->increments('id_receta');
            $table->integer('cantidad');
            $table->string('posicion');
            $table->unsignedInteger('id_mesa')->nullable();
            $table->unsignedInteger('id_item');
            $table->foreign('id_mesa')->references('id_mesa')->on('mesa_trabajo')->onDelete('set null');
            $table->foreign('id_item')->references('id_item')->on('items')->onDelete('cascade');
            $table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('recetas_crafteo');
    }
};

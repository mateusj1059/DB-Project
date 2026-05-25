<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::table('items', function (Blueprint $table) {
            $table->foreign('id_imagen')->references('id_imagen')->on('imagen')->onDelete('set null');
            $table->foreign('id_ubicacion')->references('id_ubicacion')->on('ubicacion_items')->onDelete('set null');
            $table->foreign('id_receta')->references('id_receta')->on('recetas_crafteo')->onDelete('set null');
        });
    }
    public function down(): void {
        Schema::table('items', function (Blueprint $table) {
            $table->dropForeign(['id_imagen']);
            $table->dropForeign(['id_ubicacion']);
            $table->dropForeign(['id_receta']);
        });
    }
};

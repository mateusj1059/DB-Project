<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('favoritos', function (Blueprint $table) {
            $table->increments('id_favoritos');
            $table->date('fecha_agregado');
            $table->unsignedBigInteger('id_usuario');
            $table->unsignedInteger('id_item');
            $table->foreign('id_usuario')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_item')->references('id_item')->on('items')->onDelete('cascade');
            $table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('favoritos');
    }
};

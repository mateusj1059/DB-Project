<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('ubicacion_items', function (Blueprint $table) {
            $table->increments('id_ubicacion');
            $table->integer('capa_min');
            $table->integer('capa_max');
            $table->unsignedInteger('id_bioma')->nullable();
            $table->unsignedInteger('id_estructura')->nullable();
            $table->unsignedInteger('id_criatura')->nullable();
            $table->foreign('id_bioma')->references('id_bioma')->on('bioma')->onDelete('set null');
            $table->foreign('id_estructura')->references('id_estructura')->on('estructura')->onDelete('set null');
            $table->foreign('id_criatura')->references('id_criatura')->on('criatura')->onDelete('set null');
            $table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('ubicacion_items');
    }
};

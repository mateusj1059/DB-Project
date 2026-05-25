<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('mesa_trabajo', function (Blueprint $table) {
            $table->increments('id_mesa');
            $table->string('nombre_mesa');
            $table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('mesa_trabajo');
    }
};

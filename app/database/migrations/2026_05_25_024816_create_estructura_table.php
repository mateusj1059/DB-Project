<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('estructura', function (Blueprint $table) {
            $table->increments('id_estructura');
            $table->string('nombre_estructura');
            $table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('estructura');
    }
};

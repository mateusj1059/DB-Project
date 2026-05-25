<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('criatura', function (Blueprint $table) {
            $table->increments('id_criatura');
            $table->string('nombre_criatura');
            $table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('criatura');
    }
};

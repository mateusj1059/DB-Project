<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('bioma', function (Blueprint $table) {
            $table->increments('id_bioma');
            $table->string('nombre_bioma');
            $table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('bioma');
    }
};
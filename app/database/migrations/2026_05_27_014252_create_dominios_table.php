<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('dominios', function (Blueprint $table) {
            $table->id('id_dominio');
            $table->string('nombre_dominio');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('dominios');
    }
};
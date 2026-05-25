<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedInteger('id_dominio')->nullable()->after('id');
            $table->foreign('id_dominio')->references('id_dominio')->on('dominio')->onDelete('set null');
        });
    }
    public function down(): void {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['id_dominio']);
            $table->dropColumn('id_dominio');
        });
    }
};
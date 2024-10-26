<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('countries', function (Blueprint $table) {
            $table->string('icon')->after('name'); // Menambahkan kolom icon di tabel countries
        });
    
        Schema::table('cities', function (Blueprint $table) {
            $table->string('icon')->after('name'); // Menambahkan kolom icon di tabel cities
            $table->foreignId('country_id')->references('id')->on('countries')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('countries', function (Blueprint $table) {
            $table->dropColumn('icon'); // Menghapus kolom icon dari tabel countries
        });
    
        Schema::table('cities', function (Blueprint $table) {
            $table->dropColumn('icon'); // Menghapus kolom icon dari tabel cities
        });
    }
};

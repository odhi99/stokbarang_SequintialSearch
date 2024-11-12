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
        Schema::table('masuks', function (Blueprint $table) {
            $table->foreign('id_barang')->references('id')->on('stoks')->onDelete('cascade');
        });

        Schema::table('keluars', function (Blueprint $table) {
            $table->foreign('id_barang')->references('id')->on('stoks')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};

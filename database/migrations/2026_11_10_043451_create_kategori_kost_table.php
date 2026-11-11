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
        Schema::create('kategori_kost', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kategori_id');
            $table->foreign('kategori_id')->references('kategori_id')->on('kategori')->cascadeOnDelete();
            $table->unsignedBigInteger('kost_id');

            $table->foreign('kost_id')->references('kost_id')->on('kosts')->cascadeOnDelete();
            $table->timestamps();

            $table->unique(['kategori_id','kost_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kategori_kost');
    }
};

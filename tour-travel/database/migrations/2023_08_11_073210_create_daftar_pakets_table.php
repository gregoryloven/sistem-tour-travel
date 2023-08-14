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
        Schema::create('daftar_pakets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('destinasi_id');
            $table->unsignedBigInteger('objekwisata_id')->nullable();
            $table->string("objekwisata_data");
            $table->string("nama");
            $table->string("lama_hari");
            $table->string("included")->nullable();
            $table->longText("whats_bring");
            $table->string("gambar");
            $table->string("gambar2")->nullable();
            $table->string("gambar3")->nullable();
            $table->string("gambar4")->nullable();
            $table->string("gambar5")->nullable();
            $table->foreign('destinasi_id')->references('id')->on('destinasis');
            $table->foreign('objekwisata_id')->references('id')->on('objek_wisatas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daftar_pakets');
    }
};

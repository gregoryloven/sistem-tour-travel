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
        Schema::create('tipe_hargas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('daftarpaket_id');
            $table->integer("tipe");
            $table->integer("min_pax")->nullable();
            $table->integer("pax_person")->nullable();
            $table->bigInteger("harga");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tipe_hargas');
    }
};

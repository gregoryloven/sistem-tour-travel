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
        Schema::table('daftar_pakets', function (Blueprint $table) {
            $table->unsignedBigInteger('lamahari_id')->after('objekwisata_id')->nullable();
            $table->unsignedBigInteger('include_id')->after('lamahari_id')->nullable();
            $table->unsignedBigInteger('whatbring_id')->after('include_id')->nullable();
            $table->unsignedBigInteger('generalterm_id')->after('whatbring_id')->nullable();

            $table->foreign('lamahari_id')->references('id')->on('lama_haris');
            $table->foreign('include_id')->references('id')->on('includes');
            $table->foreign('whatbring_id')->references('id')->on('what_brings');
            $table->foreign('generalterm_id')->references('id')->on('general_terms');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('daftar_pakets', function (Blueprint $table) {
            $table->dropColumn('lamahari_id');
            $table->dropColumn('include_id');
            $table->dropColumn('whatbring_id');
            $table->dropColumn('generalterm_id');
        });
    }
};

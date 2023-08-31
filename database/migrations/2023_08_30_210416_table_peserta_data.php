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
        Schema::create('peserta_data', function (Blueprint $table) {
            // Foreign Key Constraints
            $table->foreignUuid('id_peserta')->references('id')->on('pesertas');
            $table->foreignUuid('kecamatan_id')->references('id')->on('kecamatans');
            $table->foreignUuid('desa_id')->references('id')->on('desas');
            $table->foreignUuid('tps_id')->references('id')->on('tps');

            // Setting The Primary Keys
            $table->primary(['id_peserta','kecamatan_id','tps_id', 'desa_id']);
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

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
        Schema::create('pesertas', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->integer('nik')->max(16);
            $table->integer('hp');
            $table->date('tgl_lahir');
            $table->longText('alamat')->default('text');
            $table->string('warna');
            $table->string('kecamatan_id');
            $table->string('desa_id');
            $table->string('tps_id');
            $table->string('slug');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesertas');
    }
};

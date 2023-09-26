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
        Schema::create('real_count_kecamatan', function (Blueprint $table) {
            // Foreign Key Constraints
            $table->foreignUuid('realcount_id')->references('id')->on('realcounts');
            $table->foreignUuid('kecamatan_id')->references('id')->on('kecamatans');
            // Setting The Primary Keys
            $table->primary(['realcount_id','kecamatan_id']);
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

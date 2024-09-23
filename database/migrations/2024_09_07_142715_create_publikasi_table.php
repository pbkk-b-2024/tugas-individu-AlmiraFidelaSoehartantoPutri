<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('publikasi', function (Blueprint $table) {
        $table->id('publikasi_id');
        $table->string('judul');
        $table->year('tahun_publikasi');
        $table->foreignId('dosen_id')->constrained('dosen')->onDelete('cascade');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('publikasi');
    }
};

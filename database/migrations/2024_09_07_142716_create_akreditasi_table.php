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
    Schema::create('akreditasi', function (Blueprint $table) {
        $table->id('akreditasi_id');
        $table->string('peringkat');
        $table->date('tanggal_berlaku');
        $table->date('tanggal_kadaluarsa');
        $table->foreignId('program_studi_id')->constrained('program_studi')->onDelete('cascade');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('akreditasi');
    }
};

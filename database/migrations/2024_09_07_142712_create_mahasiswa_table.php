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
    Schema::create('program_studi', function (Blueprint $table) {
        $table->id('program_studi_id');
        $table->string('nama');
        $table->string('jenjang');
        $table->foreignId('fakultas_id')->constrained('fakultas')->onDelete('cascade');
        $table->unsignedBigInteger('universitas_id')->nullable(); // Kolom universitas
        $table->foreign('universitas_id')->references('id')->on('universitas')->onDelete('set null');
        $table->unsignedBigInteger('fakultas_id')->nullable(); // Kolom fakultas
        $table->foreign('fakultas_id')->references('id')->on('fakultas')->onDelete('set null');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mahasiswa');
    }
};

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
    Schema::create('mahasiswa', function (Blueprint $table) {
        $table->id('mahasiswa_id');
        $table->string('nama');
        $table->string('nim')->unique();
        $table->date('tanggal_lahir')->nullable();
        $table->foreignId('program_studi_id')->constrained('program_studi')->onDelete('cascade');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('program_studi');
    }
};

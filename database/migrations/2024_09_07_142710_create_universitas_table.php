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
    Schema::create('universitas', function (Blueprint $table) {
        $table->id('universitas_id');
        $table->string('nama');
        $table->string('alamat')->nullable();
        $table->string('kota')->nullable();
        $table->string('provinsi')->nullable();
        $table->string('telepon', 20)->nullable();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('universitas');
    }
};

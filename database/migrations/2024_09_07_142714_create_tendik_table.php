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
    Schema::create('tendik', function (Blueprint $table) {
        $table->id('tendik_id');
        $table->string('nama');
        $table->string('nip')->unique();
        $table->foreignId('universitas_id')->constrained('universitas')->onDelete('cascade');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tendik');
    }
};

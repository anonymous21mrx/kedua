<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void {
    Schema::create('kabar_tokos', function (Blueprint $table) {
        $table->id();
        $table->string('headline');
        $table->text('isi_kabar');
        $table->string('penulis');
        $table->string('gambar')->nullable(); // Tambahkan ini
        $table->timestamps();
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kabar_tokos');
    }
};

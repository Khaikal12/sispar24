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
        Schema::create('wisata_tempats', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->string('name', 100);
            $table->unsignedBigInteger('id_kategori');
            $table->foreign('id_kategori')->references('id')->on('kategoris')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('harga');
            $table->text('fasilitas');
            $table->text('lokasi');
            $table->text('galeri');
            $table->date('tgl_upload');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wisata_tempats');
    }
};

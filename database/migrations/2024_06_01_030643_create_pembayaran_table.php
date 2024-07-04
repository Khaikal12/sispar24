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
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pemesanan_id');
            $table->unsignedBigInteger('user_id');
            $table->decimal('jumlah', 10, 2);
            $table->string('metode_pembayaran');
            $table->date('tanggal_pembayaran');
            $table->string('status')->default('menunggu');
            $table->string('bukti_pembayaran');
            $table->timestamps();

            $table->foreign('pemesanan_id')->references('id')->on('pemesanan')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayaran');
    }
};

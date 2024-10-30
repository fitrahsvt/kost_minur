<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('nama')->nullable();
            $table->enum('jenis', ['pengeluaran', 'pemasukan']);
            $table->enum('status_bayar', ['bayar', 'belum bayar'])->nullable();
            $table->unsignedBigInteger('kamar_id')->nullable();
            $table->enum('status_order', ['pending', 'tolak', 'terima'])->default('pending');
            $table->string('bukti')->nullable();
            $table->longText('metode_pembayaran')->nullable();
            $table->integer('total_bayar');
            $table->unsignedBigInteger('penyewa_id')->nullable();
            $table->date('tanggal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
};

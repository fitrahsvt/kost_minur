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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('role_id');
            $table->enum('jenis_penyewa', ['regular', 'expired', 'none'])->default('none');
            $table->bigInteger('kamar_id')->nullable();
            $table->string('no_wali')->nullable();
            $table->string('no_ktp')->nullable();
            $table->string('ktp')->nullable();
            $table->date('birth')->nullable();
            $table->longText('alamat')->nullable();
            $table->string('no_hp');
            $table->string('password');
            $table->string('email')->unique();
            $table->string('nama');
            $table->timestamps();

            // // Definisi foreign key
            // $table->foreign('kamar_id')->references('id')->on('rooms')->onDelete('cascade');
            // $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};

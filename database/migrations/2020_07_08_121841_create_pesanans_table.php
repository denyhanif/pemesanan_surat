<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesanans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('data_pengajuan_id');
            $table->foreignId('pemverifikasi_id')->nullable();
            $table->string('nomer_surat');
            $table->char('status', 1)->default(0)->comment('0: proses, 1: verifikasi, 2: jadi');
            $table->date('tanggal_verifikasi')->nullable();
            $table->date('tanggal_jadi')->nullable();
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
        Schema::dropIfExists('pesanans');
    }
}

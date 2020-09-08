<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKategoriSuratsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kategori_surats', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('kop_surat');

            $table->string('kode_surat');
            $table->text('paragraf_awal');
            $table->text('paragraf_akhir');
            $table->text('nomor_pegawai_ttd');
            $table->text('jabatan_ttd');
            $table->text('nama_ttd');
            $table->text('data_template')->nullable();
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
        Schema::dropIfExists('kategori_surats');
    }
}

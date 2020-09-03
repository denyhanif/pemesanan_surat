<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToKategoriTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kategori_surats', function (Blueprint $table) {
        $table->text('kop_surat')->after('kode_surat');
        $table->string('nama_ttd');
        $table->string('jabatan_ttd');
        $table->string('nomor_pegawai_ttds');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kategori_surats', function (Blueprint $table) {
        });
        
    }
}

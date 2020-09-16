<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMarginInstansiInKategoriSurat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    Schema::table('kategori_surats', function (Blueprint $table) {
            $table->integer('margin_kekanan')->after('kode_surat')->nullable();
            $table->integer('margin_atas')->after('kode_surat')->nullable();
            $table->integer('margin_bawah')->after('kode_surat')->nullable();
            $table->string('alamat_instansi')->after('kode_surat');
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
            $table->dropColumn('margin_kekanan')->nullable();
            $table->dropColumn('margin_atas')->nullable();
            $table->dropColumn('margin_bawah')->nullable();
            $table->dropColumn('alamat_instansi');
        });
    }
}

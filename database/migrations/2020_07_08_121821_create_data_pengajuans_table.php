<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataPengajuansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_pengajuans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kategori_surat_id');
            $table->foreignId('warga_id')->nullable();
            $table->string('nama_pemesan')->nullable();
            $table->enum('jenis_kelamin', ['pria', 'wanita']);
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('nik', 30)->nullable();
            $table->string('alamat')->nullable();
            $table->string('pekerjaan')->nullable();
            $table->enum('status_perkawinan',['Kawin', 'Belum Kawin', 'Cerai Hidup', 'Cerai Mati']);
            $table->enum('agama',['Islam', 'Kristen', 'Hindu', 'Budha', 'Katolik', 'Konghucu']);
            $table->string('berkas')->nullable();
            $table->timestamps();
            $table->text('data')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_pengajuans');
    }
}

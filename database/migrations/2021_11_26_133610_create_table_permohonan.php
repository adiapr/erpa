<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablePermohonan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_permohonan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_organisasi');
            $table->string('alamat_organisasi');
            $table->string('telp_organisasi');
            $table->string('nomor_permohonan');
            $table->string('kode_asosiasi');
            $table->string('bulan');
            $table->string('tahun');
            $table->string('nama_kota');
            $table->string('tanggal_surat');
            $table->integer('lampiran');
            $table->string('perihal');
            $table->string('jabatan_pengurus');
            $table->string('nama_pengurus');
            $table->string('ktp');
            $table->string('ijazah');
            $table->string('serdkpa');
            $table->string('serupa');
            $table->string('sk_pengangkatan');
            $table->string('sk_menkumham');
            $table->string('pas_foto');
            $table->string('bas_advokat');
            $table->string('sk_magang');
            $table->string('surat_berderikasi');
            $table->string('sk_pidana');
            $table->string('sp_bknpns');
            $table->string('status');
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
        Schema::dropIfExists('table_permohonan');
    }
}

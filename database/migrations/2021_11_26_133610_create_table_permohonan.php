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
            $table->string('nama_organisasi')->nullable();
            $table->string('alamat_organisasi')->nullable();
            $table->string('telp_organisasi')->nullable();
            $table->string('nomor_permohonan')->nullable();
            $table->string('kode_asosiasi')->nullable();
            $table->string('bulan')->nullable();
            $table->string('tahun')->nullable();
            $table->string('nama_kota')->nullable();
            $table->string('tanggal_surat')->nullable();
            $table->integer('lampiran')->nullable();
            $table->string('perihal')->nullable();
            $table->string('jabatan_pengurus')->nullable();
            $table->string('nama_pengurus')->nullable();
            $table->string('ktp')->nullable();
            $table->string('ijazah')->nullable();
            $table->string('serdkpa')->nullable();
            $table->string('serupa')->nullable();
            $table->string('sk_pengangkatan')->nullable();
            $table->string('sk_menkumham')->nullable();
            $table->string('pas_foto')->nullable();
            $table->string('bas_advokat')->nullable();
            $table->string('sk_magang')->nullable();
            $table->string('surat_berderikasi')->nullable();
            $table->string('sk_pidana')->nullable();
            $table->string('sp_bknpns')->nullable();
            $table->string('status')->nullable();
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

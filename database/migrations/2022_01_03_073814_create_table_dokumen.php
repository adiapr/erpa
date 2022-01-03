<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableDokumen extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_dokumen', function (Blueprint $table) {
            $table->id();
            $table->integer('id_permohonan');
            $table->string('nama');
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
        Schema::dropIfExists('table_dokumen');
    }
}

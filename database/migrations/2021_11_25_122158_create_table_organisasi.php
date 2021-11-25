<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableOrganisasi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_organisasi', function (Blueprint $table) {
            $table->id();
            $table->string('nama_organisasi');
            $table->string('alamat');
            $table->string('logo');
            $table->string('telp');
            $table->string('email');
            $table->string('pengurus');
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
        Schema::dropIfExists('table_organisasi');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenungguPasiensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penunggu_pasiens', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama');
            $table->date('tanggal');
            $table->string('surat_permohonan');
            $table->string('kk_pemohon');
            $table->string('kk_pasien');
            $table->string('sep');
            $table->string('surat_kuasa')->nullable();
            $table->string('surat_keterangan');
            $table->enum('keterangan',['terverifikasi', 'belum terverifikasi']);
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
        Schema::dropIfExists('penunggu_pasiens');
    }
}

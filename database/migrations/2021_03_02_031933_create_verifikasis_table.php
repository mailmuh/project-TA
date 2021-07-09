<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVerifikasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('verifikasis', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nik');
            $table->string('ktp_pemohon');
            $table->string('alamat_pemohon');
            $table->string('nama_pasien');
            $table->string('ktp_pasien');
            $table->string('alamat_pasien');
            $table->string('tanggal');
            $table->string('surat_permohonan');
            $table->string('kk_pemohon');
            $table->string('kk_pasien');
            $table->string('sep');
            $table->string('surat_kuasa');
            $table->string('surat_keterangan');
            $table->string('keterangan');
            $table->integer('pemohon_id')->unsigned();
            $table->timestamps();

            // $table->foreign('nama')->references('id')->on('penunggu_pasiens')->onDelete('cascade');
            // $table->foreign('nik')->references('id')->on('penunggu_pasiens')->onDelete('cascade');
            // $table->foreign('surat_permohonan')->references('id')->on('penunggu_pasiens')->onDelete('cascade');
            // $table->foreign('tanggal')->references('id')->on('penunggu_pasiens')->onDelete('cascade');
            // $table->foreign('kk_pemohon')->references('id')->on('penunggu_pasiens')->onDelete('cascade');
            // $table->foreign('kk_pasien')->references('id')->on('penunggu_pasiens')->onDelete('cascade');
            // $table->foreign('sep')->references('id')->on('penunggu_pasiens')->onDelete('cascade');
            // $table->foreign('surat_kuasa')->references('id')->on('penunggu_pasiens')->onDelete('cascade');
            // $table->foreign('surat_keterangan')->references('id')->on('penunggu_pasiens')->onDelete('cascade');
            // $table->foreign('keterangan')->references('id')->on('penunggu_pasiens')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('verifikasis');
    }
}

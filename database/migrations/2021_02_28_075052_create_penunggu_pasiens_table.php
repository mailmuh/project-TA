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
            $table->string('nik');
            $table->string('alamat_pemohon');
            $table->string('nohp');
            $table->string('email');
            $table->string('nama_pasien');
            $table->string('alamat_pasien');
            $table->string('awal_perawatan');
            $table->string('akhir_perawatan');
            $table->string('surat_permohonan');
            $table->string('sep');
            $table->string('surat_kuasa')->nullable();
            $table->string('surat_keterangan');
            $table->enum('keterangan',['Terverifikasi', 'Belum Terverifikasi']);
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

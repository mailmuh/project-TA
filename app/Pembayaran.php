<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $primaryKey = 'id';

    protected $fillable = [
    	'nama', 'nik', 'ktp_pemohon', 'alamat_pemohon', 'nohp', 'nama_pasien', 'ktp_pasien', 'jumlah_bantuan'

    ];
}

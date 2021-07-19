<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $primaryKey = 'id';

    protected $fillable = [
    	'nama', 'nik', 'alamat_pemohon', 'nohp', 'nama_pasien', 'awal_perawatan', 'akhir_perawatan', 'jumlah_bantuan'

    ];
}

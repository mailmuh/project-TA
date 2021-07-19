<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PenungguPasien extends Model
{
    protected $primaryKey = 'id';

    protected $fillable = [
    	'nama', 'nik', 'alamat_pemohon', 'nohp', 'email', 'nama_pasien', 'alamat_pasien', 'awal_perawatan', 'akhir_perawatan', 'surat_permohonan', 'sep', 'surat_kuasa', 'surat_keterangan', 'keterangan'

    ];

    public function verifikaiss() {
    	return $this->hasMany(Verifikasi::class, 'tanggal', 'surat_permohonan', 'kk_pemohon', 'kk_pasien', 'sep', 'surat_kuasa', 'surat_keterangan', 'keterangan');
    }

    // public function pemohon_verif() {
    //     return $this->belongsTo('App\Verifikasi');
    // }
}

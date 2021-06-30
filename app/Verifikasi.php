<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Verifikasi extends Model
{
    protected $primaryKey = 'id';

    protected $fillable = [
    	'nama_pemohon', 'ktp_pempohon', 'alamat_pemohon', 'nama_pasien', 'ktp_pasien', 'alamat_pasien', 'surat_permohonan', 'kk_pemohon', 'kk_pasien', 'sep', 'surat_kuasa', 'surat_keterangan', 'keterangan'
    ];

    public function pemohonVerif()
    {
    	return $this->belongsTo(DataPenyakit::class, 'surat_permohonan', 'kk_pemohon', 'kk_pasien', 'sep', 'surat_kuasa', 'surat_keterangan', 'keterangan');
    }

}

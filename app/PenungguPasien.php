<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PenungguPasien extends Model
{
    protected $primaryKey = 'id';

    protected $fillable = [
    	'nama', 'nik', 'tanggal', 'surat_permohonan', 'kk_pemohon', 'kk_pasien', 'sep', 'surat_kuasa', 'surat_keterangan', 'keterangan'
    ];

    public function verifikaiss() {
    	return $this->hasMany(Verifikasi::class, 'tanggal', 'surat_permohonan', 'kk_pemohon', 'kk_pasien', 'sep', 'surat_kuasa', 'surat_keterangan', 'keterangan');
    }
}

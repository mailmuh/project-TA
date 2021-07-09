<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Verifikasi;
use App\PenungguPasien;
use Illuminate\Support\Facades\Auth;

class VerifikasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $verifikasis = Verifikasi::all();
        return view('admin.verifikasi.index', compact('verifikasis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(PenungguPasien $penunggupasien, $id)
    {
        $penunggupasien = PenungguPasien::findOrFail($id);
        return view('admin.verifikasi.verifikasi', compact('penunggupasien'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $fileNameSK =  'Verifikasi-'.request()->surat_keterangan->getClientOriginalName();
        
        $penunggupasien = new Verifikasi();
        $penunggupasien->nama = $request->nama;
        $penunggupasien->nik = $request->nik;
        $penunggupasien->tanggal = $request->tanggal;
        $penunggupasien->surat_permohonan = $request->surat_permohonan;
        $penunggupasien->kk_pemohon = $request->kk_pemohon;
        $penunggupasien->kk_pasien = $request->kk_pasien;
        $penunggupasien->sep = $request->sep;
        $penunggupasien->surat_kuasa = $request->surat_kuasa;
        $penunggupasien->ktp_pemohon = $request->ktp_pemohon;
        $penunggupasien->alamat_pemohon = $request->alamat_pemohon;
        $penunggupasien->nama_pasien = $request->nama_pasien;
        $penunggupasien->ktp_pasien = $request->ktp_pasien;
        $penunggupasien->alamat_pasien = $request->alamat_pemohon;
        $penunggupasien->keterangan = $request->keterangan;
        $penunggupasien->pemohon_id = Auth::id();

        $verif                   = $request->file('surat_keterangan');
        $verifName   = 'suratKeterangan-'. $verif->getClientOriginalName();
        if ($request->surat_keterangan->move(storage_path('app/public/Data/Verifikasi/'), $verifName)) {
            $penunggupasien->surat_keterangan = "storage/Data/Verifikasi/".$verifName;
        }
        
        $penunggupasien->save();

        return redirect(route('penunggupasiens.index'))->with('success', 'Data Berhasil diVerifikasi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

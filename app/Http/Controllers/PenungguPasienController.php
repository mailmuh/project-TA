<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PenungguPasien;
use App\Verifikasi;

class PenungguPasienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penunggupasiens = PenungguPasien::all();
        return view('admin.penunggu_pasien.index', compact('penunggupasiens'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $penunggupasiens = PenungguPasien::all();
        return view('admin.penunggu_pasien.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        

        $fileNameSK = time().'.'.request()->surat_keterangan->getClientOriginalExtension();
        
            $penunggupasien = new PenungguPasien();
            $penunggupasien->nama = $request->nama;
            $penunggupasien->tanggal = $request->tanggal;
            $penunggupasien->surat_permohonan = $request->surat_permohonan;
            $penunggupasien->kk_pemohon = $request->kk_pemohon;
            $penunggupasien->kk_pasien = $request->kk_pasien;
            $penunggupasien->sep = $request->sep;
            $penunggupasien->surat_kuasa = $request->surat_kuasa;
            
            if ($request->surat_keterangan->move(storage_path('app/public/DataPenungguPasien/gambar'), $fileNameSK)) {
                $penunggupasien->surat_keterangan = "storage/DataPenungguPasien/gambar/".$fileNameSK;
            }

            $penunggupasien->keterangan = 'belum terverifikasi';
            
            $penunggupasien->save();

        return redirect(route('penunggupasiens.index'))->with('success', 'Data Pemohon baru berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(PenungguPasien $penunggupasien)
    {
        return view('admin.penunggu_pasien.verifikasi', compact('penunggupasien'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(PenungguPasien $penunggupasien)
    {
        //change
        return view('admin.penunggu_pasien.edit', compact('penunggupasien'));
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
        $sketPict = PenungguPasien::where("id","=",$id)->get()->first()->surat_keterangan;
        if (!$request->surat_keterangan) {
            $request->validate([
                'nama' => 'required',
                'tanggal' => 'required',
                'surat_permohonan' => 'required',
                'kk_pemohon' => 'required',
                'kk_pasien' => 'required',
                'sep' => 'required',
                'surat_kuasa' => 'required',
            ]);
        }else {
            $request->validate([
                'nama' => 'required',
                'tanggal' => 'required',
                'surat_permohonan' => 'required',
                'kk_pemohon' => 'required',
                'kk_pasien' => 'required',
                'sep' => 'required',
                'surat_kuasa' => 'required',
                'surat_keterangan' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $fileName = str_replace("=","",base64_encode($request->name.time())) . '.' . request()->surat_keterangan->getClientOriginalExtension();
        }

        if ($request->has('active')) {
            $active = 1;
        } else {
            $active = 0;
        }
        
        $penunggupasien = PenungguPasien::findOrFail ($id);
        $penunggupasien->nama = $request->nama;
        $penunggupasien->tanggal = $request->tanggal;
        $penunggupasien->surat_permohonan = $request->surat_permohonan;
        $penunggupasien->kk_pemohon = $request->kk_pemohon;
        $penunggupasien->kk_pasien = $request->kk_pasien;
        $penunggupasien->sep = $request->sep;
        $penunggupasien->surat_kuasa = $request->surat_kuasa;
        if ($request->hasFile('surat_keterangan')) {
            if(is_file($penunggupasien->surat_keterangan)) {
                try{
                    unlink($sketPict);
                }catch(\Exception $e){

                }
            }
            $request->surat_keterangan->move(storage_path('app/public/DataPenungguPasien/gambar'), $fileName);
            $penunggupasien->surat_keterangan = "storage/DataPenungguPasien/gambar/".$fileName;
        }else {
            $penunggupasien->surat_keterangan = $sketPict;
        }

        $penunggupasien->save();

        return redirect(route('penunggupasiens.index'))->with('success', 'Data Pemohon berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $penunggupasien = PenungguPasien::find($id);
        if (is_file($penunggupasien->surat_keterangan)) {
            unlink($penunggupasien->surat_keterangan);
        }

        $penunggupasien->delete();

        return redirect(route('penunggupasiens.index'))->with('success', 'Data Berhasil Dihapus');
    }

    public function verifikasi(PenungguPasien $penunggupasien)
    {
        $verifikasis = Verifikasi::all();
        return view('admin.penunggu_pasien.verifikasi', compact('penunggupasien', 'verifikasis'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function storeVerifikasi(Request $request)
    {

        $fileNameSK = time().'.'.request()->surat_keterangan->getClientOriginalExtension();
        
            $verifikasi = new Verifikasi();
            $verifikasi->nama_pemohon = $request->nama_pemohon;
            $verifikasi->ktp_pemohon = $request->ktp_pemohon;
            $verifikasi->alamat_pemohon = $request->alamat_pemohon;
            $verifikasi->nama_pasien = $request->nama_pasien;
            $verifikasi->ktp_pasien = $request->ktp_pasien;
            $verifikasi->alamat_pasien = $request->alamat_pasien;
            $verifikasi->surat_permohonan = $request->surat_permohonan;
            $verifikasi->kk_pemohon = $request->kk_pemohon;
            $verifikasi->kk_pasien = $request->kk_pasien;
            $verifikasi->sep = $request->sep;
            $verifikasi->surat_kuasa = $request->surat_kuasa;
            
            if ($request->surat_keterangan->move(storage_path('app/public/DataPenungguPasien/gambar'), $fileNameSK)) {
                $verifikasi->surat_keterangan = "storage/DataPenungguPasien/gambar/".$fileNameSK;
            }

            $verifikasi->keterangan = $request->keterangan;
            
            $verifikasi->save();

        return redirect(route('penunggupasiens.index'))->with('success', 'Data Pemohon baru berhasil ditambahkan');

    }
}
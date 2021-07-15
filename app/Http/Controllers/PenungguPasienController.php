<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PenungguPasien;
use App\Verifikasi;
use App\UserPemohon;
use App\Pembayaran;
use Illuminate\Support\Facades\Hash;

class PenungguPasienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penunggupasiens = PenungguPasien::where('keterangan', 'Belum Terverifikasi')->get();
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
        
        $fileNameSK =  'Gambar-'.request()->surat_keterangan->getClientOriginalName();
        
            $penunggupasien = new PenungguPasien();
            $penunggupasien->nama = $request->nama;
            $penunggupasien->nik = $request->nik;
            $penunggupasien->ktp_pemohon = $request->ktp_pemohon;
            $penunggupasien->alamat_pemohon = $request->alamat_pemohon;
            $penunggupasien->nohp = $request->nohp;
            $penunggupasien->email = $request->email;
            $penunggupasien->nama_pasien = $request->nama_pasien;
            $penunggupasien->ktp_pasien = $request->ktp_pasien;
            $penunggupasien->alamat_pasien = $request->alamat_pasien;
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

            UserPemohon::create([
                'nama' => $request->input("nama"),
                'nik' => $request->input("nik"),
                'password' => Hash::make($request->input("nik"))]);

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
        return view('admin.penunggu_pasien.detail', compact('penunggupasien'));
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
                'nik' => 'required',
                'ktp_pemohon' => 'required',
                'alamat_pemohon' => 'required',
                'nohp' => 'required',
                'email' => 'required',
                'nama_pasien' => 'required',
                'ktp_pasien' => 'required',
                'alamat_pasien' => 'required',
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
                'nik' => 'required',
                'ktp_pemohon' => 'required',
                'alamat_pemohon' => 'required',
                'nohp' => 'required',
                'email' => 'required',
                'nama_pasien' => 'required',
                'ktp_pasien' => 'required',
                'alamat_pasien' => 'required',
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
        $penunggupasien->nik = $request->nik;
        $penunggupasien->ktp_pemohon = $request->ktp_pemohon;
        $penunggupasien->alamat_pemohon = $request->alamat_pemohon;
        $penunggupasien->nohp = $request->nohp;
        $penunggupasien->email = $request->email;
        $penunggupasien->nama_pasien = $request->nama_pasien;
        $penunggupasien->ktp_pasien = $request->ktp_pasien;
        $penunggupasien->alamat_pasien = $request->alamat_pasien;
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

        // PenungguPasien::where('id',$id)->update(['keterangan'=>"terverifikasi"]);

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

    public function verifikasi(Request $request, $id)
    {
        PenungguPasien::where('id',$id)->update(['keterangan'=>"terverifikasi"]);
        
        // menambahkan user pemohon ke tb userpemohon
        // $penunggupasien = PenungguPasien::where('id', $id)->first();
        // UserPemohon::create([
        //     'nama' => $penunggupasien->nama,
        //     'nik' => $penunggupasien->nik,
        //     'password' => Hash::make($penunggupasien->nik)
        // ]);

        // menambahkan data ke tabel pembayaran
        $penunggupasien = PenungguPasien::where('id', $id)->first();
        Pembayaran::create([
            'nama' => $penunggupasien->nama,
            'nik' => $penunggupasien->nik,
            'ktp_pemohon' => $penunggupasien->ktp_pemohon,
            'alamat_pemohon' => $penunggupasien->alamat_pemohon,
            'nohp' => $penunggupasien->nohp,
            'nama_pasien' => $penunggupasien->nama_pasien,
            'ktp_pasien' => $penunggupasien->ktp_pasien,
        ]);

        return redirect(route('penunggupasiens.index'))->with('success', 'Data berhasil diverifikasi');
    }

    public function showVerifikasi()
    {
        $verifikasi = PenungguPasien::where('keterangan', 'Terverifikasi')->get();
        return view('admin.verifikasi.index', compact('verifikasi'));
    }

    public function detailVerifikasi($id)
    {
        $penunggupasien = PenungguPasien::where('id',$id)->first();
        // echo json_encode($penunggupasien);
        return view('admin.verifikasi.detail', compact('penunggupasien'));
    }

    public function destroyVerifikasi($id)
    {
        $verifikasi = PenungguPasien::find($id);
        $verifikasi->delete();

        // return view('admin.verifikasi.index')->with('success', 'Data Berhasil Dihapus');
        return redirect('/verifikasi')->with('success', 'Data Berhasil Dihapus');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

}
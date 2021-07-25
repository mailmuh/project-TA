<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PenungguPasien;
use App\Verifikasi;
use App\UserPemohon;
use App\Pembayaran;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

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

        if (session ('success_message')) {
            Alert::success('Success Title', 'Success message'); 
        }

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

        $messages = [
            'required' => ':attribute wajib diisi',
            'min' => ':attribute harus diisi minimal :min karakter',
            'max' => ':attribute harus diisi maksimal :max karakter',
            'numeric' => ':attribute harus diisi dengan angka',
            'email' => 'format :attribute yang anda inputkan salah ',
            'image' => ':attribute format yang anda inputkan salah',
            'date' => ':attribute tanggal harus sesuai'
        ];

        $request->validate([
            'nama' => 'required',
            'nik' => 'required|numeric|min:16',
            'alamat_pemohon' => 'required',
            'nohp' => 'required|numeric|min:11',
            'email' => 'required|email',
            'nama_pasien' => 'required',
            'alamat_pasien' => 'required',
            'kecamatan' => 'required',
            'tanggal' => 'required',
            'awal_perawatan' => 'required',
            'akhir_perawatan' => 'required',
            'surat_permohonan' => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'sep' => 'required',
            'surat_keterangan' => 'required|image|mimes:jpeg,jpg,png|max:2048',

        ],$messages);

            $fileNameSK =  'SuratKeterangan-'.request()->surat_keterangan->getClientOriginalName();
            $fileNameSP =  'SuratPermohonan-'.request()->surat_permohonan->getClientOriginalName();
            $fileNameSA =  'SuratKuasa-'.request()->surat_permohonan->getClientOriginalName();
        
            $penunggupasien = new PenungguPasien();
            $penunggupasien->nama = $request->nama;
            $penunggupasien->nik = $request->nik;
            $penunggupasien->alamat_pemohon = $request->alamat_pemohon;
            $penunggupasien->nohp = $request->nohp;
            $penunggupasien->email = $request->email;
            $penunggupasien->nama_pasien = $request->nama_pasien;
            $penunggupasien->alamat_pasien = $request->alamat_pasien;
            $penunggupasien->kecamatan = $request->kecamatan;
            $penunggupasien->tanggal = $request->tanggal;
            $penunggupasien->awal_perawatan = $request->awal_perawatan;
            $penunggupasien->akhir_perawatan = $request->akhir_perawatan;
            // $penunggupasien->surat_permohonan = $request->surat_permohonan;
            $penunggupasien->sep = $request->sep;
            // $penunggupasien->surat_kuasa = $request->surat_kuasa;
            
            if ($request->surat_permohonan->move(storage_path('app/public/DataPenungguPasien/suratpermohonan'), $fileNameSP)) {
                $penunggupasien->surat_permohonan = "storage/DataPenungguPasien/suratpermohonan/".$fileNameSP;
            }

            if ($request->surat_keterangan->move(storage_path('app/public/DataPenungguPasien/suratketerangan'), $fileNameSK)) {
                $penunggupasien->surat_keterangan = "storage/DataPenungguPasien/suratketerangan/".$fileNameSK;
            }

            if ($request->surat_kuasa->move(storage_path('app/public/DataPenungguPasien/suratkuasa'), $fileNameSA)) {
                $penunggupasien->surat_kuasa = "storage/DataPenungguPasien/suratkuasa/".$fileNameSA;
            }

            $penunggupasien->keterangan = 'belum terverifikasi';
            
            $penunggupasien->save();

            UserPemohon::create([
                'nama' => $request->input("nama"),
                'nik' => $request->input("nik"),
                'password' => Hash::make($request->input("nik"))]);

        return redirect(route('penunggupasiens.index'))->withSuccessMessage('Data Pemohon baru berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $penunggupasien = PenungguPasien::where('id',$id)->get();
        return view('admin.penunggu_pasien.detail', ['penunggupasien' => $penunggupasien]);

        // return view('admin.penunggu_pasien.detail', compact('penunggupasien'));
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
        $sperPict = PenungguPasien::where("id","=",$id)->get()->first()->surat_permohonan;
        $sketPict = PenungguPasien::where("id","=",$id)->get()->first()->surat_keterangan;
        $skuPict = PenungguPasien::where("id","=",$id)->get()->first()->surat_kuasa;
        if (!$request->surat_keterangan && !$request->surat_kuasa) {
            $request->validate([
                'nama' => 'required',
                'nik' => 'required',
                'alamat_pemohon' => 'required',
                'nohp' => 'required',
                'email' => 'required',
                'nama_pasien' => 'required',
                'alamat_pasien' => 'required',
                'kecamatan' => 'required',
                'tanggal' => 'required',
                'awal_perawatan' => 'required',
                'akhir_perawatan' => 'required',
                'surat_permohonan' => 'required|image|mimes:jpeg,jpg,png|max:2048',
                'sep' => 'required',
            ]);
            $fileNameSP = str_replace("=","",base64_encode($request->name.time())) . '.' . request()->surat_permohonan->getClientOriginalExtension();
            // $fileNameSA = str_replace("=","",base64_encode($request->name.time())) . '.' . request()->surat_kuasa->getClientOriginalExtension();
        }else if (!$request->surat_permohonan && !$request->surat_kuasa) {
            $request->validate([
                'nama' => 'required',
                'nik' => 'required',
                'alamat_pemohon' => 'required',
                'nohp' => 'required',
                'email' => 'required',
                'nama_pasien' => 'required',
                'alamat_pasien' => 'required',
                'kecamatan' => 'required',
                'tanggal' => 'required',
                'awal_perawatan' => 'required',
                'akhir_perawatan' => 'required',
                'surat_keterangan' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                'sep' => 'required',
            ]);
            $fileNameSK = str_replace("=","",base64_encode($request->name.time())) . '.' . request()->surat_keterangan->getClientOriginalExtension();
            // $fileNameSA = str_replace("=","",base64_encode($request->name.time())) . '.' . request()->surat_kuasa->getClientOriginalExtension();
        }else if (!$request->surat_permohonan && !$request->surat_keterangan) {
            $request->validate([
                'nama' => 'required',
                'nik' => 'required',
                'alamat_pemohon' => 'required',
                'nohp' => 'required',
                'email' => 'required',
                'nama_pasien' => 'required',
                'alamat_pasien' => 'required',
                'kecamatan' => 'required',
                'tanggal' => 'required',
                'awal_perawatan' => 'required',
                'akhir_perawatan' => 'required',
                'sep' => 'required',
            ]);
            // $fileNameSK = str_replace("=","",base64_encode($request->name.time())) . '.' . request()->surat_keterangan->getClientOriginalExtension();
            $fileNameSA = str_replace("=","",base64_encode($request->name.time())) . '.' . request()->surat_kuasa->getClientOriginalExtension();
        }else if (!$request->surat_kuasa) {
            $request->validate([
                'nama' => 'required',
                'nik' => 'required',
                'alamat_pemohon' => 'required',
                'nohp' => 'required',
                'email' => 'required',
                'nama_pasien' => 'required',
                'alamat_pasien' => 'required',
                'kecamatan' => 'required',
                'tanggal' => 'required',
                'awal_perawatan' => 'required',
                'akhir_perawatan' => 'required',
                'surat_keterangan' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                'surat_permohonan' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                'sep' => 'required',
            ]);
            $fileNameSK = str_replace("=","",base64_encode($request->name.time())) . '.' . request()->surat_keterangan->getClientOriginalExtension();
            $fileNameSP = str_replace("=","",base64_encode($request->name.time())) . '.' . request()->surat_permohonan->getClientOriginalExtension();
        }else if (!$request->surat_keterangan) {
            $request->validate([
                'nama' => 'required',
                'nik' => 'required',
                'alamat_pemohon' => 'required',
                'nohp' => 'required',
                'email' => 'required',
                'nama_pasien' => 'required',
                'alamat_pasien' => 'required',
                'kecamatan' => 'required',
                'tanggal' => 'required',
                'awal_perawatan' => 'required',
                'akhir_perawatan' => 'required',
                'surat_permohonan' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                'sep' => 'required',
            ]);
            $fileNameSA = str_replace("=","",base64_encode($request->name.time())) . '.' . request()->surat_kuasa->getClientOriginalExtension();
            $fileNameSP = str_replace("=","",base64_encode($request->name.time())) . '.' . request()->surat_permohonan->getClientOriginalExtension();
        }else if (!$request->surat_permohonan) {
            $request->validate([
                'nama' => 'required',
                'nik' => 'required',
                'alamat_pemohon' => 'required',
                'nohp' => 'required',
                'email' => 'required',
                'nama_pasien' => 'required',
                'alamat_pasien' => 'required',
                'kecamatan' => 'required',
                'tanggal' => 'required',
                'awal_perawatan' => 'required',
                'akhir_perawatan' => 'required',
                'surat_keterangan' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                'sep' => 'required',
            ]);
            $fileNameSK = str_replace("=","",base64_encode($request->name.time())) . '.' . request()->surat_keterangan->getClientOriginalExtension();
            $fileNameSA = str_replace("=","",base64_encode($request->name.time())) . '.' . request()->surat_kuasa->getClientOriginalExtension();
        
        }else {
            $request->validate([
                'nama' => 'required',
                'nik' => 'required',
                'alamat_pemohon' => 'required',
                'nohp' => 'required',
                'email' => 'required',
                'nama_pasien' => 'required',
                'alamat_pasien' => 'required',
                'kecamatan' => 'required',
                'tanggal' => 'required',
                'awal_perawatan' => 'required',
                'akhir_perawatan' => 'required',
                'sep' => 'required',
                'surat_keterangan' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                'surat_permohonan' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            ]);
            $fileNameSK = str_replace("=","",base64_encode($request->name.time())) . '.' . request()->surat_keterangan->getClientOriginalExtension();
            $fileNameSP = str_replace("=","",base64_encode($request->name.time())) . '.' . request()->surat_permohonan->getClientOriginalExtension();
            $fileNameSA = str_replace("=","",base64_encode($request->name.time())) . '.' . request()->surat_kuasa->getClientOriginalExtension();
        }

        if ($request->has('active')) {
            $active = 1;
        } else {
            $active = 0;
        }
        
        $penunggupasien = PenungguPasien::findOrFail ($id);
        $penunggupasien->nama = $request->nama;
        $penunggupasien->nik = $request->nik;
        $penunggupasien->alamat_pemohon = $request->alamat_pemohon;
        $penunggupasien->nohp = $request->nohp;
        $penunggupasien->email = $request->email;
        $penunggupasien->nama_pasien = $request->nama_pasien;
        $penunggupasien->alamat_pasien = $request->alamat_pasien;
        $penunggupasien->kecamatan = $request->kecamatan;
        $penunggupasien->tanggal = $request->tanggal;
        $penunggupasien->awal_perawatan = $request->awal_perawatan;
        $penunggupasien->akhir_perawatan = $request->akhir_perawatan;
        $penunggupasien->sep = $request->sep;
        
        if ($request->hasFile('surat_keterangan')) {
            if(is_file($penunggupasien->surat_keterangan)) {
                try{
                    unlink($sketPict);
                }catch(\Exception $e){

                }
            }
            $request->surat_keterangan->move(storage_path('app/public/DataPenungguPasien/suratketerangan'), $fileNameSK);
            $penunggupasien->surat_keterangan = "storage/DataPenungguPasien/suratketerangan/".$fileNameSK;
        }else {
            $penunggupasien->surat_keterangan = $sketPict;
        }

        if ($request->hasFile('surat_permohonan')) {
            if(is_file($penunggupasien->surat_permohonan)) {
                try{
                    unlink($sperPict);
                }catch(\Exception $e){

                }
            }
            $request->surat_permohonan->move(storage_path('app/public/DataPenungguPasien/suratpermohonan'), $fileNameSP);
            $penunggupasien->surat_permohonan = "storage/DataPenungguPasien/suratpermohonan/".$fileNameSP;
        }else {
            $penunggupasien->surat_permohonan = $sperPict;
        }

        if ($request->hasFile('surat_kuasa')) {
            if(is_file($penunggupasien->surat_kuasa)) {
                try{
                    unlink($skuPict);
                }catch(\Exception $e){

                }
            }
            $request->surat_kuasa->move(storage_path('app/public/DataPenungguPasien/suratkuasa'), $fileNameSA);
            $penunggupasien->surat_kuasa = "storage/DataPenungguPasien/suratkuasa/".$fileNameSA;
        }else {
            $penunggupasien->surat_kuasa = $skuPict;
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
        if (is_file($penunggupasien->surat_permohonan)) {
            unlink($penunggupasien->surat_permohonan);
        }
        if (is_file($penunggupasien->surat_kuasa)) {
            unlink($penunggupasien->surat_kuasa);
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
        // dd($penunggupasien->awal_perawatan);

        $startDate = \Carbon\Carbon::createFromFormat('Y-m-d', $penunggupasien->awal_perawatan);

        $endDate = \Carbon\Carbon::createFromFormat('Y-m-d', $penunggupasien->akhir_perawatan);

        $selisih =  $startDate->diffInDays($endDate);
        // dd($selisih);s

        Pembayaran::create([
            $penunggupasien->id = $id,
            'nama' => $penunggupasien->nama,
            'nik' => $penunggupasien->nik,
            'alamat_pemohon' => $penunggupasien->alamat_pemohon,
            'nohp' => $penunggupasien->nohp,
            'nama_pasien' => $penunggupasien->nama_pasien,
            'awal_perawatan' => $penunggupasien->awal_perawatan,
            'akhir_perawatan' => $penunggupasien->akhir_perawatan,
            'jumlah_bantuan' => $selisih >= 4 ? 200000 : $selisih * 50000,
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
        // $penunggupasien = PenungguPasien::where('id',$id)->first();
        // echo json_encode($penunggupasien);
        // return view('admin.verifikasi.detail', compact('penunggupasien'));
        $penunggupasien = PenungguPasien::where('id',$id)->get();
        return view('admin.verifikasi.detail', ['penunggupasien' => $penunggupasien]);
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
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Verifikasi;
use App\PenungguPasien;
use Illuminate\Support\Facades\Auth;

// Panggil SendMail yang telah dibuat
use App\Mail\SendMail;
// Panggil support email dari Laravel
use Illuminate\Support\Facades\Mail;

use PDF;

class VerifikasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $verifikasi = PenungguPasien::all();
        return view('admin.verifikasi.index', compact('verifikasi'));
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

        return redirect(route('verifikasis.index'))->with('success', 'Data Berhasil diVerifikasi');
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

    public function kirim($id)
    {
        $penunggupasien = PenungguPasien::where('id',$id)->first(['nama', 'email' ]);
        // echo json_encode($penunggupasien);
        // return view('admin.verifikasi.email', compact('penunggupasien'));
        // echo $id;

        $nama = $penunggupasien->nama;
        $email = $penunggupasien->email;
        $kirim = Mail::to($email)->send(new SendMail($nama));
        if($kirim){
            echo "Email telah dikirim";
        }
    }

    public function cetakLaporan()
    {
        $penunggupasien = PenungguPasien::all();
        return view('admin.verifikasi.cetak-laporan', compact('penunggupasien'));
    }

    public function cetakForm()
    {
        return view('admin.verifikasi.cetak-laporan-form');
    }

    public function cetakLaporanFilter($tglawal, $tglakhir)
    {
        $penunggupasien = PenungguPasien::get()->whereBetween('tanggal', [$tglawal, $tglakhir]);
        return view('admin.verifikasi.cetak-laporan', compact('penunggupasien'));
    }

    // public function print()
    // {
    //     $penunggupasien = PenungguPasien::all();
 
    //     $pdf = PDF::loadview('admin.verifikasi.cetakpdf',['penunggupasien'=>$penunggupasien]);
    //     return $pdf->stream();
    // }

    public function cetakLaporanKecamatan()
    {
        $penunggupasien = PenungguPasien::all();
        return view('admin.verifikasi.cetak-laporankecamatan', compact('penunggupasien'));
    }

    public function cetakFormKecamatan()
    {
        return view('admin.verifikasi.cetak-laporan-formkecamatan');
    }

    public function cetakLaporanFilterKecamatan( Request $request)
    {
        // $penunggupasien = PenungguPasien::where('kecamatan', $kecamatan)->first();
        // $penunggupasien = PenungguPasien::get()->whereBetween('tanggal', [$request->tglawal, $request->tglakhir]);
        // $penunggupasien = PenungguPasien::where('kecamatan', $request->kecamatan)->get();
        // $penunggupasien = PenungguPasien::whereBetween('tanggal', [$request->tglawal, $request->tglakhir])->where('kecamatan', $request->kecamatan)->get();
        // echo json_encode($penunggupasien);
        if ($request->kecamatan) {
            $penunggupasien = PenungguPasien::where('kecamatan', $request->kecamatan)->get();
        } else if ($request->tglawal && $request->tglakhir) {
            $penunggupasien = PenungguPasien::get()->whereBetween('tanggal', [$request->tglawal, $request->tglakhir]);
        } else {
            $penunggupasien = PenungguPasien::whereBetween('tanggal', [$request->tglawal, $request->tglakhir])->where('kecamatan', $request->kecamatan)->get();
        }
        return view('admin.verifikasi.cetak-laporankecamatan', compact('penunggupasien'));
    }

    public function notifWa($id)
    {
        // notif email
        $penunggupasien = PenungguPasien::where('id',$id)->first(['nama', 'email', 'nohp' ]);
        // echo json_encode($penunggupasien);
        // return view('admin.verifikasi.email', compact('penunggupasien'));
        // echo $id;

        $nama = $penunggupasien->nama;
        $email = $penunggupasien->email;
        $kirim = Mail::to($email)->send(new SendMail($nama));

        // notif whatsapp
        // $penunggupasien = PenungguPasien::where('id',$id)->first(['nama', 'nohp']);
        // $nama = $penunggupasien->nama;
        $nohp = $penunggupasien->nohp;
        $data = [
            'phone' => $nohp, // Receivers phone
            'body' => 'Halo, '.$nama.'. Data anda telah terverifikasi, silahkan datang ke kantor Dinas Sosial Kota Tegal pada jam kerja hari Senin s/d Jumat jam 8.00-16.00 untuk menerima dana bantuan. Terimakasih' // Message
        ];
        $json = json_encode($data); // Encode data to JSON
        // URL for request POST /message
        $token = 'ugsmlg7peh3zwasv';
        $instanceId = '311039';
        $url = 'https://api.chat-api.com/instance'.$instanceId.'/message?token='.$token;
        // Make a POST request
        $options = stream_context_create(['http' => [
                'method'  => 'POST',
                'header'  => 'Content-type: application/json',
                'content' => $json
            ]
        ]);
        // Send a request
        $result = file_get_contents($url, false, $options);
        dd('Notifikasi Berhasil Terkirim!!!');

    }

}

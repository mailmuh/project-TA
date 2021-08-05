<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pembayaran;
use App\PenungguPasien;
use PDF;
use Mail;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pembayarans = Pembayaran::all();
        return view('admin.Pembayaran.index', compact('pembayarans'));
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
        $pembayaran = Pembayaran::where('id',$id)->get();
        $status = 'cetak';
        return view('admin.pembayaran.cetak', ['pembayaran' => $pembayaran, 'status' => $status]);
        // return view('admin.pembayaran.detail', compact('pembayaran'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pembayaran = Pembayaran::findOrFail($id);
        return view('admin.pembayaran.pembayaran', compact('pembayaran'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pembayaran $pembayaran)
    {
        $fileNameSP =  'Kuitansi-'.request()->kuitansi->getClientOriginalName();
        // dd($request->awal);
        $request->validate([
            'nama' => 'required',
            'nik' => 'required',
            'alamat_pemohon' => 'required',
            'nohp' => 'required',
            'nama_pasien' => 'required',
            'jumlah_bantuan' => 'required',
        ]);

        $data = $pembayaran;
        $data->nama = $request->nama;
        $data->nik = $request->nik;
        $data->alamat_pemohon = $request->alamat_pemohon;
        $data->nohp = $request->nohp;
        $data->nama_pasien = $request->nama_pasien;
        $data->jumlah_bantuan = $request->jumlah_bantuan;
        if ($request->kuitansi->move(storage_path('app/public/DataPenungguPasien/pembayaran'), $fileNameSP)) {
            $data->kuitansi = "storage/DataPenungguPasien/pembayaran/".$fileNameSP;
        }
        $data->update();

        return redirect()->route('pembayarans.index')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pembayaran = Pembayaran::find($id);
        $pembayaran->delete();

        return redirect(route('pembayarans.index'))->with('success', 'Data Berhasil Dihapus');
    }

    public function kirimKuitansi($id)
    {

        $email = Pembayaran::where('id',$id)->first('email')->email;
        $pembayaran = Pembayaran::where('id',$id)->get();
        // return view('admin.pembayaran.cetak', ['pembayaran' => $pembayaran]);
        $data["email"] = $email;
        $data["title"] = "Dinas Sosial Kota Tegal";
        $data["body"] = "This is Demo";
        $status = 'notif';
        $pdf = PDF::loadView('admin.pembayaran.cetak', ['pembayaran' => $pembayaran, 'status-'=>$status]);
        Mail::send('admin.pembayaran.myTestMail', $data, function($message)use($data, $pdf) {

            $message->to($data["email"], $data["email"])

                    ->subject($data["title"])

                    ->attachData($pdf->output(), "kuitansi.pdf");

        });
        
        // notif wa

       
        dd('Mail sent successfully');
// echo $email;
    }
}

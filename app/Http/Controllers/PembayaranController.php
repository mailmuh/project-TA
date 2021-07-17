<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pembayaran;
use App\PenungguPasien;

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
        return view('admin.pembayaran.cetak', ['pembayaran' => $pembayaran]);
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
        $request->validate([
            'nama' => 'required',
            'nik' => 'required',
            // 'ktp_pemohon' => 'required',
            'alamat_pemohon' => 'required',
            'nohp' => 'required',
            'nama_pasien' => 'required',
            'ktp_pasien' => 'required',
            'jumlah_bantuan' => 'required',
        ]);

        $data = $pembayaran;
        $data->nama = $request->nama;
        $data->nik = $request->nik;
        // $data->ktp_pemohon = $request->ktp_pemohon;
        $data->alamat_pemohon = $request->alamat_pemohon;
        $data->nohp = $request->nohp;
        $data->nama_pasien = $request->nama_pasien;
        $data->ktp_pasien = $request->ktp_pasien;
        $data->jumlah_bantuan = $request->jumlah_bantuan;
        $data->update();

        return redirect()->route('pembayarans.index');
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
}

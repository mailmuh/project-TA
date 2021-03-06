<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\UserPemohon;

class UserPemohonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userpemohons = UserPemohon::all();
        return view('admin.user_pemohon.index', compact('userpemohons'));
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
    public function edit($id)
    {
        $userpemohon = UserPemohon::findOrFail($id);
        return view('admin.user_pemohon.edit', compact('userpemohon'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserPemohon $userpemohon)
    {
        $request->validate([
            'nama' => 'required',
            'nik' => 'required',
            'password' => 'required',
        ]);

        $data = $userpemohon;
        $data->nama = $request->nama;
        $data->nik = $request->nik;
        $data->password = $request->password;
        $data->update();

        return redirect()->route('userpemohons.index')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $userpemohon = UserPemohon::find($id);
        $userpemohon->delete();

        return redirect(route('userpemohons.index'))->with('success', 'Data Berhasil Dihapus');
    }
}

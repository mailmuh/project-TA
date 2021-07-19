<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PenungguPasien;

class FrontendController extends Controller
{
    public function index()
    {
        return view('frontend.index');
    }

    public function cari()
    {
        return view('frontend.cari');
    }

    public function carinik(Request $request)
    {

        $data = PenungguPasien::where('nik',$request->nik)->first();
        
        if ($data == null) {
            $text = "NIK yang anda masukan salah";
        }else{
            $text = "NIK anda ". $data->keterangan;
        }
        return response()->json($text);
    }
}

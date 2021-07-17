<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use\App\UserPemohon;

class LoginController extends Controller
{
    public function login(Request $request ){
        $user = UserPemohon::where('nik', $request->nik)->first();
        if ($user) {

            if (password_verify($request->password, $user->password)) {
                return response()->json([
                    'status'=>true,
                    'pesan'=>'success',
                    'dataLogin'=>array($user)
                ]);
            }
            return $this->error('Kata Sandi Salah');
        }
        return $this->error('Username Tidak Terdaftar');
    }
    public function error($pesan){
        return response()->json([
            'status'=>false,
            'pesan'=>$pesan
        ]);
    }
    // public function login(Request $request) {
    //     $login = DB::table('users')
    //         ->where('email', $request->username)
    //         // ->where('password', $request->password)
    //         ->get();
       
    //     //Dengan metode Json Array
    //     if (count($login) > 0) {
    //         foreach ($login as $dt) {
    //             $response["error"] = FALSE;
    //             $response["success"] = "1";
    //             $response["message"] = "Data Ditemukan";
    //             $response["logindata"][]=array(
    //                 'id' => $dt->id,
    //                 'nama' => $dt->name,
    //                 'email' => $dt->email,
    //                 // 'username' => $dt->username,
    //                 // 'password' => $dt->password
    //             );
    //         }
    //         echo json_encode($response);
    //     } else {
    //         $response["error"] = TRUE;
    //         $response["success"] = "0";
    //         $response["message"] = "Data Kosong";
    //         $response["logindata"][]=array();
    //         echo json_encode($response);
    //     }
    // }
}

<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();
Route::get('/', 'FrontendController@index');

Route::get('/cari', 'FrontendController@cari');
Route::get('/cari/getnik', 'FrontendController@carinik');

Route::group(['middleware' => ['auth']], function() {
    Route::get('/home', 'HomeController@index');

    Route::Resource('penunggupasiens', 'PenungguPasienController');
    Route::Resource('verifikasis', 'VerifikasiController');
    Route::Resource('pembayarans', 'PembayaranController');
    Route::Resource('userpemohons', 'UserPemohonController');
    Route::Resource('useradmins', 'UserController');
    
    Route::get('/kirim-email/{id}', 'VerifikasiController@kirim');

    // notif wa
    Route::get('/kirim-wa/{id}', 'VerifikasiController@notifWa');

    Route::get('/kirim-kuitansi/{id}', 'PembayaranController@kirimKuitansi');

    // Route::get('penunggupasiens', 'PenungguPasienController@verifikasi');
    Route::get('/verifikasi', 'PenungguPasienController@showVerifikasi');
    Route::get('/verifikasi/{id}/detail', 'PenungguPasienController@detailVerifikasi')->name('verifikasi.detail');
    Route::put('/verifikasi/{id}', 'PenungguPasienController@verifikasi')->name('penunggupasiens.verifikasi');
    Route::delete('/verifikasi/{id}', 'PenungguPasienController@destroyVerifikasi')->name('verifikasi.destroyVerifikasi');

    // cetak data verifikasi
    Route::get('/cetak-laporan', 'VerifikasiController@cetakLaporan')->name('cetak-laporan');
    Route::get('/cetak-laporan-form', 'VerifikasiController@cetakForm')->name('cetak-laporan-form');
    Route::get('/cetak-laporan-filter/{tglawal}/{tglakhir}', 'VerifikasiController@cetakLaporanFilter')->name('cetak-laporan-filter');

    Route::get('/cetak-laporan', 'VerifikasiController@cetakLaporan')->name('cetak-laporan');
    Route::get('/cetak-laporan-formkecamatan', 'VerifikasiController@cetakFormKecamatan')->name('cetak-laporan-formkecamatan');
    Route::post('/cetak-laporan-filter', 'VerifikasiController@cetakLaporanFilterKecamatan')->name('cetak-laporan-filterkecamatan');
    // Route::get('/cetak-laporan/cetak_pdf ', 'VerifikasiController@print');

});

// Route::get('/', function () {
//     // return view('welcome');
//     return view('admin.dashboard');

// });

// Route::Resource('penunggupasiens', 'PenungguPasienController');

// Route::Resource('verifikasis', 'VerifikasiController');

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

///////////////////////////////////////////////

// Route::get('/', function () {
//     return view('auth.login');
// }); 


// Auth::routes();

// Route::group(['middleware' => ['auth','checkRole:superadmin,admindinsos,adminkardinah']], function () {

//     Route::Resource('penunggupasiens', 'PenungguPasienController');

// });

// Route::group(['middleware' => ['auth','checkRole:superadmin, admindinsos']], function () {
//     Route::Resource('verifikasis', 'VerifikasiController');
//     Route::Resource('pembayarans', 'PembayaranController');
//     Route::Resource('userpemohons', 'UserPemohonController');
//     Route::Resource('useradmins', 'UserController');

//     // Route::get('penunggupasiens', 'PenungguPasienController@verifikasi');
//     Route::get('/verifikasi', 'PenungguPasienController@showVerifikasi');
//     Route::get('/verifikasi/{id}/detail', 'PenungguPasienController@detailVerifikasi')->name('verifikasi.detail');
//     Route::put('/verifikasi/{id}', 'PenungguPasienController@verifikasi')->name('penunggupasiens.verifikasi');
//     Route::delete('/verifikasi/{id}', 'PenungguPasienController@destroyVerifikasi')->name('verifikasi.destroyVerifikasi');
// });
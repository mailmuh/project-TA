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

Route::group(['middleware' => ['auth']], function() {
    Route::get('/', 'HomeController@index');

    Route::Resource('penunggupasiens', 'PenungguPasienController');
    Route::Resource('verifikasis', 'VerifikasiController');
    Route::Resource('pembayarans', 'PembayaranController');
    Route::Resource('userpemohons', 'UserPemohonController');
    Route::Resource('useradmins', 'UserController');

    // Route::get('penunggupasiens', 'PenungguPasienController@verifikasi');
    Route::get('/verifikasi', 'PenungguPasienController@showVerifikasi');
    Route::get('/verifikasi/{id}/detail', 'PenungguPasienController@detailVerifikasi')->name('verifikasi.detail');
    Route::put('/verifikasi/{id}', 'PenungguPasienController@verifikasi')->name('penunggupasiens.verifikasi');
    Route::delete('/verifikasi/{id}', 'PenungguPasienController@destroyVerifikasi')->name('verifikasi.destroyVerifikasi');

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
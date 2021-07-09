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

});

// Route::get('/', function () {
//     // return view('welcome');
//     return view('admin.dashboard');

// });

// Route::Resource('penunggupasiens', 'PenungguPasienController');

// Route::Resource('verifikasis', 'VerifikasiController');

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

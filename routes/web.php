<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
 */

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::resource('penduduk', 'PenduduksController');
Route::get('penduduk/{no_ktp}/pindah', 'PenduduksController@pindah');
Route::post('penduduk/{no_ktp}/pindah', 'PenduduksController@createPindah');
Route::get('penduduk/{no_ktp}/pindah/{no_pindah}/edit', 'PenduduksController@editPindah');
Route::patch('penduduk/{no_ktp}/pindah/{no_pindah}', 'PenduduksController@updatePindah');
Route::delete('penduduk/{no_ktp}/pindah/{no_pindah}', 'PenduduksController@deletePindah');
Route::get('penduduk/{no_ktp}/datang', 'PenduduksController@datang');
Route::post('penduduk/{no_ktp}/datang', 'PenduduksController@createDatang');
Route::get('penduduk/{no_ktp}/datang/{no_pendatang}/edit', 'PenduduksController@editDatang');
Route::patch('penduduk/{no_ktp}/datang/{no_pendatang}', 'PenduduksController@updateDatang');
Route::delete('penduduk/{no_ktp}/datang/{no_pendatang}', 'PenduduksController@deleteDatang');
Route::get('penduduk/{no_ktp}/kematian', 'PenduduksController@kematian');
Route::post('penduduk/{no_ktp}/kematian', 'PenduduksController@createKematian');
Route::get('penduduk/{no_ktp}/kematian/{no_kematian}/edit', 'PenduduksController@editKematian');
Route::patch('penduduk/{no_ktp}/kematian/{no_kematian}', 'PenduduksController@updateKematian');
Route::delete('penduduk/{no_ktp}/kematian/{no_kematian}', 'PenduduksController@deleteKematian');
Route::resource('kk', 'KksController');
Route::get('kk/{no_kk}/kelahiran', 'KksController@kelahiran');
Route::post('kk/{no_kk}/kelahiran', 'KksController@createKelahiran');
Route::get('kk/{no_kk}/kelahiran/{no_akte}/edit', 'KksController@editKelahiran');
Route::patch('kk/{no_kk}/kelahiran/{no_akte}', 'KksController@updateKelahiran');
Route::delete('kk/{no_kk}/kelahiran/{no_akte}', 'KksController@deleteKelahiran');

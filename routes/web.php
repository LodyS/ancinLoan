<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();



//Route GET
/* Route GET controller pinjam*/
Route::get('/home', 'HomeController@index')->name('home');
Route::get('simulasiPinjaman', 'pinjamController@simulasiPinjaman');

/* Route GET Controller Admin*/
Route::get('loginAdmin', 'adminController@loginAdmin');
Route::get('registerAdmin', 'adminController@registerAdmin');
Route::get('admin', 'adminController@admin');
Route::get('detailAngsuran', 'adminController@detailAngsuran');

/* Route GET controller user*/
Route::get('notifikasi/{id}', 'userController@notifikasi');
Route::get('profil/{id}', 'userController@profil');
Route::get('profil/updateProfil/{id}', 'userController@updateProfil');

//Route POST
/* Route POST Controller pinjam*/
Route::post('simulasiPinjaman', 'pinjamController@simulasiPinjaman');
Route::post('pengajuannPinjaman', 'pinjamController@pengajuannPinjaman');

/* Route POST Controller Admin*/
Route::post('create', 'adminController@create');
Route::post('adminLogin', 'adminController@adminLogin');
Route::post('detailAngsuran', 'adminController@detailAngsuran');
Route::post('terimaPinjaman', 'adminController@terimaPinjaman');
Route::post('tolakPinjaman', 'adminController@tolakPinjaman');
Route::post('hapusPinjaman', 'adminController@hapusPinjaman');

/* Route POST Controller POST*/
Route::post('prosesUpdateProfil', 'userController@prosesUpdateProfil');

















/*Route::get('loginOtp', function () {
    return view('auth/loginOtp');
})->name('loginOtp');*/

/* Route POST Controller User
Route::post('sendOtp', 'userController@sendOtp');
Route::post('loginOtp', 'userController@loginOtp')->name('loginOtp');
/* akhir Route POST Controller User*/
/* Route get Nexmo Controller*/
//Route::get('/nexmo', 'nexmoController@show')->name('nexmo');

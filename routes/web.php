<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'pelanggan'], function () {
	Route::get('/login','ControllerPelanggan@login');
	Route::post('/dologin','ControllerPelanggan@doLogin');
	Route::get('/','ControllerPelanggan@index');
	Route::get('/inputorderpelanggan','ControllerPelanggan@inputorder');
	Route::post('/inputorderpelanggan','ControllerPelanggan@input_order');
	Route::get('/trackinglaundry','ControllerPelanggan@trackinglaundry');
	Route::get('/logout','ControllerPelanggan@logout');
});

Route::group(['prefix' => 'karyawan'], function () {
	Route::get('/','ControllerKaryawan@index');
	Route::get('/inputorderbarukaryawan/{id}','ControllerKaryawan@input_order_baru');
	Route::get('/inputorderbypelanggan','ControllerKaryawan@input_order_bypelanggan');
	Route::get('/inputpersediaan','ControllerKaryawan@input_persediaan');
	Route::get('/inputpemakaian','ControllerKaryawan@input_pemakaian');
	Route::get('/inputakunpelanggan','ControllerKaryawan@input_akun_pelanggan');
	Route::get('/lihatakunpelanggan','ControllerKaryawan@lihat_akun_pelanggan');
	Route::get('/inputorder','ControllerKaryawan@inputorder');
	Route::get('/inputpemasukkan','ControllerKaryawan@form_input_pemasukkan');
	Route::get('/lihatpersediaan','ControllerKaryawan@lihat_persediaan');
	Route::post('/inputakunpelanggan','ControllerKaryawan@inputakunpelanggan');
	Route::post('/inputpersediaan','ControllerKaryawan@inputpersediaan');
	Route::get('/logout','ControllerKaryawan@logout');
	Route::post('/dologin','ControllerKaryawan@dologin');
	Route::get('/login','ControllerKaryawan@login');
	Route::post('/inputorderbarukaryawan','ControllerKaryawan@inputorderbarukaryawan');
	Route::get('/lihatorder','ControllerKaryawan@lihat_order');
	Route::post('/inputpemakaian','ControllerKaryawan@inputpemakaian');
	Route::post('/inputpemasukkan','ControllerKaryawan@inputpemasukkan');
	Route::get('/ubahakunpelanggan/{id}','ControllerKaryawan@ubah_akun_pelanggan');
	Route::post('/ubahakunpelanggan','ControllerKaryawan@ubahakunpelanggan');
	Route::get('/ubahorder/{id}','ControllerKaryawan@ubah_order');
	Route::post('/ubahorder','ControllerKaryawan@ubahorder');
	Route::get('/logout','ControllerKaryawan@logout');
});

Route::group(['prefix' => 'pemilik'], function () {
	Route::get('/','ControllerKaryawan@indexpemilik');
	Route::get('/pemakaianharian/{tgl?}','ControllerKaryawan@pemakaianharian');
	Route::get('/login','ControllerKaryawan@loginpemilik');
	Route::post('/dologin','ControllerKaryawan@doLoginPemilik');
	Route::get('/persediaanharian/{tgl?}','ControllerKaryawan@persediaanharian');
	Route::get('/persediaanbulanan/{tgl?}','ControllerKaryawan@persediaanbulanan');
	Route::get('/persediaantahunan/{tgl?}','ControllerKaryawan@persediaantahunan');
	Route::get('/pemakaianbulanan/{tgl?}','ControllerKaryawan@pemakaianbulanan');
	Route::get('/pemakaiantahunan/{tgl?}','ControllerKaryawan@pemakaiantahunan');
	Route::get('/pendapatanharian/{tgl?}','ControllerKaryawan@pendapatanharian');
	Route::get('/pendapatanbulanan/{tgl?}','ControllerKaryawan@pendapatanbulanan');
	Route::get('/pendapatantahunan/{tgl?}','ControllerKaryawan@pendapatantahunan');
	Route::get('/logoutpemilik','ControllerKaryawan@logoutpemilik');
	Route::get('/detailpemakaianharian/{tgl}/{id}','ControllerKaryawan@detailpemakaianharian');
	Route::get('/detailpemakaianbulanan/{tgl}/{id}','ControllerKaryawan@detailpemakaianbulanan');
	Route::get('/detailpemakaiantahunan/{tgl}/{id}','ControllerKaryawan@detailpemakaiantahunan');
	Route::get('/detailpersediaanharian/{tgl}/{id}','ControllerKaryawan@detailpersediaanharian');
	Route::get('/detailpersediaanbulanan/{tgl}/{id}','ControllerKaryawan@detailpersediaanbulanan');
	Route::get('/detailpersediaantahunan/{tgl}/{id}','ControllerKaryawan@detailpersediaantahunan');
	Route::get('/untungrugibulanan/{tgl?}','ControllerKaryawan@untungrugibulanan');
	Route::get('/detailuntungrugibulanan/{tgl}','ControllerKaryawan@detailuntungrugibulanan');
	Route::get('/untungrugitahunan/{tgl?}','ControllerKaryawan@untungrugitahunan');
	Route::get('/detailuntungrugitahunan/{tgl}','ControllerKaryawan@detailuntungrugitahunan');
});

// Login
Route::get('/login','AkunController@login');



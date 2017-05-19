<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Transaksi;
use App\Pelanggan;
use Session;
use Carbon\Carbon;

class ControllerPelanggan extends Controller
{
   	public function index(){
		return view('pelanggan.dashboard.index');
	}
	public function inputorder(){
		$pelanggan['pelanggan'] = Pelanggan::find(Session::get('username')->id);
		return view('pelanggan.order.inputorderbypelanggan',$pelanggan);
	}
	public function input_order(Request $req){
		$data = $req->all();
		$data['pelanggan_id'] =  Session::get('username')->id;
		$data['tanngal_masuk'] = Carbon::now()->format('Y-m-d');
		$data['tanggal_selesai'] = Carbon::now()->format('Y-m-d');
		$transaksi = Transaksi::create($data);
		return back();
	}

	public function trackinglaundry(){
		$transaksi['transaksi'] = Transaksi::where(['pelanggan_id'=>Session::get('username')->id])->get();
		return view('pelanggan.order.trackinglaundry', $transaksi);
	}
	public function login(){
		return view('pelanggan.login');
	}
	public function doLogin(Request $req){
		$data = $req->all();
		$akun = Pelanggan::where(['username'=>$data['username'],'password'=>$data['password']])->get();
		if (count($akun) == 0){
			return "false";
		}else{
			Session::put(['username'=>$akun[0],'role'=>'pelanggan']);
			return "true";
		}
	}
	public function logout(){
		Session::flush();
		return redirect('pelanggan/login');
	}


}

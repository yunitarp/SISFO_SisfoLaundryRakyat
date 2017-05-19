<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Pelanggan;
use App\Stock;
use App\Pemasukkan;
use App\Karyawan;
use App\Transaksi;
use App\Pemakaian;
use Session;
use Carbon\Carbon;
use DB;

class ControllerKaryawan extends Controller
{
    public function index(){
		return view('karyawan.dashboard.index');
	}
	public function login(){
		return view('karyawan.login');
	}
	public function input_order_baru($id){
		$data['plg'] = Pelanggan::find($id);
		return view('karyawan.order.inputorderbarukaryawan',$data);
	}
	public function inputorderbarukaryawan(Request $req){
		$data = $req->all();
		$data['tanngal_masuk'] = date("Y-m-d", strtotime($data['tanngal_masuk']));
		$data['tanggal_selesai'] = date("Y-m-d", strtotime($data['tanggal_selesai']));
		$data['karyawan_id'] = Session::get('username')->id;
		$transaksi = Transaksi::create($data);
		return back();
	}
	public function input_order_bypelanggan(Request $req){	
		return view('karyawan.order.inputorderbypelanggan');
	}
	public function input_persediaan(){
		return view('karyawan.stock.inputpersediaan');
	}
	public function input_pemakaian(){
		$stock['stock'] = Stock::all();
		return view('karyawan.stock.inputpemakaian', $stock);
	}
	public function input_akun_pelanggan(){
		return view('karyawan.akun.inputakunpelanggan');
	}
	public function inputakunpelanggan(Request $req){
		$data = $req->all();
		$pelanggan = Pelanggan::create($data);
		return back();
	}
	public function ubah_akun_pelanggan($id){
		$data['pelanggan'] = Pelanggan::find($id);
		return view('karyawan.akun.ubahakunpelanggan',$data);
	}
	public function ubahakunpelanggan(Request $req){
		$data = $req->all();
		$pelanggan = Pelanggan::find($data['id']);
		$pelanggan->username = $data['username'];
		$pelanggan->password = $data['password'];
		$pelanggan->save();
		return back();
	}
	public function ubah_order($id){
		$data['transaksi'] = Transaksi::find($id);
		return view('karyawan.order.ubahorder',$data);
	}
	public function ubahorder(Request $req){
		$data = $req->all();
		$transaksi = Transaksi::find($data['id']);
		$transaksi->karyawan_id = Session::get('username')->id;
		$transaksi->berat = $data['berat'];
		$transaksi->jenis_laundry = $data['jenis_laundry'];
		$transaksi->total_harga = $data['total_harga'];
		$transaksi->status = $data['status'];
		$transaksi->jumlah_baju = $data['jumlah_baju'];
		$transaksi->tanngal_masuk = date("Y-m-d", strtotime($data['tanngal_masuk']));
		$transaksi->tanggal_selesai = date("Y-m-d", strtotime($data['tanggal_selesai']));
		$transaksi->antarjemput = $data['antarjemput'];
		$transaksi->save();
		return back();
	}
	public function doLogin(Request $req){
		$data = $req->all();
		$akun = Karyawan::where(['username'=>$data['username'],'password'=>$data['password'],'role'=>'karyawan'])->get();
		if (count($akun) == 0){
			return "false";
		}else{
			Session::put(['username'=>$akun[0],'role'=>$akun[0]->role]);
			return "true";
		}
	}
	public function logout(){
		Session::flush();
		return redirect('karyawan/login');
	}

	public function inputpersediaan(Request $req){
		$data = $req->all();
		$stock = new Stock;
		$stock->karyawan_id = Session::get('username')->id;
		$stock->nama_item = $data['nama_item'];
		$stock->jumlah = $data['jumlah'];
		$stock->max_stock = $data['max_stock'];
		$stock->satuan = $data['satuan'];
		$stock->harga = $data['harga'];
		$stock->save();
		return back();
	}
	public function lihat_akun_pelanggan(){
		$pelanggan['pelanggan'] = Pelanggan::all();
		return view('karyawan.akun.lihatakunpelanggan', $pelanggan);
	}
	public function inputorder(){
		$pelanggan['pelanggan'] = Pelanggan::all();
		return view('karyawan.order.inputroder', $pelanggan);
	}
	public function form_input_pemasukkan(){
		$stock['stock'] = Stock::all();
		return view('karyawan.stock.inputpemasukkan', $stock);
	}
	public function inputpemasukkan(Request $req){
		$data = $req->all();
		$data['karyawan_id'] =  Session::get('username')->id;
		$data['tanggal'] = date("Y-m-d", strtotime($data['tanggal']));
		$stock = Stock::find($data['stock_id']);
		$stock->jumlah = $stock->jumlah + $data['jumlah_pemasukan'];
		$stock->save();
		$pemasukkan = Pemasukkan::create($data);
		return back()->with('pesan','Data pemasukkan berhasil dimasukkan');
	}
	public function inputpemakaian(Request $req){
		$data = $req->all();
		$data['karyawan_id'] =  Session::get('username')->id;
		$data['tanggal'] = date("Y-m-d", strtotime($data['tanggal']));
		$stock = Stock::find($data['stock_id']);
		if($stock->jumlah >= $data['jumlah_pemakaian']){
			$stock->jumlah = $stock->jumlah - $data['jumlah_pemakaian'];
			$data['current_stock'] = $stock->jumlah;
			$stock->save();
			$pemakaian = Pemakaian::create($data);
			return back()->with('pesan','Data pemakaian berhasil dimasukkan');
		}else{
			return back()->with('pesan','Stock tidak mencukupi');
		}
	}
	public function lihat_persediaan(){
		$stock['stock'] = Stock::all();
		return view('karyawan.stock.lihatpersediaan', $stock);
	}
	public function lihat_order(){
		$transaksi['transaksi'] = Transaksi::all();
		return view('karyawan.order.lihatorder',$transaksi);
	}

	public function indexpemilik(){
		return view('pemilik.dashboard.index');
	}
	public function pemakaianharian($tgl = null){
		$tgl = (empty($tgl))?Carbon::now()->format('Y-m-d'):$tgl;
		$pemasukkan['tgl'] = $tgl;
		$pemakaian['pemakaian'] = Pemakaian::select(['stock_id', 'tanggal', DB::raw('AVG(jumlah_pemakaian) as rata'), DB::raw('SUM(jumlah_pemakaian) as jml')])->whereDate('tanggal','=',$tgl)->
		groupBy(['stock_id','tanggal'])->get();
		$pemakaian['tgl'] = $tgl;
		return view('pemilik.pemakaian.pemakaianharian',$pemakaian);
	}
	public function detailpemakaianharian($tgl,$id){
		$pemakaian['pemakaian'] = Pemakaian::where(['tanggal'=>$tgl])->where(['stock_id'=>$id])->get();
		return view('pemilik.pemakaian.detailpemakaianharian',$pemakaian);
	}
	public function pemakaianbulanan($tgl = null){
		$tgl = (empty($tgl))?Carbon::now()->format('m'):$tgl;
		$pemasukkan['tgl'] = $tgl;
		$pemakaian['pemakaian'] = Pemakaian::select(['stock_id', DB::raw('AVG(jumlah_pemakaian) as rata'), DB::raw('SUM(jumlah_pemakaian) as jml')])->whereMonth('tanggal','=',$tgl)->
		groupBy(['stock_id'])->get();
		$pemakaian['tgl'] = $tgl;
		return view('pemilik.pemakaian.pemakaianbulanan',$pemakaian);
	}
	public function detailpemakaianbulanan($tgl,$id){
		$pemakaian['pemakaian'] = Pemakaian::whereMonth('tanggal','=',$tgl)->where(['stock_id'=>$id])->get();
		return view('pemilik.pemakaian.detailpemakaianbulanan',$pemakaian);
	}
	public function pemakaiantahunan($tgl = null){
		$tgl = (empty($tgl))?Carbon::now()->format('Y'):$tgl;
		$pemasukkan['tgl'] = $tgl;
		$pemakaian['pemakaian'] = Pemakaian::select(['stock_id', DB::raw('AVG(jumlah_pemakaian) as rata'), DB::raw('SUM(jumlah_pemakaian) as jml')])->whereYear('tanggal','=',$tgl)->
		groupBy(['stock_id'])->get();
		$pemakaian['tgl'] = $tgl;
		return view('pemilik.pemakaian.pemakaiantahunan',$pemakaian);
	}
	public function detailpemakaiantahunan($tgl,$id){
		$pemakaian['pemakaian'] = Pemakaian::whereYear('tanggal','=',$tgl)->where(['stock_id'=>$id])->get();
		return view('pemilik.pemakaian.detailpemakaiantahunan',$pemakaian);
	}
	public function loginpemilik(){
		return view('pemilik.login');
	}
	public function doLoginPemilik(Request $req){
		$data = $req->all();
		$akun = Karyawan::where(['username'=>$data['username'],'password'=>$data['password'],'role'=>'pemilik'])->get();
		if (count($akun) == 0){
			return "false";
		}else{
			Session::put(['username'=>$akun[0],'role'=>$akun[0]->role]);
			return "true";
		}
	}
	public function persediaanharian($tgl = null){
		$tgl = (empty($tgl))?Carbon::now()->format('Y-m-d'):$tgl;
		$pemasukkan['tgl'] = $tgl;
		$pemasukkan['pemasukkan'] = Pemasukkan::select(['stock_id', 'tanggal','jumlah_pemasukan', DB::raw('SUM(jumlah_pemasukan) as jml')])->whereDate('tanggal','=',$tgl)->
		groupBy(['stock_id','tanggal','jumlah_pemasukan'])->get();
		$pemasukkan['tgl'] =$tgl;
		return view('pemilik.persediaan.persediaanharian',$pemasukkan);
	}
	public function detailpersediaanharian($tgl,$id){
		$pemasukkan['pemasukkan'] = Pemasukkan::where(['tanggal'=>$tgl])->where(['stock_id'=>$id])->get();
		return view('pemilik.persediaan.detailpersediaanharian',$pemasukkan);
	}
	public function persediaanbulanan($tgl = null){
		$tgl = (empty($tgl))?Carbon::now()->format('m'):$tgl;
		$pemasukkan['tgl'] = $tgl;
		$pemasukkan['pemasukkan'] = Pemasukkan::select(['stock_id', 'tanggal','jumlah_pemasukan', DB::raw('SUM(jumlah_pemasukan) as jml')])->whereMonth('tanggal','=',$tgl)->
		groupBy(['stock_id','tanggal','jumlah_pemasukan'])->get();
		$pemasukkan['tgl'] =$tgl;
		return view('pemilik.persediaan.persediaanbulanan',$pemasukkan);
	}
	public function detailpersediaanbulanan($tgl,$id){
		$pemasukkan['pemasukkan'] = Pemasukkan::whereMonth('tanggal','=',$tgl)->where(['stock_id'=>$id])->get();
		return view('pemilik.persediaan.detailpersediaanbulanan',$pemasukkan);
	}
	public function persediaantahunan($tgl = null){
		$tgl = (empty($tgl))?Carbon::now()->format('Y'):$tgl;
		$pemasukkan['tgl'] = $tgl;
		$pemasukkan['pemasukkan'] = Pemasukkan::select(['stock_id', 'tanggal', 'jumlah_pemasukan',DB::raw('SUM(jumlah_pemasukan) as jml')])->whereYear('tanggal','=',$tgl)->
		groupBy(['stock_id','tanggal','jumlah_pemasukan'])->get();
		$pemasukkan['tgl'] =$tgl;
		return view('pemilik.persediaan.persediaantahunan',$pemasukkan);
	}
	public function detailpersediaantahunan($tgl,$id){
		$pemasukkan['pemasukkan'] = Pemasukkan::whereYear('tanggal','=',$tgl)->where(['stock_id'=>$id])->get();
		return view('pemilik.persediaan.detailpersediaantahunan',$pemasukkan);
	}
	public function pendapatanharian($tgl = null){
		$tgl = (empty($tgl))?Carbon::now()->format('Y-m-d'):$tgl;
		$transaksi['transaksi'] = Transaksi::where(['status'=>'Selesai'])->whereDate('tanggal_selesai','=',$tgl)->get();
		$transaksi['tgl'] = $tgl;
		return view('pemilik.pemasukkan.pendapatanharian',$transaksi);
	}
	public function pendapatanbulanan($tgl = null){
		$tgl = (empty($tgl))?Carbon::now()->format('Y-m-d'):$tgl;
		$transaksi['transaksi'] = Transaksi::where(['status'=>'Selesai'])->whereMonth('tanggal_selesai','=',$tgl)->get();
		$transaksi['tgl'] = $tgl;
		return view('pemilik.pemasukkan.pendapatanbulanan',$transaksi);
	}
	public function pendapatantahunan($tgl = null){
		$tgl = (empty($tgl))?Carbon::now()->format('Y-m-d'):$tgl;
		$transaksi['transaksi'] = Transaksi::where(['status'=>'Selesai'])->whereYear('tanggal_selesai','=',$tgl)->get();
		$transaksi['tgl'] = $tgl;
		return view('pemilik.pemasukkan.pendapatantahunan',$transaksi);
	}
	public function logoutpemilik(){
		Session::flush();
		return redirect('pemilik/login');
	}
	public function untungrugibulanan($tgl=null){
		$tgl = (empty($tgl))?Carbon::now()->format('Y-m-d'):$tgl;
		$transaksi['transaksi'] = Transaksi::where(['status'=>'Selesai'])->whereMonth('tanggal_selesai','=',$tgl)->get();
		$pemakaian['pemakaian'] = Pemakaian::whereMonth('tanggal','=',$tgl)->get();
		$transaksi['tgl'] = $tgl;
		return view('pemilik.untungrugi.untungrugibulanan',$transaksi, $pemakaian, $tgl);
	}
	public function detailuntungrugibulanan($tgl){
		$transaksi['transaksi'] =Transaksi::select(['tanggal_selesai', DB::raw('SUM(total_harga) as pendapatan')])->where(['status'=>'Selesai'])->whereMonth('tanggal_selesai','=',$tgl)->
		groupBy(['tanggal_selesai'])->get();
		$pemakaian['pemakaian'] =Pemakaian::select(['stock_id', 'tanggal', DB::raw('AVG(jumlah_pemakaian) as rata'), DB::raw('SUM(jumlah_pemakaian) as jml')])->whereMonth('tanggal','=',$tgl)->
		groupBy(['stock_id','tanggal'])->get();
		return view('pemilik.untungrugi.detailuntungrugibulanan',$transaksi,$pemakaian);
	}
	public function untungrugitahunan($tgl = null){
		$tgl = (empty($tgl))?Carbon::now()->format('Y-m-d'):$tgl;
		$transaksi['transaksi'] = Transaksi::where(['status'=>'Selesai'])->whereYear('tanggal_selesai','=',$tgl)->get();
		$pemakaian['pemakaian'] = Pemakaian::whereYear('tanggal','=',$tgl)->get();
		$transaksi['tgl'] = $tgl;
		return view('pemilik.untungrugi.untungrugitahunan',$transaksi, $pemakaian, $tgl);
	}
	public function detailuntungrugitahunan($tgl){
		$transaksi['transaksi'] =Transaksi::select([DB::raw("Month(tanggal_selesai) as tgl "), DB::raw('SUM(total_harga) as pendapatan')])->where(['status'=>'Selesai'])->whereYear('tanggal_selesai','=',$tgl)->
		groupBy(['tgl'])->get();
		$transaksi['tgl'] = $tgl;
		$transaksi['bulan'] = ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];
		$pemakaian['pemakaian'] = Pemakaian::select(['stock_id', DB::raw("Month(tanggal) as tgl "), DB::raw('SUM(jumlah_pemakaian) as jml')])->whereYear('tanggal','=',$tgl)->
		groupBy(['stock_id','tgl'])->get();
		return view('pemilik.untungrugi.detailuntungrugitahunan',$transaksi, $pemakaian);
	}
		
}
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $fillable = ['pelanggan_id','karyawan_id','berat','total_harga','jumlah_baju','list_laundry','jenis_laundry','tanngal_masuk','tanggal_selesai','status','antarjemput'];
	public $timestamps = false;
	public function pelanggan(){
		return $this->belongsTo('App\Pelanggan');
	}

	public function karyawan(){
		return $this->belongsTo('App\Karyawan');
	}
}

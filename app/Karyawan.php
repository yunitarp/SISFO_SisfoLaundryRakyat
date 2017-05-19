<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    
	protected $fillable = ['username','password','nama_depan','nama_belakang','alamat','no_telp'];
	public $timestamps = false;

	public function transaksi(){
		return $this->hasMany('App\Transaksi');
	}

	public function pemasukkan(){
		return $this->hasMany('App\Pemasukkan');
	}

	public function pemakaian(){
		return $this->hasMany('App\Pemakaian');
	}
}

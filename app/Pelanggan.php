<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    protected $fillable = ['username','password','nama_depan','nama_belakang','alamat','no_telp'];
	public $timestamps = false;

	public function transaksi(){
		return $this->hasMany('App\Transaksi');
	}

}

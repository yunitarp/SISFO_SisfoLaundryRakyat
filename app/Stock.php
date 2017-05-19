<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $fillable = ['karyawan_id','nama_item','jumlah','max_stock','satuan','harga'];
	public $timestamps = false;
	public function pemasukkan(){
		return $this->hasMany('App\Pemasukkan');
	}

	public function pengeluaran(){
		return $this->hasMany('App\Pengeluaran');
	}

	public function karyawan(){
		return $this->belongsTo('App\Karyawan');
	}
}

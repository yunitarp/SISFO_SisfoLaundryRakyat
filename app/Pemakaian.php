<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pemakaian extends Model
{
    protected $fillable = ['stock_id','karyawan_id','jumlah_pemakaian','current_stock','tanggal'];
	public $timestamps = false;

	public function stock(){
		return $this->belongsTo('App\Stock');
	}

	public function karyawan(){
		return $this->belongsTo('App\Karyawan');
	}

}

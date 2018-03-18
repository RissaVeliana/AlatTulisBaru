<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    //
    protected $fillable = ['id_jenis','nama','stock','foto','harga_asli','harga_jual','id_supplier'];

    public function jenis(){
    	return $this->belongsTo('App\JenisBarang');
    }     
    public function penjualan(){
    	return $this->hasMany('App\Penjualan');
    }
    
 	
}

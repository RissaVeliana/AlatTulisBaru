<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    //
     protected $fillable = ['id_jenis','id_barang','jumlah','harga','total','id_supplier','tgl_pembelian'];
   
}

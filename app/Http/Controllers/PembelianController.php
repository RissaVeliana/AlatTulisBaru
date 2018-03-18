<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;   
use App\Pembelian;
use DB;
use App\JenisBarang;
use App\Barang;
use App\Supplier;
use Session;

class PembelianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
         $b = JenisBarang::all();
            $c = Barang::all();
            $d = Supplier::all();
        $pembelian =  DB::table('pembelians')
        ->join('jenis_barangs','pembelians.id_jenis','=','jenis_barangs.id')
        ->join('suppliers','pembelians.id_supplier','=','suppliers.id')
        ->select('pembelians.*','jenis_barangs.jenis','suppliers.nama_supplier')
        ->orderBy('pembelians.id','desc')->paginate(5);
        return view('pembelian.index',compact('pembelian','b','c','d'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $input = Input::all();
         
            for($id = 0; $id < count($input['nb']); $id++)
            {   
                
                $pembelian = new Pembelian;
                $pembelian->id_jenis = $input['jb'][$id];
                $pembelian->nama = $input['nb'][$id];
                $pembelian->stock = $input['stock'][$id];
                $pembelian->harga_asli = $input['hargaasli'][$id];
                $pembelian->harga_jual = $input['hargajual'][$id];
                $pembelian->total = $input['total'][$id];
                $pembelian->id_supplier = $input['supp'][$id];
                $tgl= date("Y-m-d H:i:s");
                $pembelian->tgl_pembelian=$tgl;
                $pembelian->save();

                $barang = new Barang;
                $barang->id_jenis = $input['jb'][$id];
                $barang->nama = $input['nb'][$id];
                $barang->stock = $input['stock'][$id];
                $barang->harga_asli = $input['hargaasli'][$id];
                $barang->harga_jual = $input['hargajual'][$id];
                $barang->save();
            }

               
            

           Session::flash("flash_notification",[
                 "level"=>"success",
                 "message"=>"Berhasil Melakukan Penjualan"]);
            return redirect('/admin/pembelian');
        }

    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pembelian= Pembelian::findOrfail($id);
        $pembelian->delete();
        return redirect()->route('pembelian.index');
    }
}

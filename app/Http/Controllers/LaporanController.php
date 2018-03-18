<?php

namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Penjualan;
use App\Pembelian;
use PDF;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $laporan = Penjualan::all();
        return view('laporan.index', compact('laporan'));
    }


    public function index2(Request $request)
    {
           $a = $request->tgl1;
           $b = $request->tgl2;
           $Penjualan = Penjualan::whereBetween('tgl_penjualan', [$a, $b])->get();
           $sum = $Penjualan->sum('total');
           $user = Penjualan::all();

           $pdf = PDF::loadView('laporan/pdf', compact('user','a','b','sum','Penjualan'));
           return $pdf->download('laporan.pdf');
           
    }
     public function index3(Request $request)
    {
      
            $a = $request->tgl1;
           $b = $request->tgl2;
           $Penjualan = Penjualan::whereBetween('tgl_penjualan', [$a, $b])->get();
           $sum = $Penjualan->sum('total');
            return view('laporan.laporan', compact('Penjualan','a','b','sum'));

    }


     public function index4()
    {
        $laporan1 = Pembelian::all();
        return view('laporan.index1', compact('laporan1'));
    }


    public function index5(Request $request)
    {
           $a = $request->tgl1;
           $b = $request->tgl2;
           $Pembelian = Pembelian::whereBetween('tgl_pembelian', [$a, $b])->get();
            $sum = $Pembelian->sum('total');
           $user = Pembelian::all();

           $pdf = PDF::loadView('laporan/pdf1', compact('user','a','b','sum','Pembelian'));
           return $pdf->download('laporan.pdf');
           
    }
    public function index6(Request $request)
    {
      
            $a = $request->tgl1;
           $b = $request->tgl2;
           $Pembelian = Pembelian::whereBetween('tgl_pembelian', [$a, $b])->get();
           $sum = $Pembelian->sum('total');
            return view('laporan.laporan1', compact('Pembelian','a','b','sum'));

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
        //
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
        //
    }
}

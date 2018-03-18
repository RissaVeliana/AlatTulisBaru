<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\JenisBarang;
use App\Barang;



class JenisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $jenis = JenisBarang::all();
        return view('jenis.index', compact('jenis'));
    }

    public function filter($id)
    {
        //
        $barang = Barang::where('id_jenis','=',$id)->get();
        return view('barang.index', compact('barang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
       return view('jenis.create');
    
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

        $jenis = new JenisBarang();
        $jenis->jenis=$request->jenis;
        $jenis->save();
        return redirect()->route('jenis.index');
       
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
        $jenis = JenisBarang::findOrfail($id);
        return view('jenis.edit',compact('jenis'));
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
        $jenis = JenisBarang::findOrfail($id);
        $jenis->jenis=$request->jenis;
        $jenis->save();
        return redirect()->route('jenis.index');
       
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
        $jenis = JenisBarang::findOrfail($id);
        $jenis->delete();
        return redirect()->route('jenis.index');
       
    }
    public function jenis($id)
    {
        $t = Barang::where('id_jenis',$id)->get();

        $count = $t->count();

        if($count == 0){
            $html ='<option> barang tidak ada </option>';
            echo $html;
        }else{
            echo '<option> pilih merk barang </option>';
            foreach ($t as $data) {
                echo '<option value="'.$data->id.'">'.$data->nama.'</option>';
                        
            };
        }
    }
    public function harga($id)
    {
        $t = Barang::find($id);

        $count = $t->count();

        if($count == 0){
            echo 'Erno Data';
        }else{
            
            echo $t->harga_jual;
        
         }

    }
     public function harga1($id)
    {
        $t = Barang::find($id);

        $count = $t->count();

        if($count == 0){
            echo 'Erno Data';
        }else{
            
            echo $t->harga_asli;
        
         }

    }
    public function supplier($id)
    {
        $t = Supplier::find($id);

        $count = $t->count();

        if($count == 0){
            echo 'Erno Data';
        }else{
            echo '<option> pilih supplier </option>';
            foreach ($t as $data) {
                echo '<option value="'.$data->id.'">'.$data->nama_supplier.'</option>';
                        
            };
        }

    }
}

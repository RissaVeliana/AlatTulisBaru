@extends('layouts.template')
@section('content')


  <div class="row">
  <center><h1>Laporan Penjualan</h1><br></center>
  <div class="col-md-8 col-md-offset-2">
   
    <div class="panel-heading"> 
    <div class="panel-title pull-right"></div></div>

      <div class="panel-body">
        <form action="{{url('admin/laporan/detail')}}" method="post"> 
        {{csrf_field()}}
        <div class="col-md-5">
        <div class="form-group">
          <label class="control-lable">Tanggal Awal</label>
          <input type="date" name="tgl1" class="form-control" required>
        </div>
        </div>

        <div class="col-md-5">
        <div class="form-group">
          <label class="control-lable">Tanggal Akhir</label>
          <input type="date" name="tgl2" class="form-control" required>
        </div>
        </div>

        <div class="col-md-2">
        <div class="form-group">
          <button type="submit" class="btn btn-success">Simpan</button>
        </div>
        </div>

        </form>
        </div>
       
        </div>


@endsection
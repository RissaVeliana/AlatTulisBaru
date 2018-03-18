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
        




  <div class="row">
  <div class="col-md-8 col-md-offset-2">
  <div class="panel panel-primary">
		<div class="panel-heading"> 
		<div class="panel-title pull-right">
			</div></div>
			<div class="panel-body">

	<table class="table">
		<thead>
			<tr>
				<th>Tanggal</th>
				<th>Uang Masuk</th>
			</tr>
		</thead>
		<tbody>
			@foreach($Penjualan as $data)
			<tr>
				<td>{{ $data->tgl_penjualan}}</td>
				<td>Rp.{{ number_format($data->total)}},-</td>
			</tr>
			@endforeach
		</tbody>
	</table>

	Total Uang Masuk Dari Tanggal {{$a}} Sampai {{$b}}: Rp.{{number_format($sum)}},-
	

</div>
	<div class="form-group">
		<form action="{{url('admin/laporan/pdf')}}" method="post"> 
		{{csrf_field()}}
		 <input type="hidden" name="tgl1" class="form-control" value="{{$a}}">
		 <input type="hidden" name="tgl2" class="form-control" value="{{$b}}">
          <button type="submit" class="btn btn-success">Cetak PDF</button>
          </form>
        </div>

	 
 </div>
        </div>
   

        </div>
        
        
</body>
</html>


@endsection
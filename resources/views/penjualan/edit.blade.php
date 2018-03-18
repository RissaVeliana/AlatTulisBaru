@extends('layouts.template')
@section('content')


 <!-- Left side column. contains the logo and sidebar -->
   
<div class="row">
	<center><h1>Transaksi Penjualan</h1><br></center>
	<div class="col-md-8 col-md-offset-2">
		<div class="panel panel-primary">
		<div class="panel-heading">  
		<div class="panel-title pull-right">
			<a href="{{URL::previous()}}">Kembali</a></div></div>

			<div class="panel-body">
				<form action="{{route('penjualan.update', $penjualan->id)}}" method="post">
				<input type="hidden" name="_method" value="PUT">
				<input type="hidden" name="_token" value="{{csrf_token()}}">
				

				<div class="form-group">
					<label class="control-lable">Jenis Barang</label>
					<select class="form-control" name="jb">
						@foreach($b as $data)
						<option value="{{$data->id}}" selected="">{{$data->jenis}}</option>
						@endforeach
					</select>
				</div>

				<div class="form-group">
					<label class="control-lable">Merk Barang</label>
					<select class="form-control" name="nb">
						@foreach($c as $data)
						<option value="{{$data->id}}" selected="">{{$data->nama}}</option>
						@endforeach
					</select>
				</div>

				<div class="form-group">
					<label class="control-lable">Jumlah</label>
						<input type="number" name="jml"  max="100" value="{{$penjualan->jumlah}}" class="form-control" required>
					</div>
							

				<div class="form-group">
					<button type="submit" class="btn btn-success">Simpan</button>
					<button type="reset" class="btn btn-danger">Muat Ulang</button>
				</div>


				</form>
				
				</div>
		</div>
	</div>
</div>

@endsection
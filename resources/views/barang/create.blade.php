@section('js')
<script type="text/javascript">

      function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#showgambar').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#inputgambar").change(function () {
        readURL(this);
    });

</script>

@stop


@extends('layouts.template')
@section('content')


 <!-- Left side column. contains the logo and sidebar -->
 
    <div class="row">
	<center><h1>Data Barang</h1><br></center>
	<div class="col-md-8 col-md-offset-2">
		<div class="panel panel-primary">
		<div class="panel-heading"> Barang 
		<div class="panel-title pull-right">
			<a href="{{URL::previous()}} ">Kembali</a></div></div>

			<div class="panel-body">
				<form action="{{route('barang.store')}}" method="post" enctype="multipart/form-data"> 
				{{csrf_field()}}

				<div class="form-group">
					<label class="control-lable">Jenis Barang</label>
					<select class="form-control" name="jb">
						@foreach($barang as $data)
						<option value="{{$data->id}}" >{{$data->jenis}}</option>
						@endforeach
					</select>
				</div>


				<div class="form-group">
					<label class="control-lable">Merk Barang</label>
					<input type="text" name="nama" class="form-control" required>
				</div>

		        <div class="form-group">
		          <label class="control-lable">Foto Barang</label><br>
		          <img id="showgambar" style="max-width:150px;max-height:200px;float:left;" />
		          <input type="file" name="foto" class="form-control" required id="inputgambar">
		        </div>
        
				<div class="form-group">
					<label class="control-lable">Harga Asli</label>
					<input type="text" name="ha" class="form-control" required>
				</div>

				<div class="form-group">
					<label class="control-lable">Harga Jual</label>
					<input type="text" name="hj" class="form-control" required>
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
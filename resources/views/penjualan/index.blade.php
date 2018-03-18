@extends('layouts.template')
@section('content')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

<script type="text/javascript">
	function totalAmount(){
		var t = 0;
		$('.total').each(function(i,e){
			var amt = $(this).val()-0;
			t += amt;
		});
		$('.totalsel').html(t);
	}
	$(function () {
		$('.getmoney').change(function(){	
			var total = $('.totalsel').html();
			var getmoney = $(this).val();
			var t = getmoney-total;
			$('.backmoney').val(t).toFixed(2);
		});
		$('.add').click(function () {
			
			var jenis = $('.jb').html();
			var n = ($('.neworderbody tr').length - 0) + 1;
			var index = ($('.neworderbody tr').length - 0) + 1;
			var tr = '<tr><td class="no">' + n + '</td>' + 
				'<td><select class="form-control jb" name="jb[]" id="jenis'+ index +'">' + jenis + '</select></td>' +
				'<td><select class="form-control nb" name="nb[]" id="merk'+ index +'"></select></td>' +
				'<td><input type="text" class="jml form-control" name="jml[]"></td>' +
				'<td><input type="text" class="harga form-control" name="harga[]" id="harga'+index+'" readonly></td>' +
				'<td><input type="text" class="total form-control" name="total[]"  readonly></td>' +
				'<td><input type="button" class="btn btn-danger delete" value="x"></td></tr>';
			$('.neworderbody').append(tr);
			
			$('#jenis'+index).change(function () {
				var i =$(this).val();
				$.ajax({ 	
					dataType:"text",
		        	url: "filter/jenis/"+ i,
		        	success: function(data){
		              $('#merk'+n).html(data);

		              
		        	},
		        });	
			});

			$('#merk'+index).change(function () {
				var i = $(this).val();
				$.ajax({ 
					dataType: "text",
		        	url: "filter/harga/"+ i,
		        	success: function(data){
		              $('#harga'+index).val(data);
		        	},
		        });	
			});

		});

		$('.neworderbody').delegate('.delete', 'click', function () {
			$(this).parent().parent().remove();
			totalAmount();
		});

		$('.neworderbody').delegate('.nb', 'change', function () {
			var tr = $(this).parent().parent();
			var harga = tr.find('.nb option:selected').attr('harga');
			tr.find('.harga').val(harga);
			
			var jml = tr.find('.jml').val() - 0;
			var harga = tr.find('.harga').val() - 0;
		
			var totalsel = (jml * harga);
			tr.find('.total').val(totalsel);
			totalAmount();
		});

		$('.neworderbody').delegate('.jml', 'keyup', function () {
			var tr = $(this).parent().parent();
			var jml = tr.find('.jml').val() - 0;
			var harga = tr.find('.harga').val() - 0;
			var totalsel = (jml * harga);
			tr.find('.total').val(totalsel);
			totalAmount();
		});
		
        $('#hideshow').on('click', function(event) {  
			 $('#content').removeClass('hidden');
			$('#content').addClass('show'); 
             $('#content').toggle('show');
        });
    });
    


</script>
<!-- 
<style>
.hidden{
  display : none;  
}

.show{
  display : block !important;
}
select.form-control.nb{
    width: 150px;
}
</style>
 -->

 <div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading"><font face="Kristen ITC" size="5">Transaksi Penjualan</font></div>
					<div class="panel-body">

					@include('layouts._flash') 
					
				<form action="{{route('penjualan.store')}}" method="post"> 
				{{csrf_field()}}
				
				 <table class="table table-striped">
					 <thead>
								<tr>
									<th><font face="Comic Sans MS">No</font></th>
									<th><font face="Comic Sans MS">Jenis Barang</font></th>
									<th><font face="Comic Sans MS">Merk Barang</font></th>
									<th><font face="Comic Sans MS">Jumlah</font></th>
									<th><font face="Comic Sans MS">Harga</font></th>
									<th><font face="Comic Sans MS">Total</font></th>
									<th><font face="Comic Sans MS">Delete</font></th>
								</tr>
					</thead>
					<div style="display: none;">
						<select class="form-control jb">
							<option>Pilih</option>
							@foreach($b as $data)
							<option value="{{$data->id}}">{{$data->jenis}}</option>
							@endforeach
						</select>
					</div>
					
					<tbody class="neworderbody">
					<?php $no=1 ?>
					
					</tbody>
					</table>
					
					
					<table>
					<tr>
					<td><input type="button" class="btn btn-primary add" value="Tambahkan Item Baru"></td>
					</tr>

					<tr>
					<td colspan="6"><h4>Total: Rp. <b class="totalsel">0</b></h4></td>
					</tr>

					<tr>

					<td>
					Bayar<input type="text" class="getmoney form-control" ></td>
					</tr>

					<tr>
					<td>
					Kembali<input type="text" class="backmoney form-control" >
					</td>
					</tr>

					<br>
					
					<td>
					<br>
					<div align="left"><button type="submit" class="btn btn-success">Simpan</button></div>
					</td>
					</table>

						</div>
					</div>
				</div>
				</form>
				</div>

				
				

 <div class="box box-default">
            <div class="box-header">Detail Transaksi</div>
		 <div class="box-body">
		
					
      		<table class="table table-striped">
			
					<thead>
						<tr>
							<th><font face="Gothic UI Semibold" size="3">No</font></th>
							<th><font face="Gothic UI Semibold" size="3">Tanggal Penjualan</font></th>
							<th><font face="Gothic UI Semibold" size="3">Total Harga</font></th>
							<th colspan="2"><font face="Gothic UI Semibold" size="3">Action</font></th>
							
						</tr>
					</thead>

					<tbody>
					<?php $no=1 ?>

					@foreach($penjualan as $data)
						<tr>
							<td>{{$no++}}</td>
							<td>{{$data->tgl_penjualan}}</td>
							<td>{{$data->total }}</td>
							<td>
								<form action="{{route('penjualan.destroy', $data->id)}}" method="post">
									<input type="hidden" name="_method" value="DELETE">
									<input type="hidden" name="_token">
									<input type="submit" class="btn btn-danger" value="Hapus">
									{{csrf_field()}}
								</form>
							</td>

						</tr>
						
					@endforeach
					</tbody>
					

				</table>
					{{ $penjualan->links() }}
				</div></div>
				

				

@endsection

@section('js')
<script type="text/javascript">

</script>


@endsection



<center><h1>Laporan Pembelian</h1></center>
<div class="container">
<div class="col-md-8 col-md-offset-2">
  <div class="box box-primary">
            <div class="box-header">Detail Laporan </div>
		 <div class="box-body">
			
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Tanggal</th>
				<th>Uang Keluar</th>
			</tr>
		</thead>
		<tbody>
			@foreach($Pembelian as $data)
			<tr>
				<td>{{ $data->tgl_pembelian}}</td>
				<td>Rp.{{ number_format($data->total)}},-</td>
			</tr>
			@endforeach
		</tbody>
	</table>

	Total Uang Keluar Dari Tanggal {{$a}} Sampai {{$b}}: Rp.{{number_format($sum)}},-
	
</div>
</div>

</div>
</div>
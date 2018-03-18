


<center><h1>Laporan Penjualan</h1></center>
<div class="container">
	<table class="table table-bordered">
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
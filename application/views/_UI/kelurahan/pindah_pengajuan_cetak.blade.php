@layout('_layout/dashboard/index')
@section('title')Cetak Pengajuan Pindah@endsection
@section('nama-kelurahan')Lumajang@endsection

@section('content')
<div class="row row-center">
	<div class="col-xs-12 col-md-8">
		<div class="panel">
			<div class="panel-heading">
				<h1 class="panel-title">Pengajuan Pindah</h1>
			</div>
			<div class="panel-body table-responsive table-full">
				<table class="table table-stripped table-hover">
					<?php $no = 1; ?>
					<tr>
						<td>{{$no++}}. Nomor Surat</td>
						<td width="5%">:</td>
						<td>475/18/02.2003/2017</td>
					</tr>
					<tr>
						<td>{{$no++}}. Nama Lengkap</td>
						<td width="5%">:</td>
						<td>Mohamad Ainul Yakin</td>
					</tr>
					<tr>
						<td>{{$no++}}. Jenis Kelamin</td>
						<td width="5%">:</td>
						<td>Laki-laki</td>
					</tr>
					<tr>
						<td>{{$no++}}. Dilahirkan di</td>
						<td width="5%">:</td>
						<td>Bondowoso, 08 November 1992</td>
					</tr>
					<tr>
						<td>{{$no++}}. Agama</td>
						<td width="5%">:</td>
						<td>Islam</td>
					</tr>
					<tr>
						<td>{{$no++}}. Status Perkawinan</td>
						<td width="5%">:</td>
						<td>Belum Menikah</td>
					</tr>
					<tr>
						<td>{{$no++}}. Pekerjaan</td>
						<td width="5%">:</td>
						<td>Mahasiswa</td>
					</tr>
					<tr>
						<td>{{$no++}}. Tanggal KTP</td>
						<td width="5%">:</td>
						<td>35464747464674764</td>
					</tr>
					<tr>
						<td>{{$no++}}. Alamat Lengkap</td>
						<td width="5%">:</td>
						<td>
							Jl. PB Soedirman Pagah, Jember<br>
							Kelurahan : Pagah <br>
							Kecamatan : Patrang <br>
							Kabupaten : Jember <br>
							Provinsi : Jawa Timur
						</td>
					</tr>
					<tr>
						<td>{{$no++}}. Pindah Ke</td>
						<td width="5%">:</td>
						<td>
							Jl. PB Soedirman Pagah, Jember<br>
							Kelurahan : Pagah <br>
							Kecamatan : Patrang <br>
							Kabupaten : Jember <br>
							Provinsi : Jawa Timur
						</td>
					</tr>
					<tr>
						<td>{{$no++}}. Alasan Pindah</td>
						<td width="5%">:</td>
						<td>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis, ratione.</td>
					</tr>
					<tr>
						<td>{{$no++}}. Pengikut</td>
						<td width="5%">:</td>
						<td>
							2 orang
							<ul class="list-pengikut">
								<li><a href="#">Adi Sumaryo</a></li>
								<li><a href="#">Anna Montana</a></li>
							</ul>
						</td>
					</tr>
				</table>
				<button class="btn btn-primary btn-block btn-lg btn-sharp"><i class="fa fa-file-o"></i> CETAK SURAT PENGAJUAN</button>
			</div>
			<div class="panel-footer"></div>
		</div>
	</div>
</div>
@endsection

@section('style')
<style>
	.row-center{
		display: flex;
		justify-content: center;
		align-items: center;
	}

	.table tr td:first-child{
		width: 25%;
		font-weight: 500;
	}

	.list-pengikut{
		margin-top: 10px;
	}

	.list-pengikut li{
		list-style: none;
		background-color: #CCC;
	}

	.list-pengikut li:nth-child(even){
		background-color: #EEE;
	}

	.list-pengikut li a{
		display: block;
		width: 100%;
		text-align: left;
		padding: 7px;
		width: 100%;
		text-decoration: none;
		color: #333;
	}

	.list-pengikut li a:hover{
		background-color: #FCF7C1;
	}

	.btn-sharp{
		border-radius: 0;
	}

	.panel-title{
		font-size: 22px;
	}
</style>
@endsection
@layout('_layout/dashboard/index')
@section('title')Arsip Surat Keterangan Tidak Mampu@endsection
@section('nama-kelurahan')Lumajang@endsection

@section('content')
<div class="panel panel-theme">
	<div class="panel-heading">
		<h3 class="panel-title pull-left">Surat Keterangan Tidak Mampu</h3>
		<div class="btn-group pull-right">
			<button class="btn btn-default btn-sm reload"><i class="fa fa-refresh"></i></button>
			<button class="btn btn-default btn-sm" data-toggle="modal" data-target="#modal-cari"><i class="fa fa-search"></i></button>
		</div>
		<div class="clearfix"></div>
	</div>
	<div class="panel-body table-responsive table-full">
		@if(!empty($surats))
		<table class="table table-stripped table-hover table-bordered">
			<thead>
				<tr>
					<th class="text-center">NO. URUT</th>
					<th>NO. SURAT</th>
					<th>PENGAJU</th>
					<th class="text-center">JURUSAN</th>
					<th>ASAL SEKOLAH</th>
					<th class="text-center">TANGGAL PENGAJUAN</th>
					<th class="text-center">TANGGAL VERIFIKASI</th>
					<th class="text-center">AKSI</th>
				</tr>
			</thead>
			<tbody>
				<?php $no = 0; ?>
				@foreach($surats as $surat)
				<tr>
					<td class="text-center">{{ ++$no }}</td>
					<td>{{ $surat->no_surat }}</td>
					<td><a href="{{ site_url('penduduk/detail/'. $surat->nik) }}">{{ $surat->penduduk->nama }}</a></td>
					<td class="text-center">{{ $surat->jurusan }}</td>
					<td>{{ $surat->asal_sekolah }}</td>
					<td class="text-center">{{date('d-m-Y', strtotime($surat->created_at))}}</td>
					<td class="text-center">{{date('d-m-Y', strtotime($surat->tanggal_verif))}}</td>
					<td>
						<a href="{{ site_url('sktm_sekolah/kembalikan/'.$surat->id) }}" class="btn btn-default btn-xs" onclick="return confirm('Anda yakin?')"><i class="fa fa-upload"></i> kembalikan</a>
						<a href="{{ site_url('sktm_sekolah/hapus/'.$surat->id) }}" class="btn btn-default btn-xs" onclick="return confirm('Data anda akan benar-benar hilang. Anda yakin?')"><i class="fa fa-trash"></i> hapus</a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		@else
		<br>
		<p class="text-center">Tidak ada data surat</p>
		@endif
	</div>
	<div class="panel-footer"><span class="text-grey">last edited by admin 12/02/2017 08:50</span></div>
</div>
@endsection

@section('modal')
<div class="modal fade" tabindex="-1" role="dialog" id="modal-cari">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Filter Pencarian</h4>
			</div>
			<div class="modal-body">
				<form action="#">
					<div class="row">
						<div class="col-xs-12- col-md-6">
							<div class="form-group">
								<label for="">Nomor Surat</label>
								<input type="text" class="form-control" name="no_surat" placeholder="nomor surat" />
							</div>
						</div>
						<div class="col-xs-12- col-md-6">
							<div class="form-group">
								<label for="">Nama Pengaju</label>
								<input type="text" class="form-control" name="nik" placeholder="NIK/Nama" />
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12- col-md-6">
							<div class="form-group">
								<label for="">Tanggal Pengajuan</label>
								<input type="date" class="form-control" name="tgl_pengajuan" placeholder="tanggal pengajuan" />
							</div>
						</div>
						<div class="col-xs-12- col-md-6">
							<div class="form-group">
								<label for="">Tanggal Verifikasi</label>
								<input type="date" class="form-control" name="tgl_verifikasi" placeholder="tanggal verifikasi" />
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="">Urutkan</label>
						<select name="order" class="form-control">
							<option value="0">Nomor Surat ASC</option>
							<option value="1">Nomor Surat DESC</option>
							<option value="2">Pengaju ASC</option>
							<option value="3">Pengaju DESC</option>
							<option value="4">Tanggal Pengajuan ASC</option>
							<option value="5">Tanggal Pengajuan DESC</option>
							<option value="6">Tanggal Verifikasi ASC</option>
							<option value="7">Tanggal Verifikasi DESC</option>
						</select>
					</div>
					<div class="form-group">
						<button class="btn btn-primary"><i class="fa fa-search"></i> filter</button>
						<button class="btn btn-default" type="refresh"><i class="fa fa-refresh"></i> bersihkan</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection

@section('style')
<style>
	.label{display:block; width: 100%; padding: 5px 0;}
	/*BARU DARISINI*/
	td, th{
		vertical-align: middle!important;
		font-size: 10pt;
	}
</style>
@endsection
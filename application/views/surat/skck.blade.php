@layout('_layout/dashboard/index')
@section('title')Surat Keterangan Catatan Kepolisian@endsection
@section('nama-kelurahan')Lumajang@endsection

@section('content')
<div class="panel panel-theme">
	<div class="panel-heading">
		<h3 class="panel-title pull-left">Surat Keterangan Catatan Kepolisian (SKCK)</h3>
		<div class="btn-group pull-right">
		<!-- BARU DARISINI -->
			<button class="btn btn-default btn-sm" data-toggle="modal" data-target="#modal-konfirmasi">
				@if($unconfirmeds !== 0)
				<span class="badge space-right-10">
					@if($unconfirmeds < 10)
					{{ '0'.$unconfirmeds }}
					@else
					{{ $unconfirmeds }}
					@endif
				</span>
				@endif
				<i class="fa fa-bell"></i>
			</button>
			<!-- SAMPAI SINI -->
			<button class="btn btn-default btn-sm" data-toggle="modal" data-target="#modal-tambah"><i class="fa fa-plus"></i></button>
			<button class="btn btn-default btn-sm reload"><i class="fa fa-refresh"></i></button>
			<button class="btn btn-default btn-sm" data-toggle="modal" data-target="#modal-cari"><i class="fa fa-search"></i></button>
			<a href="#" class="btn btn-default btn-sm"><i class="fa fa-archive"></i></a>
		</div>
		<div class="clearfix"></div>
	</div>
	<div class="panel-body table-responsive table-full">
		@if(!empty($skcks))
		<table class="table table-stripped table-hover table-bordered">
			<thead>
				<tr>
					<th class="text-center">NO. URUT</th>
					<th>NO. SURAT</th>
					<th>PENGAJU</th>
					<th class="text-center">TANGGAL PENGAJUAN</th>
					<th class="text-center">TANGGAL VERIFIKASI</th>
					<th class="text-center">AKSI</th>
				</tr>
			</thead>
			<tbody>
				<?php $no = 0; ?>
				@foreach($skcks as $skck)
				<tr>
					<td class="text-center">{{ ++$no }}</td>
					<td>{{ $skck->no_surat }}</td>
					<td><a href="{{ site_url('penduduk/detail/'. $skck->nik) }}">{{ $skck->penduduk->nama }}</a></td>
					<td class="text-center">{{date('d-m-Y', strtotime($skck->created_at))}}</td>
					<td class="text-center">{{date('d-m-Y', strtotime($skck->tanggal_verif))}}</td>
					<td>
						<a href="#" class="btn btn-default btn-xs"><i class="fa fa-info"></i> detail</a>
						<a href="#" class="btn btn-default btn-xs" onclick="return confirm('Anda yakin?')"><i class="fa fa-archive"></i> arsipkan</a>
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
<div class="modal fade" tabindex="-1" role="dialog" id="modal-tambah">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Tambah Data</h4>
			</div>
			<div class="modal-body">
				<form action="{{ site_url('surat/simpan/1') }}" method="POST">
				{{ $csrf }}
					<div class="form-group">
						<label for="no_surat">Nomor Surat</label>
						<?php echo form_error('no_surat'); ?>
						<input type="number" class="form-control" name="no_surat" placeholder="nomor surat" min="1" required autocomplete="off" />
					</div>
					<div class="form-group">
						<label for="nik">NIK / NAMA</label>
						<?php echo form_error('nik'); ?>
						<input list="nik" class="form-control" placeholder="NIK/NAMA" / autocomplete="off" name="nik" required>
						<datalist id="nik">
						</datalist>
					</div>
					<div class="form-group">
						<button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> tambah</button>
						<button class="btn btn-default" type="refresh"><i class="fa fa-refresh"></i> bersihkan</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
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

<!-- BARU DISINI -->
<div class="modal fade" tabindex="-1" role="dialog" id="modal-konfirmasi">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Konfirmasi Pengajuan</h4>
			</div>
			<div class="modal-body table-responsive table-full">
				@if(empty($skcks))
				<br>
				<p class="text-center">Tidak ada pengajuan</p>
				@else
				<table class="table table-bordered table-striped table-hover">
					<thead>
						<tr>
							<td class="text-center">No. Pengajuan</td>
							<td class="text-center">NIK Pengaju</td>
							<td>Nama Pengaju</td>
							<td class="text-center">Tanggal Pengajuan</td>
							<td class="text-center">Konfirmasi</td>
						</tr>
					</thead>
					<tbody>
						@foreach($skcks as $skck)
						@if($skck->status == '0')
						<tr>
							<td class="text-center">{{ $skck->id }}</td>
							<td class="text-center">{{ $skck->nik }}</td>
							<td>{{ $skck->penduduk->nama }}</td>
							<td class="text-center">{{date('d-m-Y', strtotime($skck->created_at))}}</td>
							<td class="text-center">
								<a href="{{ site_url('surat/setuju/1/'.$skck->id) }}" class="btn btn-sm btn-success"><i class="fa fa-check space-right-5"></i>setuju</a>
								<a class="btn btn-sm btn-danger" href="{{ site_url('surat/tolak/1/'.$skck->id) }}"><i class="fa fa-times space-right-5"></i>tolak</a>
							</td>
						</tr>
						@endif
						@endforeach
					</tbody>
				</table>
				@endif
			</div>
			<div class="modal-footer"></div>
		</div>
	</div>
</div>
<!-- SAMPAI SINI -->
@endsection

@section('style')
<style>
	.label{display:block; width: 100%; padding: 5px 0;}
	.badge{font-weight: 300; border-radius: 3px; font-size: 7pt; padding: 3px; background-color: #D9534F!important}
</style>
@endsection

@section('javascript')
<script type="text/javascript">
	$(document).ready(function(){
		getKepNik();
	});

	function getKepNik() {
		$.getJSON('{{ site_url() }}'+'penduduk/ambil_nama_nik', function (result) {
			$("#nik").empty();
			if (result) {
				for (var i = 0; i < result.length; i++) {
					var penduduk= result[i];
					$("#nik").append("<option value='"+penduduk.nik + " | " + penduduk.nama+"'");
				}
			}
		});
	}
</script>
@endsection
@layout('_layout/dashboard/index')
@section('title')Manajemen Keluarga@endsection
@section('nama-kelurahan')Lumajang@endsection

@section('content')
<div class="row">
	<div class="col-xs-12">
		<div class="panel panel-theme">
			<div class="panel-heading">
				<h3 class="panel-title pull-left">Data Keluarga</h3>
				<div class="btn-group pull-right">
					<button class="btn btn-xs btn-default" data-toggle="modal" data-target="#modal-tambah"><i class="fa fa-plus"></i></button>
					<button class="btn btn-xs btn-default" data-toggle="modal" data-target="#modal-filter"><i class="fa fa-search"></i></button>
					<a href="{{ site_url('keluarga/refresh') }}" class="btn btn-xs btn-default reload"><i class="fa fa-refresh"></i></a>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="panel-body table-responsive table-full">
				<table class="table table-bordered table-stripped table-hover">
					<thead>
						<tr>
							<th>
								<a href="{{ site_url('keluarga/urut/no') }}" class="btn btn-{{ $order_by === 'no' ? 'primary' : 'default' }} btn-xs">NOMOR KK</a>
								<a href="{{ $order_by === 'no' ? site_url('keluarga/urut/' . $order_by . '/' . $order_type) : '#' }}" class="btn btn-{{ $order_by === 'no' ? 'primary' : 'default' }} btn-xs"><i class="fa fa-sort"></i></a>
							</th>
							<th>
								<a href="{{ site_url('keluarga/urut/nik') }}" class="btn btn-{{ $order_by === 'nik' ? 'primary' : 'default' }} btn-xs">KEPALA KELUARGA</a>
								<a href="{{ $order_by === 'nik' ? site_url('keluarga/urut/' . $order_by . '/' . $order_type) : '#' }}" class="btn btn-{{ $order_by === 'nik' ? 'primary' : 'default' }} btn-xs"><i class="fa fa-sort"></i></a>
							</th>
							<th>ALAMAT</th>
							<th class="text-center">
								<a href="{{ site_url('keluarga/urut/rt') }}" class="btn btn-{{ $order_by === 'rt' ? 'primary' : 'default' }} btn-xs">RT</a>
								<a href="{{ $order_by === 'rt' ? site_url('keluarga/urut/' . $order_by . '/' . $order_type) : '#' }}" class="btn btn-{{ $order_by === 'rt' ? 'primary' : 'default' }} btn-xs"><i class="fa fa-sort"></i></a>
							</th>
							<th class="text-center">
								<a href="{{ site_url('keluarga/urut/rw') }}" class="btn btn-{{ $order_by === 'rw' ? 'primary' : 'default' }} btn-xs">RW</a>
								<a href="{{ $order_by === 'rw' ? site_url('keluarga/urut/' . $order_by . '/' . $order_type) : '#' }}" class="btn btn-{{ $order_by === 'rw' ? 'primary' : 'default' }} btn-xs"><i class="fa fa-sort"></i></a>
							</th>
							<th class="text-center">
								aksi
							</th>
						</tr>
					</thead>
					<tbody>
						<?php $i=0; ?>
						@foreach($keluargas as $keluarga)
						<tr>
							<td>{{ $keluarga->no }}</td>
							<td>{{ $keluarga->penduduk->nama }}</td>
							<td>{{ $keluarga->alamat }}</td>
							<td class="text-center">{{ $keluarga->rt }}</td>
							<td class="text-center">{{ $keluarga->rw }}</td>
							<td class="text-center">
								<a href="{{base_url('keluarga/detail/'.$keluarga->no)}}" class="btn btn-default btn-xs"><i class="fa fa-ellipsis-h"></i></a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
			<div class="panel-footer">
				<span class="text-grey">last edited by admin 12-12-2017 08:30</span>
				<nav aria-label="Page navigation" class="pull-right">
					<ul class="pagination pagination-sm" style="margin:0">
						@if(isset($pagination))
							{{ $pagination }}
						@endif
					</ul>
				</nav>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('modal')
<!-- modal tambah -->
<div class="modal fade" tabindex="-1" role="dialog" id="modal-filter">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Filter Pencarian</h4>
			</div>
			<div class="modal-body">
				<form action="{{ site_url('keluarga/search') }}" method="POST">
					{{ $csrf }}
					<div class="form-group">
						<label for="">Nomor KK</label>
						<input type="text" class="form-control" name="no" placeholder="Masukkan Nomor KK">
					</div>
					<div class="form-group">
						<label for="">Kepala Keluarga</label>
						<input type="text" class="form-control"name="nik" placeholder="Masukkan Kepala Keluarga">
					</div>
					<div class="form-group">
						<label for="">RT / RW</label>
						<div class="input-group">
							<input type="text" class="form-control" name="rt" placeholder="RT">
							<span class="input-group-addon">/</span>
							<input type="text" class="form-control" name="rw" placeholder="RW">
						</div>
					</div>
					<div class="form-group break-top-20">
						<button class="btn btn-primary" type="submit"><i class="fa fa-search"></i> Cari</button>
						<button class="btn btn-default" type="reset"><i class="fa fa-refresh"></i> bersihkan</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- modal Tambah -->
<div class="modal fade" tabindex="-1" role="dialog" id="modal-tambah">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Tambah Keluarga</h4>
			</div>
			<div class="modal-body">
				<form action="{{ site_url('keluarga/simpan') }}" method="POST">
					<div class="form-group">
						<label for="no">Nomor KK</label>
						<input type="text" class="form-control" name="no" placeholder="masukkan nomor KK">
					</div>
					<div class="form-group">
						<label for="nik">Kepala Keluarga</label>
						<input list="kepala_keluarga" class="form-control" name="nik" placeholder="masukkan nama atau NIK" autocomplete="off">
						<datalist id="kepala_keluarga">
						</datalist>
					</div>
					<div class="form-group">
						<label for="alamat">Alamat</label>
						<textarea name="alamat" class="form-control" placeholder="masukkan alamat keluarga"></textarea>
					</div>
					<div class="form-group">
						<label for="rt/rw">RT / RW</label>
						<div class="input-group">
							<input type="text" class="form-control" name="rt" placeholder="RT">
							<span class="input-group-addon">/</span>
							<input type="text" class="form-control" name="rw" placeholder="RW">
						</div>
					</div>
					<div class="form-group">
						<label for="kode_pos">Kode Pos</label>
						<input type="text" class="form-control" name="kode_pos" placeholder="masukkan kodepos">
					</div>
					<div class="form-group break-top-20">
						<button class="btn btn-primary" type="submit"><i class="fa fa-plus"></i> Tambah</button>
						<button class="btn btn-default" type="reset"><i class="fa fa-refresh"></i> bersihkan</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection

@section('style')
<style>
	.panel-footer > span{
		line-height: 35px;
	}
</style>
@endsection
@section('javascript')
<script type="text/javascript">
	$(document).ready(function(){
		getKepNik();
	});

	function getKepNik() {
		$.getJSON('{{ site_url() }}'+'keluarga/ambil_kep_nik', function (result) {
			$("#kepala_keluarga").empty();
			if (result) {
				for (var i = 0; i < result.length; i++) {
					var penduduk= result[i];
					$("#kepala_keluarga").append("<option value='"+penduduk.nik + " | " + penduduk.nama+"'");
				}
			}
		});
	}
</script>
@endsection
@layout('_layout/dashboard/index')
@section('title')Pengumuman@endsection
@section('nama-kelurahan')Lumajang@endsection

@section('content')
<div class="row">
	<div class="col-xs-12">
		<div class="panel panel-theme">
			<div class="panel-heading">
				<h3 class="panel-title pull-left">Pengumuman</h3>
				<div class="btn-group pull-right">
					<button class="btn btn-xs btn-default" data-toggle="modal" data-target="#modal-tambah"><i class="fa fa-plus"></i></button>
					<button class="btn btn-xs btn-default reload"><i class="fa fa-refresh"></i></button>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="panel-body table-responsive table-full">
				<table class="table table-hover table-striped table-bordered">
					@if(!$pengumumans)
					<tr>
						<td class="text-center">Tidak ada data pengumuman</td>
					</tr>
					@else
					<thead>
						<tr>
							<th class="text-center">No</th>
							<th>Pengumuman</th>
							<th class="text-center">Batas Tampil</th>
							<th class="text-center">Status</th>
							<th class="text-center">Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php $i=0; ?>
						@foreach($pengumumans as $pengumuman)
						<tr>
							<td class="text-center">{{++$i}}</td>
							<td>
								<h4>{{ $pengumuman->nama }}</h4>
								<p>{{ potong_teks(strip_tags($pengumuman->isi), 105) }}</p>
							</td>
							<td class="text-center">{{ (is_null($pengumuman->tanggal_kadaluarsa)) ? '-' : date('d/m/Y', strtotime($pengumuman->tanggal_kadaluarsa)) }}</td>
							<td class="text-center"><span class="label label-{{ ($pengumuman->status == '0') ? 'success' : 'danger' }}">{{ ($pengumuman->status == '0') ? 'aktif' : 'non-aktif' }}</span></td>
							<td class="text-center text-nowrap">
								<a href="{{ ($pengumuman->status == '0') ? site_url('pengumuman/nonaktifkan/'.$pengumuman->slug) : site_url('pengumuman/aktifkan/'.$pengumuman->slug) }}" class="btn btn-xs btn-default" title="{{ ($pengumuman->status == '0') ? 'non-aktifkan' : 'aktifkan' }}"><i class="fa fa-power-off text-{{ ($pengumuman->status == '0') ? 'red' : 'green' }}"></i></a>
								<a href="#" class="btn btn-xs btn-default" title="sunting"><i class="fa fa-pencil"></i></a>
								<a href="{{ site_url('pengumuman/hapus/'.$pengumuman->slug) }}" class="btn btn-xs btn-default" title="hapus" onclick="return confirm('Anda yakin?')"><i class="fa fa-trash"></i></a>
							</td>
						</tr>
						@endforeach
					</tbody>
					@endif
				</table>
			</div>
			<div class="panel-footer">
				<nav aria-label="...">
					<ul class="pager">
						<li class="previous"><a href="#"><span aria-hidden="true">&larr;</span> Baru</a></li>
						<li class="next"><a href="#">Lama <span aria-hidden="true">&rarr;</span></a></li>
					</ul>
				</nav>
			</div>
		</div>
	</div>
</div>
@endsection

@section('modal')
<div class="modal fade" tabindex="-1" role="dialog" id="modal-tambah">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Pengumuman</h4>
			</div>
			<div class="modal-body">
				<form action="{{ site_url('pengumuman/simpan') }}" method="POST">
				{{ $csrf }}
					<div class="form-group">
						<label for="nama">Judul Pengumuman</label>
						{{ form_error('nama') }}
						<input type="text" class="form-control" name="nama" placeholder="judul pengumuman" value="{{ (isset($peng['nama'])) ? $peng['nama'] : '' }}" required />
					</div>
					<div class="form-group">
						<label for="isi">Isi Pengumuman</label>
						{{ form_error('isi') }}
						<textarea class="form-control" name="isi" placeholder="isi pengumuman" required>{{ (isset($peng['isi'])) ? $peng['isi'] : '' }}</textarea>
					</div>
					<div class="form-group">
						<label for="tanggal_kadaluarsa">Batas tampil*</label>
						<input type="date" class="form-control" name="tanggal_kadaluarsa" placeholder="batas tampil" / value="{{ (isset($peng['tanggal_kadaluarsa'])) ? $peng['tanggal_kadaluarsa'] : '' }}">
						<p class="help-block">* kosongi jika tak ada batas waktu tampil</p>
					</div>
					<div class="form-group">
						<button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> simpan</button>
						<button class="btn btn-warning" type="reset"><i class="fa fa-refresh"></i> bersihkan</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection

@section('style')
<style>
	th, td{
		vertical-align: middle!important;
	}
	.label{
		display: block;
		width: 100%;
	}
	.pager{
		margin-top: 0;
		margin-bottom: 0;
	}
</style>
@endsection
@layout('_layout/dashboard/index')
@section('title')Info Kelurahan@endsection
@section('nama-kelurahan')Lumajang@endsection

@section('content')
<div class="row">
	<div class="col-xs-12">
		<div class="panel panel-theme">
			<div class="panel-heading">
				<h3 class="panel-title pull-left">Halaman Info</h3>
				<div class="btn-group pull-right">
					<a href="{{ site_url('info/tambah') }}" class="btn btn-xs btn-default"><i class="fa fa-plus"></i></a>
					<button class="btn btn-xs btn-default reload"><i class="fa fa-refresh"></i></button>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="panel-body table-responsive table-full">
				<table class="table table-hover table-striped table-bordered">
					<thead>
						<tr>
							<th class="text-center text-nowrap" width="3%">Urutkan</th>
							<th class="text-center">No</th>
							<th>Judul Halaman</th>
							<th class="text-center">Penulis</th>
							<th class="text-center">Tanggal Buat</th>
							<th class="text-center">Status</th>
							<th class="text-center">Aksi</th>
						</tr>
					</thead>
					<tbody>
						@if(!$infos)
						<tr>
							<td class="text-center" colspan="7">Tidak ada data info</td>
						</tr>
						@else
						<form action="{{ site_url('info/update_pos') }}" method="POST">
						{{ $csrf }}
							<?php $i=0; ?>
							@foreach($infos as $info)
							<tr>
								<td class="text-center">
									<button value="{{$info->id.':'.'0'.':'.$info->pos }}" name="pos" class="btn btn-xs btn-xxs btn-default"><i class="fa fa-caret-up"></i></button>
									<button value="{{$info->id.':'.'1'.':'.$info->pos }}" name="pos" class="btn btn-xs btn-xxs btn-default"><i class="fa fa-caret-down"></i></button>
								</td>
								<td class="text-center">{{++$i}}</td>
								<td>{{ potong_teks($info->judul, 47) }}</td>
								<td class="text-center">{{ $info->akun->username }}</td>
								<td class="text-center">{{ date('Y/m/d', strtotime($info->created_at)) }}</td>
								<td class="text-center"><span class="label label-{{ (is_null($info->deleted_at)) ? 'success' : 'danger' }}">{{ (is_null($info->deleted_at)) ? 'aktif' : 'non-aktif' }}</span></td>
								<td class="text-center">
									<a href="{{ site_url('info/selengkapnya/'.$info->slug) }}" class="btn btn-xs btn-default" title="selengkapnya"><i class="fa fa-ellipsis-h"></i></a>
									<a href="{{site_url('info/sunting/'.$info->slug) }}" class="btn btn-xs btn-default" title="sunting"><i class="fa fa-pencil"></i></a>
									<a href="{{ site_url('info/hapus/'.$info->slug) }}" class="btn btn-xs btn-default" title="hapus" onclick="return confirm('Anda yakin?')"><i class="fa fa-trash"></i></a>
									<a href="{{ (is_null($info->deleted_at)) ? site_url('info/nonaktifkan/'.$info->slug) : site_url('info/aktifkan/'.$info->slug) }}" class="btn btn-xs btn-{{ (is_null($info->deleted_at)) ? 'danger' : 'success' }}" title="{{ (is_null($info->deleted_at)) ? 'non-aktifkan' : 'aktifkan' }}"><i class="fa fa-power-off"></i></a>
								</td>
							</tr>
							@endforeach
						</form>
						@endif
					</tbody>
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

@section('style')
<style>
	.label{
		display: block;
		width: 100%;
		padding: 8px;
	}

	.btn-xxs{
		padding: 0 5px;
	}
	.pager{
		margin-top: 0;
		margin-bottom: 0;
	}
</style>
@endsection
@layout('_layout/dashboard/index')
@section('title')Arsip Data Pindah@endsection
@section('nama-kelurahan')Lumajang@endsection

@section('content')
<div class="row">
	<div class="col-xs-12">
		<div class="panel panel-theme">
			<div class="panel-heading">
				<h3 class="panel-title pull-left">Data Pindahan</h3>
				<div class="btn-group btn-group-sm pull-right">
					<a href="{{site_url('ui/pindah')}}" class="btn btn-default"><i class="fa fa-arrow-left"></i></a>
					<button class="btn btn-default reload" type="button"><i class="fa fa-refresh"></i></button>
				</div>
				<form action="#" class="pull-right space-right-10">
					<div class="input-group input-group-sm">
						<input type="text" class="form-control" name="cari" placeholder="masukkan kata kunci">
						<span class="input-group-btn">
							<button class="btn btn-default"><i class="fa fa-search"></i></button>
						</span>
					</div>
				</form>
				<div class="clearfix"></div>
			</div>
			<div class="panel-body table-responsive table-full">
				@if(!empty($mutasi_keluars))
				<table class="table table-stripped table-hover table-bordered">
					<thead>
						<tr>
							<th>No</th>
							<th>Nama Pengaju</th>
							<th class="text-center">Tanggal Pengajuan</th>
							<th width="10%">Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php $i=0;?>
						@foreach($mutasi_keluars as $mutasi)
						<tr>
							<td>{{ ++$i }}</td>
							<td><a href="{{ site_url('penduduk/detail/'.$mutasi->nik) }}">{{ $mutasi->penduduk->nama }}</a></td>
							<td class="text-center">{{date('d-m-Y', strtotime($mutasi->created_at))}}</td>
							<td width="30%">
								<a href="#" class="btn btn-primary btn-xs"><i class="fa fa-info"></i> detail</a>
								<a href="{{ site_url('pindah/kembalikan/'. $mutasi->id) }}" class="btn btn-success btn-xs"><i class="fa fa-refresh"></i> Kembalikan</a>
								<a href="#" class="btn btn-danger btn-xs" onclick="return confirm('Anda yakin? Aksi ini tidak dapat diurungkan.')"><i class="fa fa-archive"></i> Hapus</a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
				@else
				<br>
				<p class="text-center">Tidak ada data pindah</p>
				@endif
			</div>
			<div class="panel-footer">
				<span class="text-grey">last edited by admin 12-12-2017 08:30</span>
				<nav aria-label="Page navigation" class="pull-right">
					<ul class="pagination pagination-sm" style="margin:0">
						<li>
							<a href="#" aria-label="Previous">
								<span aria-hidden="true">&laquo;</span>
							</a>
						</li>
						<li><a href="#">1</a></li>
						<li><a href="#">2</a></li>
						<li><a href="#">3</a></li>
						<li><a href="#">4</a></li>
						<li><a href="#">5</a></li>
						<li>
							<a href="#" aria-label="Next">
								<span aria-hidden="true">&raquo;</span>
							</a>
						</li>
					</ul>
				</nav>
				<div class="clearfix"></div>
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

	.table tr > td:first-child,
	.table tr > th:first-child{
		text-align: center;
	}
</style>
@endsection
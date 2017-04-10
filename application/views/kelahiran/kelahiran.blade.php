@layout('_layout/dashboard/index')
@section('title')Surat Keterangan Kelahiran@endsection
@section('nama-kelurahan')Lumajang@endsection

@section('content')
<div class="row">
	<div class="col-xs-12">
		<div class="panel panel-theme">
			<div class="panel-heading">
				<h3 class="panel-title pull-left">Data Keterangan Kelahiran</h3>
				<div class="btn-group btn-group-sm pull-right">
					<a href="{{ site_url('kelahiran/tambah') }}" class="btn btn-default"><i class="fa fa-plus"></i></a>
					<a href="{{ site_url('kelahiran/arsip') }}" class="btn btn-default"><i class="fa fa-archive"></i></a>
					<a href="{{ site_url('kelahiran/refresh') }}" class="btn btn-default reload" type="button"><i class="fa fa-refresh"></i></a>
				</div>
				<form action="{{ site_url('kelahiran/search') }}" class="pull-right space-right-10" method="POST">
					<div class="input-group input-group-sm">
                        {{ $csrf }}
                        <input list="nik" type="text" class="form-control" name="nik" placeholder="Masukkan NIK / Nama Pengaju" autocomplete="off">
						<datalist id="nik">
                            @if($mutasi_keluar_search)
                                @foreach($mutasi_keluar_search as $mutasi)
                                    <option value="{{ $mutasi->nik }} | {{ $mutasi->penduduk->nama }}">
                                @endforeach
                            @endif
						</datalist>
						<span class="input-group-btn">
							<button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
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
									<a href="{{ site_url('kelahiran/detail/'.$mutasi->id) }}" class="btn btn-primary btn-xs"><i class="fa fa-info"></i> Detail</a>
									<a href="{{ site_url('kelahiran/arsipkan/'. $mutasi->id) }}" class="btn btn-warning btn-xs" onclick="return confirm('Anda yakin?')"><i class="fa fa-archive"></i> Arsipkan</a>
									<a href="{{ site_url('kelahiran/pratinjau/'.$mutasi->id) }}" class="btn btn-success btn-xs"><i class="fa fa-file-pdf-o"></i> Cetak Surat</a>
								</td>
							</tr>
							@endforeach
						@else
							<br>
							<p class="text-center">Tidak ada data kelahiran</p>
						@endif
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
@layout('_layout/dashboard/index')
@section('title')Konfirmasi Kelurahan@endsection
@section('nama-kelurahan')Lumajang@endsection

@section('content')
<div class="row">
	<div class="col-xs-12">
		<div class="panel panel-theme">
			<div class="panel-heading">
				<h3 class="panel-title pull-left">Pengajuan Data Kelurahan Baru</h3>
				<div class="btn-group pull-right">
					<button class="btn btn-default btn-xs" data-toggle="modal" data-target="#modal"><i class="fa fa-plus"></i></button>
					<button class="btn btn-default btn-xs reload"><i class="fa fa-refresh"></i></button>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="panel-body table-responsive table-full">
				<table class="table table-hover table-stripped table-bordered">
					<thead>
						<tr>
							<td>#</td>
							<td>Nama Kelurahan</td>
							<td class="text-center">Waktu Pengajuan</td>
							<td class="text-center">Waktu Konfirmasi</td>
							<td class="text-center" width="15%">Status Verifikasi</td>
							<td width="15%" class="text-center">Aksi</td>
						</tr>
					</thead>
					<tbody>
						@for($i=1;$i <= 4;$i++)
						<tr>
							<td width="10%">{{str_pad($i,2,'0',STR_PAD_LEFT)}}</td>
							<td>Kelurahan-{{$i}}</td>
							<td class="text-center">{{date('d-M-Y')}}</td>
							<td class="text-center">-</td>
							<td class="text-center" width="15%"><span class="label label-warning">menunggu</span></td>
							<td width="15%" class="text-center">
								<a href="#" class="btn btn-xs btn-success" onclick="return confirm('Anda yakin?')"><i class="fa fa-check"></i></a>
								<a href="#" class="btn btn-xs btn-danger" onclick="return confirm('Anda yakin?')"><i class="fa fa-close"></i></a>
							</td>
						</tr>
						@endfor
						<tr>
							<td width="10%">{{str_pad($i,2,'0',STR_PAD_LEFT)}}</td>
							<td>Kelurahan-{{$i++}}</td>
							<td class="text-center">{{date('d-M-Y')}}</td>
							<td class="text-center">{{date('d-M-Y')}}</td>
							<td class="text-center" width="15%"><span class="label label-success">disetujui</span></td>
							<td width="15%" class="text-center">
								<a href="#" class="btn btn-xs btn-danger btn-block" onclick="return confirm('Anda yakin?')"><i class="fa fa-close"></i> batalkan</a>
							</td>
						</tr>
						<tr>
							<td width="10%">{{str_pad($i,2,'0',STR_PAD_LEFT)}}</td>
							<td>Kelurahan-{{$i}}</td>
							<td class="text-center">{{date('d-M-Y')}}</td>
							<td class="text-center">{{date('d-M-Y')}}</td>
							<td class="text-center" width="15%"><span class="label label-danger">ditolak</span></td>
							<td width="15%" class="text-center">
								<a href="#" class="btn btn-xs btn-success btn-block" onclick="return confirm('Anda yakin?')"><i class="fa fa-check"></i> setujui</a>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="panel-footer">
				<span class="text-grey">last edited by admin 12-01-2017 17:05</span>
			</div>
		</div>
	</div>
</div>
@endsection

@section('style')
<style>
	.label{display: block;width: 100%}
</style>
@endsection
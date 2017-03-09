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
					<a href="#" class="btn btn-xs btn-default"><i class="fa fa-plus"></i></a>
					<button class="btn btn-xs btn-default reload"><i class="fa fa-refresh"></i></button>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="panel-body table-responsive table-full">
				<table class="table table-hover table-striped table-bordered">
					<thead>
						<tr>
							<th class="text-center">No</th>
							<th>Judul Halaman</th>
							<th class="text-center">Penulis</th>
							<th class="text-center">Tanggal Buat</th>
							<th class="text-center">Status</th>
							<th class="text-center">Aksi</th>
						</tr>
					</thead>
					<tbody>
						@for($i=1; $i <= 4; $i++)
						<tr>
							<td class="text-center">{{$i}}</td>
							<td>Lorem ipsum dolor sit amet.</td>
							<td class="text-center">Admin</td>
							<td class="text-center">12/12/2012</td>
							<td class="text-center"><span class="label label-success">aktif</span></td>
							<td class="text-center">
								<a href="#" class="btn btn-xs btn-default" title="selengkapnya"><i class="fa fa-ellipsis-h"></i></a>
								<a href="#" class="btn btn-xs btn-default" title="sunting"><i class="fa fa-pencil"></i></a>
								<a href="#" class="btn btn-xs btn-default" title="sunting" onclick="return confirm('Anda yakin?')"><i class="fa fa-trash"></i></a>
								<a href="#" class="btn btn-xs btn-danger" title="non-aktifkan"><i class="fa fa-power-off"></i></a>
							</td>
						</tr>
						@endfor
					</tbody>
				</table>
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
</style>
@endsection
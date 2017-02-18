@layout('_layout/dashboard/index')
@section('title')UI List@endsection
@section('nama-kelurahan')Lumajang@endsection

@section('content')
<div class="row">
	<div class="col-xs-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<span class="panel-title">DAFTAR UI</span>
			</div>
			<div class="panel-body table-responsive table-full">
				<table class="table table-bordered table-stripped table-hover">
					<thead>
						<tr>
							<td width="7%">#</td>
							<td>Judul</td>
							<td>Deskripsi</td>
							<td>Folder</td>
							<td class="text-center">Status</td>
							<td>Lokasi</td>
						</tr>
					</thead>
					<tbody>
						<!-- DIVIDER -->
						<?php $no = 1 ?>
						<tr>
							<td>{{str_pad($no++,2,'0',STR_PAD_LEFT)}}</td>
							<td>Index UI</td>
							<td>Halaman daftar UI</td>
							<td>/</td>
							<td class="text-center"><i class="fa fa-circle text-green"></i></td>
							<td width="10%">
								<a href="{{base_url('ui')}}" class="btn btn-default btn-xs btn-block"><i class="fa fa-link"></i></a>
							</td>
						</tr>
						<!-- END DIVIDER -->
						<!-- DIVIDER -->
						<tr>
							<td>{{str_pad($no++,2,'0',STR_PAD_LEFT)}}</td>
							<td>Sign in</td>
							<td>Halaman masuk user</td>
							<td>auth</td>
							<td class="text-center"><i class="fa fa-circle text-green"></i></td>
							<td width="10%">
								<a href="{{base_url('ui/signin')}}" class="btn btn-default btn-xs btn-block"><i class="fa fa-link"></i></a>
							</td>
						</tr>
						<!-- END DIVIDER -->
						<!-- DIVIDER -->
						<tr>
							<td>{{str_pad($no++,2,'0',STR_PAD_LEFT)}}</td>
							<td>Manajemen Kelurahan</td>
							<td>Halaman untuk memanajemen data kelurahan</td>
							<td>kelurahan</td>
							<td class="text-center"><i class="fa fa-circle text-green"></i></td>
							<td width="10%">
								<a href="{{base_url('ui/kelurahan')}}" class="btn btn-default btn-xs btn-block"><i class="fa fa-link"></i></a>
							</td>
						</tr>
						<!-- END DIVIDER -->
						<!-- DIVIDER -->
						<tr>
							<td>{{str_pad($no++,2,'0',STR_PAD_LEFT)}}</td>
							<td>Manajemen Akun Kelurahan</td>
							<td>Halaman untuk memanajemen akun kelurahan</td>
							<td>kelurahan</td>
							<td class="text-center"><i class="fa fa-circle text-red"></i></td>
							<td width="10%">
								<a href="{{base_url('ui/kelurahan')}}" class="btn btn-default btn-xs btn-block"><i class="fa fa-link"></i></a>
							</td>
						</tr>
						<!-- END DIVIDER -->
					</tbody>
				</table>
			</div>
			<div class="panel-footer"></div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-xs-12">
		<div class="panel">
			<div class="panel-heading">
				<h3 class="panel-title">CATATAN FRONT-END</h3>
			</div>
			<div class="panel-body table-responsive">
				<?php $no = 1 ?>
				<table class="table table-stripped">
					<tr>
						<td>{{str_pad($no++,2,'0',STR_PAD_LEFT)}}</td>
						<td>Form Create &amp Edit akan berupa modal apabila data sedikit</td>
						<td></td>
					</tr>
					<tr>
						<td>{{str_pad($no++,2,'0',STR_PAD_LEFT)}}</td>
						<td>Tombol edit sudah berfungsi untuk mengisi data pada form yang berupa modal (bukan form isian beda halaman)</td>
						<td></td>
					</tr>
					<tr>
						<td>{{str_pad($no++,2,'0',STR_PAD_LEFT)}}</td>
						<td>Tombol refresh/reload halaman sudah berfungsi.</td>
						<td></td>
					</tr>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection
@section('style')
<style>
	.table tr > td:first-child,
	.table tr > td:last-child{
		text-align: center;
	}
</style>
@endsection
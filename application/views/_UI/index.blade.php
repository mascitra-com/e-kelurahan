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
							<td width="10%">
								<a href="{{base_url('ui/signin')}}" class="btn btn-default btn-xs btn-block"><i class="fa fa-link"></i></a>
							</td>
						</tr>
						<!-- END DIVIDER -->
					</tbody>
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
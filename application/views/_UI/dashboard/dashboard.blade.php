@layout('_layout/dashboard/index')
@section('title')Dashboard@endsection
@section('nama-kelurahan')Lumajang@endsection

@section('content')
<!-- WIDGET -->
<div class="row">
	<div class="col-xs-6 col-md-3">
		<div class="panel panel-default panel-widget">
			<div class="panel-body">
				<h4>Menunggu</h4>
				<div class="break-5">100 Pengajuan</div>
			</div>
		</div>
	</div>
	<div class="col-xs-6 col-md-3">
		<div class="panel panel-default panel-widget">
			<div class="panel-body">
				<h4>Disetujui</h4>
				<div class="break-5">100 Pengajuan</div>
			</div>
		</div>
	</div>
	<div class="col-xs-6 col-md-3">
		<div class="panel panel-default panel-widget">
			<div class="panel-body">
				<h4>Diambil</h4>
				<div class="break-5">100 Pengajuan</div>
			</div>
		</div>
	</div>
	<div class="col-xs-6 col-md-3">
		<div class="panel panel-default panel-widget">
			<div class="panel-body">
				<h4>Ditolak</h4>
				<div class="break-5">100 Pengajuan</div>
			</div>
		</div>
	</div>
</div>
<!-- END WIDGET -->
<!-- CHART -->
<div class="row">
	<div class="col-xs-12">
		<div class="panel">
			<div class="panel-heading">
				<h3 class="panel-title">Insight</h3>
			</div>
			<div class="panel-body">
				<img src="http://1.bp.blogspot.com/-sq0BKUK1Zdo/UHMa583FkiI/AAAAAAAADOw/LsQZ97i2dq4/s1600/22.png" width="100%" alt="">
			</div>
		</div>
	</div>
</div>
<!-- END CHART -->
<!-- NOTIFIKASI -->
<div class="row">
	<div class="col-xs-12">
		<div class="panel">
			<div class="panel-heading">
				<h3 class="panel-title">Notifikasi Pengajuan Surat</h3>
			</div>
			<div class="panel-body">
				<ul class="nav nav-tabs nav-justified">
					<li role="presentation" class="active"><a href="#surat-0" data-toggle="tab">Surat Umum</a></li>
					<li role="presentation"><a href="#surat-1" data-toggle="tab">Surat 1</a></li>
					<li role="presentation"><a href="#surat-2" data-toggle="tab">Surat 2</a></li>
					<li role="presentation"><a href="#surat-3" data-toggle="tab">Surat 3</a></li>
					<li role="presentation"><a href="#surat-4" data-toggle="tab">Surat 4</a></li>
				</ul>
				<div class="tab-content">
					<!-- SURAT UMUM -->
					<div role="tabpanel" class="tab-pane fade in active table-responsive table-full" id="surat-0">
						<table class="table table-striped table-hover">
							<thead>
								<tr>
									<th class="text-center">No. Pengajuan</th>
									<th class="text-center">NIK</th>
									<th>Nama</th>
									<th class="text-center">Tanggal Pengajuan</th>
									<th class="text-center">Aksi</th>
								</tr>
							</thead>
							<tbody>
								@for($i=1; $i < 4; $i++)
								<tr>
									<td class="text-center">000{{$i}}</td>
									<td class="text-center">123456</td>
									<td>Ainul Yaqin</td>
									<td class="text-center">02/02/2017</td>
									<td class="text-center">
										<button class="btn btn-success btn-xs">setujui</button>
										<button class="btn btn-danger btn-xs">tolak</button>
									</td>
								</tr>
								@endfor
							</tbody>
						</table>
					</div>
					<!-- END SURAT UMUM -->
					<div role="tabpanel" class="tab-pane fade" id="surat-1">Surat coming soon</div>
					<div role="tabpanel" class="tab-pane fade" id="surat-2">Surat coming soon</div>
					<div role="tabpanel" class="tab-pane fade" id="surat-3">Surat coming soon</div>
					<div role="tabpanel" class="tab-pane fade" id="surat-4">Surat coming soon</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- END NOTIFIKASI -->
@endsection
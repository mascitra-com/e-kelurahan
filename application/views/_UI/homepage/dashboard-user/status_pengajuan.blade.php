@layout('_layout/dashboard-user/index')
@section('title')Status Pengajuan@endsection

@section('content')
<div class="row">
	<div class="col-xs-12">
		<div class="panel">
			<div class="panel-heading">
				<h3 class="panel-title">Status Pengajuan</h3>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-xs-12 col-sm-3">
						<ul class="nav nav-pills nav-stacked">
							<li role="presentation" class="active"><a href="#tab-1" data-toggle="tab">Surat Blanko KTP</a></li>
							<li role="presentation"><a href="#tab-2" data-toggle="tab">Surat Keterangan Catatan Kepolisian</a></li>
							<li role="presentation"><a href="#tab-3" data-toggle="tab">Surat Keterangan Tidak Mampu</a></li>
							<li role="presentation"><a href="#tab-4" data-toggle="tab">Surat Keterngan Miskin</a></li>
						</ul>
					</div>
					<div class="col-xs-12 col-sm-9">
						<div class="tab-content">
							<div role="tabpanel" class="tab-pane table active" id="tab-1">
								<table class="table table-hover table-stripped table-bordered">
									<thead>
										<tr>
											<th>NIK</th>
											<th>NAMA</th>
											<th>TANGGAL PENGAJUAN</th>
											<th class="text-center">STATUS</th>
											<th>AKSI</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>122410101086</td>
											<td>Ainul Yakin</td>
											<td>kamis, 12 februari 2017</td>
											<td class="text-center"><div class="label label-success">disetujui</div></td>
											<td>-</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('style')
<style>
	th, .label{
		font-weight: 500;
	}

	td{
		font-weight: 300;
	}
</style>
@endsection
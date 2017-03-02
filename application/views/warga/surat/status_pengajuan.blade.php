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
										@foreach($blankos as $blanko)
										<tr>
											<td>{{ $blanko->nik }}</td>
											<td>{{ $blanko->penduduk->nama }}</td>
											<td>{{ mdate('%l, %d %F %Y', strtotime(str_replace('-', '/', $blanko->created_at))) }}</td>
											<td class="text-center"><div class="label label-{{ ($blanko->status == '0') ? 'warning' : (($blanko->status == '1') ? 'success' : 'danger' ) }}">
												@if($blanko->status === '0')
												menunggu
												@elseif($blanko->status === '1' )
												disetujui
												@else
												ditolak
												@endif
											</div></td>
											<td>
												@if($blanko->status == '2')
												-
												@elseif($blanko->status == '1')
												<a href="#" class="btn btn-xs btn-block btn-info">Info</a>
												@else
												<a href="#" class="btn btn-xs btn-block btn-warning">Batalkan</a>
												@endif
											</td>
										</tr>
										@endforeach
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

	.label{
		display: block;
		width: 100%;
	}

	td{
		font-weight: 300;
	}
</style>
@endsection
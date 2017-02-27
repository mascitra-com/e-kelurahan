@layout('_layout/dashboard/index')
@section('title')Manajemen Kelurahan@endsection
@section('nama-kelurahan')Lumajang@endsection

@section('content')
<div class="row">
	<div class="col-xs-12">
		<div class="panel panel-theme">
			<div class="panel-heading">
				<h3 class="panel-title pull-left">Data Kelurahan</h3>
				<div class="btn-group pull-right">
					<button class="btn btn-default btn-xs reload"><i class="fa fa-refresh"></i></button>
					<button class="btn btn-default btn-xs"><i class="fa fa-bars"></i></button>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="panel-body table-responsive table-full">
				<table class="table table-hover table-stripped table-bordered">
					<thead>
						<tr>
							<td>No</td>
							<td>Nama Kelurahan</td>
							<td>Username</td>
							<td class="text-center" width="15%">Status</td>
							<td width="15%">Aksi</td>
						</tr>
					</thead>
					<tbody>
						<?php $i=0; ?>
						<?php $arr=0; ?>
						@if($kelurahans)
						@foreach($kelurahans as $kelurahan)
						<tr>
							<td width="10%">{{str_pad(++$i,2,'0',STR_PAD_LEFT)}}</td>
							<td>Kelurahan {{ $kelurahan->nama }}</td>
							<td>{{$kelurahan->akuns[$arr]->username}}</td>
							<td class="text-center" width="15%"><span class="label label-<?php if($kelurahan->akuns[$arr]->active === '1'){echo 'primary';}else{echo 'danger';}?>">@if($kelurahan->akuns[$arr]->active === '1')aktif @else non-aktif @endif</span></td>
							<td width="15%">
								@if($kelurahan->akuns[$arr]->active === '1')
								<a href="{{ site_url('kelurahan/nonaktifkan/'.$kelurahan->akuns[$arr]->id_organisasi) }}" class="btn btn-xs btn-default" onclick="return confirm('non-aktifkan kelurahan ini?')">
									<i class="fa fa-power-off text-red"></i>
								</a>
								@else
								<a href="{{ site_url('kelurahan/aktifkan/'.$kelurahan->akuns[$arr]->id_organisasi) }}" class="btn btn-xs btn-default" onclick="return confirm('aktifkan kelurahan ini?')">
									<i class="fa fa-power-off text-primary"></i>
								</a>
								@endif
							</td>
						</tr>
						@endforeach
						@endif
					</tbody>
				</table>
			</div>
			<div class="panel-footer">
				<span class="text-grey">last edited by admin 12-01-2017 17:05</span>
			</div>
		</div>
	</div>
</div>
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
							<td>No</td>
							<td>Nama Kelurahan</td>
							<td class="text-center" width="15%">Status Verifikasi</td>
							<td width="15%">Aksi</td>
						</tr>
					</thead>
					<tbody>
                        @if($kelurahan_verifs)
						<?php $i=0; ?>
						@foreach($kelurahan_verifs as $kelurahan)
						<tr>
							<td width="10%">{{str_pad(++$i,2,'0',STR_PAD_LEFT)}}</td>
							<td>Kelurahan {{ $kelurahan->nama }}</td>
							<td class="text-center" width="15%"><span class="label label-<?php if($kelurahan->status === '0'){ echo'warning';}else{echo 'danger';}
								?>">@if($kelurahan->status === '0')menunggu @else ditolak @endif</span></td>
                            <td width="15%">
                                <button href="#" class="btn btn-xs btn-default btn-edit" data-id="{{ $kelurahan->id }}" data-nama="{{ $kelurahan->nama }}"><i class="fa fa-pencil"></i></button>
                                <a href="{{ site_url('kelurahan/batal/'.$kelurahan->slug) }}" class="btn btn-xs btn-default" onclick="return confirm('Batalkan pengajuan ini?')"><i class="fa fa-close text-red"></i></a>
                            </td>
                        </tr>
                        @endforeach
                        @endif
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

	@section('modal')
	<div class="modal fade" tabindex="-1" role="dialog" id="modal">
		<div class="modal-dialog modal-sm" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Tambah Kelurahan</h4>
				</div>
				<form action="{{ site_url('kelurahan/simpan') }}" method="POST" class="form">
					<div class="modal-body">
						<div class="form-group">
						<label for="id">id</label>
							<input type="text" name="id" class="form-control" placeholder="id" readonly>
						</div>
						<div class="form-group">
							<label for="nama">nama kelurahan</label>
							{{ form_error('nama') }}
							<div class="input-group">
								<span class="input-group-addon">Kelurahan</span>
								<input type="text" name="nama" class="form-control" placeholder="nama kelurahan">
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button class="btn btn-primary" type="submit">tambah</button>
						<button class="btn btn-default" type="reset" data-dismiss="modal" aria-label="Close">batal</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	@endsection

	@section('style')
	<style>
		thead > tr > td:first-child,
		thead > tr > td:last-child,
		tbody > tr > td:first-child,
		tbody > tr > td:last-child{
			text-align: center;
		}
		.label{
			display: block;
			width: 100%;
			padding-top: 5px;
			padding-bottom: 5px;
		}
	</style>
	@endsection

	@section('javascript')
	<script>
		$(".btn-edit").click(function(){
			$("#modal .form input[name='id']").val($(this).data('id'));
			$("#modal .form input[name='nama']").val($(this).data('nama'));
			$("#modal .form").attr("action", "{{site_url('kelurahan/ubah')}}");
			$("#modal").modal('show');
		});

		$('#modal').on('hidden.bs.modal', function (e) {
			$("#modal .form").attr("action", "{{site_url('kelurahan/simpan')}}").trigger("reset");
		});
	</script>
	@endsection
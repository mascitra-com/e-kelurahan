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
					<button class="btn btn-default btn-xs" data-toggle="modal" data-target="#modal"><i class="fa fa-plus"></i></button>
					<button class="btn btn-default btn-xs reload"><i class="fa fa-refresh"></i></button>
					<button class="btn btn-default btn-xs"><i class="fa fa-bars"></i></button>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="panel-body table-responsive table-full">
				<table class="table table-hover table-stripped table-bordered">
					<thead>
						<tr>
							<td>#</td>
							<td>Nama Kelurahan</td>
							<td class="text-center" width="15%">Status Verifikasi</td>
							<td width="15%">Aksi</td>
						</tr>
					</thead>
					<tbody>
						@for($i=1;$i <= 5;$i++)
						<tr>
							<td width="10%">{{str_pad($i,2,'0',STR_PAD_LEFT)}}</td>
							<td>Kelurahan-{{$i}}</td>
							<td class="text-center" width="15%"><span class="label label-success">disetujui</span></td>
							<td width="15%">
								<button href="#" class="btn btn-xs btn-default btn-edit" data-id="{{$i}}" data-nama="kelurahan-{{$i}}"><i class="fa fa-pencil"></i></button>
								<a href="#" class="btn btn-xs btn-default"><i class="fa fa-trash" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')"></i></a>
							</td>
						</tr>
						@endfor
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
			<form action="tambah" class="form">
				<div class="modal-body">
					<div class="form-group">
						<label for="">id</label>
						<input type="text" name="id" class="form-control" placeholder="id" readonly>
					</div>
					<div class="form-group">
						<label for="">nama kelurahan</label>
						<input type="text" name="nama" class="form-control" placeholder="nama kelurahan">
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
</style>
@endsection

@section('javascript')
<script>
	$(".btn-edit").click(function(){
		$(".form input[name='id']").val($(this).data('id'));
		$(".form input[name='nama']").val($(this).data('nama'));
		$(".form").attr("action", "{{site_url('edit')}}");
		$("#modal").modal('show');
	});

	$('#modal').on('hidden.bs.modal', function (e) {
  		$(".form").attr("action", "{{site_url('tambah')}}").trigger("reset");
	});
</script>
@endsection
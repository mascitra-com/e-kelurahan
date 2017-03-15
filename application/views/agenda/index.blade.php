@layout('_layout/dashboard/index')
@section('title')Agenda@endsection
@section('nama-kelurahan')Lumajang@endsection

@section('content')
<div class="row">
	<div class="col-xs-12">
		<div class="panel panel-theme">
			<div class="panel-heading">
				<h3 class="panel-title pull-left">Agenda</h3>
				<div class="btn-group pull-right">
					<button class="btn btn-default btn-xs" data-toggle="modal" data-target="#modal-tambah"><i class="fa fa-plus"></i></button>
					<button class="btn btn-default btn-xs" data-toggle="modal" data-target="#modal-filter"><i class="fa fa-filter"></i></button>
					<button class="btn btn-default btn-xs reload"><i class="fa fa-refresh"></i></button>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="panel-body table-responsive table-full">
				<table class="table table-hover table-bordered table-striped">
					<thead>
						<tr>
							<th class="text-center" width="10%">Tanggal</th>
							<th>Agenda</th>
							<th class="text-center" width="10%">Aksi</th>
						</tr>
					</thead>
					<tbody>
                    @if($agenda)
						@foreach($agenda as $list)
						<tr>
							<td class="text-center">
								<h1>{{ date('d', strtotime($list->tanggal_agenda)) }}</h1>
								<span>{{ ucfirst(date('M', strtotime($list->tanggal_agenda))) }}</span>
							</td>
							<td>{{ $list->perihal }}</td>
							<td class="text-center text-nowrap">
								<button class="btn btn-default btn-xs btn-edit" data-id="{{ $list->id }}" data-tanggal_agenda="{{ $list->tanggal_agenda }}" data-perihal="{{ $list->perihal }}"><i class="fa fa-pencil"></i></button>
								<a href="{{ site_url('agenda/hapus/'.$list->id) }}" class="btn btn-default btn-xs"><i class="fa fa-trash"></i></a>
							</td>
						</tr>
						@endforeach
                    @endif
					</tbody>
				</table>
			</div>
			<div class="panel-footer">
				<nav aria-label="...">
					<ul class="pager">
					<li class="previous"><a href="#"><span aria-hidden="true">&larr;</span> Baru</a></li>
						<li class="next"><a href="#">Lama <span aria-hidden="true">&rarr;</span></a></li>
					</ul>
				</nav>
			</div>
		</div>
	</div>
</div>
@endsection

@section('modal')
<div class="modal fade" tabindex="-1" role="dialog" id="modal-tambah">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Tambah Agenda</h4>
			</div>
			<div class="modal-body">
				<form action="{{ site_url('agenda/simpan') }}" method="POST" id="form">
					{{ $csrf }}
					<div class="form-group">
						<label for="">Tanggal Agenda</label>
						<input type="date" class="form-control" name="tanggal_agenda" placeholder="Tanggal Agenda" />
					</div>
					<div class="form-group">
						<label for="">Perihal</label>
						<textarea class="form-control" name="perihal" placeholder="Perihal Agenda"></textarea>
					</div>
					<div class="form-group">
						<button class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
						<button class="btn btn-warning" type="reset"><i class="fa fa-refresh"></i> Bersihkan</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" tabindex="-1" role="dialog" id="modal-filter">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Filter agenda</h4>
			</div>
			<div class="modal-body">
				<form action="#">
					<div class="form-group">
						<label for="">Tanggal agenda</label>
						<div class="input-group">
							<input type="date" class="form-control" name="tanggal[min]" placeholder="dari">
							<div class="input-group-addon"> - </div>
							<input type="date" class="form-control" name="tanggal[max]" placeholder="sampai">
						</div>
					</div>
					<div class="form-group">
						<label for="">Urutkan berdasar</label>
						<select class="form-control">
							<option value="0" selected>terbaru</option>
							<option value="0">terlama</option>
						</select>
					</div>
					<div class="form-group">
						<button class="btn btn-primary"><i class="fa fa-filter"></i> filter</button>
						<button class="btn btn-warning" type="reset"><i class="fa fa-refresh"></i> bersihkan</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection

@section('style')
<style>
	td, th{
		vertical-align: middle!important;
	}
</style>
@endsection

@section('javascript')
	<script>
        $(".btn-edit").click(function(){
            $("#modal-tambah #form input[name='tanggal_agenda']").val($(this).data('tanggal_agenda'));
            $("#modal-tambah #form textarea[name='perihal']").val($(this).data('perihal'));
            $("#modal-tambah #form").attr("action", "{{site_url('agenda/ubah/')}}"+$(this).data('id'));
            $("#modal-tambah").modal('show');
        });

        $('#modal-tambah').on('hidden.bs.modal', function (e) {
            $("#modal-tambah #form").attr("action", "{{site_url('agenda/simpan')}}").trigger("reset");
        });
	</script>
@endsection
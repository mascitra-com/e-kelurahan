@layout('_layout/dashboard/index')
@section('title')Regulasi@endsection
@section('nama-kelurahan')Lumajang@endsection

@section('content')
<div class="row">
	<div class="col-xs-12">
		<div class="panel panel-theme">
			<div class="panel-heading">
				<h3 class="panel-title pull-left">Daftar Regulasi</h3>
				<div class="btn-group pull-right">
					<button class="btn btn-xs btn-default" data-toggle="modal" data-target="#modal-tambah"><i class="fa fa-plus"></i></button>
					<button class="btn btn-xs btn-default reload"><i class="fa fa-refresh"></i></button>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="panel-body table-responsive table-full">
				<table class="table table-hover table-striped table-bordered">
					<thead>
						<tr>
							<th class="text-center">No</th>
							<th>Deskripsi Regulasi</th>
							<th class="text-center">Tanggal dikeluarkan</th>
							<th class="text-center">Dikeluarkan Oleh</th>
							<th class="text-center">Dokumen</th>
							<th class="text-center">Aksi</th>
						</tr>
					</thead>
					<tbody>
                    @if($regulasi)
                        <?php $no = 1; ?>
						@foreach($regulasi as $list)
						<tr>
							<td class="text-center">{{$no++}}</td>
							<td>
								<h4>{{ $list->judul }}</h4>
								<p>{{ $list->deskripsi }}</p>
							</td>
							<td class="text-center">{{ date('Y/m/d', strtotime($list->tgl_dikeluarkan)) }}</td>
							<td class="text-center">{{ $list->dikeluarkan_oleh }}</td>
							<td class="text-center">
								<a href="{{ base_url('assets/regulasi/'.$list->link) }}" class="btn btn-primary btn-xs btn-block"><i class="fa fa-download"></i> Unduh</a>
							</td>
							<td class="text-center text-nowrap">
								<button class="btn btn-xs btn-default btn-edit" data-id="{{ $list->id }}" data-judul = "{{ $list->judul }}" data-deskripsi = "{{ $list->deskripsi }}" data-tgl_dikeluarkan="{{ date('Y-m-d', strtotime($list->tgl_dikeluarkan)) }}" data-dikeluarkan_oleh = "{{ $list->dikeluarkan_oleh }}"><i class="fa fa-pencil"></i></button>
								<a href="{{ site_url('regulasi/hapus/'.$list->id) }}" class="btn btn-xs btn-default"><i class="fa fa-trash"></i></a>
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
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Tambah Regulasi</h4>
			</div>
			<div class="modal-body">
				<form action="{{ site_url('regulasi/simpan') }}" enctype="multipart/form-data" method="POST" id="form">
					{{ $csrf }}
					<div class="form-group">
						<label for="">Judul Regulasi</label>
						<input type="text" class="form-control" name="judul" placeholder="Judul Regulasi" required />
					</div>
					<div class="row">
						<div class="col-xs-12 col-md-6">
							<div class="form-group">
								<label for="">Dikeluarkan oleh</label>
								<input type="text" class="form-control" name="dikeluarkan_oleh" placeholder="Dikeluarkan Oleh" required/>
							</div>
						</div>
						<div class="col-xs-12 col-md-6">
							<div class="form-group">
								<label for="">Tanggal dikeluarkan</label>
								<input type="date" class="form-control" name="tgl_dikeluarkan" placeholder="Tanggal Dikeluarkan" />
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="">Deskripsi</label>
						<textarea class="form-control" name="deskripsi" placeholder="Deskripsi"></textarea>
					</div>
					<div class="form-group">
						<label for="">Unggah Dokumen</label>
						<input type="file" name="dokumen"/>
						<p class="help-block">ukuran maksimum 10MB</p>
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
@endsection

@section('style')
<style>
	th, td{
		vertical-align: middle!important;
	}
</style>
@endsection


@section('javascript')
<script>
	$(".btn-edit").click(function(){
		$("#modal-tambah #form input[name='judul']").val($(this).data('judul'));
		$("#modal-tambah #form textarea[name='deskripsi']").val($(this).data('deskripsi'));
		$("#modal-tambah #form input[name='tgl_dikeluarkan']").val($(this).data('tgl_dikeluarkan'));
		$("#modal-tambah #form input[name='dikeluarkan_oleh']").val($(this).data('dikeluarkan_oleh'));
		$("#modal-tambah #form").attr("action", "{{site_url('regulasi/ubah/')}}"+$(this).data('id'));
		$("#modal-tambah").modal('show');
	});

	$('#modal-tambah').on('hidden.bs.modal', function (e) {
		$("#modal-tambah #form").attr("action", "{{site_url('regulasi/simpan')}}").trigger("reset");
	});
</script>
@endsection
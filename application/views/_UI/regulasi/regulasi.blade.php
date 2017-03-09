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
							<th class="text-center">Dikeluarkan oleh</th>
							<th class="text-center">Dokumen</th>
							<th class="text-center">Aksi</th>
						</tr>
					</thead>
					<tbody>
						@for($i=1; $i < 5; $i++)
						<tr>
							<td class="text-center">0{{$i}}</td>
							<td>
								<h4>Judul Regulasi</h4>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias, corporis, eveniet. Nihil excepturi qui, illo?</p>
							</td>
							<td class="text-center">02/02/2017</td>
							<td class="text-center">Pemkab Lumajang</td>
							<td class="text-center">
								<a href="#" class="btn btn-primary btn-xs btn-block"><i class="fa fa-download"></i> unduh</a>
							</td>
							<td class="text-center text-nowrap">
								<button class="btn btn-xs btn-default"><i class="fa fa-pencil"></i></button>
								<button class="btn btn-xs btn-default"><i class="fa fa-trash"></i></button>
							</td>
						</tr>
						@endfor
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
				<form action="#" enctype="multipart/form-data">
					<div class="form-group">
						<label for="">Judul Regulasi</label>
						<input type="text" class="form-control" name="judul" placeholder="judul regulasi" required />
					</div>
					<div class="row">
						<div class="col-xs-12 col-md-6">
							<div class="form-group">
								<label for="">Dikeluarkan oleh</label>
								<input type="text" class="form-control" name="oleh" placeholder="dikeluarkan oleh" required/>
							</div>
						</div>
						<div class="col-xs-12 col-md-6">
							<div class="form-group">
								<label for="">Tanggal dikeluarkan</label>
								<input type="date" class="form-control" name="tanggal" placeholder="tanggal dikeluarkan" />
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="">Deskripsi</label>
						<textarea class="form-control" name="deskripsi" placeholder="deskripsi"></textarea>
					</div>
					<div class="form-group">
						<label for="">Unggah dokumen</label>
						<input type="file"/>
						<p class="help-block">ukuran maksimum 1MB</p>
					</div>
					<div class="form-group">
						<button class="btn btn-primary"><i class="fa fa-save"></i> simpan</button>
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
	th, td{
		vertical-align: middle!important;
	}
</style>
@endsection
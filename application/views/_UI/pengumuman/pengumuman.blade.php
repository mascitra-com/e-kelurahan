@layout('_layout/dashboard/index')
@section('title')Pengumuman@endsection
@section('nama-kelurahan')Lumajang@endsection

@section('content')
<div class="row">
	<div class="col-xs-12">
		<div class="panel panel-theme">
			<div class="panel-heading">
				<h3 class="panel-title pull-left">Pengumuman</h3>
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
							<th>Pengumuman</th>
							<th class="text-center">Batas Tampil</th>
							<th class="text-center">Status</th>
							<th class="text-center">Aksi</th>
						</tr>
					</thead>
					<tbody>
						@for($i=1; $i < 4; $i++)
						<tr>
							<td class="text-center">0{{$i}}</td>
							<td>
								<h4>Lorem ipsum dolor sit.</h4>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. At debitis, eos facere magni labore delectus.</p>
							</td>
							<td class="text-center">02/02/2012</td>
							<td class="text-center"><span class="label label-success">aktif</span></td>
							<td class="text-center text-nowrap">
								<a href="#" class="btn btn-xs btn-default" title="non-aktifkan"><i class="fa fa-power-off text-red"></i></a>
								<a href="#" class="btn btn-xs btn-default" title="sunting"><i class="fa fa-pencil"></i></a>
								<a href="#" class="btn btn-xs btn-default" title="hapus" onclick="return confirm('Anda yakin?')"><i class="fa fa-trash"></i></a>
							</td>
						</tr>
						@endfor
						<tr>
							<td class="text-center">0{{$i}}</td>
							<td>
								<h4>Lorem ipsum dolor sit.</h4>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. At debitis, eos facere magni labore delectus.</p>
							</td>
							<td class="text-center">02/02/2012</td>
							<td class="text-center"><span class="label label-danger">non-aktif</span></td>
							<td class="text-center text-nowrap">
								<a href="#" class="btn btn-xs btn-default" title="aktifkan"><i class="fa fa-power-off text-green"></i></a>
								<a href="#" class="btn btn-xs btn-default" title="sunting"><i class="fa fa-pencil"></i></a>
								<a href="#" class="btn btn-xs btn-default" title="hapus" onclick="return confirm('Anda yakin?')"><i class="fa fa-trash"></i></a>
							</td>
						</tr>
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
				<h4 class="modal-title">Pengumuman</h4>
			</div>
			<div class="modal-body">
				<form action="#">
					<div class="form-group">
						<label for="">Judul Pengumuman</label>
						<input type="text" class="form-control" name="judul" placeholder="judul pengumuman" required />
					</div>
					<div class="form-group">
						<label for="">Isi Pengumuman</label>
						<textarea class="form-control" name="isi" placeholder="isi pengumuman" required></textarea>
					</div>
					<div class="form-group">
						<label for="">Batas tampil*</label>
						<input type="date" class="form-control" name="batas" placeholder="batas tampil" />
						<p class="help-block">* kosongi jika tak ada batas waktu tampil</p>
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
	.label{
		display: block;
		width: 100%;
	}
	.pager{
		margin-top: 0;
		margin-bottom: 0;
	}
</style>
@endsection
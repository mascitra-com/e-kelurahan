@layout('_layout/dashboard/index')
@section('title')Galeri Foto@endsection
@section('nama-kelurahan')Lumajang@endsection

@section('content')
<div class="row">
	<div class="col-xs-12">
		<div class="panel">
			<div class="panel-heading">
				<h3 class="panel-title pull-left">Nama Album ABC</h3>
				<div class="btn-group pull-right">
					<button class="btn btn-sm btn-default" data-toggle="modal" data-target="#modal-tambah"><i class="fa fa-upload"></i> unggah foto</button>
					<button class="btn btn-sm btn-default"><i class="fa fa-refresh"></i> segarkan</button>
				</div>
				<div class="input-group input-group-sm input-search pull-right">
					<input type="text" class="form-control" placeholder="cari di album">
					<div class="input-group-btn">
						<button class="btn btn-default"><i class="fa fa-search"></i></button>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="panel-body">
				<div class="row">
					@for($i=0; $i < 12; $i++)
					<div class="col-xs-4 col-sm-4 col-md-2">
						<a href="#" class="thumbnail" data-toggle="modal" data-target="#modal-preview">
							<img src="{{base_url('assets/images/blank-avatar.png')}}" alt="...">
						</a>
					</div>
					@endfor
				</div>
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
<div class="modal fade" tabindex="-1" role="dialog" id="modal-preview">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<img src="{{base_url('assets/images/blank-avatar.png')}}" alt="image" width="100%">
			</div>
		</div>
	</div>
</div>
<div class="modal fade" tabindex="-1" role="dialog" id="modal-tambah">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Foto Album</h4>
			</div>
			<div class="modal-body">
				<form action="#">
					<div class="form-group">
						<label for="">Judul Foto</label>
						<input type="text" class="form-control" name="nama" placeholder="judul foto" />
					</div>
					<div class="form-group">
						<label for="">Unggah</label>
						<input type="file" name="foto" />
						<p class="help-block">Maksimal 1MB</p>
					</div>
					<div class="form-group">
						<button class="btn btn-primary"><i class="fa fa-save"></i> tambah</button>
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
	.input-search{
		width: 200px;
		margin-right: 5px;
	}
	.pager{
		margin: 0;
	}
	.thumbnail:hover{
		box-shadow: 0 1px 5px rgba(0,0,0,.2);
		transition: box-shadow 0.5s ease;
	}
</style>
@endsection
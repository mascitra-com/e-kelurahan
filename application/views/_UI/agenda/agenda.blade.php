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
					<button class="btn btn-default btn-xs reload"><i class="fa fa-refresh"></i></button>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="panel-body table-responsive table-full">
				<table class="table table-hover table-bordered table-striped">
					<thead>
						<tr>
							<th class="text-center">Tanggal</th>
							<th>Agenda</th>
							<th class="text-center">Aksi</th>
						</tr>
					</thead>
					<tbody>
						@for($i=5; $i > 0; $i--)
						<tr>
							<td class="text-center">
								<h1>0{{$i}}</h1>
								<span>feb</span>
							</td>
							<td>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ullam, eaque, cum. Expedita facere dolorum culpa! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nobis, at!</td>
							<td class="text-center text-nowrap">
								<a href="#" class="btn btn-default btn-xs"><i class="fa fa-pencil"></i></a>
								<a href="#" class="btn btn-default btn-xs"><i class="fa fa-trash"></i></a>
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
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Tambah Agenda</h4>
			</div>
			<div class="modal-body">
				<form action="#">
					<div class="form-group">
						<label for="">Tanggal Agenda</label>
						<input type="date" class="form-control" name="tanggal" placeholder="tanggal agenda" />
					</div>
					<div class="form-group">
						<label for="">Perihal</label>
						<textarea class="form-control" name="perihal" placeholder="perihal agenda"></textarea>
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
	td, th{
		vertical-align: middle!important;
	}
</style>
@endsection
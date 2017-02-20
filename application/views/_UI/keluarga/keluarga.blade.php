@layout('_layout/dashboard/index')
@section('title')Manajemen Keluarga@endsection
@section('nama-kelurahan')Lumajang@endsection

@section('content')
<div class="row">
	<div class="col-xs-12">
		<div class="panel panel-theme">
			<div class="panel-heading">
				<h3 class="panel-title pull-left">Data Keluarga</h3>
				<div class="btn-group pull-right">
					<button class="btn btn-xs btn-default" data-toggle="modal" data-target="#modal-tambah"><i class="fa fa-plus"></i></button>
					<button class="btn btn-xs btn-default" data-toggle="modal" data-target="#modal-filter"><i class="fa fa-search"></i></button>
					<button class="btn btn-xs btn-default reload"><i class="fa fa-refresh"></i></button>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="panel-body table-responsive table-full">
				<table class="table table-bordered table-stripped table-hover">
					<thead>
						<tr>
							<th>
								<a href="#" class="btn btn-default btn-xs">NOMOR KK</a>
								<a href="#" class="btn btn-default btn-xs"><i class="fa fa-sort"></i></a>
							</th>
							<th>
								<a href="#" class="btn btn-default btn-xs">KEPALA KELUARGA</a>
								<a href="#" class="btn btn-default btn-xs"><i class="fa fa-sort"></i></a>
							</th>
							<th>ALAMAT</th>
							<th class="text-center">
								<a href="#" class="btn btn-default btn-xs">RT</a>
								<a href="#" class="btn btn-default btn-xs"><i class="fa fa-sort"></i></a>
							</th>
							<th class="text-center">
								<a href="#" class="btn btn-default btn-xs">RW</a>
								<a href="#" class="btn btn-default btn-xs"><i class="fa fa-sort"></i></a>
							</th>
							<th class="text-center">
								aksi
							</th>
						</tr>
					</thead>
					<tbody>
						@for($i=0;$i < 5;$i++)
						<tr>
							<td>122410101086</td>
							<td>Mohammad Ainul Yaqin</td>
							<td>Lorem ipsum dolor sit amet, consectetur.</td>
							<td class="text-center">04</td>
							<td class="text-center">05</td>
							<td class="text-center">
								<a href="{{base_url('ui/kependudukan_detail')}}" class="btn btn-default btn-xs"><i class="fa fa-ellipsis-h"></i></a>
							</td>
						</tr>
						@endfor
					</tbody>
				</table>
			</div>
			<div class="panel-footer">
				<span class="text-grey">last edited by admin 12-12-2017 08:30</span>
				<nav aria-label="Page navigation" class="pull-right">
					<ul class="pagination pagination-sm" style="margin:0">
						<li>
							<a href="#" aria-label="Previous">
								<span aria-hidden="true">&laquo;</span>
							</a>
						</li>
						<li><a href="#">1</a></li>
						<li><a href="#">2</a></li>
						<li><a href="#">3</a></li>
						<li><a href="#">4</a></li>
						<li><a href="#">5</a></li>
						<li>
							<a href="#" aria-label="Next">
								<span aria-hidden="true">&raquo;</span>
							</a>
						</li>
					</ul>
				</nav>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('modal')
<!-- modal tambah -->
<div class="modal fade" tabindex="-1" role="dialog" id="modal-filter">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Filter Pencarian</h4>
			</div>
			<div class="modal-body">
				<form action="#">
					<div class="form-group">
						<label for="">Nomor KK</label>
						<input type="text" class="form-control" name="no_kk" placeholder="masukkan nomor KK">
					</div>
					<div class="form-group">
						<label for="">Kepala Keluarga</label>
						<input type="text" class="form-control"name="kepala_keluarga" placeholder="masukkan kepala keluarga">
					</div>
					<div class="form-group">
						<label for="">RT / RW</label>
						<div class="input-group">
							<input type="text" class="form-control" name="rt" placeholder="RT">
							<span class="input-group-addon">/</span>
							<input type="text" class="form-control" name="rw" placeholder="RW">
						</div>
					</div>
					<div class="form-group break-top-20">
						<button class="btn btn-primary" type="submit"><i class="fa fa-search"></i> Cari</button>
						<button class="btn btn-default" type="reset"><i class="fa fa-refresh"></i> bersihkan</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- modal Tambah -->
<div class="modal fade" tabindex="-1" role="dialog" id="modal-tambah">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Tambah Keluarga</h4>
			</div>
			<div class="modal-body">
				<form action="#">
					<div class="form-group">
						<label for="">Nomor KK</label>
						<input type="text" class="form-control" name="no_kk" placeholder="masukkna nomor KK">
					</div>
					<div class="form-group">
						<label for="">Kepala Keluarga</label>
						<input type="text" class="form-control"name="kepala_keluarga" placeholder="masukkan nama atau NIK">
					</div>
					<div class="form-group">
						<label for="">Alamat</label>
						<textarea name="alamat" class="form-control" placeholder="masukkan alamat keluarga"></textarea>
					</div>
					<div class="form-group">
						<label for="">RT / RW</label>
						<div class="input-group">
							<input type="text" class="form-control" name="rt" placeholder="RT">
							<span class="input-group-addon">/</span>
							<input type="text" class="form-control" name="rw" placeholder="RW">
						</div>
					</div>
					<div class="form-group">
						<label for="">Kode Pos</label>
						<input type="text" class="form-control" name="kodepos" placeholder="masukkan kodepos">
					</div>
					<div class="form-group break-top-20">
						<button class="btn btn-primary" type="submit"><i class="fa fa-plus"></i> Tambah</button>
						<button class="btn btn-default" type="reset"><i class="fa fa-refresh"></i> bersihkan</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection

@section('style')
<style>
	.panel-footer > span{
		line-height: 35px;
	}
</style>
@endsection
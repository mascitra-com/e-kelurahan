@layout('_layout/dashboard/index')
@section('title')Manajemen Kependudukan@endsection
@section('nama-kelurahan')Lumajang@endsection

@section('content')
<div class="row">
	<div class="col-xs-12">
		<div class="panel panel-theme">
			<div class="panel-heading">
				<h3 class="panel-title pull-left">Data Kependudukan</h3>
				<div class="btn-group pull-right">
					<a href="{{base_url('ui/kependudukan_create')}}" class="btn btn-xs btn-default"><i class="fa fa-plus"></i></a>
					<button class="btn btn-xs btn-default" data-toggle="modal" data-target="#modal"><i class="fa fa-search"></i></button>
					<button class="btn btn-xs btn-default reload"><i class="fa fa-refresh"></i></button>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="panel-body table-responsive table-full">
				<table class="table table-bordered table-stripped table-hover">
					<thead>
						<tr>
							<th>
								<a href="#" class="btn btn-default btn-xs">NIK</a>
								<a href="#" class="btn btn-default btn-xs"><i class="fa fa-sort"></i></a>
							</th>
							<th>
								<a href="#" class="btn btn-default btn-xs">Nama</a>
								<a href="#" class="btn btn-default btn-xs"><i class="fa fa-sort"></i></a>
							</th>
							<th>
								<a href="#" class="btn btn-default btn-xs">Jenis Kelamin</a>
								<a href="#" class="btn btn-default btn-xs"><i class="fa fa-sort"></i></a>
							</th>
							<th>
								<a href="#" class="btn btn-default btn-xs">Status Nikah</a>
								<a href="#" class="btn btn-default btn-xs"><i class="fa fa-sort"></i></a>
							</th>
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
							<td>Laki-laki</td>
							<td>Jomblo</td>
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
<div class="modal fade" tabindex="-1" role="dialog" id="modal">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Filter Pencarian</h4>
			</div>
			<div class="modal-body">
				<form action="#">
					<div class="row">
						<div class="col-xs-12 col-md-4">
							<div class="form-group">
								<label for="">NIK</label>
								<input type="text" class="form-control" name="nik" placeholder="masukkan nik">
							</div>
						</div>
						<div class="col-xs-12 col-md-8">
							<div class="form-group">
								<label for="">Nama</label>
								<input type="text" class="form-control" name="nama" placeholder="masukkan nama">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12 col-md-4">
							<div class="form-group">
								<label for="">Tempat Lahir</label>
								<input type="text" class="form-control" name="tempat_lahir" placeholder="tempat lahir">
							</div>
						</div>
						<div class="col-xs-12 col-md-4">
							<div class="form-group">
								<label for="">Tanggal Lahir</label>
								<input type="date" class="form-control" name="tanggal_lahir" placeholder="tanggal lahir">
							</div>
						</div>
						<div class="col-xs-12 col-md-4">
							<div class="form-group">
								<label for="">Jenis Kelamin</label>
								<select name="jenis_kelamin" class="form-control">
									<option value="" selected>Semua</option>
									<option value="0" selected>laki-laki</option>
									<option value="1">Perempuan</option>
								</select>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12 col-md-4">
							<div class="form-group">
								<label for="">Desa/Kelurahan</label>
								<select name="golongan_darah" class="form-control">
									<option value="" selected>Semua</option>
									<option value="Islam">Desa A</option>
								</select>
							</div>
						</div>
						<div class="col-xs-12 col-md-4">
							<div class="form-group">
								<label for="">RT/RW</label>
								<div class="input-group">
									<input type="text" class="form-control" name="rt" placeholder="RT">
									<span class="input-group-addon">/</span>
									<input type="text" class="form-control" name="rw" placeholder="RW">
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-md-4">
							<div class="form-group">
								<label for="">Kewarganegaraan</label>
								<input type="text" class="form-control" name="kewarganegaraan" placeholder="masukkan kewarganegaraan">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12 col-md-3">
							<div class="form-group">
								<label for="">Golongan Darah</label>
								<select name="golongan_darah" class="form-control">
									<option value="" selected>Semua</option>
									<option value="A" >A</option>
									<option value="B">B</option>
									<option value="AB">AB</option>
									<option value="O">O</option>
								</select>
							</div>
						</div>
						<div class="col-xs-12 col-md-3">
							<div class="form-group">
								<label for="">Agama</label>
								<select name="golongan_darah" class="form-control">
									<option value="" selected>Semua</option>
									<option value="Islam">Islam</option>
									<option value="Kristen">Kristen</option>
									<option value="Katholik">Katholik</option>
									<option value="Budha">Budha</option>
									<option value="Hindu">Hindu</option>
								</select>
							</div>
						</div>
						<div class="col-xs-12 col-md-3">
							<div class="form-group">
								<label for="">Pekerjaan</label>
								<select name="golongan_darah" class="form-control">
									<option value="" selected>Semua</option>
									<option value="">Pekerjaan</option>
								</select>
							</div>
						</div>
						<div class="col-xs-12 col-md-3">
							<div class="form-group">
								<label for="">Status Nikah</label>
								<select name="golongan_darah" class="form-control">
									<option value="" selected>Semua</option>
									<option value="0">Belum Menikah</option>
									<option value="1">Menikah</option>
									<option value="2">Janda</option>
									<option value="3">Duda</option>
								</select>
							</div>
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
@endsection

@section('style')
<style>
	.panel-footer > span{
		line-height: 35px;
	}
</style>
@endsection
@layout('_layout/dashboard/index')
@section('title')Blanko Isian KTP@endsection
@section('nama-kelurahan')Lumajang@endsection

@section('content')
<div class="panel panel-theme">
	<div class="panel-heading">
		<h3 class="panel-title pull-left">Blanko Isian KTP</h3>
		<div class="btn-group pull-right">
			<button class="btn btn-default btn-sm" data-toggle="modal" data-target="#modal-tambah"><i class="fa fa-plus"></i></button>
			<button class="btn btn-default btn-sm reload"><i class="fa fa-refresh"></i></button>
			<button class="btn btn-default btn-sm" data-toggle="modal" data-target="#modal-cari"><i class="fa fa-search"></i></button>
			<a href="#" class="btn btn-default btn-sm"><i class="fa fa-archive"></i></a>
		</div>
		<div class="clearfix"></div>
	</div>
	<div class="panel-body table-responsive table-full">
		<table class="table table-stripped table-hover table-bordered">
			<thead>
				<tr>
					<th class="text-center">NO. URUT</th>
					<th>NO. SURAT</th>
					<th>PENGAJU</th>
					<th class="text-center">TANGGAL PENGAJUAN</th>
					<th class="text-center">TANGGAL VERIFIKASI</th>
					<th class="text-center">AKSI</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td class="text-center">01</td>
					<td>23/18/02.002/2017</td>
					<td><a href="#">Mohammad Ainul Yakin</a></td>
					<td class="text-center">{{date('d-m-Y')}}</td>
					<td class="text-center">{{date('d-m-Y')}}</td>
					<td>
						<a href="#" class="btn btn-default btn-xs"><i class="fa fa-info"></i> detail</a>
						<a href="#" class="btn btn-default btn-xs" onclick="return confirm('Anda yakin?')"><i class="fa fa-archive"></i> arsipkan</a>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
	<div class="panel-footer"><span class="text-grey">last edited by admin 12/02/2017 08:50</span></div>
</div>
@endsection

@section('modal')
<div class="modal fade" tabindex="-1" role="dialog" id="modal-tambah">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Tambah Data</h4>
			</div>
			<div class="modal-body">
				<form action="#">
					<div class="form-group">
						<label for="">Nomor Surat</label>
						<input type="text" class="form-control" name="no_surat" placeholder="nomor surat" />
					</div>
					<div class="form-group">
						<label for="">NIK / NAMA</label>
						<input type="text" class="form-control" name="nik" placeholder="NIK/NAMA" />
					</div>
					<div class="form-group">
						<button class="btn btn-primary"><i class="fa fa-save"></i> tambah</button>
						<button class="btn btn-default" type="refresh"><i class="fa fa-refresh"></i> bersihkan</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" tabindex="-1" role="dialog" id="modal-cari">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Filter Pencarian</h4>
			</div>
			<div class="modal-body">
				<form action="#">
					<div class="row">
						<div class="col-xs-12- col-md-6">
							<div class="form-group">
								<label for="">Nomor Surat</label>
								<input type="text" class="form-control" name="no_surat" placeholder="nomor surat" />
							</div>
						</div>
						<div class="col-xs-12- col-md-6">
							<div class="form-group">
								<label for="">Nama Pengaju</label>
								<input type="text" class="form-control" name="nik" placeholder="NIK/Nama" />
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12- col-md-6">
							<div class="form-group">
								<label for="">Tanggal Pengajuan</label>
								<input type="date" class="form-control" name="tgl_pengajuan" placeholder="tanggal pengajuan" />
							</div>
						</div>
						<div class="col-xs-12- col-md-6">
							<div class="form-group">
								<label for="">Tanggal Verifikasi</label>
								<input type="date" class="form-control" name="tgl_verifikasi" placeholder="tanggal verifikasi" />
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="">Urutkan</label>
						<select name="order" class="form-control">
							<option value="0">Nomor Surat ASC</option>
							<option value="1">Nomor Surat DESC</option>
							<option value="2">Pengaju ASC</option>
							<option value="3">Pengaju DESC</option>
							<option value="4">Tanggal Pengajuan ASC</option>
							<option value="5">Tanggal Pengajuan DESC</option>
							<option value="6">Tanggal Verifikasi ASC</option>
							<option value="7">Tanggal Verifikasi DESC</option>
						</select>
					</div>
					<div class="form-group">
						<button class="btn btn-primary"><i class="fa fa-search"></i> filter</button>
						<button class="btn btn-default" type="refresh"><i class="fa fa-refresh"></i> bersihkan</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection

@section('style')
<style>
	.label{display:block; width: 100%; padding: 5px 0;}
</style>
@endsection
@layout('_layout/dashboard/index')
@section('title')Keterangan Ijin Usaha@endsection
@section('nama-kelurahan')Lumajang@endsection

@section('content')
<div class="panel panel-theme">
	<div class="panel-heading">
		<h3 class="panel-title pull-left">Keterangan Ijin Usaha</h3>
		<div class="btn-group pull-right">
			<button class="btn btn-default btn-sm" data-toggle="modal" data-target="#modal-konfirmasi">
				<span class="badge badge-sm space-right-10">04</span>
				<i class="fa fa-bell"></i>
			</button>
			<button class="btn btn-default btn-sm" data-toggle="modal" data-target="#modal-tambah"><i class="fa fa-plus"></i></button>
			<button class="btn btn-default btn-sm reload"><i class="fa fa-refresh"></i></button>
			<button class="btn btn-default btn-sm" data-toggle="modal" data-target="#modal-cari"><i class="fa fa-search"></i></button>
			<a href="#" class="btn btn-default btn-sm"><i class="fa fa-archive"></i></a>
		</div>
		<div class="clearfix"></div>
	</div>
	<div class="panel-body table-responsive table-full table-scroll">
		<table class="table table-stripped table-hover table-bordered">
			<thead>
				<tr>
					<th class="text-center">NO.</th>
					<th>NO. SURAT</th>
					<th>PENGAJU</th>
					<th>JENIS USAHA</th>
					<th>ALAMAT USAHA</th>
					<th class="text-center">TGL PENGAJUAN</th>
					<th class="text-center">TGL VERIFIKASI</th>
					<th class="text-center">TGL AMBIL</th>
					<th class="text-center">PENGAMBIL</th>
					<th class="text-center">STATUS</th>
					<th class="text-center">AKSI</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td class="text-center">01</td>
					<td>23/18/02.002/2017</td>
					<td><a href="#">Mohammad Ainul Yakin</a></td>
					<td>Toko baju</td>
					<td>Jember</td>
					<td class="text-center">{{date('d/m/Y')}}</td>
					<td class="text-center">{{date('d/m/Y')}}</td>
					<td class="text-center">-</td>
					<td class="text-center">-</td>
					<td class="text-center"><span class="label label-warning">menunggu</span></td>
					<td class="text-center text-nowrap">
						<a href="#" class="btn btn-success btn-xs" title="telah diambil" data-toggle="modal" data-target="#modal-ambil"><i class="fa fa-check"></i></a>
						<a href="#" class="btn btn-default btn-xs" title="selengkapnya"><i class="fa fa-info"></i></a>
						<a href="#" class="btn btn-default btn-xs" title="cetak"><i class="fa fa-print"></i></a>
						<a href="#" class="btn btn-default btn-xs" title="arsipkan" onclick="return confirm('Anda yakin?')"><i class="fa fa-archive"></i></a>
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
						<label for="">NIK / NAMA</label>
						<input type="text" class="form-control" name="nik" placeholder="NIK/NAMA" />
					</div>
					<div class="form-group">
						<label for="">Jenis Usaha</label>
						<input type="text" class="form-control" name="jenis_usaha" placeholder="jenis usaha" required/>
					</div>
					<div class="form-group">
						<label for="">Alamat Usaha</label>
						<textarea class="form-control" name="alamat" placeholder="alamat usaha" required></textarea>
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
<div class="modal fade" tabindex="-1" role="dialog" id="modal-konfirmasi">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Konfirmasi Pengajuan</h4>
			</div>
			<div class="modal-body table-responsive table-full">
				<table class="table table-bordered table-striped table-hover">
					<thead>
						<tr>
							<td class="text-center">No. Pengajuan</td>
							<td class="text-center">NIK Pengaju</td>
							<td>Nama Pengaju</td>
							<td class="text-center">Tanggal Pengajuan</td>
							<td class="text-center">Konfirmasi</td>
						</tr>
					</thead>
					<tbody>
						@for($i=0; $i < 4; $i++)
						<tr>
							<td class="text-center">00{{$i+1}}</td>
							<td class="text-center">122410101086</td>
							<td>Ainul Yaqin</td>
							<td class="text-center">{{date('d-m-Y')}}</td>
							<td class="text-center">
								<button class="btn btn-sm btn-success" data-konfirmasi="1" data-id="xxx"><i class="fa fa-check space-right-5"></i>setuju</button>
								<button class="btn btn-sm btn-danger" data-konfirmasi="2" data-id="xxx"><i class="fa fa-times space-right-5"></i>tolak</button>
							</td>
						</tr>
						@endfor
					</tbody>
				</table>
			</div>
			<div class="modal-footer"></div>
		</div>
	</div>
</div>
<div class="modal fade" tabindex="-1" role="dialog" id="modal-ambil">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Pengambilan Surat</h4>
			</div>
			<div class="modal-body">
				<form action="#" method="POST">
					<div class="form-group">
						<label for="">Nama Pengambil</label>
						<input type="text" class="form-control" name="nama" placeholder="nama pengambil" required/>
					</div>
					<div class="form-group">
						<label for="">Keterangan</label>
						<textarea class="form-control" name="keterangan" placeholder="keterangan"></textarea>
					</div>
					<div class="form-group">
						<label for="">Nomor Surat</label>
						<input type="text" class="form-control" name="no_surat" placeholder="nomor surat" />
					</div>
					<div class="form-group">
						<button class="btn btn-primary">simpan</button>
						<button class="btn btn-default" data-dismiss="modal">batal</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" tabindex="-1" role="dialog" id="modal-konfirmasi-dialog">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Alasan <span class="status"></span></h4>
			</div>
			<div class="modal-body">
				<form action="#" method="POST" id="form-konfirmasi">
					<div class="form-group">
						<label for="">Keterangan</label>
						<input type="hidden" name="id" value="">
						<input type="hidden" name="status" value="">
						<textarea class="form-control" name="keterangan" placeholder="keterangan"></textarea>
					</div>
					<div class="form-group">
						<button class="btn btn-primary">simpan</button>
						<button class="btn btn-default" data-dismiss="modal">batal</button>
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
	/*BARU DARISINI*/
	td, th{
		vertical-align: middle!important;
		font-size: 10pt;
	}
</style>
@endsection

@section('javascript')
<script>
	$(document).ready(function(){
		$("[data-konfirmasi]").click(function(){
			var status = ($(this).data('konfirmasi') == 1) ? 'Persetujuan' : 'Penolakan';
			$("#modal-konfirmasi-dialog .modal-title > .status").empty().html(status);
			$("#form-konfirmasi input[name='id']").val($(this).data('id'));
			$("#form-konfirmasi input[name='status']").val($(this).data('konfirmasi'));
			$("#modal-konfirmasi-dialog").modal('show');
		});
	});
</script>
@endsection
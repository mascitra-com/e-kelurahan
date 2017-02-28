@layout('_layout/dashboard/index')
@section('title')Detail Keluarga@endsection
@section('nama-kelurahan')Lumajang@endsection

@section('content')
<div class="row">
	<div class="col-xs-12">
		<div class="panel panel-theme">
			<div class="panel-heading">
				<h3 class="panel-title">Data Keluarga</h3>
			</div>
			<div class="panel-body">
				<form action="{{ site_url('keluarga/sunting/'.$keluarga->no) }}" method="POST">
				{{ $csrf }}
					<div class="row">
						<div class="col-xs-12 col-md-3">
							<div class="form-group">
								<label for="no">Nomor KK</label>
								<input type="text" class="form-control" name="no" placeholder="masukkan nomor KK" value="{{ $keluarga->no }}">
							</div>
						</div>
						<div class="col-xs-12 col-md-3">
							<div class="form-group">
								<label for="nik">Kepala Keluarga</label>
								<input list="kepala_keluarga" class="form-control" name="nik" placeholder="masukkan nama atau NIK" value="{{ $keluarga->penduduk->nik.' | '.$keluarga->penduduk->nama }}" autocomplete="off">
								<datalist id="kepala_keluarga">
									<option value="{{ $keluarga->penduduk->nik.' | '.$keluarga->penduduk->nama }}">
								</datalist>
							</div>
						</div>
						<div class="col-xs-12 col-md-3">
							<div class="form-group">
								<label for="rt/rw">RT / RW</label>
								<div class="input-group">
									<input type="text" class="form-control" name="rt" placeholder="RT" value="{{ $keluarga->rt }}">
									<span class="input-group-addon">/</span>
									<input type="text" class="form-control" name="rw" placeholder="RW" value="{{ $keluarga->rw }}">
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-md-3">
							<div class="form-group">
								<label for="kode_pos">Kode Pos</label>
								<input type="text" class="form-control" name="kodepos" placeholder="masukkan kodepos" value="{{ $keluarga->kode_pos }}">
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="alamat">Alamat</label>
						<textarea name="alamat" class="form-control" placeholder="masukkan alamat keluarga">{{ $keluarga->alamat }}</textarea>
					</div>
					<div class="form-group break-top-20">
						<button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> simpan</button>
						<button class="btn btn-default" type="reset"><i class="fa fa-refresh"></i> kembalikan</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-xs-12">
		<div class="panel panel-theme">
			<div class="panel-heading">
				<h3 class="panel-title pull-left">Data Anggota Keluarga</h3>
				<div class="btn-group pull-right">
					<button class="btn btn-default btn-xs" data-toggle="modal" data-target="#modal-tambah"><i class="fa fa-plus"></i></button>
					<button class="btn btn-default btn-xs reload"><i class="fa fa-refresh"></i></button>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="panel-body table-responsive table-full">
				<table class="table table-stripped table-hover table-bordered">
					<thead>
						<tr>
							<td>No Urut</td>
							<td>Nama Lengkap</td>
							<td>Status Hubungan Dalam Keluarga</td>
							<td>Pendidikan</td>
							<td>No. Pasport</td>
							<td>No. KITAP</td>
							<td>Ayah</td>
							<td>Ibu</td>
							<td>Aksi</td>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>01</td>
							<td><a href="#">Ainul Yaqin</a></td>
							<td>Kepala Keluarga</td>
							<td>S1/Strata 1</td>
							<td>-</td>
							<td>-</td>
							<td>Mulyadi</td>
							<td>Maimunah</td>
							<td>
								<!-- data dari foreach contoh-->
								<?php $a = array('nik'=>'123456', 'nama'=>'Ainul Yaqin'); ?>

								<button class="btn btn-default btn-xs btn-edit" data-detail='{{json_encode($a)}}'>
									<i class="fa fa-pencil"></i>
								</button>
								<a href="#" class="btn btn-default btn-xs" onclick="return confirm('anda yakin?')">
									<i class="fa fa-close text-red"></i>
								</a>
							</td>
						</tr>
					</tbody>
				</table>
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
				<h4 class="modal-title">Tambah Anggota Keluarga</h4>
			</div>
			<div class="modal-body">
				<form action="#">
					<div class="form-group">
						<label for="">NIK</label>
						<input type="text" class="form-control" name="nik_detail" placeholder="NIK">
					</div>
					<div class="row">
						<div class="col-xs-12 col-md-6">
							<div class="form-group">
								<label for="">Status Hubungan Dalam Keluarga</label>
								<select class="form-control" name="status keluarga">
									<option value="0" selected>Kepala Keluarga</option>
								</select>
							</div>
						</div>
						<div class="col-xs-12 col-md-6">
							<div class="form-group">
								<label for="">Pendidikan</label>
								<select name="id_jenis_pendidkan" class="form-control">
									<option value="0" selected>pendidikan A</option>
								</select>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12 col-md-6">
							<div class="form-group">
								<label for="">No. Pasport</label>
								<input type="text" class="form-control" name="no_passport" placeholder="nomor passport">
							</div>
						</div>
						<div class="col-xs-12 col-md-6">
							<div class="form-group">
								<label for="">No. KITAP</label>
								<input type="text" class="form-control" name="no_kitap" placeholder="nomor KITAP">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12 col-md-6">
							<div class="form-group">
								<label for="">Ayah</label>
								<input type="text" class="form-control" name="ayah" placeholder="nama ayah">
							</div>
						</div>
						<div class="col-xs-12 col-md-6">
							<div class="form-group">
								<label for="">Ibu</label>
								<input type="text" class="form-control" name="ibu" placeholder="nama ibu">
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="">No Urut KK</label>
						<input type="text" class="form-control" name="no_urut" placeholder="urut">
					</div>
					<div class="form-group">
						<button class="btn btn-primary">tambah</button>
						<button class="btn btn-default">bersihkan</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection

@section('style')
<style>
	.table tr > td:first-child,
	.table tr > td:last-child{
		text-align: center;
	}
</style>
@endsection

@section('javascript')
<script>
	$(document).ready(function(){
		getKepNik();
	});

	function getKepNik() {
		$.getJSON('{{ site_url() }}'+'keluarga/ambil_kep_nik', function (result) {
			if (result) {
				for (var i = 0; i < result.length; i++) {
					var penduduk= result[i];
					$("#kepala_keluarga").append("<option value='"+penduduk.nik + " | " + penduduk.nama+"'");
				}
			}
		});
	}

	$("button[data-detail]").click(function(){
		var data = $(this).data('detail');
		$("input[name='nik_detail']").val(data.nik);
		// alamat btn-edit
		$("#modal-tambah form").attr('action', 'edit');
		$("#modal-tambah").modal('show');
	});

	$('#modal-tambah').on('hidden.bs.modal', function (e) {
		// alamat semula
		$("#modal-tambah form").attr("action", "{{site_url('tambah')}}").trigger("reset");
	});
</script>
@endsection
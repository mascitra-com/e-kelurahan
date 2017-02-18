@layout('_layout/dashboard/index')
@section('title')Detail Kependudukan@endsection
@section('nama-kelurahan')Lumajang@endsection

@section('content')
<div class="row">
	<div class="col-xs-12">
		<div class="panel panel-theme">
			<div class="panel-heading">
				<h3 class="panel-title">Form Isian Kependudukan</h3>
			</div>
			<div class="panel-body">
				<form action="#">
					<div class="row">
						<div class="col-xs-12 col-md-4">
							<div class="form-group">
								<label for="">NIK</label>
								<input type="text" class="form-control" name="nik" placeholder="masukkan nik" required>
							</div>
						</div>
						<div class="col-xs-12 col-md-8">
							<div class="form-group">
								<label for="">Nama</label>
								<input type="text" class="form-control" name="nama" placeholder="masukkan nama" required>
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
									<option value="0" selected>laki-laki</option>
									<option value="1" selected>Perempuan</option>
								</select>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12 col-md-4">
							<div class="form-group">
								<label for="">Desa/Kelurahan</label>
								<select name="golongan_darah" class="form-control">
									<option value="Islam" selected>Desa A</option>
								</select>
							</div>
						</div>
						<div class="col-xs-12 col-md-4">
							<div class="form-group">
								<label for="">RT/RW</label>
								<div class="input-group">
									<input type="text" class="form-control" name="rt" placeholder="RT" required>
									<span class="input-group-addon">/</span>
									<input type="text" class="form-control" name="rw" placeholder="RW" required>
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-md-4">
							<div class="form-group">
								<label for="">Kewarganegaraan</label>
								<input type="text" class="form-control" name="kewarganegaraan" placeholder="masukkan kewarganegaraan" required>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12 col-md-3">
							<div class="form-group">
								<label for="">Golongan Darah</label>
								<select name="golongan_darah" class="form-control">
									<option value="" selected>Pilih Golongan Darah...</option>
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
									<option value="Islam" selected>Islam</option>
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
									<option value="" selected>Pekerjaan</option>
								</select>
							</div>
						</div>
						<div class="col-xs-12 col-md-3">
							<div class="form-group">
								<label for="">Status Nikah</label>
								<select name="golongan_darah" class="form-control">
									<option value="0" selected>Belum Menikah</option>
									<option value="1" selected>Menikah</option>
									<option value="2" selected>Janda</option>
									<option value="3" selected>Duda</option>
								</select>
							</div>
						</div>
					</div>
					<div class="form-group break-top-20">
						<button class="btn btn-default btn-edit" type="button"><i class="fa fa-pencil"></i> ubah data</button>
						<button class="btn btn-primary btn-save" type="submit"><i class="fa fa-save"></i> simpan</button>
						<button class="btn btn-warning" type="reset"><i class="fa fa-refresh"></i> kembalikan</button>
						<a class="btn btn-danger" onclick="return confirm('apakah anda yakin?')"><i class="fa fa-trash"></i> hapus data</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection

@section('javascript')
<script>
	$(document).ready(function(){
		$("form input").prop('readonly', true);
		$("form select").prop('disabled', true);
		$(".btn-save").hide();
	});

	$(".btn-edit").click(function(){
		$("form input").prop('readonly', false);
		$("form select").prop('disabled', false);
		$(this).hide();
		$(".btn-save").fadeIn(500);
	});

	$("button[type='reset']").click(function(){
		$("form input").prop('readonly', true);
		$("form select").prop('disabled', true);
		$(".btn-save").hide();
		$(".btn-edit").fadeIn(500);
	});
</script>
@endsection
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
				<form action="#">
					<div class="row">
						<div class="col-xs-12 col-md-3">
							<div class="form-group">
								<label for="">Nomor KK</label>
								<input type="text" class="form-control" name="no_kk" placeholder="masukkna nomor KK">
							</div>
						</div>
						<div class="col-xs-12 col-md-3">
							<div class="form-group">
								<label for="">Kepala Keluarga</label>
								<input type="text" class="form-control"name="kepala_keluarga" placeholder="masukkan nama atau NIK">
							</div>
						</div>
						<div class="col-xs-12 col-md-3">
							<div class="form-group">
								<label for="">RT / RW</label>
								<div class="input-group">
									<input type="text" class="form-control" name="rt" placeholder="RT">
									<span class="input-group-addon">/</span>
									<input type="text" class="form-control" name="rw" placeholder="RW">
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-md-3">
							<div class="form-group">
								<label for="">Kode Pos</label>
								<input type="text" class="form-control" name="kodepos" placeholder="masukkan kodepos">
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="">Alamat</label>
						<textarea name="alamat" class="form-control" placeholder="masukkan alamat keluarga"></textarea>
					</div>
					<div class="form-group break-top-20">
						<button class="btn btn-primary" type="submit"><i class="fa fa-plus"></i> simpan</button>
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
				<h3 class="panel-title">Data Anggota Keluarga</h3>
			</div>
			<div class="panel-body table-responsive table-full">
				<table class="table table-stripped table-hover table-bordered">
					<thead>
						<tr>
							<td>No Urut</td>
							<td>Nama Lengkap</td>
							<td>Status Hubungan Dalam Keluarga</td>
							<td>No. Pasport</td>
							<td>No. KITAP</td>
							<td>Ayah</td>
							<td>Ibu</td>
							<td>Aksi</td>
						</tr>
					</thead>
				</table>
			</div>
			<div class="panel-footer"></div>
		</div>
	</div>
</div>
@endsection

@section('style')
@endsection
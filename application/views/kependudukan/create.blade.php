@layout('_layout/dashboard/index')
@section('title')Tambah Kependudukan@endsection
@section('nama-kelurahan')Lumajang@endsection

@section('content')
<div class="row">
	<div class="col-xs-12">
		<div class="panel panel-theme">
			<div class="panel-heading">
				<h3 class="panel-title">Form Isian Kependudukan</h3>
			</div>
			<div class="panel-body">
                @if(validation_errors())
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-danger">
                                <ul style="margin: 0 1em">
                                    {{ validation_errors('<li>', '</li>') }}
                                </ul>
                            </div>
                        </div>
                    </div>
                @endif
				<form action="{{ site_url('penduduk/simpan') }}" method="POST">
					<div class="row">
						<div class="col-xs-12 col-md-4">
							<div class="form-group">
								<label for="">NIK</label>
								<input type="text" class="form-control" name="nik" placeholder="Masukkan NIK" value="{{ set_value('nik') }}" required>
							</div>
						</div>
						<div class="col-xs-12 col-md-8">
							<div class="form-group">
								<label for="">Nama</label>
								<input type="text" class="form-control" name="nama" placeholder="Masukkan Nama" value="{{ set_value('nama') }}" required>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12 col-md-4">
							<div class="form-group">
								<label for="">Tempat Lahir</label>
								<input type="text" class="form-control" name="tempat_lahir" placeholder="Masukkan Tempat Lahir"  value="{{ set_value('tempat_lahir') }}" required>
							</div>
						</div>
						<div class="col-xs-12 col-md-4">
							<div class="form-group">
								<label for="">Tanggal Lahir</label>
								<input type="date" class="form-control" name="tanggal_lahir" placeholder="tanggal lahir" value="{{ set_value('tanggal_lahir') }}" required>
							</div>
						</div>
						<div class="col-xs-12 col-md-4">
							<div class="form-group">
								<label for="">Jenis Kelamin</label>
								<select name="jenis_kelamin" class="form-control">
									<option value="" selected>Pilih Jenis Kelamin...</option>
									<option value="0">Laki-laki</option>
									<option value="1">Perempuan</option>
								</select>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12 col-md-4">
							<div class="form-group">
								<label for="">Desa/Kelurahan</label>
								<input type="text" class="form-control" value="{{ $kelurahan }}" disabled>
							</div>
						</div>
						<div class="col-xs-12 col-md-4">
							<div class="form-group">
								<label for="">RT/RW</label>
								<div class="input-group">
									<input type="text" class="form-control" name="rt" placeholder="RT" value="{{ set_value('rt') }}" required>
									<span class="input-group-addon">/</span>
									<input type="text" class="form-control" name="rw" placeholder="RW" value="{{ set_value('rw') }}" required>
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-md-4">
							<div class="form-group">
								<label for="">Kewarganegaraan</label>
								<select name="kewarganegaraan" class="form-control" required>
									<option value="" selected>Pilih Kewarganegaraan...</option>
									<option value="0">WNI</option>
									<option value="1">WNA</option>
								</select>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12 col-md-3">
							<div class="form-group">
								<label for="">Golongan Darah</label>
								<select name="golongan_darah" class="form-control">
									<option value="" selected>Pilih Golongan Darah...</option>
									<option value="A">A</option>
									<option value="B">B</option>
									<option value="AB">AB</option>
									<option value="O">O</option>
								</select>
							</div>
						</div>
						<div class="col-xs-12 col-md-3">
							<div class="form-group">
								<label for="">Agama</label>
								<select name="agama" class="form-control">
									<option value="" selected>Pilih Agama...</option>
									<option value="1">Islam</option>
									<option value="2">Kristen</option>
									<option value="3">Katholik</option>
									<option value="4">Budha</option>
									<option value="5">Hindu</option>
								</select>
							</div>
						</div>
						<div class="col-xs-12 col-md-3">
							<div class="form-group">
								<label for="">Pekerjaan</label>
								<select name="pekerjaan" class="form-control">
									<option value="" selected>Pilih Pekerjaan...</option>
									@foreach($pekerjaan as $item)
                                        <option value="{{ $item->id_jenispekerjaan }}">{{ $item->pekerjaan }}</option>
                                    @endforeach
								</select>
							</div>
						</div>
						<div class="col-xs-12 col-md-3">
							<div class="form-group">
								<label for="">Status Nikah</label>
								<select name="status_nikah" class="form-control">
									<option value="" selected>Pilih Status Nikah...</option>
									<option value="0">Belum Menikah</option>
									<option value="1">Menikah</option>
									<option value="2">Janda</option>
									<option value="3">Duda</option>
								</select>
							</div>
						</div>
					</div>
					<div class="form-group break-top-20">
						<button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> Simpan</button>
						<button class="btn btn-default" type="reset"><i class="fa fa-refresh"></i> Bersihkan</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection
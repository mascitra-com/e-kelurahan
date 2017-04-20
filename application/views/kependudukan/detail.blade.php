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
                <form action="{{ site_url('penduduk/ubah/'.$penduduk->nik) }}" method="POST">
                {{ $csrf }}
                <div class="row">
						<div class="col-xs-12 col-md-4">
							<div class="form-group">
								<label for="">NIK</label>
								<input type="text" class="form-control" name="nik" placeholder="masukkan nik" value="{{ $penduduk->nik }}" required>
							</div>
						</div>
						<div class="col-xs-12 col-md-8">
							<div class="form-group">
								<label for="">Nama</label>
								<input type="text" class="form-control" name="nama" placeholder="masukkan nama" value="{{ $penduduk->nama }}"required>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12 col-md-4">
							<div class="form-group">
								<label for="">Tempat Lahir</label>
								<input type="text" class="form-control" name="tempat_lahir" placeholder="tempat lahir" value="{{ $penduduk->tempat_lahir }}" required>
							</div>
						</div>
						<div class="col-xs-12 col-md-4">
							<div class="form-group">
								<label for="">Tanggal Lahir</label>
								<input type="date" class="form-control" name="tanggal_lahir" placeholder="tanggal lahir" value="{{ date('Y-m-d', strtotime($penduduk->tanggal_lahir)) }}">
							</div>
						</div>
						<div class="col-xs-12 col-md-4">
							<div class="form-group">
								<label for="">Jenis Kelamin</label>
								<select name="jenis_kelamin" class="form-control">
									<option value="0" {{ $penduduk->jenis_kelamin === '0' ? 'selected' : ''}}>Laki-laki</option>
									<option value="1" {{ $penduduk->jenis_kelamin === '1' ? 'selected' : ''}}>Perempuan</option>
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
									<input type="text" class="form-control" name="rt" placeholder="RT" value="{{ $penduduk->rt }}" required>
									<span class="input-group-addon">/</span>
									<input type="text" class="form-control" name="rw" placeholder="RW" value="{{ $penduduk->rw }}" required>
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-md-4">
							<div class="form-group">
								<label for="">Kewarganegaraan</label>
                                <select name="kewarganegaraan" class="form-control" required>
                                    <option value="" selected>Pilih Kewarganegaraan...</option>
                                    <option value="0" {{ $penduduk->kewarganegaraan === '0' ? 'selected' : ''}}>WNI</option>
                                    <option value="1" {{ $penduduk->kewarganegaraan === '1' ? 'selected' : ''}}>WNA</option>
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
									<option value="A" {{ $penduduk->golongan_darah === 'A' ? 'selected' : ''}}>A</option>
									<option value="B" {{ $penduduk->golongan_darah === 'B' ? 'selected' : ''}}>B</option>
									<option value="AB" {{ $penduduk->golongan_darah === 'AB' ? 'selected' : ''}}>AB</option>
									<option value="O" {{ $penduduk->golongan_darah === 'O' ? 'selected' : ''}}>O</option>
								</select>
							</div>
						</div>
						<div class="col-xs-12 col-md-3">
							<div class="form-group">
								<label for="">Agama</label>
								<select name="agama" class="form-control">
									<option value="Islam" {{ $penduduk->agama === 'Islam' ? 'selected' : ''}}>Islam</option>
									<option value="Kristen" {{ $penduduk->agama === 'Kristen' ? 'selected' : ''}}>Kristen</option>
									<option value="Katholik" {{ $penduduk->agama === 'Katholik' ? 'selected' : ''}}>Katholik</option>
									<option value="Budha" {{ $penduduk->agama === 'Budha' ? 'selected' : ''}}>Budha</option>
									<option value="Hindu" {{ $penduduk->agama === 'Hindu' ? 'selected' : ''}}>Hindu</option>
								</select>
							</div>
						</div>
						<div class="col-xs-12 col-md-3">
							<div class="form-group">
								<label for="">Pekerjaan</label>
                                <select name="pekerjaan" class="form-control">
                                    <option value="" selected>Pilih Pekerjaan...</option>
                                    @foreach($pekerjaan as $item)
                                        <option value="{{ $item->id_jenispekerjaan }}" {{ $penduduk->pekerjaan === $item->id_jenispekerjaan ? 'selected' : ''}}>{{ $item->pekerjaan }}</option>
                                    @endforeach
                                </select>
							</div>
						</div>
						<div class="col-xs-12 col-md-3">
							<div class="form-group">
								<label for="">Status Nikah</label>
								<select name="status_nikah" class="form-control">
									<option value="0" {{ $penduduk->status_nikah === '0' ? 'selected' : ''}}>Belum Menikah</option>
									<option value="1" {{ $penduduk->status_nikah === '1' ? 'selected' : ''}}>Menikah</option>
									<option value="2" {{ $penduduk->status_nikah === '2' ? 'selected' : ''}}>Janda</option>
									<option value="3" {{ $penduduk->status_nikah === '3' ? 'selected' : ''}}>Duda</option>
								</select>
							</div>
						</div>
					</div>
					<div class="form-group break-top-20">
						<a href="{{ site_url('penduduk') }}" class="btn btn-default"><i class="fa fa-arrow-left"></i> Kembali</a>
						<button class="btn btn-default btn-edit" type="button"><i class="fa fa-pencil"></i> Ubah Data</button>
						<button class="btn btn-primary btn-save" type="submit"><i class="fa fa-save"></i> Simpan</button>
						<button class="btn btn-warning" type="reset"><i class="fa fa-refresh"></i> Kembalikan</button>
						<a href="{{ site_url('penduduk/hapus/'.$penduduk->nik) }}" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin?')"><i class="fa fa-trash"></i> Hapus Data</a>
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
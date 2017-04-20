@layout('_layout/dashboard-user/index')
@section('title')Pengajuan Surat Keterangan Kelahiran@endsection

@section('content')
<div class="row row-center">
	<div class="col-xs-12 col-sm-6">
		<div class="panel">
			<div class="panel-heading">
				<h3 class="panel-title">Pengajuan Surat Keterangan Kelahiran</h3>
			</div>
			<div class="panel-body">
				<h3>Keterangan</h3>
				<p style="font-weight: 300">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa obcaecati natus est quasi numquam reiciendis cum. Tenetur saepe, deserunt excepturi ut, itaque aut exercitationem velit est id aliquid doloremque pariatur.</p>
				<div class="break-10"></div>
				<form action="{{ site_url('warga/pengajuan/keterangan_kelahiran_simpan') }}" method="POST">
					{{ $csrf }}
					<div class="row">
						<div class="col-xs-12 col-sm-6">
							<div class="form-group">
								<label for="">Nama Lengkap Bayi</label>
								<input type="text" class="form-control" name="nama_anak" placeholder="Nama Lengkap Bayi"
								required/>
							</div>	
						</div>
						<div class="col-xs-12 col-sm-6">
							<div class="form-group">
								<label for="tanggal_kelahiran">Tanggal Lahir Bayi</label>
								<input type="date" class="form-control" placeholder="Tanggal lahir bayi" name="tanggal_kelahiran" required max="{{ date('Y-m-d') }}">
							</div>	
						</div>
					</div>
					<div class="form-group">
						<label for="tempat_kelahiran">Tempat Lahir Bayi</label>
						<textarea type="text" class="form-control" placeholder="Tempat lahir bayi" name="tempat_kelahiran" required></textarea>
					</div>
					<div class="form-group">
						<label for="">Pilih NIK / Nama Ibu</label>
						<input type="text" class="form-control" name="nik_ibu" placeholder="pilih NIK / Nama Ibu" list="data" autocomplete="off" required />
						<datalist id="data">
							@foreach($penduduks as $penduduk)
							<option value="{{ $penduduk->nik. ' | '.$penduduk->nama }}">
								@endforeach
							</datalist>
						</div>
						<div class="form-group">
							<label for="">Pilih NIK / Nama Ayah</label>
							<input type="text" class="form-control" name="nik_ayah" placeholder="pilih NIK / Nama Ayah" list="data" autocomplete="off" required />
							<datalist id="data">
								@foreach($penduduks as $penduduk)
								<option value="{{ $penduduk->nik. ' | '.$penduduk->nama }}">
									@endforeach
								</datalist>
							</div>
							<div class="form-group">
								<label for="">Pilih NIK / Nama Pelapor</label>
								<input type="text" class="form-control" name="nik_pelapor" placeholder="pilih NIK / Nama Pelapor" list="data" autocomplete="off" required />
								<datalist id="data">
									@foreach($penduduks as $penduduk)
									<option value="{{ $penduduk->nik. ' | '.$penduduk->nama }}">
										@endforeach
									</datalist>
								</div>
								<div class="form-group">
									<label for="hubungan_pelapor">Hubungan Pelapor dengan Bayi</label>
									<input type="text" class="form-control" placeholder="Hubungan pelapor" name="hubungan_pelapor" required minlength="3" maxlength="50">
								</div>
								<div class="form-group">
									<button class="btn btn-primary"><i class="fa fa-save"></i> tambah</button>
									<button class="btn btn-default" type="refresh"><i class="fa fa-refresh"></i> bersihkan
									</button>
								</div>
							</form>
						</div>
						<div class="panel-footer"></div>
					</div>
				</div>
			</div>
			@endsection
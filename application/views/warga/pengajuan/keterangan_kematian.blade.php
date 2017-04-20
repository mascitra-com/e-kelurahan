@layout('_layout/dashboard-user/index')
@section('title')Pengajuan Surat Keterangan Kematian@endsection

@section('content')
<div class="row row-center">
	<div class="col-xs-12 col-sm-6">
		<div class="panel">
			<div class="panel-heading">
				<h3 class="panel-title">Pengajuan Surat Keterangan Kematian</h3>
			</div>
			<div class="panel-body">
				<h3>Keterangan</h3>
				<p style="font-weight: 300">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa obcaecati natus est quasi numquam reiciendis cum. Tenetur saepe, deserunt excepturi ut, itaque aut exercitationem velit est id aliquid doloremque pariatur.</p>
				<div class="break-10"></div>
				<form action="{{ site_url('warga/pengajuan/keterangan_kematian_simpan') }}" method="POST">
					{{ $csrf }}
					<div class="form-group">
						<label for="">NIK / NAMA Almarhum/Almarhumah</label>
						<input type="text" class="form-control" name="nik_ibu" placeholder="pilih NIK / Nama" list="data" autocomplete="off" required />
						<datalist id="data">
							@foreach($penduduks as $penduduk)
							<option value="{{ $penduduk->nik. ' | '.$penduduk->nama }}">
								@endforeach
							</datalist>
						</div>
						<div class="form-group">
							<label for="tanggal_kematian">Tanggal Meninggal</label>
							<?php echo form_error('tanggal_meninggal'); ?>
							<input type="date" class="form-control" placeholder="Tanggal meninggal" name="tanggal_meninggal" required max="{{ date('Y-m-d') }}">
						</div>
						<label>Tempat Meninggal</label>
						<div class="row">
							<div class="col-xs-12 col-md-4">
								<div class="form-group">
									<?php echo form_error('dusun'); ?>
									<input type="text" class="form-control" placeholder="Nama dusun" name="dusun" required maxlength="100">
								</div>
							</div>
							<div class="col-xs-12 col-md-4">
								<div class="form-group">
									<?php echo form_error('rt_meninggal'); ?>
									<input type="text" class="form-control" placeholder="RT" name="rt_meninggal" required maxlength="100">
								</div>
							</div>
							<div class="col-xs-12 col-md-4">
								<div class="form-group">
									<?php echo form_error('rw_meninggal'); ?>
									<input type="text" class="form-control" placeholder="RW" name="rw_meninggal" required maxlength="100">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12 col-md-4">
								<div class="form-group">
									<?php echo form_error('kampung'); ?>
									<input type="text" class="form-control" placeholder="Nama kampung" name="kampung" required maxlength="100">
								</div>
							</div>
							<div class="col-xs-12 col-md-4">
								<div class="form-group">
									<?php echo form_error('kec_meninggal'); ?>
									<input type="text" class="form-control" placeholder="Kecamatan" name="kec_meninggal" required maxlength="100">
								</div>
							</div>
							<div class="col-xs-12 col-md-4">
								<div class="form-group">
									<?php echo form_error('kab_meninggal'); ?>
									<input type="text" class="form-control" placeholder="Kabupaten" name="kab_meninggal" required maxlength="100">
								</div>
							</div>
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
								<label for="hubungan_pelapor">Hubungan Pelapor</label>
								<input type="text" class="form-control" placeholder="Hubungan pelapor dengan yang meninggal" name="hubungan_pelapor" required minlength="3" maxlength="50">
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
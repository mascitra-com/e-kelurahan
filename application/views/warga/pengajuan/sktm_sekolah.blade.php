@layout('_layout/dashboard-user/index')
@section('title')Pengajuan Surat Keterangan Tidak Mampu Sekolah@endsection

@section('content')
<div class="row row-center">
	<div class="col-xs-12 col-sm-6">
		<div class="panel">
			<div class="panel-heading">
				<h3 class="panel-title">Pengajuan Surat Keterangan Tidak Mampu (Sekolah)</h3>
			</div>
			<div class="panel-body">
				<h3>Keterangan</h3>
				<p style="font-weight: 300">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa obcaecati natus est quasi numquam reiciendis cum. Tenetur saepe, deserunt excepturi ut, itaque aut exercitationem velit est id aliquid doloremque pariatur.</p>
				<div class="break-10"></div>
					<form action="{{ site_url('warga/pengajuan/sktm_sekolah_simpan') }}" method="POST">
						{{ $csrf }}
						<div class="form-group">
							<label for="">Pilih NIK Anggota Keluarga</label>
							<input type="text" class="form-control" name="nik" placeholder="pilih NIK" list="data" autocomplete="off" required />
							<datalist id="data">
								@for ($i=0; $i <sizeof($data['anggotas']->detailKK) ; $i++)
								<option value="{{ $data['anggotas']->detailKK[$i]->penduduk->nik. ' | '.$data['anggotas']->detailKK[$i]->penduduk->nama }}">
								@endfor
							</datalist>
						</div>
						<div class="form-group">
							<label for="">Jurusan</label>
							<input type="text" class="form-control" name="jurusan" placeholder="jenis usaha"
								   required/>
						</div>
						<div class="form-group">
							<label for="">Asal Sekolah</label>
							<input type="text" class="form-control" name="asal_sekolah" placeholder="alamat usaha" required>
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
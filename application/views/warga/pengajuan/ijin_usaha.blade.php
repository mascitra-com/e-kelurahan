@layout('_layout/dashboard-user/index')
@section('title')Pengajuan Surat Blanko KTP@endsection

@section('content')
<div class="row row-center">
	<div class="col-xs-12 col-sm-6">
		<div class="panel">
			<div class="panel-heading">
				<h3 class="panel-title">Pengajuan Surat Blanko KTP</h3>
			</div>
			<div class="panel-body">
				<h3>Keterangan</h3>
				<p style="font-weight: 300">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa obcaecati natus est quasi numquam reiciendis cum. Tenetur saepe, deserunt excepturi ut, itaque aut exercitationem velit est id aliquid doloremque pariatur.</p>
				<div class="break-10"></div>
					<form action="{{ site_url('warga/pengajuan/ijin_usaha_simpan') }}" method="POST">
						{{ $csrf }}
						<div class="form-group">
							<label for="">NIK / NAMA</label>
							<input class="form-control" placeholder="NIK/NAMA" autocomplete="off" name="nik" value="{{ $warga->nik .' | '. $warga->nama }}" disabled>
						</div>
						<div class="form-group">
							<label for="">Jenis Usaha</label>
							<input type="text" class="form-control" name="jenis_usaha" placeholder="jenis usaha"
								   required/>
						</div>
						<div class="form-group">
							<label for="">Alamat Usaha</label>
							<textarea class="form-control" name="alamat" placeholder="alamat usaha" required></textarea>
						</div>
						<div class="form-group">
							<label for="">Pengambilan</label>
                            <select class="form-control" name="pengambilan" id="pengambilan">
                                <option value="">Pilih Salah Satu</option>
                                <option value="0">Diambil di Kantor</option>
                                <option value="1">Diantar ke Rumah</option>
                            </select>
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
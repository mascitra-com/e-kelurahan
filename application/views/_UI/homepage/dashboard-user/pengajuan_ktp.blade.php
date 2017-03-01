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
				<form action="#">
					<div class="form-group">
						<label for="">Pilih NIK Anggota Keluarga</label>
						<input type="text" class="form-control" name="nik" placeholder="pilih NIK" list="data" />
						<datalist id="data">
							<option value="NIK1">
							<option value="NIK2">
							<option value="NIK3">
						</datalist>
					</div>
					<div class="form-group">
						<button class="btn btn-primary">Ajukan</button>
					</div>
				</form>
				<div class="break-10"></div>
				<h3>Keterangan</h3>
				<p style="font-weight: 300">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa obcaecati natus est quasi numquam reiciendis cum. Tenetur saepe, deserunt excepturi ut, itaque aut exercitationem velit est id aliquid doloremque pariatur.</p>
			</div>
			<div class="panel-footer"></div>
		</div>
	</div>
</div>
@endsection
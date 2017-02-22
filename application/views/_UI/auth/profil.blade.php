@layout('_layout/dashboard/index')
@section('title')Profil Kelurahan@endsection
@section('nama-kelurahan')Lumajang@endsection

@section('content')
<div class="row">
	<div class="col-xs-12">
		<div class="panel panel-theme">
			<div class="panel-heading">
				<h3 class="panel-title">Profil Kelurahan</h3>
			</div>
			<div class="panel-body">
				<ul class="nav nav-tabs">
					<li role="presentation" class="active"><a href="#tab1" data-toggle="tab">Profil Kelurahan</a></li>
					<li role="presentation"><a href="#tab2" data-toggle="tab">Profil Lurah</a></li>
					<li role="presentation"><a href="#tab3" data-toggle="tab">Info Kontak</a></li>
					<li role="presentation"><a href="#tab4" data-toggle="tab">Akun</a></li>
				</ul>
				<form action="#">
					<div class="tab-content">
						<div role="tabpanel" class="tab-pane active" id="tab1">
							<form action="#">
								<input type="hidden" name="id_organisasi" value="">
								<div class="form-group">
									<label for="">Nama Kelurahan</label>
									<input type="text" class="form-control" value="" placeholder="nama kelurahan" readonly>
								</div>
								<div class="row">
									<div class="col-xs-12 col-md-6">
										<div class="form-group">
											<label for="">Deskripsi</label>
											<textarea class="form-control" name="deskripsi" placeholder="deskripsi kelurahan"></textarea>
										</div>
									</div>
									<div class="col-xs-12 col-md-6">
										<div class="form-group">
											<label for="">Alamat</label>
											<textarea class="form-control" name="alamat" placeholder="alamat kelurahan"></textarea>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label for="">Kode Pos</label>
									<input type="text" class="form-control" name="kodepos" placeholder="kodepos" />
								</div>
								<div class="form-group">
									<button class="btn btn-primary"><i class="fa fa-save"></i> simpan</button>
									<button class="btn btn-default" type="reset"><i class="fa fa-refresh"></i> kembalikan</button>
								</div>
							</form>
						</div>
						<div role="tabpanel" class="tab-pane" id="tab2">
							<form action="#">
								<div class="row">
									<div class="col-xs-12 col-md-6">
										<div class="form-group">
											<label for="">Nama Lurah</label>
											<input type="text" class="form-control" name="nama_lurah" placeholder="nama lurah" />
										</div>
										<div class="form-group">
											<label for="">Nomor Induk Pegawai Lurah</label>
											<input type="text" class="form-control" name="nip" placeholder="NIP lurah" />
										</div>
										<div class="form-group">
											<button class="btn btn-primary"><i class="fa fa-save"></i> simpan</button>
											<button class="btn btn-default" type="reset"><i class="fa fa-refresh"></i> kembalikan</button>
										</div>
									</div>
								</div>
							</form>
						</div>
						<div role="tabpanel" class="tab-pane" id="tab3">
							<form action="#">
								<div class="row">
									<div class="col-xs-12 col-md-6">
										<div class="form-group">
											<label for="">Telpon</label>
											<input type="text" class="form-control" name="telpon" placeholder="nomor telpon" />
										</div>
									</div>
									<div class="col-xs-12 col-md-6">
										<div class="form-group">
											<label for="">Email</label>
											<input type="text" class="form-control" name="email" placeholder="alamat email" />
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-12 col-md-6">
										<div class="form-group">
											<label for="">Facebook</label>
											<div class="input-group">
												<span class="input-group-addon">https://facebook.com/</span>
												<input type="text" class="form-control" name="facebook" placeholder="alamat Facebook" />
											</div>
										</div>
									</div>
									<div class="col-xs-12 col-md-6">
										<div class="form-group">
											<label for="">Twitter</label>
											<div class="input-group">
												<span class="input-group-addon">https://twitter.com/</span>
												<input type="text" class="form-control" name="email" placeholder="alamat Twitter" />
											</div>
										</div>
									</div>
								</div>
								<div class="form-group">
									<button class="btn btn-primary"><i class="fa fa-save"></i> simpan</button>
									<button class="btn btn-default" type="reset"><i class="fa fa-refresh"></i> kembalikan</button>
								</div>
							</form>
						</div>
						<div role="tabpanel" class="tab-pane" id="tab4">
							<form action="#">
								<div class="row">
									<div class="col-xs-12 col-md-6">
										<div class="form-group">
											<label for="">Username</label>
											<input type="text" class="form-control" name="username" placeholder="username" readonly />
										</div>
									</div>
									<div class="col-xs-12 col-md-6">
										<div class="form-group">
											<label for="">Waktu login terakhir</label>
											<input type="text" class="form-control" placeholder="waktu login" readonly />
										</div>
									</div>
								</div>
								<h4 class="break-top-20 break-10 text-grey">GANTI PASSWORD</h4>
								<div class="form-group">
									<label for="">Password Lama</label>
									<input type="password" class="form-control" name="old_password" placeholder="masukkan password lama" />
								</div>
								<div class="row">
									<div class="col-xs-12 col-md-6">
										<div class="form-group">
											<label for="">Password Baru</label>
											<input type="password" class="form-control" name="new_password" placeholder="masukkan password baru" />
										</div>
									</div>
									<div class="col-xs-12 col-md-6">
										<div class="form-group re-type">
											<label class="control-lable">Tulis Ulang Password Baru</label>
											<input type="password" class="form-control" name="new_password_re" placeholder="tulis ulang password baru" />
											<span class="help-block">Password tidak sama</span>
										</div>
									</div>
								</div>
								<div class="form-group">
									<button class="btn btn-primary btn-password" disabled><i class="fa fa-save"></i> simpan</button>
									<button class="btn btn-default" type="reset"><i class="fa fa-refresh"></i> kembalikan</button>
								</div>
							</form>
						</div>
					</div>
				</form>
			</div>
			<div class="panel-footer">
				<span class="text-grey">Last edited by admin 12/02/2017 08:30</span>
			</div>
		</div>
	</div>
</div>
@endsection
@section('style')
<style>
	.tab-pane{
		padding: 20px 15px;
		padding-bottom: 0;
	}
</style>
@endsection
@section('javascript')
<script>
	$(document).ready(function(){
		$(".help-block").hide();
	});
	$("[name='new_password_re']").keyup(function(){
		var value = $("input[name='new_password']").val();
		if ($(this).val() !== value){
			$(".re-type").addClass('has-error');
			$(".btn-password").prop('disabled', true);
			$(".help-block").fadeIn(500);
		}else{
			$(".re-type").removeClass('has-error');
			$(".btn-password").prop('disabled', false);
			$(".help-block").fadeOut(500);
		}
	});
</script>
@endsection
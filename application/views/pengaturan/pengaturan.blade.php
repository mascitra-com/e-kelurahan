@layout('_layout/dashboard/index')
@section('title')Pengaturan@endsection
@section('nama-kelurahan')Lumajang@endsection

@section('content')
<div class="row">
	<div class="col-xs-12">
		<div class="panel panel-theme">
			<div class="panel-heading">
				<h3 class="panel-title">Pengaturan Website</h3>
			</div>
			<div class="panel-body">
				<ul class="nav nav-tabs">
					<li role="presentation" class="active"><a href="#tab1" data-toggle="tab">Halaman Depan</a></li>
					<li role="presentation"><a href="#tab2" data-toggle="tab">Banner</a></li>
					<li role="presentation"><a href="#tab3" data-toggle="tab">Sosial Media</a></li>
				</ul>
				<div class="tab-content break-top-30">
					<div role="tabpanel" class="tab-pane active" id="tab1">
						<div class="form-group">
							<label for="">Gambar Depan</label><br>
							<img src="{{base_url('assets/images/banner/'.$banner->banner_atas)}}" width="40%" alt="">
						</div>
						<div class="form-group">
							<button class="btn btn-primary" data-form="{{ site_url('pengaturan/simpan_banner/1') }}"><i class="fa fa-refresh"></i> Ubah</button>
							<button class="btn btn-danger"><i class="fa fa-times"></i> Hapus</button>
						</div>
					</div>
					<div role="tabpanel" class="tab-pane" id="tab2">
						<div class="row">
							<div class="col-xs-12 col-md-6">
								<div class="form-group">
									<label for="">Banner Samping</label><br>
									<img src="{{base_url('assets/images/banner/'.$banner->banner_samping)}}" width="40%" alt="">
								</div>
								<div class="form-group">
									<button class="btn btn-primary" data-form="{{ site_url('pengaturan/simpan_banner/2') }}"><i class="fa fa-refresh"></i> Ubah</button>
									<button class="btn btn-danger"><i class="fa fa-times"></i> Hapus</button>
								</div>
							</div>
							<div class="col-xs-12 col-md-6">
								<div class="form-group">
									<label for="">Banner Besar</label><br>
									<img src="{{base_url('assets/images/banner/'.$banner->banner_bawah)}}" width="40%" alt="">
								</div>
								<div class="form-group">
									<button class="btn btn-primary" data-form="{{ site_url('pengaturan/simpan_banner/3') }}"><i class="fa fa-refresh"></i> Ubah</button>
									<button class="btn btn-danger"><i class="fa fa-times"></i> Hapus</button>
								</div>
							</div>
						</div>
					</div>
					<div role="tabpanel" class="tab-pane" id="tab3">
						<form action="{{ site_url('pengaturan/simpan_sosmed') }}" method="POST">
                            {{ $csrf }}
							<div class="form-group">
								<label for="">Facebook</label>
								<div class="input-group">
									<span class="input-group-addon">https://facebook.com/</span>
									<input type="text" class="form-control" name="facebook" value="{{ $sosmed->facebook }}" placeholder="facebook">
								</div>
							</div>
							<div class="form-group">
								<label for="">Twitter</label>
								<div class="input-group">
									<span class="input-group-addon">https://twitter.com/</span>
									<input type="text" class="form-control" name="twitter" value="{{ $sosmed->twitter }}" placeholder="twitter">
								</div>
							</div>
							<div class="form-group">
								<label for="">Instagram</label>
								<div class="input-group">
									<span class="input-group-addon">https://instagram.com/</span>
									<input type="text" class="form-control" name="instagram" value="{{ $sosmed->instagram }}" placeholder="instagram">
								</div>
							</div>
							<div class="form-group">
								<button class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('modal')
<div class="modal fade" tabindex="-1" role="dialog" id="modal-upload">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Unggah Gambar</h4>
			</div>
			<div class="modal-body">
				<form action="#" id="form-upload" enctype="multipart/form-data" method="POST">
					{{ $csrf }}
					<div class="form-group">
						<label for="">Pilih file</label>
						<input type="file" name="banner"/>
						<p class="help-block">max ukuran 10MB</p>
					</div>
					<div class="form-group">
						<img src="{{base_url('assets/images/blank-avatar.png')}}" class="img-preview" height="200px" alt="">
					</div>
					<div class="form-group">
						<button class="btn btn-primary"><i class="fa fa-save"></i> simpan</button>
						<button class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> batal</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection

@section('javascript')
<script>
	$("[data-form]").click(function(){
		$("#form-upload").prop('action', $(this).data('form'));
		$("#modal-upload").modal('show');
	});

	$("#form-upload input").change(function(){
		readURL(this);
	});
	
	function readURL(input) {

		if (input.files && input.files[0]) {
			var reader = new FileReader();

			reader.onload = function (e) {
				$('.img-preview').attr('src', e.target.result);
			}

			reader.readAsDataURL(input.files[0]);
		}
	}
</script>
@endsection
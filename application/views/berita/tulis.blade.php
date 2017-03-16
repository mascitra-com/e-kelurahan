@layout('_layout/dashboard/index')
@section('title')Tulis Berita@endsection
@section('nama-kelurahan')Lumajang@endsection

@section('content')
<div class="row">
	<div class="col-xs-12">
		<div class="panel panel-theme">
			<div class="panel-heading">
				<h3 class="panel-title">Tulis Berita Baru</h3>
			</div>
			<div class="panel-body">
				<form action="{{ site_url('berita/simpan') }}" method="POST" enctype="multipart/form-data">
				{{ $csrf }}
					<div class="form-group">
						<label for="">Judul Berita</label>
						{{ form_error('judul') }}
						<input type="text" class="form-control" name="judul" placeholder="Judul Berita" value="{{ (isset($berita['judul'])) ? $berita['judul'] : '' }}" required/>
					</div>
					<div class="form-group">
						<label for="tanggal_publish">Tanggal Publish</label>
						<input type="date" class="form-control" name="tanggal_publish" value="{{ (isset($berita['tanggal_publish'])) ? $berita['tanggal_publish'] : '' }}" min="<?=date('Y-m-d');?>" placeholder="Tanggal Publish Berita">
					</div>
					<div class="form-group">
						<label for="">Isi Berita</label>
						<textarea class="form-control content" name="isi">{{ (isset($berita['isi'])) ? $berita['isi'] : '' }}</textarea>
					</div>
					<div class="form-group">
						<label for="">Foto Headline</label>
						<input type="file" name="gambar" />
						<p class="help-block">Ukuran maksimal file 1 mb</p>
						<img src="{{base_url('assets/images/blank-avatar.png')}}" class="preview" alt="preview">
					</div>
					<div class="form-group">
						<button class="btn btn-primary" type="submit"><i class="fa fa-send-o"></i> Publikasikan</button>
						<button class="btn btn-warning" name="status" type="submit" value="2"><i class="fa fa-pencil-square"></i> Simpan di draf</button>
						<button class="btn btn-default" type="reset"><i class="fa fa-refresh"></i> Bersihkan</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection

@section('style')
<style>
	.preview{
		width: 150px;
		height: 150px;
		object-fit: cover;
		object-position: center;
	}
</style>
@endsection

@section('javascript')
<script src="{{base_url('assets/plugins/tinymce/tinymce.min.js')}}"></script>
<script>
	// Initialize tinymce
	tinymce.init({selector:'textarea', menubar:false, height:300});
	
	// Initialize preview image
	$("[type='file']").change(function(){
		readURL(this);
	});

	// image preview function
	function readURL(input) {

		if (input.files && input.files[0]) {
			var reader = new FileReader();

			reader.onload = function (e) {
				$('.preview').attr('src', e.target.result);
			}

			reader.readAsDataURL(input.files[0]);
		}
	}
</script>
@endsection
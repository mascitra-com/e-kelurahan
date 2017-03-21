@layout('_layout/dashboard/index')
@section('title')Sunting Halaman Info Kelurahan@endsection
@section('nama-kelurahan')Lumajang@endsection

@section('content')
<div class="row">
	<div class="col-xs-12">
		<div class="panel panel-theme">
			<div class="panel-heading">
				<h3 class="panel-title">Sunting Halaman Info</h3>
			</div>
			<div class="panel-body">
				<form action="{{ site_url('info/ubah/'.$info['slug']) }}" method="POST">
				{{ $csrf }}
					<div class="form-group">
						<label for="judul">Judul</label>
						{{ form_error('judul') }}
						<input type="text" class="form-control" name="judul" placeholder="judul halaman" value="{{ (isset($info['judul'])) ? $info['judul'] : '' }}" required />
					</div>
					<div class="form-group">
						<label for="isi">Isi Halaman</label>
						{{ form_error('isi') }}
						<textarea class="form-control content" name="isi">{{ (isset($info['isi'])) ? $info['isi'] : '' }}</textarea>
					</div>
					<div class="form-group">
						<button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> Simpan</button>
						<button class="btn btn-default" type="reset"><i class="fa fa-refresh"></i> Bersihkan</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection

@section('javascript')
<script src="{{base_url('assets/plugins/tinymce/tinymce.min.js')}}"></script>
<script>
	// Initialize tinymce
	tinymce.init({selector:'textarea', menubar:false, height:300});
</script>
@endsection
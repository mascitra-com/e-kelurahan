@layout('_layout/dashboard/index')
@section('title')Tambah Halaman Info Kelurahan@endsection
@section('nama-kelurahan')Lumajang@endsection

@section('content')
<div class="row">
	<div class="col-xs-12">
		<div class="panel panel-theme">
			<div class="panel-heading">
				<h3 class="panel-title">Tambah Halaman Info</h3>
			</div>
			<div class="panel-body">
				<form action="#">
					<div class="form-group">
						<label for="">Judul</label>
						<input type="text" class="form-control" name="title" placeholder="judul halaman" />
					</div>
					<div class="form-group">
						<label for="">Isi Halaman</label>
						<textarea class="form-control content" name="content"></textarea>
					</div>
					<div class="form-group">
						<button class="btn btn-primary"><i class="fa fa-save"></i> simpan</button>
						<button class="btn btn-default" type="reset"><i class="fa fa-refresh"></i> bersihkan</button>
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
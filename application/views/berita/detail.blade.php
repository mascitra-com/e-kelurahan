@layout('_layout/dashboard/index')
@section('title')Detail Berita@endsection
@section('nama-kelurahan')Lumajang@endsection

@section('content')
<div class="row">
	<div class="col-xs-12">
		<div class="panel">
			<div class="panel-body">
				<img src="{{ base_url('assets/images/berita/'.cek_file($berita->gambar,'./assets/images/berita/','default.png')) }}" class="headline" alt="thumbnail">
				<h1 class="title">{{ $berita->judul }}</h1>
				<span class="label label-info"><i class="fa fa-clock-o"></i> {{ strtolower(mdate('%l, %d %F %Y', strtotime(str_replace('-', '/', $berita->tanggal_publish)))) }}</span>
				<span class="label label-info"><i class="fa fa-user"></i> oleh {{ $berita->akun->username }}</span>
				<div class="content">
					{{ $berita->isi }}
				</div>
			</div>
			<div class="panel-footer">
				<a href="{{ (is_null($berita->deleted_at)) ? site_url('berita/arsipkan/'.$berita->slug) : site_url('berita/hapus/'.$berita->slug) }}" class="btn btn-{{ (is_null($berita->deleted_at)) ? 'warning' : 'danger' }}"><i class="fa fa-{{ (is_null($berita->deleted_at)) ? 'archive' : 'trash' }}"></i> {{ (is_null($berita->deleted_at)) ? 'arsipkan' : 'hapus' }}</a>
				<a href="
				@if(is_null($berita->deleted_at)) 
					@if($berita->status == '2')
						{{ site_url('berita/draf') }}
					@else
						{{ site_url('berita') }}
					@endif
				@else 
					{{ site_url('berita/arsip') }}
				@endif"
				 class="btn btn-default"><i class="fa fa-arrow-left"></i> kembali</a>
			</div>
		</div>
	</div>
</div>
@endsection

@section('style')
<style>
	.panel-body{
		padding: 30px;
	}

	.headline{
		width: 100%;
		height: 250px;
		object-fit: cover;
		object-position: center;
		margin-bottom: 20px;
	}
	
	.title{
		margin-bottom: 5px;
	}

	.content{
		margin-top: 20px;
	}

	.content > p{
		font-size: 11pt;
		line-height: 28px;
	}
</style>
@endsection
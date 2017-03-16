@layout('_layout/homepage/index')

@section('page_title')
Berita
@endsection

@section('content')
<div class="container-fluid container-content">
	<div class="row">
		<div class="col-xs-12">
			<div class="panel">
				<div class="panel-body">
					<nav class="navbar navbar-default">
						<div class="container-fluid">
							<div class="navbar-header">
								<a class="navbar-brand" href="#">Berita</a>
							</div>
							<form action="#" method="post" class="navbar-form navbar-right" role="search">
								<div class="form-group">
									<select name="order" class="form-control">
										<option value="">Terbaru</option>
										<option value="">Terlama</option>
										<option value="">Terpopuler</option>
									</select>
									<input type="text" class="form-control" placeholder="Cari">
								</div>
								<button type="submit" class="btn btn-default">Cari</button>
							</form>
						</div>
					</nav>
					@if(empty($beritas))
					<p class="text-center">Tidak ada berita</p>
					@else
					@foreach($beritas as $berita)
					<div class="row news-list">
						<div class="col-xs-12 col-sm-4">
							<img src="{{ base_url('assets/images/berita/'.cek_file($berita->gambar,'./assets/images/berita/','default.png')) }}" class="news-img" alt="thumbnail">
						</div>
						<div class="col-xs-12 col-sm-8">
							<h2 class="news-title">{{ $berita->judul }}</h2>
							<span class="news-date"><i class="fa fa-calendar"></i>{{ strtoupper(date('d M Y', strtotime($berita->tanggal_publish))) }}</span>
							<span class="news-author"><i class="fa fa-user"></i> {{ $berita->akun->username }}</span>
							<p class="news-headline">{{ potong_teks(strip_tags($berita->isi), 220) }}</p>
							<a href="{{ site_url('homepage/'.$slug. '/' .'berita_selengkapnya/'.$berita->slug) }}" class="btn btn-default btn-xs">selengkapnya...</a>
						</div>
					</div>
					@endforeach
					@endif
					<nav aria-label="...">
						<ul class="pager">
							<li class="previous"><a href="#"><span aria-hidden="true">&larr;</span> Lebih Baru</a></li>
							<li class="next"><a href="#">Lebih Lama <span aria-hidden="true">&rarr;</span></a></li>
						</ul>
					</nav>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('style')
<style>
	.container-content{
		min-height: 55vh;
		padding: 50px;
		padding-top: 125px;
	}
	.panel{
		padding: 15px;
	}
	.news-list{
		border: 1px solid #CCC;
		margin: 0;
		margin-bottom: 10px;
	}
	.news-list > [class*=col-]{
		padding: 10px;
	}
	.news-img{
		width: 100%;
		height: 200px;
		object-fit: cover;
		object-position: center;
	}
	.news-title{
		text-transform: uppercase;
		margin-bottom: 10px;
	}
	.news-date > .fa, .news-author > .fa{
		margin-right: 3px;
	}
	.news-date{
		margin-right: 15px;
	}
	.news-date, .news-author, .news-date *, .news-author *{
		color:#AAA;
	}
	.news-headline{
		margin-top: 15px;
		font-size: 12pt;
		color: #777;
	}
</style>
@endsection
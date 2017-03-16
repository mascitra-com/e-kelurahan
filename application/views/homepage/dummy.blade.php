<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>{{ $judul }}</title>
	<link rel="stylesheet" href="{{base_url('assets/plugins/bootstrap/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{base_url('assets/plugins/fontawesome/css/font-awesome.min.css')}}">
	<link rel="stylesheet" href="{{base_url('assets/css/theme-homepage.css')}}">
	<link rel="stylesheet" href="{{base_url('assets/css/theme-helper.css')}}">
</head>
<body>
	<div id="wrapper">
		<div id="top-menu">
			<nav class="navbar navbar-default">
				<div class="container-fluid">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="#">{{ strtoupper($judul) }}</a>
					</div>

					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<ul class="nav navbar-nav navbar-right">
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Profil <span class="caret text-white"></span></a>
								<ul class="dropdown-menu">
									<li><a href="#">Action</a></li>
									<li><a href="#">Another action</a></li>
								</ul>
							</li>
							<li><a href="#">Berita</a></li>
							<li><a href="#">Geleri</a></li>
							<li><a href="#">Agenda</a></li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Pelayanan <span class="caret text-white"></span></a>
								<ul class="dropdown-menu">
									<li><a href="#">Surat Blanko KTP</a></li>
								</ul>
							</li>
							<li><a href="#">Masuk</a></li>
						</ul>
					</div><!-- /.navbar-collapse -->
				</div><!-- /.container-fluid -->
			</nav>
		</div>
		<div class="section img-fade" id="sec1">
			<div class="article-wrapper">
				<span class="article-date">KAMIS, 27 FEBRUARY 2017</span>
				<h1 class="article-headline">Lorem ipsum dolor sit amet, consectetur adipisicing.</h1>
				<p class="article-overview"><b>Lumajang</b> - Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis quam non expedita nobis a porro pariatur saepe perspiciatis tempora explicabo.</p>
				<a href="#" class="btn btn-default btn-line btn-lg">Baca selengkapnya</a>
			</div>
		</div>
		<!-- SECTION 2 (BERITA) -->
		<div class="section" id="sec2">
			<div class="row no-gut match-height row-sec1">
				<!-- KOLOM KIRI -->
				<div class="col-xs-12 col-sm-7 col-md-9">
					<!-- HEADLINE / PALING BARU -->
					<div class="box">
					<h3 class="widget-title">SEDANG HANGAT</h3>
					@if(empty($headline))
						<!-- TODO -->
					@else
						<img src="{{ base_url('assets/images/berita/'.cek_file($headline->gambar,'./assets/images/berita/','default.png')) }}" class="news-img-big" alt="thumbnail">
						<span class="news-date-big"><?= strtoupper(mdate('%l, %d %F %Y', strtotime(str_replace('-', '/', $headline->tanggal_publish)))) ?></span>
						<h2 class="news-title-big">{{ $headline->judul }}</h2>
						<p class="news-headline-big">{{ potong_teks(strip_tags($headline->isi), 220) }}</p>
						<a href="#" class="btn btn-default btn-xs btn-line">selengkapnya</a>
					@endif
					</div>
					<hr>
					<!-- BERITA TERBARU -->
					<div class="box">
						<h3 class="widget-title">BERITA TERBARU</h3>
						<div class="row news-list">
							@if(empty($berita_terbarus))
							<div class="col-xs-12">
								<br>
								<p class="text-center">
									Tidak ada berita
								</p>
							</div>
							@else
							@foreach($berita_terbarus as $berita)
							<div class="col-xs-12 col-sm-6">
								<img src="{{ base_url('assets/images/berita/'.cek_file($berita->gambar,'./assets/images/berita/','default.png')) }}" class="news-img" alt="thumbnail">
								<span class="news-date"><?= strtoupper(mdate('%l, %d %F %Y', strtotime(str_replace('-', '/', $berita->tanggal_publish)))) ?></span>
								<h2 class="news-title">{{ $berita->judul }}</h2>
								<p class="news-headline">{{ potong_teks(strip_tags($berita->isi), 118) }} <a href="#">selengkapnya</a></p>
							</div>
							@endforeach
							@endif
						</div>
					</div>
					<hr>
					<!-- BERITA TRPOPULER -->
					<div class="box">
						<h3 class="widget-title">BERITA POPULER</h3>
						<div class="row news-list">
						@if(empty($berita_populers))
							<div class="col-xs-12">
								<br>
								<p class="text-center">
									Tidak ada berita
								</p>
							</div>
							@else
							@foreach($berita_populers as $berita)
							<div class="col-xs-12 col-sm-6">
								<img src="{{ base_url('assets/images/berita/'.cek_file($berita->gambar,'./assets/images/berita/','default.png')) }}" class="news-img" alt="thumbnail">
								<span class="news-date"><?= strtoupper(mdate('%l, %d %F %Y', strtotime(str_replace('-', '/', $berita->tanggal_publish)))) ?></span>
								<h2 class="news-title">{{ $berita->judul }}</h2>
								<p class="news-headline">{{ potong_teks(strip_tags($berita->isi), 118) }} <a href="#">selengkapnya</a></p>
							</div>
							@endforeach
							@endif
						</div>
					</div>
				</div>
				<!-- WIDGET -->
				<div class="col-xs-12 col-sm-5 col-md-3">
					<!-- LINK PROFIL -->
					<div class="box widget">
						<h3 class="widget-title">Profil</h3>
						<ul class="widget-list">
							<li><a href="#">Sambutan Lurah</a></li>
							<li><a href="#">Selayang Pandang</a></li>
							<li><a href="#">Visi &amp Misi</a></li>
							<li><a href="#">Program Unggulan</a></li>
							<li><a href="#">Peta &amp Batas Wilayah</a></li>
							<li><a href="#">Prestasi Kelurahanh</a></li>
							<li><a href="#">Moto Kelurahan</a></li>
						</ul>
					</div>
					<!-- FOTO BUPATI -->
					<div class="box widget widget-picbox">
						<img src="http://keckotabaru.jambikota.go.id/images/banner-pemkot.jpg" alt="thumbnail">
					</div>
					<!-- LINK PELAYANAN -->
					<div class="box widget">
						<h3 class="widget-title">Pelayanan</h3>
						<ul class="widget-list">
							<li><a href="#">Pelayanan A</a></li>
							<li><a href="#">Pelayanan B</a></li>
							<li><a href="#">Pelayanan C</a></li>
							<li><a href="#">Pelayanan D</a></li>
							<li><a href="#">Pelayanan E</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<!-- GAMBAR BANNER -->
		<div class="section" id="sec-banner">
			<img src="http://www.hazliseconomist.com/uploads/events/2013/GRT2013/1146x270_GRT2013.jpg" class="banner" alt="banner">
		</div>
		<!-- GALERI -->
		<div class="section" id="sec3">
			<div class="row match-height">
				<div class="col-xs-12 col-md-6">
					<div class="box">
						<h3 class="widget-title">Galeri Foto</h3>
						<div class="galeri-box">
							<img src="http://keckotabaru.jambikota.go.id/foto_galeri/2016/10/18/5120161013_163640.jpg" alt="foto">
							<img src="http://keckotabaru.jambikota.go.id/foto_galeri/2015/06/04/45marching%20band.jpg" alt="foto">
							<img src="http://keckotabaru.jambikota.go.id/foto_galeri/2015/06/04/72kuda%20lumping.jpg" alt="foto">
							<img src="http://keckotabaru.jambikota.go.id/foto_galeri/2015/05/26/50barisan%20kec-kel.jpg" alt="foto">
						</div>
						<hr>
						<h3 class="widget-title">Galeri Video</h3>
						<div class="galeri-box">
							<img src="http://keckotabaru.jambikota.go.id/foto_galeri/2016/10/18/5120161013_163640.jpg" alt="foto">
							<img src="http://keckotabaru.jambikota.go.id/foto_galeri/2015/06/04/45marching%20band.jpg" alt="foto">
							<img src="http://keckotabaru.jambikota.go.id/foto_galeri/2015/06/04/72kuda%20lumping.jpg" alt="foto">
							<img src="http://keckotabaru.jambikota.go.id/foto_galeri/2015/05/26/50barisan%20kec-kel.jpg" alt="foto">
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-md-3">
					<div class="box">
						<h3 class="widget-title">Agenda</h3>
						<ul class="agenda-list">
						@if(empty($agendas))
							<li>
								<span class="agenda-desc">Belum ada agenda.</span>
							</li>
						@else
							@foreach($agendas as $agenda)
							<li>
								<span class="agenda-date"><?= mdate('%l, %d %F %Y', strtotime(str_replace('-', '/', $agenda->tanggal_agenda))) ?></span>
								<span class="agenda-desc">{{ potong_teks(strip_tags($agenda->perihal), 52) }}</span>
							</li>
							@endforeach
						@endif
						</ul>
					</div>
				</div>
				<div class="col-xs-12 col-md-3">
					<div class="box">
						<h3 class="widget-title">Download</h3>
						<ul class="agenda-list">
							@for($i=0;$i < 4; $i++)
							<li>
								<span class="agenda-date">kamis, 10 februari 2017</span>
								<span class="agenda-desc">Lorem ipsum dolor sit amet, consectetur adipisicing.</span>
							</li>
							@endfor
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="section" id="sec-footer">
			<div class="row">
				<div class="col-xs-6 col-sm-4 col-md-2">
					<ul class="sitemap">
						<li class="sitemap-title"><h4>Profil</h4></li>
						<li><a href="#">Sambutan Lurah</a></li>
						<li><a href="#">Selayang Pandang</a></li>
						<li><a href="#">Visi &amp Misi</a></li>
						<li><a href="#">Program Unggulan</a></li>
						<li><a href="#">Peta &amp Batas Wilayah</a></li>
						<li><a href="#">Prestasi Kelurahanh</a></li>
						<li><a href="#">Moto Kelurahan</a></li>
					</ul>
				</div>
				<div class="col-xs-6 col-sm-4 col-md-2">
					<ul class="sitemap">
						<li class="sitemap-title"><h4>Berita</h4></li>
						<li><a href="#">Bertita Terbaru</a></li>
						<li><a href="#">Berita Terpopuler</a></li>
						<li><a href="#">Artikel</a></li>
					</ul>
					<ul class="sitemap">
						<li class="sitemap-title"><h4>Pengumuman</h4></li>
						<li><a href="#">Pengumuman Terbaru</a></li>
						<li><a href="#">Pengumuman</a></li>
					</ul>
				</div>
				<div class="col-xs-6 col-sm-4 col-md-2">
					<ul class="sitemap">
						<li class="sitemap-title"><h4>Pelayanan</h4></li>
						<li><a href="#">Pelayanan A</a></li>
						<li><a href="#">Pelayanan B</a></li>
						<li><a href="#">Pelayanan C</a></li>
						<li><a href="#">Pelayanan D</a></li>
						<li><a href="#">Pelayanan E</a></li>
						<li><a href="#">Pelayanan F</a></li>
					</ul>
				</div>
				<div class="col-xs-6 col-sm-4 col-md-2">
					<ul class="sitemap">
						<li class="sitemap-title"><h4>Regulasi</h4></li>
						<li><a href="#">Pajak &amp Retribusi Daerah</a></li>
						<li><a href="#">Peraturan Daerah (Perda)</a></li>
						<li><a href="#">Peraturan Gurbernur (Pergub)</a></li>
					</ul>
					<ul class="sitemap">
						<li class="sitemap-title"><h4>Galeri</h4></li>
						<li><a href="#">Galeri Foto</a></li>
						<li><a href="#">Galeri Video</a></li>
					</ul>
				</div>
				<div class="col-xs-6 col-sm-4 col-md-2">
					<ul class="sitemap">
						<li class="sitemap-title"><h4>Lokasi Layanan Publik</h4></li>
						<li><a href="#">Desa A</a></li>
						<li><a href="#">Kantor Desa A</a></li>
						<li><a href="#">Kelurahan B</a></li>
						<li><a href="#">Kantor Keluraha B</a></li>
						<li><a href="#">Muara A</a></li>
						<li><a href="#">Muara B</a></li>
					</ul>
				</div>
				<div class="col-xs-6 col-sm-4 col-md-2">
					<ul class="sitemap">
						<li class="sitemap-title"><h4>Kelurahan Tompokersan</h4></li>
						<li>Jl. Jend Sudirman No.75</li>
						<li>Tompokersan, Lumajang</li>
						<li>Kabupaten Lumajang</li>
						<li>Jawa Timur</li>
						<li>68121, Indonesia</li>
						<li>Telp:+62 541 1234567</li>
						<li>
							<i class="fa fa-facebook-square"></i>
							<i class="fa fa-twitter-square"></i>
							<i class="fa fa-instagram"></i>
						</li>
					</ul>
				</div>
			</div>
			<div class="copyright">
				<span>copyright <a href="http://www.mascitra.com">mascitra.com</a> &copy {{date('Y')}}. All rights reserved</span>
			</div>
		</div>
	</div>
</body>
<script src="{{base_url('assets/plugins/jquery/jquery-3.1.1.min.js')}}"></script>
<script src="{{base_url('assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{base_url('assets/js/theme-homepage.js')}}"></script>
</html>
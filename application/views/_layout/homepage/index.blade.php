<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>KELURAHAN XYZ | @yield('page_title')</title>
	<link rel="stylesheet" href="{{base_url('assets/plugins/bootstrap/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{base_url('assets/plugins/fontawesome/css/font-awesome.min.css')}}">
	<link rel="stylesheet" href="{{base_url('assets/css/theme-homepage.css')}}">
	<link rel="stylesheet" href="{{base_url('assets/css/theme-helper.css')}}">
	@yield('style')
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
						<a class="navbar-brand" href="#">KEL.TOMPOKERSAN</a>
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
							<li><a href="#">Galeri</a></li>
							<li><a href="#">Agenda</a></li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Pelayanan <span class="caret text-white"></span></a>
								<ul class="dropdown-menu">
									<li><a href="#">Blanko Isian KTP</a></li>
									<li><a href="#">Blanko Isian KK</a></li>
									<li><a href="#">SKCK</a></li>
									<li><a href="#">Surat Pengantar Ijin Keramaian</a></li>
									<li><a href="#">Surat Keterangan Pindah</a></li>
									<li><a href="#">Surat Keterangan Ijin Berusaha</a></li>
									<li><a href="#">SKTM (Sekolah)</a></li>
									<li><a href="#">Surat Keterangan Miskin</a></li>
									<li><a href="#">Surat Keterangan Pindah Hak Milik</a></li>
									<li><a href="#">Surat Keterangan Untuk Nikah</a></li>
									<li><a href="#">SKTM (Rumah Tangga)</a></li>
								</ul>
							</li>
							<li><a href="#">Regulasi</a></li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Kelurahan <span class="caret text-white"></span></a>
								<ul class="dropdown-menu">
									<li><a href="#">Tompokersan</a></li>
								</ul>
							</li>
							<li><a href="#">Masuk</a></li>
						</ul>
					</div><!-- /.navbar-collapse -->
				</div><!-- /.container-fluid -->
			</nav>
		</div>
		@yield('content')
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
						<li><a href="#">Masuk admin</a></li>
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
	<!-- PENGUMUAMN -->
	<div class="pengumuman">
		<ul class="pengumuman-list">
			<li>[02/02/17] Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequuntur, inventore!</li>
			<li>[02/02/17] Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequuntur, inventore!</li>
		</ul>
	</div>
	<!-- ALERT -->
	<?php $message = $this->session->flashdata('message'); ?>
	@if($message)
	<div class="modal fade" tabindex="-1" role="dialog" id="alerts">
		<div class="modal-dialog modal-{{$message[1]}} modal-sm" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				</div>
				<div class="modal-body" style="display: flex; flex-direction: column; align-items: center;">
					<i class="fa fa-bell fa-5x"></i>
					<p class="break-20 text-size-18 text-center">{{$message[0]}}</p>
				</div>
			</div>
		</div>
	</div>
	@endif
	<!-- END ALERT -->
</body>
<script src="{{base_url('assets/plugins/jquery/jquery-3.1.1.min.js')}}"></script>
<script src="{{base_url('assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{base_url('assets/plugins/jquery-marquee/jquery.marquee.min.js')}}"></script>
<script src="{{base_url('assets/js/theme-homepage.js')}}"></script>
@yield('javascript')
</html>
<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Favicons -->
	<link rel="apple-touch-icon" sizes="57x57" href="{{ base_url('assets/images/favicon/apple-icon-57x57.png')}} ">
	<link rel="apple-touch-icon" sizes="60x60" href="{{ base_url('assets/images/favicon/apple-icon-60x60.png')}} ">
	<link rel="apple-touch-icon" sizes="72x72" href="{{ base_url('assets/images/favicon/apple-icon-72x72.png')}} ">
	<link rel="apple-touch-icon" sizes="76x76" href="{{ base_url('assets/images/favicon/apple-icon-76x76.png')}} ">
	<link rel="apple-touch-icon" sizes="114x114" href="{{ base_url('assets/images/favicon/apple-icon-114x114.png')}}">
	<link rel="apple-touch-icon" sizes="120x120" href="{{ base_url('assets/images/favicon/apple-icon-120x120.png')}}">
	<link rel="apple-touch-icon" sizes="144x144" href="{{ base_url('assets/images/favicon/apple-icon-144x144.png')}}">
	<link rel="apple-touch-icon" sizes="152x152" href="{{ base_url('assets/images/favicon/apple-icon-152x152.png')}}">
	<link rel="apple-touch-icon" sizes="180x180" href="{{ base_url('assets/images/favicon/apple-icon-180x180.png')}}">
	<link rel="icon" type="image/png" sizes="192x192"  href="{{ base_url('assets/images/favicon/android-icon-192x192.png')}}">
	<link rel="icon" type="image/png" sizes="32x32" href="{{ base_url('assets/images/favicon/favicon-32x32.png')}}">
	<link rel="icon" type="image/png" sizes="96x96" href="{{ base_url('assets/images/favicon/favicon-96x96.png')}}">
	<link rel="icon" type="image/png" sizes="16x16" href="{{ base_url('assets/images/favicon/favicon-16x16.png')}}">
	<link rel="manifest" href="/manifest.json">

	{{-- Meta --}}
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="{{ base_url('assets/images/favicon/ms-icon-144x144.png') }}">
	<meta name="theme-color" content="#ffffff">
	<meta charset="UTF-8">
	<!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

	<title>{{ $judul }} | @yield('page_title')</title>
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
						<a class="logo-brand navbar-brand" href="{{ site_url('homepage/'.$slug) }}">
							<span><img src="{{ base_url('assets/images/logo-pemda.png') }}" style="width: 8%"></span> {{ (is_null($slug) || empty($slug)) ? 'KECAMATAN LUMAJANG' : 'KELURAHAN '.(strtoupper(str_replace("-", " ", $slug))) }}</a>
						</div>

						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
							<ul class="nav navbar-nav navbar-right">
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Profil <span class="caret text-white"></span></a>
									<ul class="dropdown-menu">
										@if($profil)
										@foreach($profil as $list)
										<li><a href="{{ site_url('homepage/'.$slug.'/profil/'.$list->slug) }}">{{ $list->judul }}</a></li>
										@endforeach
										@else
										<li><a href="#">Tidak ada Profil</a></li>
										@endif
									</ul>
								</li>
								<li><a href="{{ site_url('homepage/'.$slug.'/berita') }}">Berita</a></li>
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Galeri <span class="caret text-white"></span></a>
									<ul class="dropdown-menu">
										<li><a href="{{ site_url('homepage/'.$slug.'/album') }}">Galeri Foto</a></li>
										<li><a href="{{ site_url('homepage/'.$slug.'/video') }}">Galeri Video</a></li>
									</ul>
								</li>
								<li><a href="{{ site_url('homepage/'.$slug.'/agenda') }}">Agenda</a></li>
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Pelayanan <span class="caret text-white"></span></a>
									<ul class="dropdown-menu">
										<li><a href="{{ site_url('warga/pengajuan/blankoktp') }}">Blanko Isian KTP</a></li>
										<li><a href="{{ site_url('warga/pengajuan/blankokk') }}">Blanko Isian KK</a></li>
										<li><a href="{{ site_url('warga/pengajuan/skck') }}">SKCK</a></li>
										<li><a href="{{ site_url('warga/pengajuan/keterangan_kelahiran') }}">Surat Keterangan Kelahiran</a></li>
										<li><a href="{{ site_url('warga/pengajuan/keterangan_kematian') }}">Surat Keterangan Kematian</a></li>
										<li><a href="#">Surat Pengantar Ijin Keramaian</a></li>
										<li><a href="{{ site_url('warga/pengajuan/pindah') }}">Surat Keterangan Pindah</a></li>
										<li><a href="{{ site_url('warga/pengajuan/ijin_usaha') }}">Surat Keterangan Ijin Berusaha</a></li>
										<li><a href="{{ site_url('warga/pengajuan/sktm_sekolah') }}">SKTM (Sekolah)</a></li>
										<li><a href="{{ site_url('warga/pengajuan/keterangan_miskin') }}">Surat Keterangan Miskin</a></li>
										<li><a href="#">Surat Keterangan Pindah Hak Milik</a></li>
										<li><a href="#">Surat Keterangan Untuk Nikah</a></li>
										<li><a href="#">SKTM (Rumah Tangga)</a></li>
									</ul>
								</li>
								<li><a href="{{ site_url('homepage/'.$slug.'/regulasi') }}">Regulasi</a></li>
								@if(!is_null($slug) || !empty($slug))
								<li><a href="{{ site_url('/') }}">Kecamatan</a></li>
								@else
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Kelurahan <span class="caret text-white"></span></a>
									<ul class="dropdown-menu">
										@if($list_kelurahan)
										@foreach($list_kelurahan as $list)
										<li><a href="{{ site_url('homepage/' . $list->slug) }}">{{ $list->nama }}</a></li>
										@endforeach
										@endif
									</ul>
								</li>
								@endif
								<li><a href="{{ site_url('warga') }}">Masuk</a></li>
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
							@if($profil)
							@foreach($profil as $list)
							<li><a href="{{ site_url('homepage/'.$slug.'/profil/'.$list->slug) }}">{{ $list->judul }}</a></li>
							@endforeach
							@endif
							<li><a href="{{ site_url('auth/login') }}">Masuk admin</a></li>
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
							<li><a href="{{ site_url('warga/pengajuan/blankoktp') }}">Blanko Isian KTP</a></li>
							<li><a href="{{ site_url('warga/pengajuan/blankokk') }}">Blanko Isian KK</a></li>
							<li><a href="{{ site_url('warga/pengajuan/skck') }}">SKCK</a></li>
							<li><a href="{{ site_url('warga/pengajuan/keterangan_kelahiran') }}">Surat Keterangan Kelahiran</a></li>
							<li><a href="{{ site_url('warga/pengajuan/keterangan_kematian') }}">Surat Keterangan Kematian</a></li>
							<li><a href="#">Surat Pengantar Ijin Keramaian</a></li>
							<li><a href="{{ site_url('warga/pengajuan/pindah') }}">Surat Keterangan Pindah</a></li>
							<li><a href="{{ site_url('warga/pengajuan/ijin_usaha') }}">Surat Keterangan Ijin Berusaha</a></li>
							<li><a href="{{ site_url('warga/pengajuan/sktm_sekolah') }}">SKTM (Sekolah)</a></li>
							<li><a href="{{ site_url('warga/pengajuan/keterangan_miskin') }}">Surat Keterangan Miskin</a></li>
							<li><a href="#">Surat Keterangan Pindah Hak Milik</a></li>
							<li><a href="#">Surat Keterangan Untuk Nikah</a></li>
							<li><a href="#">SKTM (Rumah Tangga)</a></li>
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
							<li><a href="{{ site_url('homepage/'.$slug.'/album') }}">Galeri Foto</a></li>
							<li><a href="{{ site_url('homepage/'.$slug.'/video') }}">Galeri Video</a></li>
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
				@if($pengumuman)
				@foreach($pengumuman as $list)
				<li>
					[{{ date('d/m/Y', strtotime($list->created_at)) }}] {{ $list->nama }} - {{ $list->isi }}
				</li>
				@endforeach
				@endif
			</ul>
		</div>
		@yield('modal')
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
	<script>
		$(document).ready(function(){
			$("#alerts").modal('show');

		// modal reset
		$(".modal").on('hide.bs.modal', function(e){
			$(".modal form").trigger('reset');
		});
	});
</script>
@yield('javascript')
</html>
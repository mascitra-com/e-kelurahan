<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>KELURAHAN XYZ | @yield('title')</title>
	<link rel="stylesheet" href="{{base_url('assets/plugins/bootstrap/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{base_url('assets/plugins/fontawesome/css/font-awesome.min.css')}}">
	<link rel="stylesheet" href="{{base_url('assets/css/theme-dashboard-user.css')}}">
	<link rel="stylesheet" href="{{base_url('assets/css/theme-helper.css')}}">
	@yield('style')
</head>
<body>
	<div id="wrapper">
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
					<ul class="nav navbar-nav">
						<li><a href="#">Profil</a></li>
						<li class="dropdown active">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Pelayanan <span class="caret"></span></a>
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
						<li><a href="{{ site_url('warga/surat') }}">Status Pengajuan</a></li>
						<li><a href="{{ site_url('warga/logout') }}">Keluar</a></li>
					</ul>
				</div>
			</div>
		</nav>
		<div id="content">
			@yield('content')
		</div>
	</div>
	@yield('modal')
</body>
<script src="{{base_url('assets/plugins/jquery/jquery-3.1.1.min.js')}}"></script>
<script src="{{base_url('assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
@yield('javascript')
</html>
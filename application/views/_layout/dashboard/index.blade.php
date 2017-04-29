<!DOCTYPE html>
<html lang="en" moznomarginboxes mozdisallowselectionprint>
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
	<title>E-KELURAHAN | @yield('title')</title>
	<link rel="stylesheet" href="{{base_url('assets/plugins/bootstrap/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{base_url('assets/plugins/fontawesome/css/font-awesome.min.css')}}">
	<link rel="stylesheet" href="{{base_url('assets/plugins/jquery-ui/jquery-ui.min.css')}}">
	<link rel="stylesheet" href="{{base_url('assets/css/theme-2.css')}}">
	<link rel="stylesheet" href="{{base_url('assets/css/theme-helper.css')}}">
	@yield('style')
</head>
<body>
	<div class="container-fluid" id="wrapper">
		<!-- SIDEBAR -->
		@if($this->config->item('coder') == 'front')
		@include('_layout/dashboard/sidebar-ui')
		@else
		@include('_layout/dashboard/sidebar')
		@endif
		<div id="content">
			<div class="content-nav">
				<nav class="navbar navbar-default">
					<div class="container-fluid">
						<div class="navbar-header">
							<!-- Navbar toggle button -->
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu" aria-expanded="false">
								<i class="fa fa-bars"></i>
							</button>
							<!-- Sidebar toggle button -->
							<button type="button" class="sidebar-toggle">
								<i class="fa fa-bars"></i>
							</button>
							<a class="navbar-brand text-size-24" href="#">@yield('title')</a>
						</div>
						<div class="collapse navbar-collapse" id="menu">
							<ul class="nav navbar-nav navbar-right">
								@if(show_sidebar_menu('dashboard/notifikasi', $link_privileges))
								<li class="dropdown notifikasi">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
										<i class="fa fa-envelope"></i>
									</a>
									<ul class="dropdown-menu notifikasi-list"></ul>
								</li>
								@endif
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ str_replace('@lumajang', '', $this->session->userdata('identity')) }} <span class="caret"></span></a>
									<ul class="dropdown-menu">
										<li><a href="{{ site_url('profil') }}"><i class="fa fa-user"></i> Profil</a></li>
										<li><a href="{{ site_url('auth/logout') }}"><i class="fa fa-lock"></i> Keluar</a></li>
									</ul>
								</li>
							</ul>
						</div>
					</div>
				</nav>
			</div>
			<div class="container-fluid">
				@yield('content')
			</div>
		</div>
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
				<div class="modal-body">
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
<script src="{{base_url('assets/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<script src="{{base_url('assets/js/theme.js')}}"></script>
<script>
	var count_test = 1;
	$(document).ready(function(){
		$("button.reload").click(function(){location.reload();});
		$("#alerts").modal('show');
		$("[type='date']").prop('type', 'text').datepicker({dateFormat: "yy-mm-dd"});

		// modal reset
		$(".modal").on('hide.bs.modal', function(e){
			$(".modal form").trigger('reset');
		});

		// Notifikasi
		refresh_notifikasi();
		setInterval(refresh_notifikasi, (5 * (60 * 1000)));
	});

	function refresh_notifikasi(){
		$.getJSON('{{ site_url('dashboard/notifikasi') }}', function (result) {
            var notif_count = result.notif_count; //Diisi dengan jumlah pengajuan
            var notif_list = result.notif_list;
            // Tulis pesan notifikasi kosong
            $(".notifikasi > a > .badge").remove();
            $(".notifikasi-list").append("<li><a href='#'>Tak ada pengajuan</a></li>");
            if (notif_count > 0) {
            	$(".notifikasi > a").append(" <span class='badge badge-sm'>"+notif_count+"</span>");
            	$(".notifikasi-list").empty();

            	$.each(notif_list, function(index,value){
            		$(".notifikasi-list").append("<li><a href='{{ site_url() }}"+value.link+"'><span class='badge badge-sm'>"+value.jumlah+"</span> "+value.jenis+"</a></li>");
            	});
            }
        });
	}
</script>
@yield('javascript')
</html>
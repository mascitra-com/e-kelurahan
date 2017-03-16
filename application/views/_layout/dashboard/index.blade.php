<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>E-KELURAHAN | @yield('title')</title>
	<link rel="stylesheet" href="{{base_url('assets/plugins/bootstrap/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{base_url('assets/plugins/fontawesome/css/font-awesome.min.css')}}">
	<link rel="stylesheet" href="{{base_url('assets/plugins/jquery-ui/jquery-ui.min.css')}}">
	<link rel="stylesheet" href="{{base_url('assets/css/theme.css')}}">
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
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-envelope"></i> <span class="badge badge-sm">42</span></a>
									<ul class="dropdown-menu">
										<li><a href="#"><span class="badge badge-sm">05</span> Blanko KTP</a></li>
										<li><a href="#"><span class="badge badge-sm">15</span> SKCK</a></li>
										<li><a href="#"><span class="badge badge-sm">18</span> Keterangan Miskin</a></li>
									</ul>
								</li>
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Ainul Yaqin <span class="caret"></span></a>
									<ul class="dropdown-menu">
										<li><a href="#">Action</a></li>
										<li><a href="#">Another action</a></li>
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
	$(document).ready(function(){
		$("button.reload").click(function(){location.reload();});
		$("#alerts").modal('show');
		$("[type='date']").prop('type', 'text').datepicker({dateFormat: "yy-mm-dd"});

		// modal reset
		$(".modal").on('hide.bs.modal', function(e){
			$(".modal form").trigger('reset');
		});
	});
</script>
@yield('javascript')
</html>
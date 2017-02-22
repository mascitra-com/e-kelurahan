<div id="sidebar">
	<div id="sidebar-wrapper">
		<div class="sidebar-title"><h2>E-Kelurahan</h2><span>@yield('nama-kelurahan')</span></div>
		<ul class="sidebar-nav">
			<li class="sidebar-close"><a href="#"><i class="fa fa-fw fa-close"></i></a></li>
			@if(show_sidebar_menu('dashboard/index', $link_privileges))
			<li><a href="#"><i class="fa fa-fw fa-home"></i><span class="nav-label">Dashboard</span></a></li>
			@endif
			@if(show_sidebar_menu('kelurahan/index', $link_privileges))
			<li><a href="{{site_url('kelurahan')}}"><i class="fa fa-fw fa-bank"></i><span class="nav-label">Kelurahan</span></a></li>
			@endif
			@if(show_sidebar_menu('penduduk/index', $link_privileges))
			<li><a href="{{site_url('penduduk')}}"><i class="fa fa-fw fa-user"></i><span class="nav-label">Kependudukan</span></a></li>
			@endif
			@if(show_sidebar_menu('keluarga/index', $link_privileges))
			<li><a href="{{site_url('keluarga')}}"><i class="fa fa-fw fa-users"></i><span class="nav-label">Keluarga</span></a></li>
			@endif
			<li>
				<a href="#nav-1" data-toggle="collapse" aria-controls="nav-1"><i class="fa fa-fw fa-upload"></i><span class="nav-label">Pindah</span></a>
				<ul class="sidebar-nav-child collapse collapseable" id="nav-1">
					<li><a href="{{site_url('pindah_pengajuan')}}"><i class="fa fa-bookmark"></i><span class="nav-label">Pengajuan</span></a></li>
					<li><a href="{{site_url('pindah')}}"><i class="fa fa-upload"></i><span class="nav-label">Data Pengajuan</span></a></li>
					<li><a href="{{site_url('pindah_arsip')}}"><i class="fa fa-archive"></i><span class="nav-label">Arsip Pengajuan</span></a></li>
				</ul>
			</li>
			<li class="active"><a href="{{base_url('ui')}}"><i class="fa fa-fw fa-cog"></i><span class="nav-label">UI</span></a></li>
		</ul>
		<div class="sidebar-footer">
			<a href="{{ site_url('auth/logout') }}" class="btn btn-default btn-block"><i class="fa fa-fw fa-power-off"></i><span class="nav-label">logout</span></a>
		</div>
	</div>
</div>
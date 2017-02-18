<div id="sidebar">
	<div id="sidebar-wrapper">
		<div class="sidebar-title"><h2>E-Kelurahan</h2><span>@yield('nama-kelurahan')</span></div>
		<ul class="sidebar-nav">
			<li class="sidebar-close"><a href="#"><i class="fa fa-fw fa-close"></i></a></li>
			<li><a href="#"><i class="fa fa-fw fa-home"></i><span class="nav-label">Dashboard</span></a></li>
			<li>
				<a href="#nav-dokumen" data-toggle="collapse" aria-controls="nav-dokumen"><i class="fa fa-fw fa-archive"></i><span class="nav-label">Dokumen</span></a>
				<ul class="sidebar-nav-child collapse collapseable" id="nav-dokumen">
					<li><a href="#"><i class="fa fa-upload"></i><span class="nav-label">Pengajuan Baru</span></a></li>
					<li><a href="#"><i class="fa fa-bookmark"></i><span class="nav-label">Arsip Lama</span></a></li>
					<li><a href="#"><i class="fa fa-envelope-o"></i><span class="nav-label">Surat-Surat</span></a></li>
				</ul>
			</li>
			<li><a href="#"><i class="fa fa-fw fa-user"></i><span class="nav-label">Pegawai</span></a></li>
			<li class="active"><a href="{{base_url('ui')}}"><i class="fa fa-fw fa-cog"></i><span class="nav-label">UI</span></a></li>
		</ul>
		<div class="sidebar-footer">
			<button class="btn btn-default btn-block"><i class="fa fa-fw fa-power-off"></i><span class="nav-label">logout</span></button>
		</div>
	</div>
</div>
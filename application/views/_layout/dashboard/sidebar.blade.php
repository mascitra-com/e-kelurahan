<div id="sidebar">
	<div id="sidebar-wrapper">
		<div class="sidebar-title"><h2>E-Kelurahan</h2><span>@yield('nama-kelurahan')</span></div>
		<ul class="sidebar-nav">
			<li class="sidebar-close"><a href="#"><i class="fa fa-fw fa-close"></i></a></li>
			@if(show_sidebar_menu('dashboard/index', $link_privileges))
			<li><a href="{{ site_url('dashboard') }}"><i class="fa fa-fw fa-home"></i><span class="nav-label">Dashboard</span></a></li>
			@endif
			@if(show_sidebar_menu('profil/index', $link_privileges) || show_sidebar_menu('kelurahan/index', $link_privileges) || $super)
			<li class="nav-label">Kelurahan</li>
			@endif
			@if(show_sidebar_menu('profil/index', $link_privileges))
			<li><a href="{{ site_url('profil') }}"><i class="fa fa-fw fa-info-circle"></i><span class="nav-label">Profil</span></a></li>
			@endif
			@if(show_sidebar_menu('kelurahan/index', $link_privileges))
			<li><a href="{{site_url('kelurahan')}}"><i class="fa fa-fw fa-bank"></i><span class="nav-label">Kelurahan</span></a></li>
			@endif
			@if($super)
			<li><a href="{{site_url('kelurahan/konfirmasi')}}"><i class="fa fa-fw fa-check"></i><span class="nav-label">Konfirmasi</span></a></li>
			@endif
			@if(show_sidebar_menu('penduduk/index', $link_privileges) || show_sidebar_menu('keluarga/index', $link_privileges))
			<li>
				<a href="#nav-1" data-toggle="collapse" aria-controls="nav-1">
					<i class="fa fa-fw fa-user"></i>
					<span class="nav-label">Kependudukan</span>
					<span class="nav-caret"><i class="fa fa-caret-down"></i></span>
				</a>
				<ul class="sidebar-nav-child collapse collapseable" id="nav-1">
					<li><a href="{{site_url('penduduk')}}"><i class="fa fa-fw fa-user"></i><span class="nav-label">Data Penduduk</span></a></li>
					<li><a href="{{site_url('keluarga')}}"><i class="fa fa-fw fa-users"></i><span class="nav-label">Data Keluarga</span></a></li>
				</ul>
			</li>
			@endif
			@if(show_sidebar_menu('kelahiran/index', $link_privileges))
			<li class="nav-label">Surat</li>
			@endif
			@if(show_sidebar_menu('kelahiran/index', $link_privileges))
			<li><a href="{{ site_url('kelahiran') }}"><i class="fa fa-fw fa-user-plus"></i><span class="nav-label">Keterangan Kelahiran</span></a></li>
			@endif
			@if(show_sidebar_menu('kematian/index', $link_privileges))
			<li><a href="{{ site_url('kematian') }}"><i class="fa fa-fw fa-user-times"></i><span class="nav-label">Keterangan Kematian</span></a></li>
			@endif
			@if(show_sidebar_menu('pindah/index', $link_privileges))
			<li>
				<a href="#nav-2" data-toggle="collapse" aria-controls="nav-2">
					<i class="fa fa-fw fa-upload"></i>
					<span class="nav-label">Mutasi Keluar</span>
					<span class="nav-caret"><i class="fa fa-caret-down"></i></span>
				</a>
				<ul class="sidebar-nav-child collapse collapseable" id="nav-2">
					<li><a href="{{site_url('pindah/tambah')}}"><i class="fa fa-bookmark"></i><span class="nav-label">Pengajuan</span></a></li>
					<li><a href="{{site_url('pindah')}}"><i class="fa fa-upload"></i><span class="nav-label">Data Pengajuan</span></a></li>
					<li><a href="{{site_url('pindah/arsip')}}"><i class="fa fa-archive"></i><span class="nav-label">Arsip Pengajuan</span></a></li>
				</ul>
			</li>
			@endif
			<li>
				<a href="#nav-3" data-toggle="collapse" aria-controls="nav-3">
					<i class="fa fa-fw fa-download"></i>
					<span class="nav-label">Mutasi Masuk</span>
					<span class="nav-caret"><i class="fa fa-caret-down"></i></span>
				</a>
				<ul class="sidebar-nav-child collapse collapseable" id="nav-3">
					<li><a href="#"><i class="fa fa-bookmark"></i><span class="nav-label">Pengajuan</span></a></li>
					<li><a href="#"><i class="fa fa-download"></i><span class="nav-label">Data Pengajuan</span></a></li>
					<li><a href="#"><i class="fa fa-archive"></i><span class="nav-label">Arsip Pengajuan</span></a></li>
				</ul>
			</li>
			<li><a href="#"><i class="fa fa-fw fa-truck"></i><span class="nav-label">Pindah RT</span></a></li>
			<li>
				<a href="#nav-surat-masuk" data-toggle="collapse" aria-controls="nav-surat-masuk">
					<i class="fa fa-fw fa-envelope"></i>
					<span class="nav-label">Surat Masuk</span>
					<span class="nav-caret"><i class="fa fa-caret-down"></i></span>
				</a>
				<ul class="sidebar-nav-child collapse collapseable" id="nav-surat-masuk">
					<li><a href="#"><i class="fa fa-file-o"></i><span class="nav-label">Daftar Surat Masuk</span></a></li>
					<li><a href="#"><i class="fa fa-archive"></i><span class="nav-label">Arsip Surat Masuk</span></a></li>
				</ul>
			</li>
			@if(show_sidebar_menu('surat/blankokk', $link_privileges))
			<li>
				<a href="#nav-surat" data-toggle="collapse" aria-controls="nav-surat">
					<i class="fa fa-fw fa-envelope"></i>
					<span class="nav-label">Surat Keluar</span>
					<span class="nav-caret"><i class="fa fa-caret-down"></i></span>
				</a>
				<ul class="sidebar-nav-child collapse collapseable" id="nav-surat">
					<li><a href="{{site_url('surat/blankoktp')}}"><i class="fa fa-file-o"></i><span class="nav-label">Blanko Isian KTP</span></a></li>
					<li><a href="{{site_url('surat/blankokk')}}"><i class="fa fa-file-o"></i><span class="nav-label">Blanko Isian KK</span></a></li>
					<li><a href="{{site_url('surat/skck')}}"><i class="fa fa-file-o"></i><span class="nav-label">SKCK</span></a></li>
					<li><a href="{{site_url('surat/keterangan_miskin')}}"><i class="fa fa-file-o"></i><span class="nav-label">Keterangan Miskin</span></a></li>
					<li><a href="{{site_url('surat/keterangan_miskin_rt')}}"><i class="fa fa-file-o"></i><span class="nav-label">Keterangan Miskin (RT)</span></a></li>
					<li><a href="{{site_url('surat_ijin_usaha')}}"><i class="fa fa-file-o"></i><span class="nav-label">Keterangan Ijin Usaha</span></a></li>
					<li><a href="{{site_url('sktm_sekolah')}}"><i class="fa fa-file-o"></i><span class="nav-label">SKTM Sekolah</span></a></li>
				</ul>
			</li>
			@endif
			<li class="nav-label">Rekapitulasi</li>
			<li><a href="#"><i class="fa fa-fw fa-file"></i><span class="nav-label">Laporan</span></a></li>
			@if(show_sidebar_menu('berita/index', $link_privileges) || show_sidebar_menu('info/index', $link_privileges) ||show_sidebar_menu('agenda/index', $link_privileges) || show_sidebar_menu('galeri/index', $link_privileges) || show_sidebar_menu('regulasi/index', $link_privileges) || show_sidebar_menu('pengumuman/index', $link_privileges))
			<li class="nav-label">Website</li>
			<li>
				<a href="#nav-berita" data-toggle="collapse" aria-controls="nav-berita">
					<i class="fa fa-fw fa-newspaper-o"></i>
					<span class="nav-label">Berita</span>
					<span class="nav-caret"><i class="fa fa-caret-down"></i></span>
				</a>
				<ul class="sidebar-nav-child collapse collapseable" id="nav-berita">
					<li><a href="{{ site_url('berita') }}"><i class="fa fa-tasks"></i><span class="nav-label">Daftar Berita</span></a></li>
					<li><a href="{{ site_url('berita/draf') }}"><i class="fa fa-pencil-square-o"></i><span class="nav-label">Draf</span></a></li>
					<li><a href="{{ site_url('berita/arsip') }}"><i class="fa fa-archive"></i><span class="nav-label">Arsip</span></a></li>
				</ul>
			</li>
			@endif
			<li><a href="{{ site_url('info') }}"><i class="fa fa-fw fa-sitemap"></i><span class="nav-label">Info</span></a></li>
			<li><a href="{{ site_url('agenda') }}"><i class="fa fa-fw fa-calendar"></i><span class="nav-label">Agenda</span></a></li>
			<li>
				<a href="#nav-5" data-toggle="collapse" aria-controls="nav-5">
					<i class="fa fa-fw fa-image"></i>
					<span class="nav-label">Galeri</span>
					<span class="nav-caret"><i class="fa fa-caret-down"></i></span>
				</a>
				<ul class="sidebar-nav-child collapse collapseable" id="nav-5">
					<li><a href="{{ site_url('galeri') }}"><i class="fa fa-image"></i><span class="nav-label">Foto</span></a></li>
					<li><a href="{{ site_url('galeri/video') }}"><i class="fa fa-video-camera"></i><span class="nav-label">Video</span></a></li>
				</ul>
			</li>
			<li><a href="{{ site_url('regulasi') }}"><i class="fa fa-fw fa-legal"></i><span class="nav-label">Regulasi</span></a></li>
			<li><a href="{{ site_url('pengumuman') }}"><i class="fa fa-fw fa-bullhorn"></i><span class="nav-label">Pengumuman</span></a></li>
			<li class="nav-label">Lain-Lain</li>
			<li><a href="{{ site_url('pengaturan') }}"><i class="fa fa-fw fa-cog"></i><span class="nav-label">Pengaturan</span></a></li>
		</ul>
		<div class="sidebar-footer"></div>
	</div>
</div>
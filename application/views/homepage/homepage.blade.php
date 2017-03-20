@layout('_layout/homepage/index')

@section('page_title')
{{$judul}}
@endsection

@section('organisasi_name')
{{strtoupper($judul)}}
@endsection

@section('content')
<div class="section img-fade" id="sec1">
	<div class="article-wrapper">
		<h1 class="article-headline">Selayang Pandang</h1>
		@if($profile)
		<p class="article-overview">{{ $profile->deskripsi }}</p>
		@endif
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
				@else
				<img src="{{ base_url('assets/images/berita/'.cek_file($headline->gambar,'./assets/images/berita/','default.png')) }}" class="news-img-big" alt="thumbnail">
				<span class="news-date-big">{{ strtoupper(mdate('%l, %d %F %Y', strtotime(str_replace('-', '/', $headline->tanggal_publish)))) }}</span>
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
						<span class="news-date">{{ strtoupper(mdate('%l, %d %F %Y', strtotime(str_replace('-', '/', $berita->tanggal_publish)))) }}</span>
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
						<span class="news-date">{{ strtoupper(mdate('%l, %d %F %Y', strtotime(str_replace('-', '/', $berita->tanggal_publish)))) }}</span>
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
					@if($foto)
					@foreach($foto as $item)
					<img src="{{ base_url('assets/galeri/'.$item->link) }}" alt="foto">
					@endforeach
					@endif
				</div>
				<hr>
				<h3 class="widget-title">Galeri Video</h3>
				<div class="galeri-box">
					@if($video)
					@foreach($video as $item)
					<video width="144" height="108" controls>
						<source src="{{ base_url('assets/galeri/'.$item->link) }}">
							Your browser does not support the video tag.
						</video>
						@endforeach
						@endif
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
							<span class="agenda-date">{{ mdate('%l, %d %F %Y', strtotime(str_replace('-', '/', $agenda->tanggal_agenda))) }}</span>
							<span class="agenda-desc">{{ potong_teks(strip_tags($agenda->perihal), 52) }}</span>
						</li>
						@endforeach
						@endif
					</ul>
				</div>
			</div>
			<div class="col-xs-12 col-md-3">
				<div class="box">
					<h3 class="widget-title">Regulasi</h3>
					<ul class="agenda-list">
						@if(empty($agendas))
						<li>
							<span class="agenda-desc">Belum ada regulasi.</span>
						</li>
						@else
						@foreach($regulations as $regulasi)
						<li>
							<span class="agenda-date">{{ mdate('%l, %d %F %Y', strtotime(str_replace('-', '/', $regulasi->tgl_dikeluarkan))) }}</span>
							<span class="agenda-desc">{{ potong_teks(strip_tags($regulasi->judul), 52) }}</span>
						</li>
						@endforeach
						@endif
					</ul>
				</div>
			</div>
		</div>
	</div>
	@endsection

	@section('style')
	<style>
		/*SECTION 1*/
		#sec1{
			display: flex;
			flex-direction: column;
			justify-content: center;
			height: 100vh;
			max-height: 100vh;
			padding: 65px;
			padding-top: 100px;
			background-color: rgba(255,255,255,.5);
			background-image: url('https://www.suarapetani.com/wp-content/uploads/2016/05/mentari-pagi-sawah.jpg');
			background-size: cover;
			background-position: bottom;
			background-attachment: fixed;
		}

		#sec1 *{
			color: #FFF;
		}

		#sec1 .article-wrapper{
			width: 50%;
			padding-top: 50px;
		}

		#sec1 .article-date{
			font-size:12pt;
			font-weight: 500;
			color: rgba(255,255,255,.6);
		}

		#sec1 .article-headline{
			font-family: 'Roboto Condensed', sans-serif;
			font-weight: 700;
			font-size: 36pt;
			line-height: 45px;
			margin-top: 10px;
			margin-bottom: 25px;
		}

		#sec1 .article-overview, #sec1 .article-overview b{
			font-size: 14pt;
			font-weight: 300;
			line-height: 25px;
		}

		#sec1 .article-overview b{
			font-weight: 500;
		}

		#sec1 .btn-line{
			border-width: 2px;
			font-weight: 300;
			margin-top: 20px;
			border-radius: 5px;
		}

		#sec1 .btn-line:hover{
			color: #333;
			border-color: transparent;
		}

		@media(max-width: 992px){
			#sec1{
				padding-left: 45px;
				padding-right: 45px;
			}

			#sec1 .article-wrapper{
				width: 75%;
			}

			#sec1 .article-headline{
				font-size: 30pt; 
			}
		}
		@media(max-width: 768px){
			#sec1{
				padding-left: 35px;
				padding-right: 35px;
			}

			#sec1 .article-wrapper{
				width: 100%;
			}

			#sec1 .article-headline{
				font-size: 30pt; 
			}
		}

		/*SECTION 2*/
		#sec2{
			padding: 40px 35px;
		}

		.box{
			width: 100%;
			padding: 20px;
			background-color: #FFF;
			border-radius: 3px;
		}

		.row.no-gut{
			margin-left: 0;
			margin-right: 0;
		}

		.row.no-gut > [class*="col-"]{
			padding: 10px 30px;
			background-color: #FFF;
			border-radius: 3px;
		}

		.row.match-height{
			display: flex;
			flex-wrap: wrap;
		}

		.box-blue{background-color: #104360;color: #FFF}
		.box-yellow{background-color: yellow;color: #FFF}
		.box-purple{background-color: #684958;color: #FFF}

		.news-img-big{
			display: inline-block;
			float: left;
			width: 300px;
			height: 200px;
			margin-right: 25px;
			object-fit: cover;
			object-position: center center;
		}

		.news-date-big{
			font-weight: 500;
			color:#777;
		}

		.news-title-big{
			line-height: 30px;
			margin-top: 10px;
			margin-bottom: 10px;
		}

		.news-headline-big{
			font-weight: 300;
		}

		.news-list > div{
			margin-bottom: 25px;
			padding-right: 0;
		}

		.news-img{
			display: inline-block;
			width: 125px;
			height: 125px;
			margin-right: 20px;
			float: left;
			object-fit: cover;
			object-position: center center;
		}

		.news-date{
			font-size: 8pt;
			color:#777;
			font-weight: 500;
		}

		.news-title{
			font-size: 12pt;
			line-height: 17px;
			margin-bottom: 5px;
		}

		.news-headline{
			font-weight: 300;
			font-size: 10pt;
		}

		.widget-title{
			display: block;
			text-transform: uppercase;
			color: #AAA;
		}

		.widget-title{
			margin-bottom: 10px;
		}

		.widget{
			padding-left: 20px;
			padding-right: 0px;
		}

		.widget-picbox img{
			width: 100%;
			object-fit: cover;
			object-position: center center;
		}

		.widget-list li{
			list-style: none;
		}

		.widget-list > li > a{
			display: block;
			width: 100%;
			padding: 5px 0;
			text-decoration: none;
			border-bottom: 1px #777 dashed;
			text-transform: uppercase;
			font-size: 11pt;
			font-weight: 300;
		}

		.widget-list > li > a:hover{
			background-color: #CCC;
		}

		.widget-list > li > a:before{
			content: "» ";
		}

		#sec-banner{
			padding: 25px 35px;
		}

		.banner{
			width: 100%;
		}

		#sec3{
			padding: 25px 35px;
		}

		.galeri-box{
			display: flex;
			flex-wrap: nowrap;
		}

		.galeri-box img{
			height: 80px;
			flex-grow: 1;
			object-fit: cover;
			object-position: center center;
			margin-left: 5px;
			margin-right: 5px;
		}

		.agenda-list li{
			display: block;
			list-style: none;
			border-bottom: 1px #ccc solid;
			padding-top: 10px;
			padding-bottom: 15px;
		}

		.agenda-date{
			font-size: 9pt;
			color:#777;
		}

		.agenda-desc{
			display: block;
			font-size: 12pt;
			line-height: 18px;
		}
	</style>
	@endsection
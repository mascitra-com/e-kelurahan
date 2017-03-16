@layout('_layout/homepage/index')

@section('page_title')
Judul Berita
@endsection

@section('content')
<div class="container-fluid container-content">
	<div class="row">
		<div class="col-xs-12">
			<div class="panel">
				<div class="panel-body">
					<img src="{{ base_url('assets/images/berita/'.cek_file($berita->gambar,'./assets/images/berita/','default.png')) }}" class="headline" alt="thumbnail">
					<h1 class="title">{{ $berita->judul }}</h1>
					<span class="date"><i class="fa fa-clock-o"></i> {{ strtoupper(date('l, d M Y')) }}</span>
					<span class="author"><i class="fa fa-user"></i> OLEH {{ strtoupper($berita->akun->username) }}</span>
					<div class="content">
						{{ $berita->isi }}
					</div>
					<h3 class="break-top-100 break-bottom-20 text-grey">Berita Terpopuler</h3>
					<div class="row">
						@foreach($populers as $berita)
						<div class="col-sm-6 col-md-3">
							<div class="thumbnail">
								<img src="{{ base_url('assets/images/berita/'.cek_file($berita->gambar,'./assets/images/berita/','default.png')) }}" alt="..." class="news-list-thumb">
								<div class="caption">
									<a href="{{ site_url('homepage/'.$slug. '/' .'berita_selengkapnya/'.$berita->slug) }}"><h4>{{ $berita->judul }}</h4></a>
								</div>
							</div>
						</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('style')
<style>
	.container-content{
		min-height: 55vh;
		padding: 50px;
		padding-top: 125px;
	}
	.panel{
		padding: 15px 50px;
	}
	.label{
		font-weight: 300;
	}
	.headline{
		width: 100%;
		height: 250px;
		object-fit: cover;
		object-position: center;
		margin-bottom: 20px;
	}
	.title{
		margin-bottom: 5px;
	}
	.date, .author, .date *, .author *{
		color: #777;
	}
	.date{
		margin-right: 15px;
	}
	.content{
		margin-top: 40px;
	}
	.content > p{
		font-size: 11pt;
		line-height: 28px;
	}
	.news-list-thumb{
		width: 100%;
		height: 175px!important;
		object-fit: cover;
		object-position: center;
	}
</style>
@endsection
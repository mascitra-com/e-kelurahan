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
					<img src="http://kingofwallpapers.com/crowd/crowd-004.jpg" class="headline" alt="thumbnail">
					<h1 class="title">Lorem ipsum dolor sit amet, consectetur adipisicing.</h1>
					<span class="date"><i class="fa fa-clock-o"></i> SELASA, 02 FEB 2017</span>
					<span class="author"><i class="fa fa-user"></i> OLEH ADMIN</span>
					<div class="content">
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odit pariatur eos dignissimos eaque molestiae provident, ducimus sapiente optio tempora quibusdam esse mollitia illum libero, hic a consectetur amet assumenda repudiandae.</p>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odit pariatur eos dignissimos eaque molestiae provident, ducimus sapiente optio tempora quibusdam esse mollitia illum libero, hic a consectetur amet assumenda repudiandae. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam mollitia ducimus consequuntur quam natus assumenda. Praesentium aliquid natus, explicabo necessitatibus ratione, perspiciatis adipisci enim tempore quia! Itaque vitae ipsam provident.</p>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odit pariatur eos dignissimos eaque molestiae provident, ducimus sapiente optio tempora quibusdam esse mollitia illum libero, hic a consectetur amet assumenda repudiandae. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam mollitia ducimus consequuntur quam natus assumenda. Praesentium aliquid natus, explicabo necessitatibus ratione, perspiciatis adipisci enim tempore quia! Itaque vitae ipsam provident.</p>
					</div>
					<h3 class="break-top-100 break-bottom-20 text-grey">Berita Terpopuler</h3>
					<div class="row">
						@for($i=0; $i < 4; $i++)
						<div class="col-sm-6 col-md-3">
							<div class="thumbnail">
								<img src="http://kingofwallpapers.com/crowd/crowd-004.jpg" alt="..." class="news-list-thumb">
								<div class="caption">
									<a href="#"><h4>Judul Berita</h4></a>
								</div>
							</div>
						</div>
						@endfor
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
		height: 100px;
		object-fit: cover;
		object-position: center;
	}
</style>
@endsection
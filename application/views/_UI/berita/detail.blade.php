@layout('_layout/dashboard/index')
@section('title')Detail Berita@endsection
@section('nama-kelurahan')Lumajang@endsection

@section('content')
<div class="row">
	<div class="col-xs-12">
		<div class="panel">
			<div class="panel-body">
				<img src="{{base_url('assets/images/blank-avatar.png')}}" class="headline" alt="thumbnail">
				<h1 class="title">Lorem ipsum dolor sit amet, consectetur adipisicing.</h1>
				<span class="label label-info"><i class="fa fa-clock-o"></i> selasa, 02 februari 2017</span>
				<span class="label label-info"><i class="fa fa-user"></i> oleh admin</span>
				<div class="content">
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odit pariatur eos dignissimos eaque molestiae provident, ducimus sapiente optio tempora quibusdam esse mollitia illum libero, hic a consectetur amet assumenda repudiandae.</p>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odit pariatur eos dignissimos eaque molestiae provident, ducimus sapiente optio tempora quibusdam esse mollitia illum libero, hic a consectetur amet assumenda repudiandae. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam mollitia ducimus consequuntur quam natus assumenda. Praesentium aliquid natus, explicabo necessitatibus ratione, perspiciatis adipisci enim tempore quia! Itaque vitae ipsam provident.</p>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odit pariatur eos dignissimos eaque molestiae provident, ducimus sapiente optio tempora quibusdam esse mollitia illum libero, hic a consectetur amet assumenda repudiandae. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam mollitia ducimus consequuntur quam natus assumenda. Praesentium aliquid natus, explicabo necessitatibus ratione, perspiciatis adipisci enim tempore quia! Itaque vitae ipsam provident.</p>
				</div>
			</div>
			<div class="panel-footer">
				<a href="#" class="btn btn-warning"><i class="fa fa-archive"></i> arsipkan</a>
				<a href="#" class="btn btn-default"><i class="fa fa-arrow-left"></i> kembali</a>
			</div>
		</div>
	</div>
</div>
@endsection

@section('style')
<style>
	.panel-body{
		padding: 30px;
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

	.content{
		margin-top: 20px;
	}

	.content > p{
		font-size: 11pt;
		line-height: 28px;
	}
</style>
@endsection
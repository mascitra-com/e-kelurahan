@layout('_layout/dashboard/index')
@section('title')Detail Halaman Info Kelurahan@endsection
@section('nama-kelurahan')Lumajang@endsection

@section('content')
<div class="row">
	<div class="col-xs-12">
		<div class="panel">
			<div class="panel-body">
				<h1 class="title">{{ $info->judul }}</h1>
				<div class="content">
					<p>{{ $info->isi }}</p>
				</div>
			</div>
			<div class="panel-footer">
				<a href="{{ site_url('info/sunting/'.$info->slug) }}" class="btn btn-warning"><i class="fa fa-pencil"></i> Sunting</a>
				<a href="{{ site_url('info') }}" class="btn btn-default"><i class="fa fa-arrow-back"></i> Kembali</a>
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
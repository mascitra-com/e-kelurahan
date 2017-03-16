@layout('_layout/homepage/index')

@section('page_title')
judul profil
@endsection

@section('content')
<div class="container-fluid container-content">
	<div class="row">
		<div class="col-xs-12">
			<div class="panel">
				<div class="panel-body">
					<h1 class="title">{{ $profil_detail->judul }}</h1>
					<div class="content">
						<p>{{ $profil_detail->isi }}</p>
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
		padding: 15px;
	}
	.title{
		margin-bottom: 15px;
	}
	.content > p{
		font-size: 12pt;
		line-height: 25px;
		font-weight: 300;
	}
</style>
@endsection
@layout('_layout/dashboard/index')
@section('title')Detail Halaman Info Kelurahan@endsection
@section('nama-kelurahan')Lumajang@endsection

@section('content')
<div class="row">
	<div class="col-xs-12">
		<div class="panel">
			<div class="panel-body">
				<h1 class="title">Lorem ipsum dolor sit amet, consectetur adipisicing.</h1>
				<div class="content">
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ullam voluptatibus sed qui commodi dolores culpa perferendis iure est sapiente sint atque, necessitatibus adipisci fugiat, nisi veritatis quos amet rem, quasi nesciunt quae provident et! Ducimus consequuntur maxime aspernatur quam sed. Reiciendis labore sapiente totam asperiores molestias illo illum veniam voluptatibus accusantium nobis nisi iure qui nulla temporibus ipsum quas ad, odio veritatis aspernatur quam error eligendi necessitatibus fugit assumenda. Doloribus et dicta, reiciendis accusantium esse asperiores officiis quibusdam non nulla praesentium dolores, quas rem illo placeat numquam a quaerat. Eos voluptatibus in quas magnam eligendi atque dolorum velit asperiores, provident!</p>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo pariatur fugit nam, nobis illum animi? Inventore quaerat corrupti cum, consectetur, corporis fugit repudiandae tenetur. Provident error dicta est, perspiciatis aut?</p>
				</div>
			</div>
			<div class="panel-footer">
				<a href="#" class="btn btn-warning"><i class="fa fa-pencil"></i> sunting</a>
				<a href="#" class="btn btn-default"><i class="fa fa-arrow-back"></i> kembali</a>
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
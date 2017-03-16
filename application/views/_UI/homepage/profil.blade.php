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
					<h1 class="title">Judul halaman</h1>
					<div class="content">
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod debitis quasi cupiditate corporis natus similique, obcaecati architecto. Tempore quod necessitatibus cupiditate assumenda doloribus labore incidunt quaerat accusamus culpa laboriosam sapiente consectetur, saepe, alias dignissimos error vero. Modi tempore, distinctio ducimus esse facilis, officia dolores odio saepe laboriosam incidunt, officiis perferendis. Error quo aliquid, rem atque pariatur fugit voluptatem nesciunt sapiente repellat beatae, mollitia sunt odit incidunt quos inventore eum quam facere neque nihil assumenda. Velit aliquam laudantium eum blanditiis, tenetur veritatis quas odit, facere exercitationem dolor praesentium, esse architecto ducimus recusandae dignissimos quo ullam expedita ipsam quisquam delectus. Molestias magni amet hic mollitia ea, doloremque quisquam velit praesentium eaque maxime perferendis atque voluptates? Facilis ducimus vitae labore, officiis perspiciatis laudantium? Reiciendis minus laboriosam repellat, cumque veritatis accusantium, eos expedita cupiditate natus nisi laudantium non rerum similique eligendi provident minima vero est quam quae rem omnis doloribus at ducimus delectus aut? Officia voluptatem ipsa excepturi impedit! Nemo dolores, sed nam! Minima.</p>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maiores illum vitae labore sed aut optio facilis est? Ab voluptates deserunt, omnis beatae eum pariatur ducimus exercitationem distinctio, delectus dolore quo saepe, at sequi molestiae id! Eligendi quisquam eos voluptatem illo, facere fugit hic aut officiis nam facilis. Accusantium, necessitatibus, sit!</p>
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
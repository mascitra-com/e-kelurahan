@layout('_layout/homepage/index')

@section('page_title')
Regulasi
@endsection

@section('content')
<div class="container-fluid container-content">
	<div class="row">
		<div class="col-xs-12">
			<div class="panel panel-default">
				<div class="panel-body">
					<nav class="navbar navbar-default">
						<div class="container-fluid">
							<div class="navbar-header">
								<a class="navbar-brand" href="#">Regulasi</a>
							</div>
							<form action="#" method="post" class="navbar-form navbar-right" role="search">
								<div class="form-group">
									<input type="text" class="form-control" placeholder="Cari">
								</div>
								<button type="submit" class="btn btn-default">Cari</button>
							</form>
						</div>
					</nav>
					<table class="table table-striped table-hover table-bordered">
						<tbody>
							@for($i=1; $i < 6; $i++)
							<tr>
								<td>
									<h3>Judul regulasi</h3>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Hic eligendi, illum recusandae eius, voluptate sed.</p>
									<span class="label label-primary">oleh PEMKAB Lumajang</span>
									<span class="label label-primary">pada 02/02/2017</span>
								</td>
								<td class="text-center">
									<a href="#" class="btn btn-primary btn-sm"><i class="fa fa-download"></i> unduh dokumen</a>
								</td>
							</tr>
							@endfor
						</tbody>
					</table>
					<nav aria-label="...">
						<ul class="pager">
							<li class="previous"><a href="#"><span aria-hidden="true">&larr;</span> Baru</a></li>
							<li class="next"><a href="#">Lama <span aria-hidden="true">&rarr;</span></a></li>
						</ul>
					</nav>
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
	td{
		vertical-align: middle!important;
		padding: 20px 10px!important;
	}
	td:first-child{
		padding-left: 15px!important;
	}
	.label{
		font-weight: 500;
	}
	p{
		/*margin: 0;*/
	}
	.navbar-brand{
		font-size: 18pt;
	}
</style>
@endsection
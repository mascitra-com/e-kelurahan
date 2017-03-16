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
						@if($regulasi)
							@foreach($regulasi as $list)
							<tr>
								<td>
									<h3>{{ $list->judul }}</h3>
									<p>{{ $list->deskripsi }}</p>
									<span class="label label-primary">oleh {{ $list->dikeluarkan_oleh }}</span>
									<span class="label label-primary">pada {{ date('d/m/Y', strtotime($list->tgl_dikeluarkan)) }}</span>
								</td>
								<td class="text-center" width="20%">
									<a href="{{ base_url('assets/regulasi/'.$list->link) }}" class="btn btn-primary btn-sm"><i class="fa fa-download"></i> Unduh Dokumen</a>
								</td>
							</tr>
							@endforeach
                        @endif
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
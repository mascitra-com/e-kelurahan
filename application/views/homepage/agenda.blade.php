@layout('_layout/homepage/index')

@section('page_title')
Agenda
@endsection

@section('content')
<div class="container-fluid container-content">
	<div class="row">
		<div class="col-xs-12">
			<div class="panel">
				<div class="panel-body">
					<nav class="navbar navbar-default">
						<div class="container-fluid">
							<div class="navbar-header">
								<div class="navbar-brand">Agenda</div>
							</div>
                            {{-- TODO Fix This --}}
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
						@if($agenda)
							@foreach($agenda as $list)
                            <?php $date = strtotime($list->tanggal_agenda); ?>
							<tr>
								<td class="text-center" width="10%">
									<h2>{{ date('d', $date) }}</h2>
									<span>{{ date('M', $date). ' '. date('Y', $date) }}</span>
								</td>
								<td>{{ $list->perihal }}</td>
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
	}
</style>
@endsection
@layout('_layout/dashboard/index')
@section('title')Data Pindah@endsection
@section('nama-kelurahan')Lumajang@endsection

@section('content')
<div class="row">
	<div class="col-xs-12">
		<div class="panel panel-theme">
			<div class="panel-heading">
				<h3 class="panel-title pull-left">Data Pindahan</h3>
				<div class="btn-group btn-group-sm pull-right">
					<a href="{{site_url('ui/pindah_pengajuan')}}" class="btn btn-default"><i class="fa fa-plus"></i></a>
					<a href="{{site_url('ui/pindah_arsip')}}" class="btn btn-default"><i class="fa fa-archive"></i></a>
					<button class="btn btn-default reload" type="button"><i class="fa fa-refresh"></i></button>
				</div>
				<form action="#" class="pull-right space-right-10">
					<div class="input-group input-group-sm">
						<input type="text" class="form-control" name="cari" placeholder="masukkan kata kunci">
						<span class="input-group-btn">
							<button class="btn btn-default"><i class="fa fa-search"></i></button>
						</span>
					</div>
				</form>
				<div class="clearfix"></div>
			</div>
			<div class="panel-body table-responsive table-full">
				<table class="table table-stripped table-hover table-bordered">
					<thead>
						<tr>
							<th>No</th>
							<th>Nama Pengaju</th>
							<th class="text-center">Tanggal Pengajuan</th>
							<th width="10%">Aksi</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>01</td>
							<td><a href="#">Ainul Yakin</a></td>
							<td class="text-center">{{date('d-m-Y')}}</td>
							<td width="30%">
								<a href="#" class="btn btn-primary btn-xs"><i class="fa fa-info"></i> detail</a>
								<a href="#" class="btn btn-warning btn-xs" onclick="return confirm('Anda yakin?')"><i class="fa fa-archive"></i> arsipkan</a>
								<a href="#" class="btn btn-success btn-xs"><i class="fa fa-file-pdf-o"></i> cetak surat</a>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="panel-footer">
				<span class="text-grey">last edited by admin 12-12-2017 08:30</span>
				<nav aria-label="Page navigation" class="pull-right">
					<ul class="pagination pagination-sm" style="margin:0">
						<li>
							<a href="#" aria-label="Previous">
								<span aria-hidden="true">&laquo;</span>
							</a>
						</li>
						<li><a href="#">1</a></li>
						<li><a href="#">2</a></li>
						<li><a href="#">3</a></li>
						<li><a href="#">4</a></li>
						<li><a href="#">5</a></li>
						<li>
							<a href="#" aria-label="Next">
								<span aria-hidden="true">&raquo;</span>
							</a>
						</li>
					</ul>
				</nav>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('style')
<style>
	.panel-footer > span{
		line-height: 35px;
	}

	.table tr > td:first-child,
	.table tr > th:first-child{
		text-align: center;
	}
</style>
@endsection
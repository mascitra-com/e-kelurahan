@layout('_layout/dashboard/index')
@section('title')Manajemen Kependudukan@endsection
@section('nama-kelurahan')Lumajang@endsection

@section('content')
<div class="row">
	<div class="col-xs-12">
		<div class="panel panel-theme">
			<div class="panel-heading">
				<h3 class="panel-title pull-left">Data Kependudukan</h3>
				<div class="btn-group pull-right">
					<a href="{{ site_url('penduduk/tambah') }}" class="btn btn-xs btn-default"><i class="fa fa-plus"></i></a>
					<button class="btn btn-xs btn-default" data-toggle="modal" data-target="#modal"><i class="fa fa-search"></i></button>
					<a href="{{ site_url('penduduk/refresh') }}" class="btn btn-xs btn-default reload"><i class="fa fa-refresh"></i></a>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="panel-body table-responsive table-full">
				<table class="table table-bordered table-stripped table-hover">
					<thead>
						<tr>
							<th>
								<a href="{{ site_url('penduduk/urut/nik') }}" class="btn btn-{{ $order_by === 'nik' ? 'primary' : 'default' }} btn-xs">NIK</a>
								<a href="{{ $order_by === 'nik' ? site_url('penduduk/urut/' . $order_by . '/' . $order_type) : '#' }}" class="btn btn-{{ $order_by === 'nik' ? 'primary' : 'default' }} btn-xs"><i class="fa fa-sort"></i></a>
							</th>
							<th>
								<a href="{{ site_url('penduduk/urut/nama') }}" class="btn btn-{{ $order_by === 'nama' ? 'primary' : 'default' }} btn-xs">Nama</a>
								<a href="{{ $order_by === 'nama' ? site_url('penduduk/urut/' . $order_by . '/' . $order_type) : '#' }}" class="btn btn-{{ $order_by === 'nama' ? 'primary' : 'default' }} btn-xs"><i class="fa fa-sort"></i></a>
							</th>
							<th>
								<a href="{{ site_url('penduduk/urut/jenis_kelamin') }}" class="btn btn-{{ $order_by === 'jenis_kelamin' ? 'primary' : 'default' }} btn-xs">Jenis Kelamin</a>
								<a href="{{ $order_by === 'jenis_kelamin' ? site_url('penduduk/urut/' . $order_by . '/' . $order_type) : '#' }}" class="btn btn-{{ $order_by === 'jenis_kelamin' ? 'primary' : 'default' }} btn-xs"><i class="fa fa-sort"></i></a>
							</th>
							<th>
								<a href="{{ site_url('penduduk/urut/status_nikah') }}" class="btn btn-{{ $order_by === 'status_nikah' ? 'primary' : 'default' }} btn-xs">Status Nikah</a>
								<a href="{{ $order_by === 'status_nikah' ? site_url('penduduk/urut/' . $order_by . '/' . $order_type) : '#' }}" class="btn btn-{{ $order_by === 'status_nikah' ? 'primary' : 'default' }} btn-xs"><i class="fa fa-sort"></i></a>
							</th>
							<th>
								<a href="{{ site_url('penduduk/urut/rt') }}" class="btn btn-{{ $order_by === 'rt' ? 'primary' : 'default' }} btn-xs">RT</a>
								<a href="{{ $order_by === 'rt' ? site_url('penduduk/urut/' . $order_by . '/' . $order_type) : '#' }}" class="btn btn-{{ $order_by === 'rt' ? 'primary' : 'default' }} btn-xs"><i class="fa fa-sort"></i></a>
							</th>
							<th>
								<a href="{{ site_url('penduduk/urut/rw') }}" class="btn btn-{{ $order_by === 'rw' ? 'primary' : 'default' }} btn-xs">RW</a>
								<a href="{{ $order_by === 'rt' ? site_url('penduduk/urut/' . $order_by . '/' . $order_type) : '#' }}" class="btn btn-{{ $order_by === 'rw' ? 'primary' : 'default' }} btn-xs"><i class="fa fa-sort"></i></a>
							</th>
							<th class="text-center">
								Aksi
							</th>
						</tr>
					</thead>
					<tbody>
						@if($penduduk)
							@foreach($penduduk as $item)
							<tr>
								<td>{{ $item->nik }}</td>
								<td>{{ $item->nama }}</td>
								<td>{{ $item->jenis_kelamin === '0' ? 'Laki-laki' : 'Perempuan' }}</td>
								<td>{{ $item->status_nikah === '0' ? 'Belum Menikah' : 'Menikah' }}</td>
								<td class="text-center">{{ $item->rt }}</td>
								<td class="text-center">{{ $item->rw }}</td>
								<td class="text-center">
									<a href="{{ site_url('penduduk/detail/'.$item->nik) }}" class="btn btn-default btn-xs"><i class="fa fa-ellipsis-h"></i></a>
								</td>
							</tr>
							@endforeach
						@endif
					</tbody>
				</table>
			</div>
			<div class="panel-footer">
				<span class="text-grey">last edited by admin 12-12-2017 08:30</span>
				<nav aria-label="Page navigation" class="pull-right">
					<ul class="pagination pagination-sm" style="margin:0">
                        @if(isset($pagination))
                            {{ $pagination }}
                        @endif
					</ul>
				</nav>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('modal')
<div class="modal fade" tabindex="-1" role="dialog" id="modal">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Filter Pencarian</h4>
			</div>
			<div class="modal-body">
				<form action="{{ site_url('penduduk/search') }}" method="POST">
				{{ $csrf }}
					<div class="row">
						<div class="col-xs-12 col-md-4">
							<div class="form-group">
								<label for="">NIK</label>
								<input type="text" class="form-control" name="nik" placeholder="Masukkan NIK">
							</div>
						</div>
						<div class="col-xs-12 col-md-8">
							<div class="form-group">
								<label for="">Nama</label>
								<input type="text" class="form-control" name="nama" placeholder="Masukkan Nama">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12 col-md-4">
							<div class="form-group">
								<label for="">Tempat Lahir</label>
								<input type="text" class="form-control" name="tempat_lahir" placeholder="Tempat Lahir">
							</div>
						</div>
						<div class="col-xs-12 col-md-4">
							<div class="form-group">
								<label for="">Tanggal Lahir</label>
								<input type="date" class="form-control" name="tanggal_lahir" placeholder="Tanggal Lahir">
							</div>
						</div>
						<div class="col-xs-12 col-md-4">
							<div class="form-group">
								<label for="">Jenis Kelamin</label>
								<select name="jenis_kelamin" class="form-control">
									<option value="" selected>Semua</option>
									<option value="0">Laki-laki</option>
									<option value="1">Perempuan</option>
								</select>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12 col-md-4">
							<div class="form-group">
								<label for="">RT/RW</label>
								<div class="input-group">
									<input type="text" class="form-control" name="rt" placeholder="RT">
									<span class="input-group-addon">/</span>
									<input type="text" class="form-control" name="rw" placeholder="RW">
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-md-4">
							<div class="form-group">
								<label for="">Kewarganegaraan</label>
								<input type="text" class="form-control" name="kewarganegaraan" placeholder="Masukkan Kewarganegaraan">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12 col-md-3">
							<div class="form-group">
								<label for="">Golongan Darah</label>
								<select name="golongan_darah" class="form-control">
									<option value="" selected>Semua</option>
									<option value="A" >A</option>
									<option value="B">B</option>
									<option value="AB">AB</option>
									<option value="O">O</option>
								</select>
							</div>
						</div>
						<div class="col-xs-12 col-md-3">
							<div class="form-group">
								<label for="">Agama</label>
								<select name="agama" class="form-control">
									<option value="" selected>Semua</option>
									<option value="Islam">Islam</option>
									<option value="Kristen">Kristen</option>
									<option value="Katholik">Katholik</option>
									<option value="Budha">Budha</option>
									<option value="Hindu">Hindu</option>
								</select>
							</div>
						</div>
						<div class="col-xs-12 col-md-3">
							<div class="form-group">
								<label for="">Pekerjaan</label>
								<select name="pekerjaan" class="form-control">
									<option value="" selected>Semua</option>
									@foreach($pekerjaan as $item)
										<option value="{{ $item->id_jenispekerjaan }}">{{ $item->pekerjaan }}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="col-xs-12 col-md-3">
							<div class="form-group">
								<label for="">Status Nikah</label>
								<select name="status_nikah" class="form-control">
									<option value="" selected>Semua</option>
									<option value="0">Belum Menikah</option>
									<option value="1">Menikah</option>
									<option value="2">Janda</option>
									<option value="3">Duda</option>
								</select>
							</div>
						</div>
					</div>
					<div class="form-group break-top-20">
						<button class="btn btn-primary" type="submit"><i class="fa fa-search"></i> Cari</button>
						<button class="btn btn-default" type="reset"><i class="fa fa-refresh"></i> bersihkan</button>
					</div>
				</form>
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
</style>
@endsection
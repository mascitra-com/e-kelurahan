@layout('_layout/dashboard/index')
@section('title')Konfirmasi Kelurahan@endsection
@section('nama-kelurahan')Lumajang@endsection

@section('content')
<div class="row">
	<div class="col-xs-12">
		<div class="panel panel-theme">
			<div class="panel-heading">
				<h3 class="panel-title pull-left">Pengajuan Data Kelurahan Baru</h3>
				<div class="btn-group pull-right">
					<button class="btn btn-default btn-xs" data-toggle="modal" data-target="#modal"><i class="fa fa-plus"></i></button>
					<button class="btn btn-default btn-xs reload"><i class="fa fa-refresh"></i></button>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="panel-body table-responsive table-full">
				<table class="table table-hover table-stripped table-bordered">
					<thead>
						<tr>
							<td>#</td>
							<td>Nama Kelurahan</td>
							<td class="text-center">Waktu Pengajuan</td>
							<td class="text-center">Waktu Konfirmasi</td>
							<td class="text-center" width="15%">Status Verifikasi</td>
							<td width="15%" class="text-center">Aksi</td>
						</tr>
					</thead>
					<tbody>
						@if($kelurahan)
							<?php $no = 1;?>
							@foreach($kelurahan as $item)
                                <?php
                                    if($item->status === '0'){
                                        $label = 'warning';
                                        $status = 'Menunggu';
                                    } else if($item->status === '1'){
                                        $label = 'success';
                                        $status = 'Disetujui';
                                    } else if($item->status === '2'){
                                        $label = 'danger';
                                        $status = 'Ditolak';
                                    }
                                ?>
							<tr>
								<td width="10%">{{str_pad($no++,2,'0',STR_PAD_LEFT)}}</td>
								<td>{{$item->nama}}</td>
								<td class="text-center">{{date('d-M-Y', strtotime($item->created_at))}}</td>
								<td class="text-center">{{$item->updated_at === NULL ? '-' : date('d-M-Y', strtotime($item->updated_at))}}</td>
								<td class="text-center" width="15%">
                                    <span class="label label-{{ $label }}">
                                        {{ $status }}
                                    </span>
                                </td>
                                @if($status === 'Menunggu')
                                    <td width="15%" class="text-center">
                                        <a href="{{ site_url('kelurahan/setujui/'.$item->slug) }}" class="btn btn-xs btn-success" onclick="return confirm('Anda yakin?')"><i class="fa fa-check"></i></a>
                                        <a href="{{ site_url('kelurahan/tolak/'.$item->slug) }}" class="btn btn-xs btn-danger" onclick="return confirm('Anda yakin?')"><i class="fa fa-close"></i></a>
                                    </td>
                                @endif
                                @if($status === 'Disetujui')
                                    <td width="15%" class="text-center">
                                        <a href="{{ site_url('kelurahan/tolak/'.$item->slug) }}" class="btn btn-xs btn-danger btn-block" onclick="return confirm('Anda yakin?')"><i class="fa fa-close"></i> Batalkan</a>
                                    </td>
                                @endif
                                @if($status === 'Ditolak')
                                    <td width="15%" class="text-center">
                                        <a href="{{ site_url('kelurahan/setujui/'.$item->slug) }}" class="btn btn-xs btn-success btn-block" onclick="return confirm('Anda yakin?')"><i class="fa fa-check"></i> Setujui</a>
                                    </td>
                                @endif
							</tr>
							@endforeach
						@endif
					</tbody>
				</table>
			</div>
			<div class="panel-footer">
				<span class="text-grey">last edited by admin 12-01-2017 17:05</span>
			</div>
		</div>
	</div>
</div>
@endsection

@section('style')
<style>
	.label{display: block;width: 100%}
</style>
@endsection
@layout('_layout/dashboard-user/index')
@section('title')Status Pengajuan@endsection

@section('content')
<div class="row">
	<div class="col-xs-12">
		<div class="panel">
			<div class="panel-heading">
				<h3 class="panel-title">Status Pengajuan</h3>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-xs-12 col-sm-3">
						<ul class="nav nav-pills nav-stacked">
							<li role="presentation" class="active"><a href="#tab-1" data-toggle="tab">Surat Blanko KTP</a></li>
							<li role="presentation"><a href="#tab-4" data-toggle="tab">Surat Blanko KK</a></li>
							<li role="presentation"><a href="#tab-2" data-toggle="tab">Surat Keterangan Catatan Kepolisian</a></li>
							<li role="presentation"><a href="#tab-3" data-toggle="tab">Surat Keterangan Miskin</a></li>
							<li role="presentation"><a href="#tab-13" data-toggle="tab">Surat Keterangan Kelahiran</a></li>
							<li role="presentation"><a href="#tab-6" data-toggle="tab">Surat Keterangan Kematian</a></li>
							<li role="presentation"><a href="#tab-7" data-toggle="tab">Surat Keterangan Pindah</a></li>
							<li role="presentation"><a href="#tab-8" data-toggle="tab">Surat Keterangan Pindah Hak Milik</a></li>
							<li role="presentation"><a href="#tab-9" data-toggle="tab">Surat Keterangan Untuk Nikah</a></li>
							<li role="presentation"><a href="#tab-5" data-toggle="tab">Surat Pengantar Ijin Berusaha</a></li>
							<li role="presentation"><a href="#tab-10" data-toggle="tab">Surat Pengantar Ijin Keramaian</a></li>
							<li role="presentation"><a href="#tab-11" data-toggle="tab">SKTM (Sekolah)</a></li>
							<li role="presentation"><a href="#tab-12" data-toggle="tab">SKTM (Rumah Tangga) </a></li>
						</ul>
					</div>
					<div class="col-xs-12 col-sm-9">
						<div class="tab-content">
							<div role="tabpanel" class="tab-pane table active" id="tab-1">
								@unless(!$surats)
								<table class="table table-hover table-stripped table-bordered">
									<thead>
										<tr>
											<th>NIK</th>
											<th>NAMA</th>
											<th>TANGGAL PENGAJUAN</th>
											<th>TANGGAL VERIFIKASI</th>
											<th class="text-center">STATUS</th>
											<th>AKSI</th>
										</tr>
									</thead>
									<tbody>
										@foreach($surats as $surat)
										@if($surat->jenis === '0')
										<tr>
											<td>{{ $surat->nik }}</td>
											<td>{{ $surat->penduduk->nama }}</td>
											<td>{{ mdate('%l, %d %F %Y', strtotime(str_replace('-', '/', $surat->created_at))) }}</td>
											<td>{{ date('l, d F Y', strtotime($surat->tanggal_verif)) }}</td>
											<td class="text-center"><div class="label label-{{ ($surat->status == '1') ? ((!is_null($surat->nama_pengambil)) ? 'success' : ((( date('d-m-Y') > date('d-m-Y', strtotime($surat->tanggal_verif. ' + 7 days')) )) ? 'danger' : 'success') ) : (($surat->status == '2') ? 'danger' : 'warning') }}">
												{{ ($surat->status == '1') ? ((!is_null($surat->nama_pengambil)) ? 'diambil' : ((( date('d-m-Y') > date('d-m-Y', strtotime($surat->tanggal_verif. ' + 7 days')) )) ? 'kadaluarsa' : 'disetujui') ) : (($surat->status == '2') ? 'ditolak' : 'menunggu') }}
											</div></td>
											<td>
												@if(!is_null($surat->nama_pengambil))
												<button class="btn btn-xs btn-xs btn-info" data-toggle="modal" data-target="#modal-info" data-keterangan="{{ $surat->keterangan }}">Info</button>
												@else
												@if($surat->status == '2')
												<button class="btn btn-xs btn-xs btn-info" data-toggle="modal" data-target="#modal-info" data-keterangan="{{ $surat->keterangan }}">Info</button>
												<a href="{{ site_url('warga/surat/hapus/'.$surat->id) }}" class="btn btn-xs btn-danger" onclick="return confirm('Anda yakin?')">Hapus</a>
												@elseif($surat->status == '1')
												<button class="btn btn-xs btn-block btn-info" data-toggle="modal" data-target="#modal-info" data-date="{{ date('d-m-Y', strtotime($surat->tanggal_verif. ' + 7 days')) }}">Info</button>
												@else
												<a href="{{ site_url('warga/surat/batalkan/'.$surat->id) }}" class="btn btn-xs btn-block btn-warning" onclick="return confirm('Anda yakin?')">Batalkan</a>
												@endif
												@endif
											</td>
										</tr>
										@endif
										@endforeach
									</tbody>
								</table>
								@else
								<p>Tidak ada data surat</p>
								@endunless
							</div>
							{{-- SKCK --}}
							<div role="tabpanel" class="tab-pane table" id="tab-2">
								@unless(!$surats)
								<table class="table table-hover table-stripped table-bordered">
									<thead>
										<tr>
											<th>NIK</th>
											<th>NAMA</th>
											<th>TANGGAL PENGAJUAN</th>
											<th>TANGGAL VERIFIKASI</th>
											<th class="text-center">STATUS</th>
											<th>AKSI</th>
										</tr>
									</thead>
									<tbody>
										@foreach($surats as $surat)
										@if($surat->jenis === '1')
										<tr>
											<td>{{ $surat->nik }}</td>
											<td>{{ $surat->penduduk->nama }}</td>
											<td>{{ mdate('%l, %d %F %Y', strtotime(str_replace('-', '/', $surat->created_at))) }}</td>
											<td>{{ date('l, d F Y', strtotime($surat->tanggal_verif)) }}</td>
											<td class="text-center"><div class="label label-{{ ($surat->status == '1') ? ((!is_null($surat->nama_pengambil)) ? 'success' : ((( date('d-m-Y') > date('d-m-Y', strtotime($surat->tanggal_verif. ' + 7 days')) )) ? 'danger' : 'success') ) : (($surat->status == '2') ? 'danger' : 'warning') }}">
												{{ ($surat->status == '1') ? ((!is_null($surat->nama_pengambil)) ? 'diambil' : ((( date('d-m-Y') > date('d-m-Y', strtotime($surat->tanggal_verif. ' + 7 days')) )) ? 'kadaluarsa' : 'disetujui') ) : (($surat->status == '2') ? 'ditolak' : 'menunggu') }}
											</div></td>
											<td>
												@if(!is_null($surat->nama_pengambil))
												<button class="btn btn-xs btn-xs btn-info" data-toggle="modal" data-target="#modal-info" data-keterangan="{{ $surat->keterangan }}">Info</button>
												@else
												@if($surat->status == '2')
												<button class="btn btn-xs btn-xs btn-info" data-toggle="modal" data-target="#modal-info" data-keterangan="{{ $surat->keterangan }}">Info</button>
												<a href="{{ site_url('warga/surat/hapus/'.$surat->id) }}" class="btn btn-xs btn-danger" onclick="return confirm('Anda yakin?')">Hapus</a>
												@elseif($surat->status == '1')
												<button class="btn btn-xs btn-block btn-info" data-toggle="modal" data-target="#modal-info" data-date="{{ date('d-m-Y', strtotime($surat->tanggal_verif. ' + 7 days')) }}">Info</button>
												@else
												<a href="{{ site_url('warga/surat/batalkan/'.$surat->id) }}" class="btn btn-xs btn-block btn-warning" onclick="return confirm('Anda yakin?')">Batalkan</a>
												@endif
												@endif
											</td>
										</tr>
										@endif
										@endforeach
									</tbody>
								</table>
								@else
								<p>Tidak ada data surat</p>
								@endunless
							</div>
							{{-- SKM --}}
							<div role="tabpanel" class="tab-pane table" id="tab-3">
								@unless(!$surats)
								<table class="table table-hover table-stripped table-bordered">
									<thead>
										<tr>
											<th>NIK</th>
											<th>NAMA</th>
											<th>TANGGAL PENGAJUAN</th>
											<th>TANGGAL VERIFIKASI</th>
											<th class="text-center">STATUS</th>
											<th>AKSI</th>
										</tr>
									</thead>
									<tbody>
										@foreach($surats as $surat)
										@if($surat->jenis === '2')
										<tr>
											<td>{{ $surat->nik }}</td>
											<td>{{ $surat->penduduk->nama }}</td>
											<td>{{ mdate('%l, %d %F %Y', strtotime(str_replace('-', '/', $surat->created_at))) }}</td>
											<td>{{ date('l, d F Y', strtotime($surat->tanggal_verif)) }}</td>
											<td class="text-center"><div class="label label-{{ ($surat->status == '1') ? ((!is_null($surat->nama_pengambil)) ? 'success' : ((( date('d-m-Y') > date('d-m-Y', strtotime($surat->tanggal_verif. ' + 7 days')) )) ? 'danger' : 'success') ) : (($surat->status == '2') ? 'danger' : 'warning') }}">
												{{ ($surat->status == '1') ? ((!is_null($surat->nama_pengambil)) ? 'diambil' : ((( date('d-m-Y') > date('d-m-Y', strtotime($surat->tanggal_verif. ' + 7 days')) )) ? 'kadaluarsa' : 'disetujui') ) : (($surat->status == '2') ? 'ditolak' : 'menunggu') }}
											</div></td>
											<td>
												@if(!is_null($surat->nama_pengambil))
												<button class="btn btn-xs btn-xs btn-info" data-toggle="modal" data-target="#modal-info" data-keterangan="{{ $surat->keterangan }}">Info</button>
												@else
												@if($surat->status == '2')
												<button class="btn btn-xs btn-xs btn-info" data-toggle="modal" data-target="#modal-info" data-keterangan="{{ $surat->keterangan }}">Info</button>
												<a href="{{ site_url('warga/surat/hapus/'.$surat->id) }}" class="btn btn-xs btn-danger" onclick="return confirm('Anda yakin?')">Hapus</a>
												@elseif($surat->status == '1')
												<button class="btn btn-xs btn-block btn-info" data-toggle="modal" data-target="#modal-info" data-date="{{ date('d-m-Y', strtotime($surat->tanggal_verif. ' + 7 days')) }}">Info</button>
												@else
												<a href="{{ site_url('warga/surat/batalkan/'.$surat->id) }}" class="btn btn-xs btn-block btn-warning" onclick="return confirm('Anda yakin?')">Batalkan</a>
												@endif
												@endif
											</td>
										</tr>
										@endif
										@endforeach
									</tbody>
								</table>
								@else
								<p>Tidak ada data surat</p>
								@endunless
							</div>
							{{-- Blanko KK --}}
							<div role="tabpanel" class="tab-pane table" id="tab-4">
								@unless(!$surats)
								<table class="table table-hover table-stripped table-bordered">
									<thead>
										<tr>
											<th>NIK</th>
											<th>NAMA</th>
											<th>TANGGAL PENGAJUAN</th>
											<th>TANGGAL VERIFIKASI</th>
											<th class="text-center">STATUS</th>
											<th>AKSI</th>
										</tr>
									</thead>
									<tbody>
										@foreach($surats as $surat)
										@if($surat->jenis === '4')
										<tr>
											<td>{{ $surat->nik }}</td>
											<td>{{ $surat->penduduk->nama }}</td>
											<td>{{ mdate('%l, %d %F %Y', strtotime(str_replace('-', '/', $surat->created_at))) }}</td>
											<td>{{ date('l, d F Y', strtotime($surat->tanggal_verif)) }}</td>
											<td class="text-center"><div class="label label-{{ ($surat->status == '1') ? ((!is_null($surat->nama_pengambil)) ? 'success' : ((( date('d-m-Y') > date('d-m-Y', strtotime($surat->tanggal_verif. ' + 7 days')) )) ? 'danger' : 'success') ) : (($surat->status == '2') ? 'danger' : 'warning') }}">
												{{ ($surat->status == '1') ? ((!is_null($surat->nama_pengambil)) ? 'diambil' : ((( date('d-m-Y') > date('d-m-Y', strtotime($surat->tanggal_verif. ' + 7 days')) )) ? 'kadaluarsa' : 'disetujui') ) : (($surat->status == '2') ? 'ditolak' : 'menunggu') }}
											</div></td>
											<td>
												@if(!is_null($surat->nama_pengambil))
												<button class="btn btn-xs btn-xs btn-info" data-toggle="modal" data-target="#modal-info" data-keterangan="{{ $surat->keterangan }}">Info</button>
												@else
												@if($surat->status == '2')
												<button class="btn btn-xs btn-xs btn-info" data-toggle="modal" data-target="#modal-info" data-keterangan="{{ $surat->keterangan }}">Info</button>
												<a href="{{ site_url('warga/surat/hapus/'.$surat->id) }}" class="btn btn-xs btn-danger" onclick="return confirm('Anda yakin?')">Hapus</a>
												@elseif($surat->status == '1')
												<button class="btn btn-xs btn-block btn-info" data-toggle="modal" data-target="#modal-info" data-date="{{ date('d-m-Y', strtotime($surat->tanggal_verif. ' + 7 days')) }}">Info</button>
												@else
												<a href="{{ site_url('warga/surat/batalkan/'.$surat->id) }}" class="btn btn-xs btn-block btn-warning" onclick="return confirm('Anda yakin?')">Batalkan</a>
												@endif
												@endif
											</td>
										</tr>
										@endif
										@endforeach
									</tbody>
								</table>
								@else
								<p>Tidak ada data surat</p>
								@endunless
							</div>
							{{-- Surat Keterangan Ijin Usaha--}}
							<div role="tabpanel" class="tab-pane table" id="tab-5">
								@unless(!$surats)
								<table class="table table-hover table-stripped table-bordered">
									<thead>
										<tr>
											<th>NIK</th>
											<th>NAMA USAHA</th>
											<th>TANGGAL PENGAJUAN</th>
											<th>TANGGAL VERIFIKASI</th>
											<th class="text-center">STATUS</th>
											<th>AKSI</th>
										</tr>
									</thead>
									<tbody>
										@if($ijin_usaha)
										@foreach($ijin_usaha as $surat)
										<tr>
											<td>{{ $surat->nik }}</td>
											<td>{{ $surat->jenis_usaha }}</td>
											<td>{{ mdate('%l, %d %F %Y', strtotime(str_replace('-', '/', $surat->created_at))) }}</td>
											<td>{{ date('l, d F Y', strtotime($surat->tanggal_verif)) }}</td>
											<td class="text-center"><div class="label label-{{ ($surat->status == '1') ? ((!is_null($surat->nama_pengambil)) ? 'success' : ((( date('d-m-Y') > date('d-m-Y', strtotime($surat->tanggal_verif. ' + 7 days')) )) ? 'danger' : 'success') ) : (($surat->status == '2') ? 'danger' : 'warning') }}">
												{{ ($surat->status == '1') ? ((!is_null($surat->nama_pengambil)) ? 'diambil' : ((( date('d-m-Y') > date('d-m-Y', strtotime($surat->tanggal_verif. ' + 7 days')) )) ? 'kadaluarsa' : 'disetujui') ) : (($surat->status == '2') ? 'ditolak' : 'menunggu') }}
											</div></td>
											<td>
												@if(!is_null($surat->nama_pengambil))
												<button class="btn btn-xs btn-xs btn-info" data-toggle="modal" data-target="#modal-info" data-keterangan="{{ $surat->keterangan }}">Info</button>
												@else
												@if($surat->status == '2')
												<button class="btn btn-xs btn-xs btn-info" data-toggle="modal" data-target="#modal-info" data-keterangan="{{ $surat->keterangan }}">Info</button>
												<a href="{{ site_url('warga/surat/hapus/'.$surat->id) }}" class="btn btn-xs btn-danger" onclick="return confirm('Anda yakin?')">Hapus</a>
												@elseif($surat->status == '1')
												<button class="btn btn-xs btn-block btn-info" data-toggle="modal" data-target="#modal-info" data-date="{{ date('d-m-Y', strtotime($surat->tanggal_verif. ' + 7 days')) }}">Info</button>
												@else
												<a href="{{ site_url('warga/surat/batalkan_ijin_usaha/'.$surat->id) }}" class="btn btn-xs btn-block btn-danger" onclick="return confirm('Anda yakin?')">Batalkan</a>
												@endif
												@endif
											</td>
										</tr>
										@endforeach
										@endif
									</tbody>
								</table>
								@else
								<p>Tidak ada data surat</p>
								@endunless
							</div>
							{{-- KELAHIRAN --}}
							<div role="tabpanel" class="tab-pane table" id="tab-13">
								@unless(!$kelahirans)
								<table class="table table-hover table-stripped table-bordered">
									<thead>
										<tr>
											<th>NAMA BAYI</th>
											<th>NAMA PELAPOR</th>
											<th>TANGGAL PENGAJUAN</th>
											<th>TANGGAL VERIFIKASI</th>
											<th class="text-center">STATUS</th>
											<th>AKSI</th>
										</tr>
									</thead>
									<tbody>
										@if($kelahirans)
										@foreach($kelahirans as $kelahiran)
										<tr>
											<td>{{ $kelahiran->nama_anak }}</td>
											<td>{{ $kelahiran->pelapor->nama }}</td>
											<td>{{ hari_indonesia(date('l', strtotime($kelahiran->created_at))) . ', '. tgl_indo($kelahiran->created_at) }}</td>
											<td>{{ hari_indonesia(date('l', strtotime($kelahiran->tanggal_verif))) . ', '. tgl_indo($kelahiran->tanggal_verif) }}</td>
											<td class="text-center"><div class="label label-{{ ($kelahiran->status == '1') ? ((!is_null($kelahiran->nama_pengambil)) ? 'success' : ((( date('d-m-Y') > date('d-m-Y', strtotime($kelahiran->tanggal_verif. ' + 7 days')) )) ? 'danger' : 'success') ) : (($kelahiran->status == '2') ? 'danger' : 'warning') }}">
												{{ ($kelahiran->status == '1') ? ((!is_null($kelahiran->nama_pengambil)) ? 'diambil' : ((( date('d-m-Y') > date('d-m-Y', strtotime($kelahiran->tanggal_verif. ' + 7 days')) )) ? 'kadaluarsa' : 'disetujui') ) : (($kelahiran->status == '2') ? 'ditolak' : 'menunggu') }}
											</div></td>
											<td>
												@if(!is_null($kelahiran->nama_pengambil))
												<button class="btn btn-xs btn-xs btn-info" data-toggle="modal" data-target="#modal-info" data-keterangan="{{ $kelahiran->keterangan }}">Info</button>
												@else
												@if($kelahiran->status == '2')
												<button class="btn btn-xs btn-xs btn-info" data-toggle="modal" data-target="#modal-info" data-keterangan="{{ $kelahiran->keterangan }}">Info</button>
												<a href="{{ site_url('warga/surat/hapus_kelahiran/'.$kelahiran->id) }}" class="btn btn-xs btn-danger" onclick="return confirm('Anda yakin?')">Hapus</a>
												@elseif($kelahiran->status == '1')
												<button class="btn btn-xs btn-block btn-info" data-toggle="modal" data-target="#modal-info" data-date="{{ date('d-m-Y', strtotime($kelahiran->tanggal_verif. ' + 7 days')) }}">Info</button>
												@else
												<a href="{{ site_url('warga/surat/hapus_kelahiran/'.$kelahiran->id) }}" class="btn btn-xs btn-block btn-danger" onclick="return confirm('Anda yakin?')">Batalkan</a>
												@endif
												@endif
											</td>
										</tr>
										@endforeach
										@endif
									</tbody>
								</table>
								@else
								<p>Tidak ada data surat</p>
								@endunless
							</div>
							{{-- END KELAHIRAN --}}
							{{-- KEMATIAN --}}
							<div role="tabpanel" class="tab-pane table" id="tab-6">
								@unless(!$kematians)
								<table class="table table-hover table-stripped table-bordered">
									<thead>
										<tr>
											<th>NAMA ALMARHUM/ALMARHUMAH</th>
											<th>NAMA PELAPOR</th>
											<th>TANGGAL PENGAJUAN</th>
											<th>TANGGAL VERIFIKASI</th>
											<th class="text-center">STATUS</th>
											<th>AKSI</th>
										</tr>
									</thead>
									<tbody>
										@if($kematians)
										@foreach($kematians as $kematian)
										<tr>
											<td>{{ $kematian->meninggal->nama }}</td>
											<td>{{ $kematian->pelapor->nama }}</td>
											<td>{{ hari_indonesia(date('l', strtotime($surat->created_at))) . ', '. tgl_indo($kematian->created_at) }}</td>
											<td>{{ hari_indonesia(date('l', strtotime($surat->tanggal_verif))) . ', '. tgl_indo($kematian->tanggal_verif) }}</td>
											<td class="text-center"><div class="label label-{{ ($kematian->status == '1') ? ((!is_null($kematian->nama_pengambil)) ? 'success' : ((( date('d-m-Y') > date('d-m-Y', strtotime($kematian->tanggal_verif. ' + 7 days')) )) ? 'danger' : 'success') ) : (($kematian->status == '2') ? 'danger' : 'warning') }}">
												{{ ($kematian->status == '1') ? ((!is_null($kematian->nama_pengambil)) ? 'diambil' : ((( date('d-m-Y') > date('d-m-Y', strtotime($kematian->tanggal_verif. ' + 7 days')) )) ? 'kadaluarsa' : 'disetujui') ) : (($kematian->status == '2') ? 'ditolak' : 'menunggu') }}
											</div></td>
											<td>
												@if(!is_null($kematian->nama_pengambil))
												<button class="btn btn-xs btn-xs btn-info" data-toggle="modal" data-target="#modal-info" data-keterangan="{{ $kematian->keterangan }}">Info</button>
												@else
												@if($kematian->status == '2')
												<button class="btn btn-xs btn-xs btn-info" data-toggle="modal" data-target="#modal-info" data-keterangan="{{ $kematian->keterangan }}">Info</button>
												<a href="{{ site_url('warga/surat/hapus_kematian/'.$kematian->id) }}" class="btn btn-xs btn-danger" onclick="return confirm('Anda yakin?')">Hapus</a>
												@elseif($kematian->status == '1')
												<button class="btn btn-xs btn-block btn-info" data-toggle="modal" data-target="#modal-info" data-date="{{ date('d-m-Y', strtotime($kematian->tanggal_verif. ' + 7 days')) }}">Info</button>
												@else
												<a href="{{ site_url('warga/surat/hapus_kematian/'.$kematian->id) }}" class="btn btn-xs btn-block btn-danger" onclick="return confirm('Anda yakin?')">Batalkan</a>
												@endif
												@endif
											</td>
										</tr>
										@endforeach
										@endif
									</tbody>
								</table>
								@else
								<p>Tidak ada data surat</p>
								@endunless
							</div>
							{{-- END KEMATIAN --}}
							{{-- KEMATIAN --}}
							<div role="tabpanel" class="tab-pane table" id="tab-11">
								@unless(!$kematians)
								<table class="table table-hover table-stripped table-bordered">
									<thead>
										<tr>
											<th>NAMA ALMARHUM/ALMARHUMAH</th>
											<th>NAMA PELAPOR</th>
											<th>TANGGAL PENGAJUAN</th>
											<th>TANGGAL VERIFIKASI</th>
											<th class="text-center">STATUS</th>
											<th>AKSI</th>
										</tr>
									</thead>
									<tbody>
										@if($kematians)
										@foreach($kematians as $kematian)
										<tr>
											<td>{{ $kematian->meninggal->nama }}</td>
											<td>{{ $kematian->pelapor->nama }}</td>
											<td>{{ hari_indonesia(date('l', strtotime($surat->created_at))) . ', '. tgl_indo($kematian->created_at) }}</td>
											<td>{{ hari_indonesia(date('l', strtotime($surat->tanggal_verif))) . ', '. tgl_indo($kematian->tanggal_verif) }}</td>
											<td class="text-center"><div class="label label-{{ ($kematian->status == '1') ? ((!is_null($kematian->nama_pengambil)) ? 'success' : ((( date('d-m-Y') > date('d-m-Y', strtotime($kematian->tanggal_verif. ' + 7 days')) )) ? 'danger' : 'success') ) : (($kematian->status == '2') ? 'danger' : 'warning') }}">
												{{ ($kematian->status == '1') ? ((!is_null($kematian->nama_pengambil)) ? 'diambil' : ((( date('d-m-Y') > date('d-m-Y', strtotime($kematian->tanggal_verif. ' + 7 days')) )) ? 'kadaluarsa' : 'disetujui') ) : (($kematian->status == '2') ? 'ditolak' : 'menunggu') }}
											</div></td>
											<td>
												@if(!is_null($kematian->nama_pengambil))
												<button class="btn btn-xs btn-xs btn-info" data-toggle="modal" data-target="#modal-info" data-keterangan="{{ $kematian->keterangan }}">Info</button>
												@else
												@if($kematian->status == '2')
												<button class="btn btn-xs btn-xs btn-info" data-toggle="modal" data-target="#modal-info" data-keterangan="{{ $kematian->keterangan }}">Info</button>
												<a href="{{ site_url('warga/surat/hapus_kematian/'.$kematian->id) }}" class="btn btn-xs btn-danger" onclick="return confirm('Anda yakin?')">Hapus</a>
												@elseif($kematian->status == '1')
												<button class="btn btn-xs btn-block btn-info" data-toggle="modal" data-target="#modal-info" data-date="{{ date('d-m-Y', strtotime($kematian->tanggal_verif. ' + 7 days')) }}">Info</button>
												@else
												<a href="{{ site_url('warga/surat/hapus_kematian/'.$kematian->id) }}" class="btn btn-xs btn-block btn-danger" onclick="return confirm('Anda yakin?')">Batalkan</a>
												@endif
												@endif
											</td>
										</tr>
										@endforeach
										@endif
									</tbody>
								</table>
								@else
								<p>Tidak ada data surat</p>
								@endunless
							</div>
							{{-- END KEMATIAN --}}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('modal')
<div class="modal fade" tabindex="-1" role="dialog" id="modal-info">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Informasi</h4>
			</div>
			<div class="modal-body">
				<p class="p-keterangan">Pengajuan telah distejui. Harap mengambil berkas di kantor kelurahan, selama jam kerja. Batas pengambilan sampai <span class="batas_tgl"></span>.</p>
				<p class="keterangan"></p>
			</div>
		</div>
	</div>
</div>
@endsection

@section('style')
<style>
	th, .label{
		font-weight: 500;
	}

	.label{
		display: block;
		width: 100%;
	}

	td{
		font-weight: 300;
	}
</style>
@endsection

@section('javascript')
<script type="text/javascript">
	$("[data-date]").click(function(){
		$(".batas_tgl").empty().html($(this).data('date'));
	});
	$("[data-keterangan]").click(function(){
		$(".p-keterangan").empty().html("Keterangan : ");
		$(".keterangan").empty().html($(this).data('keterangan'));
	});
</script>
@endsection
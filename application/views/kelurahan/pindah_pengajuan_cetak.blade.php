@layout('_layout/dashboard/index')
@section('title')Cetak Pengajuan Pindah@endsection
@section('nama-kelurahan')Lumajang@endsection

@section('content')
<script type="text/javascript">
</script>
<div class="row">
	<div class="col-xs-12 col-center">
		<div class="panel">
			<div class="panel-body">
				<h5>PEMERINTAH KABUPATEN LUMAJANG</h5>
				<h5>KECAMATAN : LUMAJANG</h5>
				<h5>KELURAHAN : {{ strtoupper($current_kelurahan->nama) }}</h5>
				<div class="break-10"></div>
				<div class="center" style="border: none;">
					<span class="text-size-16"><u><b>SURAT KETERANGAN PINDAH</b></u></span><br>
					<span>Nomor : 475 / {{ $cetak->no_surat }} / 02.2003 / 2017</span>
				</div>
				<div class="break-20"></div>
				<div class="center table-responsive">
					<table class="table table-condensed borderless">
						<?php $no = 1; ?>
						<tr>
							<td width="5%" class="text-left">{{$no++}}.</td>
							<td width="30%" class="text-left">Nama Lengkap</td>
							<td width="3%" class="text-center">:</td>
							<td class="text-left"><b>{{ strtoupper($cetak->penduduk->nama) }}</b></td>
						</tr>
						<tr>
							<td width="5%" class="text-left">{{$no++}}.</td>
							<td width="30%" class="text-left">Jenis Kelamin</td>
							<td width="3%" class="text-center">:</td>
							<td class="text-left">
								@if($cetak->penduduk->jenis_kelamin === '0')
								Laki-Laki
								@else
								Perempuan
								@endif
							</td>
						</tr>
						<tr>
							<td width="5%" class="text-left">{{$no++}}.</td>
							<td width="30%" class="text-left">Dilahirkan di</td>
							<td width="3%" class="text-center">:</td>
							<td class="text-left">{{ $cetak->penduduk->tempat_lahir }}, {{ date('d-m-Y', strtotime($cetak->penduduk->tanggal_lahir)) }}</td>
						</tr>
						<tr>
							<td width="5%" class="text-left">{{$no++}}.</td>
							<td width="30%" class="text-left">Agama</td>
							<td width="3%" class="text-center">:</td>
							<td class="text-left">{{ cetak_agama($cetak->penduduk->agama) }}</td>
						</tr>
						<tr>
							<td width="5%" class="text-left">{{$no++}}.</td>
							<td width="30%" class="text-left">Status Perkawinan</td>
							<td width="3%" class="text-center">:</td>
							<td class="text-left">
								@if($cetak->penduduk->status_nikah == '0') 
								Belum Kawin
								@elseif($cetak->penduduk->status_nikah == '1')
								Kawin
								@elseif($cetak->penduduk->status_nikah == '2')
								Cerai Hidup
								@elseif($cetak->penduduk->status_nikah == '3')
								Cerai Mati
								@else
								Tidak ada Data
								@endif
							</td>
						</tr>
						<tr>
							<td width="5%" class="text-left">{{$no++}}.</td>
							<td width="30%" class="text-left">Pekerjaan</td>
							<td width="3%" class="text-center">:</td>
							<td class="text-left">{{ $cetak->penduduk->pekerjaan->pekerjaan }}</td>
						</tr>
						<tr>
							<td width="5%" class="text-left">{{$no++}}.</td>
							<td width="30%" class="text-left">Tanggal KTP</td>
							<td width="3%" class="text-center">:</td>
							<td class="text-left">{{ $cetak->penduduk->nik }}</td>
						</tr>
						<tr>
							<td width="5%" class="text-left">{{$no++}}.</td>
							<td width="30%" class="text-left">Alamat Lengkap</td>
							<td width="3%" class="text-center">:</td>
							<td class="text-left">
								<span>{{ $cetak->alamat_asal.' RT '.$cetak->penduduk->rt. ' RW '. $cetak->penduduk->rw }}</span>
								<table>
									<tr><td width="50%">Kelurahan</td><td>:&nbsp</td><td>{{ $current_kelurahan->nama }}</td></tr>
									<tr><td width="50%">Kecamatan</td><td>:&nbsp</td><td>Lumajang</td></tr>
									<tr><td width="50%">Kabupaten</td><td>:&nbsp</td><td>Lumajang</td></tr>
									<tr><td width="50%">Provinsi</td><td>:&nbsp</td><td>Jawa Timur</td></tr>
								</table>
							</td>
						</tr>
						<tr>
							<td width="5%" class="text-left">{{$no++}}.</td>
							<td width="30%" class="text-left">Pindah Ke</td>
							<td width="3%" class="text-center">:</td>
							<td class="text-left">
								<span>{{ $cetak->alamat_tujuan.' RT '.$cetak->rt_tujuan. ' RW '. $cetak->rw_tujuan }}</span>
								<table>
									<tr><td width="50%">Kelurahan / Desa</td><td>&nbsp:&nbsp</td><td>{{ ucwords(strtolower($cetak->kelurahan->nama)) }}</td></tr>
									<tr><td width="50%">Kecamatan</td><td>&nbsp:&nbsp</td><td>{{ ucwords(strtolower($cetak->kecamatan->nama)) }}</td></tr>
									<tr><td width="50%">Kabupaten / Kota</td><td>&nbsp:&nbsp</td><td>{{ucwords(strtolower($cetak->kabupaten->nama))}}</td></tr>
									<tr><td width="50%">Provinsi</td><td>&nbsp:&nbsp</td><td>{{ucwords(strtolower($cetak->provinsi->nama))}}</td></tr>
								</table>
							</td>
						</tr>
						<tr>
							<td width="5%" class="text-left">{{$no++}}.</td>
							<td width="30%" class="text-left">Alasan Pindah</td>
							<td width="3%" class="text-center">:</td>
							<td class="text-left">{{ $cetak->keterangan }}</td>
						</tr>
						<tr>
							<td width="5%" class="text-left">{{$no++}}.</td>
							<td width="30%" class="text-left">Pengikut</td>
							<td width="3%" class="text-center">:</td>
							<td class="text-left">{{ $j_pengikut }}({{ terbilang($j_pengikut) }}) orang</td>
						</tr>
						<tr>
							<td colspan="4" class="table-responsive">
								<table class="table table-bordered">
									<tr>
										<td rowspan="2">No</td>
										<td rowspan="2">Nama</td>
										<td colspan="2">Kelamin</td>
										<td rowspan="2">Umur</td>
										<td rowspan="2">Status Perkawinan</td>
										<td rowspan="2">Ket</td>
									</tr>
									<tr><td>Laki</td><td>Perempuan</td></tr>
									<!-- isi -->
									@foreach($cetak->mutasi_keluar_details as $pengikut)
									<tr>
										<td>1.</td>
										<td>{{ $pengikut->penduduk->nama }}</td>
										<td>
											@if($pengikut->penduduk->jenis_kelamin === '0')
											&#10004
											@else
											-
											@endif
										</td>
										<td>
											@if($pengikut->penduduk->jenis_kelamin === '1')
											&#10004
											@else
											-
											@endif
										</td>
										<td>{{ date('Y') - date('Y', strtotime($pengikut->penduduk->tanggal_lahir)) }}</td>
										<td>
											@if($pengikut->penduduk->status_nikah == '0') 
												Belum Kawin
											@elseif($pengikut->penduduk->status_nikah == '1')
												Kawin
											@elseif($pengikut->penduduk->status_nikah == '2')
												Cerai Hidup
											@elseif($pengikut->penduduk->status_nikah == '3')
												Cerai Mati
											@else
												Tidak ada Data
											@endif
										</td>
										<td></td>
									</tr>
									@endforeach
								</table>
							</td>
						</tr>
						<tr>
							<td colspan="4">
								<p class="text-left">Demikian surat ini dibuat atas permintaan dan keterangan pemohon untuk dipergunakan
									sebagaimana mestinya.<br>Untuk WNI dan WNA pada waktu surat keterangan pindah ini
									diberikan nama yang bersangkutan pada KSK dicoret dan KTP dicabut.</p>
								</td>
							</tr>
							<tr>
								<td colspan="4" class="table table-responsive">
									<table class="table borderless">
										<tr>
											<td colspan="2"></td>
											<td>{{ $current_kelurahan->nama.', ' .mdate('%j %F %Y', time()) }}</td></tr>
											<tr>
												<td width="44%">PEMOHON</td>
												<td width="10%"></td>
												<td width="44%">LURAH {{ strtoupper($current_kelurahan->nama) }}</td>
											</tr>
											<tr>
												<td colspan="3" height="50px"></td>
											</tr>
											<tr>
												<td><u><b>{{ strtoupper($cetak->penduduk->nama) }}</b></u></td>
												<td></td>
												<td><u><b>{{ $current_kelurahan->nama_pimpinan}}</b></u></td>
											</tr>
											<tr>
												<td colspan="2"></td>
												<td>JABATAN<br>NIP. {{ substr($current_kelurahan->nip, 0, 8).' '.substr($current_kelurahan->nip, 8, 6). ' '. substr($current_kelurahan->nip, 14, 4) }}</td>
											</tr>
											<tr>
												<td colspan="3">CAMAT {{ strtoupper($current_kecamatan->nama) }}</td>
											</tr>
											<tr>
												<td colspan="3" height="50px"></td>
											</tr>
											<tr>
												<td colspan="3">
													<u><b>{{ $current_kecamatan->nama_pimpinan }}</b></u><br>
													<span>PEMBINA</span><br>
													<span>NIP. {{ substr($current_kecamatan->nip, 0, 8).' '.substr($current_kecamatan->nip, 8, 6). ' '. substr($current_kecamatan->nip, 14, 4) }}</span>
												</td>
											</tr>
										</table>
									</td>
								</tr>
							</table>
						</div>
					</div>
				</div>
				<div class="block">
					<a href="{{ site_url('pindah/cetak/'.$cetak->id) }}" class="btn btn-warning btn-block"><i class="fa fa-print"></i> cetak</a>
				</div>
			</div>
		</div>
		@endsection

		@section('style')
		<style>
			.panel{
				width: 595pt;
				height: 842pt;
				max-width: 595pt;
				max-height: 842pt;
				padding: 30px 70px;
				overflow: hidden;
				font-size: 10pt;
			}

			.panel *{
				font-family: 'Times New Roman', serif;
				line-height: initial;
			}

			.col-center{
				display: flex;
				flex-direction: column;
				justify-content: center;
				align-items: center;
			}

			.text-size-16{font-size: 16pt}
			.text-size-18{font-size: 18pt}

			.btn-sharp{
				border-radius: 0;
			}

			table.borderless > tbody > tr > td{
				border: none !important;
			}
			table.table-condensed td, table.table-condensed th{
				padding-top: 1px !important;
				padding-bottom: 1px !important;
			}
			
			.center{
				display: block;
				width: 100%;
				text-align: center;
			}

			.block{
				width: 595pt;
			}
		</style>
		@endsection
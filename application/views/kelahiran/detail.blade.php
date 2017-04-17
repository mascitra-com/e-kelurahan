@layout('_layout/dashboard/index')
@section('title')Cetak Surat Keterangan Kelahiran@endsection
@section('nama-kelurahan') {{ $surat->organisasi->nama }}@endsection

@section('content')
<div class="row" id="print-area">
	<div class="col-xs-12 col-center">
		<div class="panel">
			<div class="panel-body">
				<h5>PEMERINTAH KABUPATEN LUMAJANG</h5>
				<h5>KECAMATAN : LUMAJANG</h5>
				<h5>KELURAHAN : {{ strtoupper($surat->organisasi->nama) }}</h5>
				<div class="break-10"></div>
				<div class="center" style="border: none;">
					<span class="text-size-16"><u><b>SURAT KETERANGAN KELAHIRAN</b></u></span><br>
					<span>Nomor : {{ $surat->no_surat }}</span>
				</div>
				<div class="break-30"></div>
				<div class="table-responsive">
					<table class="table table-condensed borderless">
						<tr>
							<td colspan="3">
								<p>Yang bertanda tangan di bawah ini, menerangkan bahwa pada:</p>
							</td>
						</tr>
						<!-- WAKTU LAHIR -->
						<tr>
							<td>Hari</td>
							<td>:</td>
							<td>{{ hari_indonesia(date('l', strtotime($surat->tanggal_kelahiran))) }}</td>
						</tr>
						<tr>
							<td>Tanggal</td>
							<td>:</td>
							<td>{{ tgl_indo($surat->tanggal_kelahiran) }}</td>
						</tr>
						<tr>
							<td>Pukul</td>
							<td>:</td>
							<td>{{ date('h:i', strtotime($surat->tanggal_kelahiran)) }} WIB</td>
						</tr>
						<tr>
							<td>Tempat Kelahiran</td>
							<td>:</td>
							<td>{{ $surat->tempat_kelahiran }}</td>
						</tr>
						<!-- AKHIR WAKTU LAHIR -->
						<tr>
							<td colspan="3">
								<p class="break-top-20">Telah lahir anak laki-laki / perempuan</p>
							</td>
						</tr>
						<!-- BIODATA ANAK & IBU -->
						<tr>
							<td>Bernama</td>
							<td>:</td>
							<td>{{ $surat->nama_anak }}</td>
						</tr>
						<tr>
							<td>Dari Seorang Ibu</td>
							<td>:</td>
							<td>{{ $surat->ibu->nama }}</td>
						</tr>
						<tr>
							<td>NIK</td>
							<td>:</td>
							<td>{{ $surat->nik_ibu }}</td>
						</tr>
						<tr>
							<td>Umur</td>
							<td>:</td>
							<td>{{ date('Y') - date('Y' ,strtotime($surat->ibu->tanggal_lahir)) }} tahun</td>
						</tr>
						<tr>
							<td>Pekerjaan</td>
							<td>:</td>
							<td>{{ $surat->ibu->pekerjaan->pekerjaan }}</td>
						</tr>
						<tr>
							<td>Alamat</td>
							<td>:</td>
							<td>Desa {{ $surat->organisasi->nama }} RT.{{ $surat->ibu->rt }} RW.{{ $surat->ibu->rw }}, Kec. Lumajang<br>Kab. Lumajang</td>
						</tr>
						<!-- AKHIR BIODATA ANAK & IBU -->
						<tr>
							<td colspan="3">
								<p class="break-top-20"></p>
							</td>
						</tr>
						<!-- BIODATA AYAH -->
						<tr>
							<td>Istri Dari</td>
							<td>:</td>
							<td>{{ $surat->ayah->nama }}</td>
						</tr>
						<tr>
							<td>NIK</td>
							<td>:</td>
							<td>{{ $surat->nik_ayah }}</td>
						</tr>
						<tr>
							<td>Umur</td>
							<td>:</td>
							<td>{{ date('Y') - date('Y' ,strtotime($surat->ayah->tanggal_lahir)) }} tahun</td>
						</tr>
						<tr>
							<td>Pekerjaan</td>
							<td>:</td>
							<td>{{ $surat->ayah->pekerjaan->pekerjaan }}</td>
						</tr>
						<tr>
							<td>Alamat</td>
							<td>:</td>
							<td>Desa {{ $surat->organisasi->nama }} RT.{{ $surat->ayah->rt }} RW.{{ $surat->ayah->rw }}, Kec. Lumajang<br>Kab. Lumajang</td>
						</tr>
						<!-- AKHIR AYAH -->
						<tr>
							<td colspan="3">
								<p class="break-top-20">Surat keternangan ini di buat berdasarkan keterangan pelapor:</p>
							</td>
						</tr>
						<!-- BIODATA PELAPOR -->
						<tr>
							<td>Nama Lengkap</td>
							<td>:</td>
							<td>{{ $surat->pelapor->nama }}</td>
						</tr>
						<tr>
							<td>NIK</td>
							<td>:</td>
							<td>{{ $surat->nik_pelapor }}</td>
						</tr>
						<tr>
							<td>Umur</td>
							<td>:</td>
							<td>{{ date('Y') - date('Y' ,strtotime($surat->pelapor->tanggal_lahir)) }} tahun</td>
						</tr>
						<tr>
							<td>Pekerjaan</td>
							<td>:</td>
							<td>{{ $surat->pelapor->pekerjaan->pekerjaan }}</td>
						</tr>
						<tr>
							<td>Alamat</td>
							<td>:</td>
							<td>Desa {{ $surat->organisasi->nama }} RT.{{ $surat->pelapor->rt }} RW.{{ $surat->pelapor->rw }}, Kec. Lumajang<br>Kab. Lumajang</td>
						</tr>
						<tr>
							<td>Hubungan pelapor dengan bayi</td>
							<td>:</td>
							<td>{{ $surat->hubungan_pelapor }}</td>
						</tr>
						<!-- AKHIR BIODATA PELAPOR -->
						<tr>
							<table class="break-top-50">
								<tr>
									<td width="66%"></td>
									<td width="33%" align="center">
										<span>Lumajang, {{ tgl_indo($surat->tanggal_kelahiran) }}</span><br>
										<span>KEPALA DESA {{ $surat->organisasi->nama }}</span>
										<div class="break-100"></div>
										<span>{{ $kelurahan->nama_lurah }}</span><br>
										<span>NIP.{{ $kelurahan->nip }}</span>
									</td>
								</tr>
							</table>
						</tr>
					</table>
				</div>
			</div>
		</div>
		<div class="block" id="print-button">
			@if($surat->status === '1' && (!is_null($surat->nama_pengambil) && !is_null($surat->tanggal_ambil)))
			<a href="{{ site_url('kelahiran/cetak/'. $surat->id) }}" target="_blank" class="btn btn-warning btn-block"><i class="fa fa-print"></i> cetak</a>
			@endif
			<a href="{{ site_url('kelahiran') }}" class="btn btn-default btn-block"><i class="fa fa-arrow-left"></i> kembali</a>
		</div>
	</div>
</div>
@endsection

@section('style')
<style>
	@page {margin:0;}
	@media print{
		@page{margin: 0}
		body * {
			visibility: hidden;
		}

		html, body{
			max-height: 842pt;
			overflow: hidden;
		}

		#print-area, #print-area *{
			visibility: visible;
		}

		#print-area #print-button{
			display: none;
		}
	}

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

	p{
		text-align: justify;
	}

	td, td *{
		font-size: 11pt;
	}
</style>
@endsection

@section('javascript')
<script>
	$("#print-button > button").click(function(){
		window.print();
	});
</script>
@endsection
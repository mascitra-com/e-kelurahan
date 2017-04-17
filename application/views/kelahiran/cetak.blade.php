<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Keterangan Miskin</title>
	<link rel="stylesheet" href="{{base_url('assets/plugins/bootstrap/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{base_url('assets/plugins/fontawesome/css/font-awesome.min.css')}}">
	<link rel="stylesheet" href="{{base_url('assets/css/theme.css')}}">
	<link rel="stylesheet" href="{{base_url('assets/css/theme-helper.css')}}">
	<style>
		@page { margin: 0; }

		@media print {
			@page { margin: 0; }
		}

		html, body{
			max-height: 842pt;
			overflow: hidden;
		}

		.panel{
			width: 595pt;
			height: 842pt;
			max-width: 595pt;
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
</head>
<body>
	<div class="container-fluid">
		<div class="row">
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
			</div>
		</div>
	</div>
</div>

<script type="text/javascript" src="{{base_url('assets/plugins/jquery/jquery-3.1.1.min.js')}}"></script>
<script type="text/javascript">
	$(document).ready(function(){
		window.print();
	});
</script>
</body>
</html>
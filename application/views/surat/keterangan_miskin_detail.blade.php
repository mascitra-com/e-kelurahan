@layout('_layout/dashboard/index')
@section('title')Cetak Surat Keterangan Miskin@endsection
@section('nama-kelurahan')Lumajang@endsection

@section('content')
<div class="row">
	<div class="col-xs-12 col-center">
		<div class="panel">
			<div class="panel-body">
				<h5>PEMERINTAH KABUPATEN LUMAJANG</h5>
				<h5>KECAMATAN : LUMAJANG</h5>
				<h5>KELURAHAN : {{ strtoupper($surat->organisasi->nama) }}</h5>
				<div class="break-10"></div>
				<div class="center" style="border: none;">
					<span class="text-size-16"><u><b>SURAT PERNYATAAN</b></u></span><br>
					<span>Nomor : {{ $surat->no_surat }}</span>
				</div>
				<div class="break-30"></div>
				<div class="table-responsive">
					<table class="table table-condensed borderless">
						<tr>
							<td colspan="3">
								<p>Yang bertanda tangan di bawah ini:</p>
							</td>
						</tr>
						<!-- BIODATA KEPALA LURAH/DESA -->
						<tr>
							<td>Nama</td>
							<td>:</td>
							<td>{{ $kelurahan->nama_lurah }}</td>
						</tr>
						<tr>
							<td>Alamat</td>
							<td>:</td>
							<td>{{ $kelurahan->alamat }}</td>
						</tr>
						<tr>
							<td>Tempat/Tanggal Lahir</td>
							<td>:</td>
							<td>Jember, 02 Mei 1995</td>
						</tr>
						<tr>
							<td>Jabatan</td>
							<td>:</td>
							<td>Kepala Desa</td>
						</tr>
						<!-- AKHIR BIODATA KEPALA LURAH/DESA -->
						<tr>
							<td colspan="3">
								<p class="break-top-20">Dengan ini menyatakan dengan sebenarnya bahwa Surat Keterangan Miskin (SKM) atau Surat Keterangan Tidak Mampu (SKTM) yang telah saya buat untuk :</p>
							</td>
						</tr>
						<!-- BIODATA PENGAJU -->
						<tr>
							<td>Nama</td>
							<td>:</td>
							<td>{{ $surat->penduduk->nama }}</td>
						</tr>
						<tr>
							<td>Tempat/Tanggal Lahir</td>
							<td>:</td>
							<td>{{ $surat->penduduk->tempat_lahir }}, {{ date('d F Y', strtotime($surat->penduduk->tanggal_lahir)) }}</td>
						</tr>
						<tr>
							<td>Pekerjaan</td>
							<td>:</td>
							<td>{{ $surat->penduduk->pekerjaan->pekerjaan }}</td>
						</tr>
						<tr>
							<td>Alamat</td>
							<td>:</td>
							<td>Desa {{ $surat->organisasi->nama }} RT.{{ $surat->penduduk->rt }} RW.{{ $surat->penduduk->rw }}, Kec. Lumajang<br>Kab. Lumajang</td>
						</tr>
						<!-- AKHIR BIODATA PENGAJU -->
						<tr>
							<td colspan="3">
								<p class="break-top-20">Adalah sesuai dengan keadaan yang sebenarnya dan sesuai dengan Kriteria Masyarakat Miskin atau Tidak Mampu. Apabila di kemudian hari diketahui bahwa Surat Pernyataan tentang SKTM/SKM tersebut di atas tidak benar, maka saya akan bertanggung jawab atas akibat yang ditimbulkan baik Perdata maupun Pidana.</p>
								<p>Demikian Surat ini saya buat dengan penuh tanggung jawab tanpa ada unsur tekanan/paksaan dari manapun.</p>
							</td>
						</tr>
						<tr>
							<table class="break-top-50">
								<tr>
									<td width="66%"></td>
									<td width="33%" align="center">
										<span>Lumajang, {{ date('d F Y') }}</span><br>
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
		<div class="block">
			<a href="{{site_url('surat/cetak/keterangan_miskin/'.$surat->id)}}" class="btn btn-warning btn-block"><i class="fa fa-print"></i> cetak</a>
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

	p{
		text-align: justify;
	}

	td, td *{
		font-size: 11pt;
	}
</style>
@endsection
@layout('_layout/dashboard/index')
@section('title')Cetak Surat Keterangan Tidak Mampu@endsection
@section('nama-kelurahan')Lumajang@endsection

@section('content')
<div class="row">
	<div class="col-xs-12 col-center">
		<div class="panel">
			<div class="panel-body">
				<h5>PEMERINTAH KABUPATEN JEMBER</h5>
				<h5>KECAMATAN : PATRANG</h5>
				<h5>KELURAHAN : GEBANG</h5>
				<div class="break-10"></div>
				<div class="center" style="border: none;">
					<span class="text-size-16"><u><b>SURAT PERNYATAAN</b></u></span><br>
					<span>Nomor : 475 / 18 / 02.2003 / 2017</span>
				</div>
				<div class="break-30"></div>
				<div class="table-responsive">
					<table class="table table-condensed borderless">
						<tr>
							<td colspan="3">
								<p>Kami kepala Desa XXX Kabupaten Lumajang Menyatakan:</p>
							</td>
						</tr>
						<!-- BIODATA PENGAJU -->
						<tr>
							<td>Nama</td>
							<td>:</td>
							<td>[Nama siswa]</td>
						</tr>
						<tr>
							<td>Tempat/Tanggal Lahir</td>
							<td>:</td>
							<td>[TTL]</td>
						</tr>
						<tr>
							<td>Siswa</td>
							<td>:</td>
							<td>[Asal sekolah]</td>
						</tr>
						<tr>
							<td>Jurusan</td>
							<td>:</td>
							<td>[Jurusan]</td>
						</tr>
						<tr>
							<td>Alamat</td>
							<td>:</td>
							<td>[alamat]</td>
						</tr>
						<tr>
							<td>Anak dari:</td>
							<td><br><br><br></td>
						</tr>
						<tr>
							<td>Nama</td>
							<td>:</td>
							<td>[Nama Ortu/Wali]</td>
						</tr>
						<tr>
							<td>Umur</td>
							<td>:</td>
							<td>[umur]</td>
						</tr>
						<tr>
							<td>Pekerjaan</td>
							<td>:</td>
							<td>[Pekerjaan]</td>
						</tr>
						<tr>
							<td>Tempat Tinggal</td>
							<td>:</td>
							<td>[Alamat]</td>
						</tr>
						<!-- AKHIR BIODATA PENGAJU -->
						<tr>
							<td colspan="3">
								<p class="break-top-20">Bahwa yang bernama tersebut diatas dengan keberadaan yang sebenarnya termasuk KK Tidak Mampu.</p>
								<p>Demikian surat keterangan ini dibuat dengan sebenarnya, mohon kepada semua pihak yang terkait harap maklum dan terimakasih.</p>
							</td>
						</tr>
						<tr>
							<table class="break-top-50">
								<tr>
									<td width="66%"></td>
									<td width="33%" align="center">
										<span>Lumajang, 28 Februari 2017</span><br>
										<span>KEPALA DESA Namakelurahan</span>
										<div class="break-100"></div>
										<span>NamaLurah</span><br>
										<span>NIP.1234567890</span>
									</td>
								</tr>
							</table>
						</tr>
					</table>
				</div>
			</div>
		</div>
		<div class="block">
			<a class="btn btn-warning btn-block"><i class="fa fa-print"></i> cetak</a>
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
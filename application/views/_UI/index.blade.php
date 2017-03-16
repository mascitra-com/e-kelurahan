@layout('_layout/dashboard/index')
@section('title')UI List@endsection
@section('nama-kelurahan')Lumajang@endsection

@section('content')
<div class="row">
	<div class="col-xs-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<span class="panel-title">DAFTAR UI</span>
			</div>
			<div class="panel-body table-responsive table-full">
				<table class="table table-bordered table-stripped table-hover">
					<thead>
						<tr>
							<td width="7%">#</td>
							<td>Judul</td>
							<td>Deskripsi</td>
							<td>Folder</td>
							<td>Back</td>
							<td class="text-center">Status</td>
							<td>Lokasi</td>
						</tr>
					</thead>
					<tbody>
						<!-- DIVIDER -->
						<?php $no = 1 ?>
						<tr>
							<td>{{str_pad($no++,2,'0',STR_PAD_LEFT)}}</td>
							<td>Index UI</td>
							<td>Halaman daftar UI</td>
							<td>/</td>
							<td>Ainul</td>
							<td class="text-center"><i class="fa fa-circle text-green"></i></td>
							<td width="10%">
								<a href="{{site_url('ui')}}" class="btn btn-default btn-xs btn-block"><i class="fa fa-link"></i></a>
							</td>
						</tr>
						<!-- END DIVIDER -->
						<!-- DIVIDER -->
						<tr>
							<td>{{str_pad($no++,2,'0',STR_PAD_LEFT)}}</td>
							<td>Sign in</td>
							<td>Halaman masuk user</td>
							<td>auth</td>
							<td>Sudah</td>
							<td class="text-center"><i class="fa fa-circle text-green"></i></td>
							<td width="10%">
								<a href="{{site_url('ui/signin')}}" class="btn btn-default btn-xs btn-block"><i class="fa fa-link"></i></a>
							</td>
						</tr>
						<!-- END DIVIDER -->
						<!-- DIVIDER -->
						<tr>
							<td>{{str_pad($no++,2,'0',STR_PAD_LEFT)}}</td>
							<td>Manajemen Kelurahan</td>
							<td>Halaman untuk memanajemen data kelurahan</td>
							<td>kelurahan</td>
							<td>Sudah</td>
							<td class="text-center"><i class="fa fa-circle text-green"></i></td>
							<td width="10%">
								<a href="{{site_url('ui/kelurahan')}}" class="btn btn-default btn-xs btn-block"><i class="fa fa-link"></i></a>
							</td>
						</tr>
						<!-- END DIVIDER -->
						<!-- DIVIDER -->
						<tr>
							<td>{{str_pad($no++,2,'0',STR_PAD_LEFT)}}</td>
							<td>Manajemen Akun Kelurahan</td>
							<td>Halaman untuk memanajemen akun kelurahan</td>
							<td>kelurahan</td>
							<td>Sudah</td>
							<td class="text-center"><i class="fa fa-circle text-green"></i></td>
							<td width="10%">
								<a href="{{site_url('ui/kelurahan')}}" class="btn btn-default btn-xs btn-block"><i class="fa fa-link"></i></a>
							</td>
						</tr>
						<!-- END DIVIDER -->
						<!-- DIVIDER -->
						<tr>
							<td>{{str_pad($no++,2,'0',STR_PAD_LEFT)}}</td>
							<td>Manajemen Kependudukan</td>
							<td>Halaman untuk memanajemen data kependudukan</td>
							<td>kependudukan</td>
							<td>Sudah</td>
							<td class="text-center"><i class="fa fa-circle text-green"></i></td>
							<td width="10%">
								<a href="{{site_url('ui/kependudukan')}}" class="btn btn-default btn-xs btn-block"><i class="fa fa-link"></i></a>
							</td>
						</tr>
						<!-- END DIVIDER -->
						<!-- DIVIDER -->
						<tr>
							<td>{{str_pad($no++,2,'0',STR_PAD_LEFT)}}</td>
							<td>Manajemen Keluarga</td>
							<td>Halaman untuk memanajemen data Keluarga</td>
							<td>Keluarga</td>
							<td>Sudah</td>
							<td class="text-center"><i class="fa fa-circle text-green"></i></td>
							<td width="10%">
								<a href="{{site_url('ui/keluarga')}}" class="btn btn-default btn-xs btn-block"><i class="fa fa-link"></i></a>
							</td>
						</tr>
						<!-- END DIVIDER -->
						<!-- DIVIDER -->
						<tr>
							<td>{{str_pad($no++,2,'0',STR_PAD_LEFT)}}</td>
							<td>Manajemen Detail Keluarga</td>
							<td>Halaman untuk memanajemen detail data Keluarga</td>
							<td>Keluarga</td>
							<td>Sudah</td>
							<td class="text-center"><i class="fa fa-circle text-green"></i></td>
							<td width="10%">
								<a href="{{site_url('ui/keluarga_detail')}}" class="btn btn-default btn-xs btn-block"><i class="fa fa-link"></i></a>
							</td>
						</tr>
						<!-- END DIVIDER -->

						<!-- DIVIDER -->
						<tr>
							<td>{{str_pad($no++,2,'0',STR_PAD_LEFT)}}</td>
							<td>Manajemen Pengajuan Pindah</td>
							<td>Halaman untuk memanajemen pindah kelurahan</td>
							<td>kelurahan</td>
							<td>Sudah</td>
							<td class="text-center"><i class="fa fa-circle text-green"></i></td>
							<td width="10%">
								<a href="{{site_url('ui/pindah')}}" class="btn btn-default btn-xs btn-block"><i class="fa fa-link"></i></a>
							</td>
						</tr>
						<!-- END DIVIDER -->

						<!-- DIVIDER -->
						<tr>
							<td>{{str_pad($no++,2,'0',STR_PAD_LEFT)}}</td>
							<td>Form Pengajuan Pindah</td>
							<td>Halaman untuk mangajukan pindah kelurahan</td>
							<td>kelurahan</td>
							<td>Sudah</td>
							<td class="text-center"><i class="fa fa-circle text-green"></i></td>
							<td width="10%">
								<a href="{{site_url('ui/pindah_pengajuan')}}" class="btn btn-default btn-xs btn-block"><i class="fa fa-link"></i></a>
							</td>
						</tr>
						<!-- END DIVIDER -->

						<!-- DIVIDER -->
						<tr>
							<td>{{str_pad($no++,2,'0',STR_PAD_LEFT)}}</td>
							<td>Detail Pengajuan</td>
							<td>Halaman untuk mengedit data pengajuan</td>
							<td>kelurahan</td>
							<td>Sudah</td>
							<td class="text-center"><i class="fa fa-circle text-green"></i></td>
							<td width="10%">
								<a href="{{site_url('ui/pindah_detail')}}" class="btn btn-default btn-xs btn-block"><i class="fa fa-link"></i></a>
							</td>
						</tr>
						<!-- END DIVIDER -->
						<!-- DIVIDER -->
						<tr>
							<td>{{str_pad($no++,2,'0',STR_PAD_LEFT)}}</td>
							<td>Arsip Pengajuan Pindah</td>
							<td>Halaman untuk memanajemen data pindahan yg diarsipkan</td>
							<td>kelurahan</td>
							<td>Sudah</td>
							<td class="text-center"><i class="fa fa-circle text-green"></i></td>
							<td width="10%">
								<a href="{{site_url('ui/pindah_arsip')}}" class="btn btn-default btn-xs btn-block"><i class="fa fa-link"></i></a>
							</td>
						</tr>
						<!-- END DIVIDER -->
						<!-- DIVIDER -->
						<tr>
							<td>{{str_pad($no++,2,'0',STR_PAD_LEFT)}}</td>
							<td>Cetak Surat Pengajuan Pindah</td>
							<td>Halaman cetak pengajuan pindah</td>
							<td>kelurahan</td>
							<td>belum</td>
							<td class="text-center"><i class="fa fa-circle text-green"></i></td>
							<td width="10%">
								<a href="{{site_url('ui/pindah_pengajuan_cetak')}}" class="btn btn-default btn-xs btn-block"><i class="fa fa-link"></i></a>
							</td>
						</tr>
						<!-- END DIVIDER -->
						<!-- DIVIDER -->
						<tr>
							<td>{{str_pad($no++,2,'0',STR_PAD_LEFT)}}</td>
							<td>Alert</td>
							<td>Popup Alert</td>
							<td>/</td>
							<td>-</td>
							<td class="text-center"><i class="fa fa-circle text-green"></i></td>
							<td width="10%">-</td>
						</tr>
						<!-- END DIVIDER -->
						<!-- DIVIDER -->
						<tr>
							<td>{{str_pad($no++,2,'0',STR_PAD_LEFT)}}</td>
							<td>Persetujuan Kelurahan</td>
							<td>Halaman super admin untuk menyetujui kelurahan</td>
							<td>Kelurahan</td>
							<td>Sudah</td>
							<td class="text-center"><i class="fa fa-circle text-green"></i></td>
							<td width="10%">
								<a href="{{site_url('ui/konfirmasi_kelurahan')}}" class="btn btn-default btn-xs btn-block"><i class="fa fa-link"></i></a>
							</td>
						</tr>
						<!-- END DIVIDER -->
						<!-- DIVIDER -->
						<tr>
							<td>{{str_pad($no++,2,'0',STR_PAD_LEFT)}}</td>
							<td>Profil Kelurahan</td>
							<td>Halaman untuk mengatur informasi profil kelurahan</td>
							<td>auth</td>
							<td>Sudah</td>
							<td class="text-center"><i class="fa fa-circle text-green"></i></td>
							<td width="10%">
								<a href="{{site_url('ui/profil')}}" class="btn btn-default btn-xs btn-block"><i class="fa fa-link"></i></a>
							</td>
						</tr>
						<!-- END DIVIDER -->
						<!-- DIVIDER -->
						<tr>
							<td>{{str_pad($no++,2,'0',STR_PAD_LEFT)}}</td>
							<td>Surat Blanko KTP</td>
							<td>Halaman untuk memanajemen surat blanko isian ktp</td>
							<td>surat</td>
							<td>Sudah</td>
							<td class="text-center"><i class="fa fa-circle text-green"></i></td>
							<td width="10%">
								<a href="{{site_url('ui/surat_blanko_ktp')}}" class="btn btn-default btn-xs btn-block"><i class="fa fa-link"></i></a>
							</td>
						</tr>
						<!-- END DIVIDER -->
						<!-- DIVIDER -->
						<tr>
							<td>{{str_pad($no++,2,'0',STR_PAD_LEFT)}}</td>
							<td>SKCK</td>
							<td>Halaman untuk memanajemen SKCK</td>
							<td>surat</td>
							<td>Sudah</td>
							<td class="text-center"><i class="fa fa-circle text-green"></i></td>
							<td width="10%">
								<a href="{{site_url('ui/surat_skck')}}" class="btn btn-default btn-xs btn-block"><i class="fa fa-link"></i></a>
							</td>
						</tr>
						<!-- END DIVIDER -->
						<!-- DIVIDER -->
						<tr>
							<td>{{str_pad($no++,2,'0',STR_PAD_LEFT)}}</td>
							<td>Surat Keterangan Miskin</td>
							<td>Halaman untuk memanajemen surat keterangan miskin</td>
							<td>surat</td>
							<td>Sudah</td>
							<td class="text-center"><i class="fa fa-circle text-green"></i></td>
							<td width="10%">
								<a href="{{site_url('ui/surat_keterangan_miskin')}}" class="btn btn-default btn-xs btn-block"><i class="fa fa-link"></i></a>
							</td>
						</tr>
						<!-- END DIVIDER -->
						<!-- DIVIDER -->
						<tr>
							<td>{{str_pad($no++,2,'0',STR_PAD_LEFT)}}</td>
							<td>Homepage</td>
							<td>Halaman depan website</td>
							<td>homepage</td>
							<td>Sudah</td>
							<td class="text-center"><i class="fa fa-circle text-green"></i></td>
							<td width="10%">
								<a href="{{site_url('ui/homepage')}}" class="btn btn-default btn-xs btn-block"><i class="fa fa-link"></i></a>
							</td>
						</tr>
						<!-- END DIVIDER -->
						<!-- DIVIDER -->
						<tr>
							<td>{{str_pad($no++,2,'0',STR_PAD_LEFT)}}</td>
							<td>Status Pengajuan</td>
							<td>Halaman untuk warga melihat status pengajuan layanan</td>
							<td>homepage/dashboard</td>
							<td>Sudah</td>
							<td class="text-center"><i class="fa fa-circle text-green"></i></td>
							<td width="10%">
								<a href="{{site_url('ui/status_pengajuan')}}" class="btn btn-default btn-xs btn-block"><i class="fa fa-link"></i></a>
							</td>
						</tr>
						<!-- END DIVIDER -->
						<!-- DIVIDER -->
						<tr>
							<td>{{str_pad($no++,2,'0',STR_PAD_LEFT)}}</td>
							<td>Pengajuan Blanko</td>
							<td>Halaman Pengajuan Blanko KTP</td>
							<td>homepage/dashboard</td>
							<td>Sudah</td>
							<td class="text-center"><i class="fa fa-circle text-green"></i></td>
							<td width="10%">
								<a href="{{site_url('ui/pengajuan_blanko')}}" class="btn btn-default btn-xs btn-block"><i class="fa fa-link"></i></a>
							</td>
						</tr>
						<!-- END DIVIDER -->
						<!-- DIVIDER -->
						<tr>
							<td>{{str_pad($no++,2,'0',STR_PAD_LEFT)}}</td>
							<td>Konfirmasi Pengajuan Blanko</td>
							<td>Halaman Konfirmasi pengajuan Blanko KTP</td>
							<td>surat</td>
							<td>Sudah</td>
							<td class="text-center"><i class="fa fa-circle text-green"></i></td>
							<td width="10%">
								<a href="{{site_url('ui/surat_blanko_ktp')}}" class="btn btn-default btn-xs btn-block"><i class="fa fa-link"></i></a>
							</td>
						</tr>
						<!-- END DIVIDER -->
						<!-- DIVIDER -->
						<tr>
							<td>{{str_pad($no++,2,'0',STR_PAD_LEFT)}}</td>
							<td>SKTM</td>
							<td>Halaman Manajemen SKTM</td>
							<td>surat</td>
							<td>Sudah</td>
							<td class="text-center"><i class="fa fa-circle text-green"></i></td>
							<td width="10%">
								<a href="{{site_url('ui/surat_sktm')}}" class="btn btn-default btn-xs btn-block"><i class="fa fa-link"></i></a>
							</td>
						</tr>
						<!-- END DIVIDER -->
						<!-- DIVIDER -->
						<tr>
							<td>{{str_pad($no++,2,'0',STR_PAD_LEFT)}}</td>
							<td>Daftar Berita</td>
							<td>Tulis berita</td>
							<td>berita</td>
							<td>Sudah</td>
							<td class="text-center"><i class="fa fa-circle text-green"></i></td>
							<td width="10%">
								<a href="{{site_url('ui/berita')}}" class="btn btn-default btn-xs btn-block"><i class="fa fa-link"></i></a>
							</td>
						</tr>
						<!-- END DIVIDER -->
						<!-- DIVIDER -->
						<tr>
							<td>{{str_pad($no++,2,'0',STR_PAD_LEFT)}}</td>
							<td>Arsip Berita</td>
							<td>Halaman daftar arsip berita</td>
							<td>berita</td>
							<td>Sudah</td>
							<td class="text-center"><i class="fa fa-circle text-green"></i></td>
							<td width="10%">
								<a href="{{site_url('ui/berita_arsip')}}" class="btn btn-default btn-xs btn-block"><i class="fa fa-link"></i></a>
							</td>
						</tr>
						<!-- END DIVIDER -->
						<!-- DIVIDER -->
						<tr>
							<td>{{str_pad($no++,2,'0',STR_PAD_LEFT)}}</td>
							<td>Draf Berita</td>
							<td>Halaman daftar draf berita</td>
							<td>berita</td>
							<td>Sudah</td>
							<td class="text-center"><i class="fa fa-circle text-green"></i></td>
							<td width="10%">
								<a href="{{site_url('ui/berita_draf')}}" class="btn btn-default btn-xs btn-block"><i class="fa fa-link"></i></a>
							</td>
						</tr>
						<!-- END DIVIDER -->
						<!-- DIVIDER -->
						<tr>
							<td>{{str_pad($no++,2,'0',STR_PAD_LEFT)}}</td>
							<td>Tulis Berita</td>
							<td>Halaman membuat berita baru</td>
							<td>berita</td>
							<td>Sudah</td>
							<td class="text-center"><i class="fa fa-circle text-green"></i></td>
							<td width="10%">
								<a href="{{site_url('ui/berita_tulis')}}" class="btn btn-default btn-xs btn-block"><i class="fa fa-link"></i></a>
							</td>
						</tr>
						<!-- END DIVIDER -->
						<!-- DIVIDER -->
						<tr>
							<td>{{str_pad($no++,2,'0',STR_PAD_LEFT)}}</td>
							<td>Detail Berita</td>
							<td>Halaman detail berita</td>
							<td>berita</td>
							<td>Sudah</td>
							<td class="text-center"><i class="fa fa-circle text-green"></i></td>
							<td width="10%">
								<a href="{{site_url('ui/berita_detail')}}" class="btn btn-default btn-xs btn-block"><i class="fa fa-link"></i></a>
							</td>
						</tr>
						<!-- END DIVIDER -->
						<!-- DIVIDER -->
						<tr>
							<td>{{str_pad($no++,2,'0',STR_PAD_LEFT)}}</td>
							<td>info</td>
							<td>Halaman daftar info</td>
							<td>info</td>
							<td>Sudah</td>
							<td class="text-center"><i class="fa fa-circle text-green"></i></td>
							<td width="10%">
								<a href="{{site_url('ui/info')}}" class="btn btn-default btn-xs btn-block"><i class="fa fa-link"></i></a>
							</td>
						</tr>
						<!-- END DIVIDER -->
						<!-- DIVIDER -->
						<tr>
							<td>{{str_pad($no++,2,'0',STR_PAD_LEFT)}}</td>
							<td>tambah info</td>
							<td>Halaman tambah info</td>
							<td>info</td>
							<td>Sudah</td>
							<td class="text-center"><i class="fa fa-circle text-green"></i></td>
							<td width="10%">
								<a href="{{site_url('ui/info_tambah')}}" class="btn btn-default btn-xs btn-block"><i class="fa fa-link"></i></a>
							</td>
						</tr>
						<!-- END DIVIDER -->
						<!-- DIVIDER -->
						<tr>
							<td>{{str_pad($no++,2,'0',STR_PAD_LEFT)}}</td>
							<td>detail info</td>
							<td>Halaman detail info</td>
							<td>info</td>
							<td>Sudah</td>
							<td class="text-center"><i class="fa fa-circle text-green"></i></td>
							<td width="10%">
								<a href="{{site_url('ui/info_detail')}}" class="btn btn-default btn-xs btn-block"><i class="fa fa-link"></i></a>
							</td>
						</tr>
						<!-- END DIVIDER -->
						<!-- DIVIDER -->
						<tr>
							<td>{{str_pad($no++,2,'0',STR_PAD_LEFT)}}</td>
							<td>Agenda</td>
							<td>Halaman agenda</td>
							<td>agenda</td>
							<td>Sudah</td>
							<td class="text-center"><i class="fa fa-circle text-green"></i></td>
							<td width="10%">
								<a href="{{site_url('ui/agenda')}}" class="btn btn-default btn-xs btn-block"><i class="fa fa-link"></i></a>
							</td>
						</tr>
						<!-- END DIVIDER -->
						<!-- DIVIDER -->
						<tr>
							<td>{{str_pad($no++,2,'0',STR_PAD_LEFT)}}</td>
							<td>Regulasi</td>
							<td>Halaman regulasi</td>
							<td>regulasi</td>
							<td>Sudah</td>
							<td class="text-center"><i class="fa fa-circle text-green"></i></td>
							<td width="10%">
								<a href="{{site_url('ui/regulasi')}}" class="btn btn-default btn-xs btn-block"><i class="fa fa-link"></i></a>
							</td>
						</tr>
						<!-- END DIVIDER -->
						<!-- DIVIDER -->
						<tr>
							<td>{{str_pad($no++,2,'0',STR_PAD_LEFT)}}</td>
							<td>pengumuman</td>
							<td>Halaman pengumuman</td>
							<td>pengumuman</td>
							<td>Sudah</td>
							<td class="text-center"><i class="fa fa-circle text-green"></i></td>
							<td width="10%">
								<a href="{{site_url('ui/pengumuman')}}" class="btn btn-default btn-xs btn-block"><i class="fa fa-link"></i></a>
							</td>
						</tr>
						<!-- END DIVIDER -->
						<!-- DIVIDER -->
						<tr>
							<td>{{str_pad($no++,2,'0',STR_PAD_LEFT)}}</td>
							<td>galeri</td>
							<td>Halaman galeri</td>
							<td>galeri</td>
							<td>Belum</td>
							<td class="text-center"><i class="fa fa-circle text-green"></i></td>
							<td width="10%">
								<a href="{{site_url('ui/galeri')}}" class="btn btn-default btn-xs btn-block"><i class="fa fa-link"></i></a>
							</td>
						</tr>
						<!-- END DIVIDER -->
						<!-- DIVIDER -->
						<tr>
							<td>{{str_pad($no++,2,'0',STR_PAD_LEFT)}}</td>
							<td>Halaman agenda Homepage</td>
							<td>Halaman agenda website</td>
							<td>agenda</td>
							<td>Belum</td>
							<td class="text-center"><i class="fa fa-circle text-green"></i></td>
							<td width="10%">
								<a href="{{site_url('ui/homepage_agenda')}}" class="btn btn-default btn-xs btn-block"><i class="fa fa-link"></i></a>
							</td>
						</tr>
						<!-- END DIVIDER -->
						<!-- DIVIDER -->
						<tr>
							<td>{{str_pad($no++,2,'0',STR_PAD_LEFT)}}</td>
							<td>Halaman regulasi Homepage</td>
							<td>Halaman regulasi website</td>
							<td>regulasi</td>
							<td>Belum</td>
							<td class="text-center"><i class="fa fa-circle text-green"></i></td>
							<td width="10%">
								<a href="{{site_url('ui/homepage_regulasi')}}" class="btn btn-default btn-xs btn-block"><i class="fa fa-link"></i></a>
							</td>
						</tr>
						<!-- END DIVIDER -->
						<!-- DIVIDER -->
						<tr>
							<td>{{str_pad($no++,2,'0',STR_PAD_LEFT)}}</td>
							<td>Halaman berita Homepage</td>
							<td>Halaman berita website</td>
							<td>berita</td>
							<td>Belum</td>
							<td class="text-center"><i class="fa fa-circle text-green"></i></td>
							<td width="10%">
								<a href="{{site_url('ui/homepage_berita')}}" class="btn btn-default btn-xs btn-block"><i class="fa fa-link"></i></a>
							</td>
						</tr>
						<!-- END DIVIDER -->
						<!-- DIVIDER -->
						<tr>
							<td>{{str_pad($no++,2,'0',STR_PAD_LEFT)}}</td>
							<td>Halaman detail berita Homepage</td>
							<td>Halaman detail berita website</td>
							<td>berita</td>
							<td>Belum</td>
							<td class="text-center"><i class="fa fa-circle text-green"></i></td>
							<td width="10%">
								<a href="{{site_url('ui/homepage_berita_detail')}}" class="btn btn-default btn-xs btn-block"><i class="fa fa-link"></i></a>
							</td>
						</tr>
						<!-- END DIVIDER -->
						<!-- DIVIDER -->
						<tr>
							<td>{{str_pad($no++,2,'0',STR_PAD_LEFT)}}</td>
							<td>Halaman detail surat keterangan miskin</td>
							<td>Halaman detail surat keterangan miskin</td>
							<td>surat</td>
							<td>Belum</td>
							<td class="text-center"><i class="fa fa-circle text-green"></i></td>
							<td width="10%">
								<a href="{{site_url('ui/surat_keterangan_miskin_detail')}}" class="btn btn-default btn-xs btn-block"><i class="fa fa-link"></i></a>
							</td>
						</tr>
						<!-- END DIVIDER -->
						<!-- DIVIDER -->
						<tr>
							<td>{{str_pad($no++,2,'0',STR_PAD_LEFT)}}</td>
							<td>Halaman cetak surat keterangan miskin</td>
							<td>Halaman format cetak surat ketrangan miskin (buat backend)</td>
							<td>surat</td>
							<td>Belum</td>
							<td class="text-center"><i class="fa fa-circle text-green"></i></td>
							<td width="10%">
								<a href="{{site_url('ui/surat_keterangan_miskin_cetak')}}" class="btn btn-default btn-xs btn-block"><i class="fa fa-link"></i></a>
							</td>
						</tr>
						<!-- END DIVIDER -->
					</tbody>
				</table>
			</div>
			<div class="panel-footer"></div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-xs-12">
		<div class="panel">
			<div class="panel-heading">
				<h3 class="panel-title">CATATAN FRONT-END</h3>
			</div>
			<div class="panel-body table-responsive">
				<?php $no = 1 ?>
				<table class="table table-stripped">
					<tr>
						<td>{{str_pad($no++,2,'0',STR_PAD_LEFT)}}</td>
						<td>Form Create &amp Edit akan berupa modal apabila data sedikit</td>
						<td></td>
					</tr>
					<tr>
						<td>{{str_pad($no++,2,'0',STR_PAD_LEFT)}}</td>
						<td>Tombol edit sudah berfungsi untuk mengisi data pada form yang berupa modal (bukan form isian beda halaman)</td>
						<td></td>
					</tr>
					<tr>
						<td>{{str_pad($no++,2,'0',STR_PAD_LEFT)}}</td>
						<td>Tombol refresh/reload halaman sudah berfungsi.</td>
						<td></td>
					</tr>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection
@section('style')
<style>
	.table tr > td:first-child,
	.table tr > td:last-child{
		text-align: center;
	}
</style>
@endsection
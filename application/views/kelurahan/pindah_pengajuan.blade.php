@layout('_layout/dashboard/index')
@section('title')Detail Keluarga@endsection
@section('nama-kelurahan')Lumajang@endsection

@section('content')
<div class="text-size-24 text-bold break-bottom-20">Pengajuan Pindah</div>
<div class="row">
	<div class="col-xs-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<ul class="nav nav-pills">
					<li role="presentation" class="tab-nav step1 active">Langkah ke-1</li>
					<li role="presentation" class="tab-nav step2">Langkah ke-2</li>
					<li role="presentation" class="tab-nav step3">Langkah ke-3</li>
					<li role="presentation" class="tab-nav step4">Langkah Terakhir</li>
				</ul>
			</div>
			<div class="panel-body">
				<form action="">
					<div class="tab-content break-20">
						<!-- TAB 1 -->
						<div role="tabpanel" class="tab-pane active" id="step1">
							<div class="text-size-24 break-bottom-30">Langkah 1: Penentuan Nomor Surat</div>
							<div class="row">
								<div class="col-xs-12 col-md-6">
									<div class="form-group break-bottom-30">
										<label class="text-size-14">Nomor surat</label>
										<div class="input-group">
											<span class="input-group-addon">475 / </span>
											<input type="text" class="form-control input-lg" name="no_surat" placeholder="Nomor Surat">
											<span class="input-group-addon">/ 02.2003 /</span>
											<span class="input-group-addon">/ {{date('Y')}}</span>
										</div>
									</div>
									<a href="#" class="btn btn-default">Batal</a>
									<a href="#step2" class="btn btn-primary" data-toggle="tab">Langkah berikutnya</a>
								</div>
							</div>
						</div>
						<!-- TAB 2 -->
						<div role="tabpanel" class="tab-pane" id="step2">
							<div class="text-size-24 break-bottom-30">Langkah 2: Data Warga</div>
							<div class="row">
								<div class="col-xs-12 col-md-6">
									<div class="form-group">
										<label class="text-size-14">Masukkan NIK / nama warga</label>
										<input type="text" class="form-control" name="nik" placeholder="NIK / Nama" required>
									</div>
									<div class="row">
										<div class="col-xs-12 col-md-6">
											<div class="form-group">
												<label for="">Nama</label>
												<input type="text" class="form-control" placeholder="Nama" disabled>
											</div>
										</div>
										<div class="col-xs-12 col-md-6">
											<div class="form-group">
												<label for="">Jenis Kelamin</label>
												<input type="text" class="form-control" placeholder="Jenis Kelamin" disabled>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label for="">Tempat &amp Tanggal Lahir</label>
										<input type="text" class="form-control" placeholder="Tempat, Tanggal Lahir" disabled>
									</div>
									<div class="row">
										<div class="col-xs-12 col-md-6">
											<div class="form-group">
												<label for="">Agama</label>
												<input type="text" class="form-control" placeholder="Agama" disabled>
											</div>
										</div>
										<div class="col-xs-12 col-md-6">
											<div class="form-group">
												<label for="">status</label>
												<input type="text" class="form-control" placeholder="Status" disabled>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label for="">Tanggal KTP</label>
										<input type="text" class="form-control" name="no_ktp" disabled>
									</div>
									<div class="break-bottom-30"></div>
									<a href="#step1" class="btn btn-default back" data-toggle="tab">Kembali</a>
									<a href="#step3" class="btn btn-primary" data-toggle="tab">Langkah berikutnya</a>
								</div>
							</div>
						</div>
						<!-- TAB 3 -->
						<div role="tabpanel" class="tab-pane" id="step3">
							<div class="text-size-24 break-bottom-30">Langkah 3: Data Perpindahan</div>
							<div class="row">
								<div class="col-xs-12">
									<div class="row">
										<div class="col-xs-12 col-md-6">
											<div class="form-group">
												<label class="text-size-14">1. Alamat Lengkap Asal</label>
												<textarea name="alamat_asal" class="form-control" placeholder="Alamat Asal" required></textarea>
											</div>
										</div>
										<div class="col-xs-12 col-md-6">
											<div class="form-group">
												<label class="text-size-14">2. Alamat Tujuan</label>
												<textarea name="alamat_tujuan" class="form-control" placeholder="Alamat Pindah" required></textarea>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-12 col-md-6">
											<div class="form-group">
												<label for="">3. Provinsi Tujuan</label>
												<select name="id_prov_tujuan" class="form-control">
													<option value="" selected>Pilih Provinsi Tujuan</option>
												</select>
											</div>
										</div>
										<div class="col-xs-12 col-md-6">
											<div class="form-group">
												<label for="">4. Kabupaten / Kota Tujuan</label>
												<select name="id_kab_tujuan" class="form-control">
													<option value="" selected>Pilih Kabupaten/Kota Tujuan</option>
												</select>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-12 col-md-6">
											<div class="form-group">
												<label for="">5. Kecamatan Tujuan</label>
												<select name="id_kec_tujuan" class="form-control">
													<option value="" selected>Pilih Kecamatan Tujuan</option>
												</select>
											</div>
										</div>
										<div class="col-xs-12 col-md-6">
											<div class="form-group">
												<label for="">6. Kelurahan/Desa Tujuan</label>
												<select name="id_kel_tujuan" class="form-control">
													<option value="" selected>Pilih Kelurahan/Desa Tujuan</option>
												</select>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="text-size-14">7. Alasan Pindah</label>
										<textarea name="keterangan" class="form-control" placeholder="Alasan Pindah" required></textarea>
									</div>
									<div class="break-bottom-30"></div>
									<a href="#step2" class="btn btn-default back" data-toggle="tab">Kembali</a>
									<a href="#step4" class="btn btn-primary" data-toggle="tab">Langkah berikutnya</a>
								</div>
							</div>
						</div>
						<!-- TAB 4 -->
						<div role="tabpanel" class="tab-pane" id="step4">
							<div class="text-size-24 break-bottom-30">Langkah 4: Data Pengikut</div>
							<div class="row">
								<div class="col-xs-12 col-md-6">
									<span class="text-size-20">Cari Warga</span>
									<div class="input-group input-group-lg break-bottom-20">
										<input type="text" class="form-control input-cari" placeholder="Masukkan NIK/Nama">
										<span class="input-group-btn"><button class="btn btn-primary btn-tambah" type="button">Tambah</button></span>
									</div>
									<div class="container-fluid table-responsive table-full">
										<table class="table table-stripped table-pengikut">
											<thead>
												<th class="text-center" width="10%">No.</th>
												<th colspan="2">Nama</th>
											</thead>
											<tbody></tbody>
										</table>
									</div>
									<div class="break-bottom-30"></div>
									<a href="#step3" class="btn btn-default back" data-toggle="tab">Kembali</a>
									<button href="#step4" class="btn btn-primary" data-toggle="tab" type="submit">Simpan</button>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection

@section('style')
<style>
	.breadcrumb{
		margin: 0;
	}

	.panel > .panel-heading{
		padding: 0;!important
	}

	.nav-pills > li > a{
		border-radius: 0;
		padding: 15px 20px;
		margin: 0;
	}

	.tab-content .btn{
		border-radius: 0;
	}

	.tab-nav{
		text-decoration: none;
		padding: 20px;
		color: #337AB7;
		cursor: pointer;
	}

	.tab-nav.active{
		background-color: #337AB7;
		color: #FFF;
	}

	.panel-body{
		padding: 10px 30px;
	}

	input.blank{
		background-color: transparent;
		border: none;
		font-size: 16px;
		font-weight: 500;
	}
</style>
@endsection

@section('javascript')
<script>
	$("a[href*=step]").click(function(){
		var href = $(this).attr('href');
		$(".tab-nav."+href.substring(1)).addClass('active').nextAll().removeClass('active');
	});

	var data = [];
	$(".btn-tambah").click(function(){
		data.push($(".input-cari").val());
		refresh();
		$("input.input-cari").val("").focus();
	});

	$("tbody").delegate('tr>td>[data-index]','click', function(){
		var ind = data.indexOf($(this).data('index'));
		if (ind > -1) {
			data.splice(ind, 1);
		}
		refresh();
	});

	function refresh(){
		$(".table-pengikut > tbody").empty();
		data.forEach(function(item, index){
			var pecah = item.split('-');
			var html = "<tr class='data"+(index+1)+"'><td>"+(index+1)+"</td>";
			html+= "<td><input type='hidden' class='blank' name='pengikut[]' value='"+pecah[0]+"' readonly>"+pecah[1]+"</td>";
			html+="<td><button class='btn btn-xs btn-default' data-index='"+(item)+"' type='button'><i class='fa fa-close text-red'></i></button></td></tr>";
			$(".table-pengikut > tbody").append(html);
		});
	}
</script>
@endsection
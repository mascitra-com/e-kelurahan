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
					<li role="presentation" class="tab-nav step1 active">1. Penentuan Nomor Surat</li>
					<li role="presentation" class="tab-nav step2">2. Data Warga</li>
					<li role="presentation" class="tab-nav step3">3. Data Perpindahan</li>
					<li role="presentation" class="tab-nav step4">4. Data Pengikut</li>
				</ul>
			</div>
			<div class="panel-body">
				<form action="{{ site_url('pindah/simpan') }}" method="POST">
				{{ $csrf }}
					<div class="tab-content break-20">
						<!-- TAB 1 -->
						<div role="tabpanel" class="tab-pane active" id="step1">
							<div class="text-size-24 break-bottom-30">Langkah 1. Penentuan Nomor Surat</div>
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
							<div class="text-size-24 break-bottom-30">Langkah 2. Data Warga</div>
							<div class="row">
								<div class="col-xs-12 col-md-6">
									<div class="form-group">
										<label class="text-size-14">Masukkan NIK / nama warga</label>
										<input list="nik" oninput="onInput()" class="form-control" name="nik" placeholder="Masukkan NIK / Nama" autocomplete="off">
										<datalist id="nik">
										</datalist>
									</div>
									<div class="row">
										<div class="col-xs-12 col-md-6">
											<div class="form-group">
												<label for="">Nama</label>
												<input type="text" class="form-control" placeholder="Nama" disabled id="d_nama">
											</div>
										</div>
										<div class="col-xs-12 col-md-6">
											<div class="form-group">
												<label for="">Jenis Kelamin</label>
												<input type="text" id="d_jk" class="form-control" placeholder="Jenis Kelamin" disabled>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label for="">Tempat &amp Tanggal Lahir</label>
										<input type="text" class="form-control" placeholder="Tempat, Tanggal Lahir" disabled id="d_ttl">
									</div>
									<div class="row">
										<div class="col-xs-12 col-md-6">
											<div class="form-group">
												<label for="">Agama</label>
												<input type="text" class="form-control" placeholder="Agama" disabled id="d_agama">
											</div>
										</div>
										<div class="col-xs-12 col-md-6">
											<div class="form-group">
												<label for="">status</label>
												<input type="text" class="form-control" placeholder="Status" disabled id="d_status">
											</div>
										</div>
									</div>
									<div class="form-group">
										<label for="">Tanggal KTP</label>
										<input type="text" class="form-control" name="no_ktp" disabled id="d_ktp">
									</div>
									<div class="break-bottom-30"></div>
									<a href="#step1" class="btn btn-default back" data-toggle="tab">Kembali</a>
									<a href="#step3" class="btn btn-primary" data-toggle="tab" onclick="handleDatalist()">Langkah berikutnya</a>
								</div>
							</div>
						</div>
						<!-- TAB 3 -->
						<div role="tabpanel" class="tab-pane" id="step3">
							<div class="text-size-24 break-bottom-30">Langkah 3. Data Perpindahan</div>
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
												<select name="id_prov_tujuan" class="form-control" id="provinces">
													<option value="" selected>Pilih Provinsi Tujuan</option>
													@foreach($provinsi as $item)
													<option value="{{ $item->id }}">{{ $item->nama }}</option>
													@endforeach
												</select>
											</div>
										</div>
										<div class="col-xs-12 col-md-6">
											<div class="form-group">
												<label for="">4. Kabupaten / Kota Tujuan</label>
												<select name="id_kab_tujuan" class="form-control" id="cities">
													<option value="" selected>Pilih Kabupaten / Kota Tujuan</option>
												</select>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-12 col-md-6">
											<div class="form-group">
												<label for="">5. Kecamatan Tujuan</label>
												<select name="id_kec_tujuan" class="form-control" id="districts">
													<option value="" selected>Pilih Kecamatan Tujuan</option>
												</select>
											</div>
										</div>
										<div class="col-xs-12 col-md-6">
											<div class="form-group">
												<label for="">6. Kelurahan/Desa Tujuan</label>
												<select name="id_kel_tujuan" class="form-control" id="villages">
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
							<div class="text-size-24 break-bottom-30">Langkah 4. Data Pengikut</div>
							<div class="row">
								<div class="col-xs-12 col-md-6">
									<span class="text-size-20">Cari Warga</span>
									<div class="input-group input-group-lg break-bottom-20">
										<input list="pengikut" class="form-control input-cari" placeholder="Masukkan NIK / Nama" autocomplete="off">
										<datalist id="pengikut">
										</datalist>
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
									<button class="btn btn-primary" type="submit">Simpan</button>
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
	var nik;
	$(document).ready(function(){
		getNikNama();
	});

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
		alert('delegate');
		var ind = data.indexOf($(this).data('index'));
		if (ind > -1) {
			data.splice(ind, 1);
		}
		refresh();
	});

	function refresh() {
		$(".table-pengikut > tbody").empty();
		data.forEach(function (item, index) {
			var pecah = item.split(' | ');
			var html = "<tr class='data" + (index + 1) + "'><td>" + (index + 1) + "</td>";
			html += "<td><input type='hidden' class='blank' name='pengikut[]' value='" + pecah[0] + "' readonly>" + pecah[1] + "</td>";
			html += "<td><button class='btn btn-xs btn-default' data-index='" + (item) + "' type='button'><i class='fa fa-close text-red'></i></button></td></tr>";
			$(".table-pengikut > tbody").append(html);
		});
	}

	$("#provinces").on('change', function () {
		$("#cities").html("<option>Pilih Kabupaten / Kota Tujuan</option>")
		.prop('disabled', true);
		var id;
		var x = document.getElementById("provinces");
		for (var i = 0; i < x.options.length; i++) {
			if (x.options[i].selected) {
				id = x.options[i].value;
			}
		}
		$.ajax({
			type: 'POST',
			data: { 'idProvince' : id, '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>' },
			dataType: "json",
			url: "getCitiesByProvince",
			success: function (data) {
				$("#cities").html(data)
				.prop('disabled', false);
			}
		});
	});

	$("#cities").on('change', function () {
		$("#districts").html("<option>Pilih Kecamatan Tujuan</option>")
		.prop('disabled', true);
		var id;
		var x = document.getElementById("cities");
		for (var i = 0; i < x.options.length; i++) {
			if (x.options[i].selected) {
				id = x.options[i].value;
			}
		}
		$.ajax({
			type: 'POST',
			data: { 'idCity' : id, '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>' },
			dataType: "json",
			url: "getDistrictByCity",
			success: function (data) {
				$("#districts").html(data)
				.prop('disabled', false);
			}
		});
	});

	$("#districts").on('change', function () {
		$("#villages").html("<option>Pilih Kelurahan/Desa Tujuan</option>")
		.prop('disabled', true);
		var id;
		var x = document.getElementById("districts");
		for (var i = 0; i < x.options.length; i++) {
			if (x.options[i].selected) {
				id = x.options[i].value;
			}
		}
		$.ajax({
			type: 'POST',
			data: { 'idDistrict' : id, '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>' },
			dataType: "json",
			url: "getVillageByDistrict",
			success: function (data) {
				$("#villages").html(data)
				.prop('disabled', false);
			}
		});
	});

	function handleDatalist() {
		nik = $("input[name='nik']").val();
		console.log(nik);
		$.getJSON('{{ site_url() }}'+'penduduk/ambil_nama_nik', function (result) {
			if (result) {
				for (var i = 0; i < result.length; i++) {
					var penduduk= result[i];
					var penduduk_sekarang = penduduk.nik + " | " + penduduk.nama;
					console.log(penduduk_sekarang);
					if (nik !== penduduk_sekarang) {
						$("#pengikut").append("<option value='"+penduduk.nik + " | " + penduduk.nama+"'");
					}
				}
			}
		});
	}

	function onInput() {
		var val = $("input[name='nik']").val();
		var opts = document.getElementById('nik').childNodes;
		for (var i = 0; i < opts.length; i++) {
			if (opts[i].value === val) {
	        // An item was selected from the list!
	        getDataWarga(opts[i].value)
	        break;
	    }
	}
}

function getDataWarga(nik) {
	var nik_s = nik.split('|')[0];
	$.getJSON("{{ site_url('penduduk/ambil_penduduk/') }}"+nik_s, function (result) {
		if (result) {
			for (var i = 0; i < result.length; i++) {
				var penduduk= result[i];
				var jk = penduduk.jenis_kelamin;
				var ttl = penduduk.tempat_lahir + ", "+ penduduk.tanggal_lahir.split(" ")[0];
				var agama = penduduk.agama;
				$("#d_nama").val(penduduk.nama);
				if (jk == '0') {
					$("#d_jk").val('Laki-Laki');
				}else{
					$("#d_jk").val('Perempuan');
				}
				$("#d_ttl").val(ttl);

				switch(agama){
					case '0':
					agama = 'Islam';
					break;
					case '1':
					agama = 'kristen';
					break;
					default:
					agama = 'atheis';
				}
				$("#d_agama").val(agama);
				if (penduduk.status == '0') {
					$("#d_status").val('Belum Menikah');
				}else{
					$("#d_status").val('Menikah');
				}
				$("#d_ktp").val(penduduk.nik);
			}
		}
	});
}

function getNikNama() {
	console.log(nik);
	$.getJSON('{{ site_url() }}'+'penduduk/ambil_nama_nik', function (result) {
		if (result) {
			for (var i = 0; i < result.length; i++) {
				var penduduk= result[i];
				var penduduk_sekarang = penduduk.nik + " | " + penduduk.nama;
				$("#nik").append("<option value='"+penduduk.nik + " | " + penduduk.nama+"'");
			}
		}
	});
}
</script>
@endsection
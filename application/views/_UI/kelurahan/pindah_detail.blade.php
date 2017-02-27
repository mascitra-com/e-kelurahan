@layout('_layout/dashboard/index')
@section('title')Detail Pengajuan Pindah@endsection
@section('nama-kelurahan')Lumajang@endsection

@section('content')
<div class="row">
	<div class="col-xs-12">
		<div class="panel panel-theme">
			<div class="panel-heading">
				<h3 class="panel-title">Detail Pengajuan</h3>
			</div>
			<div class="panel-body">
				<form action="#">
					<div class="row">
						<div class="col-xs-12 col-md-6">
							<div class="form-group">
								<label for="">Nomor Surat</label>
								<div class="input-group">
									<span class="input-group-addon">475 / </span>
									<input type="text" class="form-control" name="nomor_surat" placeholder="nomor surat">
									<span class="input-group-addon">/ 02.2003 /</span>
									<span class="input-group-addon">/ {{date('Y')}}</span>
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-md-6">
							<div class="form-group">
								<label for="">Nama Pengaju</label>
								<input type="text" class="form-control" name="nik" placeholder="NIK - Nama">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12 col-md-6">
							<label for="">Alamat Asal</label>
							<textarea name="alamat_asal" class="form-control" placeholder="alamat asal"></textarea>
						</div>
						<div class="col-xs-12 col-md-6">
							<label for="">Alamat Pindah</label>
							<textarea name="alamat_pindah" class="form-control" placeholder="alamat pindah"></textarea>
						</div>
					</div>
					<div class="break-10"></div>
					<div class="row">
						<div class="col-xs-12 col-md-3">
							<div class="form-group">
								<label for="">Provinsi (alamat pindah)</label>
								<select name="provinsi" class="form-control">
									<option value="" selected>Pilih Provinsi</option>
								</select>
							</div>
						</div>
						<div class="col-xs-12 col-md-3">
							<div class="form-group">
								<label for="">Kabupaten/Kota (alamat pindah)</label>
								<select name="kabupaten" class="form-control">
									<option value="" selected>Pilih Kabupaten/Kota</option>
								</select>
							</div>
						</div>
						<div class="col-xs-12 col-md-3">
							<div class="form-group">
								<label for="">Kecamatan (alamat pindah)</label>
								<select name="kecamatan" class="form-control">
									<option value="" selected>Pilih Kecamatan</option>
								</select>
							</div>
						</div>
						<div class="col-xs-12 col-md-3">
							<div class="form-group">
								<label for="">Kelurahan/Desa (alamat pindah)</label>
								<select name="kelurahan" class="form-control">
									<option value="" selected>Pilih Kelurahan/Desa</option>
								</select>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="text-size-14">7. Alasan Pindah</label>
						<textarea name="alasan" class="form-control" placeholder="alasan pindah" required></textarea>
					</div>
					<div class="row">
						<div class="col-xs-12 col-md-6">
							<label>Cari Warga</label>
							<div class="input-group break-bottom-20">
								<input type="text" class="form-control input-cari" placeholder="masukkan NIK/Nama">
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
							<button class="btn btn-primary" type="submit">Simpan</button>
							<button class="btn btn-default" type="reset">Kembalikan</button>
						</div>
					</div>
				</form>
			</div>
			<div class="panel-footer">
				<span class="text-grey">last edited by admin 12/02/2017 08:50</span>
			</div>
		</div>
	</div>
</div>
@endsection
@section('javascript')
<script>
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
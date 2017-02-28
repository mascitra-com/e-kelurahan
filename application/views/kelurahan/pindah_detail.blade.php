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
				<form action="{{ site_url('pindah/ubah/'.$mutasi->id) }}" method="POST">
				{{ $csrf }}
					<div class="row">
						<div class="col-xs-12 col-md-6">
							<div class="form-group">
								<label for="">Nomor Surat</label>
								<div class="input-group">
									<span class="input-group-addon">475 / </span>
									<input type="text" class="form-control" placeholder="Nomor Surat" value="{{ $mutasi->no_surat }}" disabled>
									<span class="input-group-addon">/ 02.2003 /</span>
									<span class="input-group-addon">/ {{date('Y')}}</span>
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-md-6">
							<div class="form-group">
								<label for="">Nama Pengaju</label>
								<input type="text" class="form-control" name="nik" placeholder="NIK - Nama Lengkap" value="{{ $mutasi->nik . ' | ' . $mutasi->penduduk->nama }}" disabled>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12 col-md-6">
							<label for="">Alamat Asal</label>
							<textarea name="alamat_asal" class="form-control" placeholder="Alamat Asal">{{ $mutasi->alamat_asal }}</textarea>
						</div>
						<div class="col-xs-12 col-md-6">
							<label for="">Alamat Pindah</label>
							<textarea name="alamat_tujuan" class="form-control" placeholder="Alamat Pindah">{{ $mutasi->alamat_tujuan }}</textarea>
						</div>
					</div>
					<div class="break-10"></div>
					<div class="row">
						<div class="col-xs-12 col-md-3">
							<div class="form-group">
								<label for="">Provinsi (Alamat Pindah)</label>
								<select name="id_prov_tujuan" class="form-control" id="provinces">
									<option value="" selected>Pilih Provinsi Tujuan</option>
									@foreach($provinsi as $item)
                                        <option value="{{ $item->id }}" {{ $item->id !== $mutasi->id_prov_tujuan ?: 'selected' }}>{{ $item->nama }}</option>
                                    @endforeach
								</select>
							</div>
						</div>
						<div class="col-xs-12 col-md-3">
							<div class="form-group">
								<label for="">Kabupaten/Kota (Alamat Pindah)</label>
								<select name="id_kab_tujuan" class="form-control" id="cities">
									<option value="" selected>Pilih Kabupaten/Kota Tujuan</option>
									@foreach($kabupaten as $item)
										<option value="{{ $item->id }}" {{ $item->id !== $mutasi->id_kab_tujuan ?: 'selected' }}>{{ $item->nama }}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="col-xs-12 col-md-3">
							<div class="form-group">
								<label for="">Kecamatan (Alamat Pindah)</label>
								<select name="id_kec_tujuan" class="form-control" id="districts">
									<option value="" selected>Pilih Kecamatan Tujuan</option>
                                    @foreach($kecamatan as $item)
                                        <option value="{{ $item->id }}" {{ $item->id !== $mutasi->id_kec_tujuan ?: 'selected' }}>{{ $item->nama }}</option>
                                    @endforeach
								</select>
							</div>
						</div>
						<div class="col-xs-12 col-md-3">
							<div class="form-group">
								<label for="">Kelurahan/Desa (Alamat Pindah)</label>
								<select name="id_kel_tujuan" class="form-control" id="villages">
									<option value="" selected>Pilih Kelurahan/Desa Tujuan</option>
                                    @foreach($kelurahan as $item)
                                        <option value="{{ $item->id }}" {{ $item->id !== $mutasi->id_kel_tujuan ?: 'selected' }}>{{ $item->nama }}</option>
                                    @endforeach
								</select>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="text-size-14">7. Alasan Pindah</label>
						<textarea name="keterangan" class="form-control" placeholder="alasan pindah" required>{{ $mutasi->keterangan }}</textarea>
					</div>
					<div class="row">
						<div class="col-xs-12 col-md-6">
							<label>Cari Warga</label>
							<div class="input-group break-bottom-20">
                                <input list="pengikut" class="form-control input-cari" placeholder="Masukkan NIK / Nama" autocomplete="off">
                                <datalist id="pengikut">
                                    @foreach($penduduk as $item)
                                        <option value="{{ $item->nik.' | '.$item->nama }}">
                                    @endforeach
                                </datalist>
								<span class="input-group-btn"><button class="btn btn-primary btn-tambah" type="button">Tambah</button></span>
							</div>
							<div class="container-fluid table-responsive table-full">
								<table class="table table-stripped table-pengikut">
									<thead>
										<th class="text-center" width="10%">No.</th>
										<th colspan="2">Nama</th>
									</thead>
									<tbody>
                                    <?php $no = 1; ?>
                                    @if($pengikut)
                                        @foreach($pengikut as $item)
                                            <tr class="data{{ $no; }}">
                                                <td>{{ $no++ }}</td>
                                                <td><input type="hidden" class="blank" name="pengikut[]" value="{{ $item->nik }}" readonly>{{ $item->penduduk->nama }}</td>
                                                <td><button class="btn btn-xs btn-default" data-index="{{ $item->nik. ' | '.$item->penduduk->nama }}" type="button"><i class="fa fa-close text-red"></i></button></td>
                                            </tr>
                                        @endforeach
                                    @endif
                                    </tbody>
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
			var pecah = item.split(' | ');
			var html = "<tr class='data"+(index+1)+"'><td>"+(index+1)+"</td>";
			html+= "<td><input type='hidden' class='blank' name='pengikut[]' value='"+pecah[0]+"' readonly>"+pecah[1]+"</td>";
			html+="<td><button class='btn btn-xs btn-default' data-index='"+(item)+"' type='button'><i class='fa fa-close text-red'></i></button></td></tr>";
			$(".table-pengikut > tbody").append(html);
		});
	}
    var link = '{{ site_url('pindah/') }}';
    $("#provinces").on('change', function () {
        $("#cities").html("<option>Pilih Kabupaten / Kota Tujuan</option>")
            .prop('disabled', true);
        $("#districts").html("<option>Pilih Kecamatan Tujuan</option>")
            .prop('disabled', true);
        $("#villages").html("<option>Pilih Kelurahan/Desa Tujuan</option>")
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
            data: { 'idProvince' : id },
            dataType: "json",
            url: link +"getCitiesByProvince",
            success: function (data) {
                $("#cities").html(data)
                    .prop('disabled', false);
            }
        });
    });

    $("#cities").on('change', function () {
        $("#districts").html("<option>Pilih Kecamatan Tujuan</option>")
            .prop('disabled', true);
        $("#villages").html("<option>Pilih Kelurahan/Desa Tujuan</option>")
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
            data: { 'idCity' : id },
            dataType: "json",
            url: link + "getDistrictByCity",
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
            data: { 'idDistrict' : id },
            dataType: "json",
            url: link + "getVillageByDistrict",
            success: function (data) {
                $("#villages").html(data)
                    .prop('disabled', false);
            }
        });
    });
</script>
@endsection
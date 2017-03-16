@layout('_layout/dashboard/index')
@section('title')Detail Keluarga@endsection
@section('nama-kelurahan')Lumajang@endsection

@section('content')
<div class="row">
	<div class="col-xs-12">
		<div class="panel panel-theme">
			<div class="panel-heading">
				<h3 class="panel-title">Data Keluarga</h3>
			</div>
			<div class="panel-body">
				<form action="{{ site_url('keluarga/sunting/'.$keluarga->no) }}" method="POST">
				{{ $csrf }}
					<div class="row">
						<div class="col-xs-12 col-md-3">
							<div class="form-group">
								<label for="no">Nomor KK</label>
								<input type="text" class="form-control" name="no" placeholder="masukkan nomor KK" value="{{ $keluarga->no }}">
							</div>
						</div>
						<div class="col-xs-12 col-md-3">
							<div class="form-group">
								<label for="nik">Kepala Keluarga</label>
								<input list="kepala_keluarga" class="form-control" name="nik" placeholder="masukkan nama atau NIK" value="{{ $keluarga->penduduk->nik.' | '.$keluarga->penduduk->nama }}" autocomplete="off">
								<datalist id="kepala_keluarga">
									<option value="{{ $keluarga->penduduk->nik.' | '.$keluarga->penduduk->nama }}">
								</datalist>
							</div>
						</div>
						<div class="col-xs-12 col-md-3">
							<div class="form-group">
								<label for="rt/rw">RT / RW</label>
								<div class="input-group">
									<input type="text" class="form-control" name="rt" placeholder="RT" value="{{ $keluarga->rt }}">
									<span class="input-group-addon">/</span>
									<input type="text" class="form-control" name="rw" placeholder="RW" value="{{ $keluarga->rw }}">
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-md-3">
							<div class="form-group">
								<label for="kode_pos">Kode Pos</label>
								<input type="text" class="form-control" name="kodepos" placeholder="masukkan kodepos" value="{{ $keluarga->kode_pos }}">
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="alamat">Alamat</label>
						<textarea name="alamat" class="form-control" placeholder="masukkan alamat keluarga">{{ $keluarga->alamat }}</textarea>
					</div>
					<div class="form-group break-top-20">
						<button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> Simpan</button>
						<button class="btn btn-default" type="reset"><i class="fa fa-refresh"></i> Kembalikan</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-xs-12">
		<div class="panel panel-theme">
			<div class="panel-heading">
				<h3 class="panel-title pull-left">Data Anggota Keluarga</h3>
				<div class="btn-group pull-right">
					<button class="btn btn-default btn-xs" data-toggle="modal" data-target="#modal-tambah"><i class="fa fa-plus"></i></button>
					<button class="btn btn-default btn-xs reload"><i class="fa fa-refresh"></i></button>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="panel-body table-responsive table-full">
				<table class="table table-stripped table-hover table-bordered">
					<thead>
						<tr>
							<td>No Urut</td>
							<td>Nama Lengkap</td>
							<td>Status Hubungan Dalam Keluarga</td>
							<td>Pendidikan</td>
							<td>No. Pasport</td>
							<td>No. KITAP</td>
							<td>Ayah</td>
							<td>Ibu</td>
							<td>Aksi</td>
						</tr>
					</thead>
					<tbody>
                    @if($detail)
                        @foreach($detail as $item)
                            <tr>
                                <td>{{ $item->no_urut_kk }}</td>
                                <td><a href="{{ site_url('penduduk/detail/'.$item->nik) }}">{{ $item->penduduk->nama }}</a></td>
                                <td>{{ $item->status->nama_statuskeluarga }}</td>
                                <td>{{ !empty($item->pendidikan) ? $item->pendidikan->pendidikan : '-' }}</td>
                                <td>{{ $item->no_paspor }}</td>
                                <td>{{ $item->no_kitap }}</td>
                                <td>{{ $item->ayah }}</td>
                                <td>{{ $item->ibu }}</td>
                                <td>
                                    <!-- data dari foreach contoh-->
                                    <?php $a = array('id' => $item->id, 'nik'=> $item->nik, 'nama'=>$item->penduduk->nama, 'ayah' => $item->ayah, 'ibu' => $item->ibu, 'no_paspor' => $item->no_paspor, 'no_kitap' => $item->no_kitap, 'no_urut_kk' => $item->no_urut_kk); ?>
                                    <button class="btn btn-default btn-xs btn-edit" data-detail='{{json_encode($a)}}'>
                                        <i class="fa fa-pencil"></i>
                                    </button>
									@if($item->no_urut_kk <> 1)
                                        <a href="{{ site_url('keluarga/hapus_anggota/'.$item->id) }}" class="btn btn-default btn-xs" onclick="return confirm('anda yakin?')">
                                            <i class="fa fa-close text-red"></i>
                                        </a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    @endif
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection

@section('modal')
<div class="modal fade" tabindex="-1" role="dialog" id="modal-tambah">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Tambah Anggota Keluarga</h4>
			</div>
			<div class="modal-body">
				<form action="{{ site_url('keluarga/simpan_anggota') }}" method="POST">
                    {{ $csrf }}
                    <input type="hidden" name="no_kk" value="{{ $keluarga->no }}">
					<div class="form-group">
						<label for="">NIK</label>
						<input list="nik" class="form-control" name="nik" placeholder="Masukkan NIK / Nama" autocomplete="off">
						<datalist id="nik">
                            @foreach($penduduk as $item)
                                <option value='{{ $item->nik }} | {{ $item->nama }}'>
                            @endforeach
						</datalist>
					</div>
					<div class="row">
						<div class="col-xs-12 col-md-6">
							<div class="form-group">
								<label for="">Status Hubungan Dalam Keluarga</label>
								<select class="form-control" name="status_keluarga">
                                    <option value="">Pilih Status Keluarga</option>
                                @foreach($status as $item)
                                        <option value="{{ $item->id_statuskeluarga }}">{{ $item->nama_statuskeluarga }}</option>
                                    @endforeach
                                </select>
							</div>
						</div>
						<div class="col-xs-12 col-md-6">
							<div class="form-group">
								<label for="">Pendidikan</label>
								<select name="id_pendidikan" class="form-control">
                                    <option value="">Pilih Pendidikan</option>
                                    @foreach($pendidikan as $item)
                                        <option value="{{ $item->id_jenispendidikan }}">{{ $item->pendidikan }}</option>
                                    @endforeach
                                </select>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12 col-md-6">
							<div class="form-group">
								<label for="">No. Pasport</label>
								<input type="text" class="form-control" name="no_paspor" placeholder="Nomor Passport">
							</div>
						</div>
						<div class="col-xs-12 col-md-6">
							<div class="form-group">
								<label for="">No. KITAP</label>
								<input type="text" class="form-control" name="no_kitap" placeholder="Nomor KITAP">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12 col-md-6">
							<div class="form-group">
								<label for="">Ayah</label>
								<input type="text" class="form-control" name="ayah" placeholder="Nama Ayah">
							</div>
						</div>
						<div class="col-xs-12 col-md-6">
							<div class="form-group">
								<label for="">Ibu</label>
								<input type="text" class="form-control" name="ibu" placeholder="Nama Ibu">
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="">No Urut KK</label>
						<input type="text" class="form-control" name="no_urut_kk" placeholder="No Urut">
					</div>
					<div class="form-group">
						<button class="btn btn-primary" type="submit">Simpan</button>
						<button class="btn btn-default" type="reset">Bersihkan</button>
					</div>
				</form>
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

@section('javascript')
<script>
    $(document).ready(function(){
		getKepNik();
	});

	function getKepNik() {
		$.getJSON('{{ site_url() }}'+'keluarga/ambil_kep_nik', function (result) {
			if (result) {
				for (var i = 0; i < result.length; i++) {
					var penduduk= result[i];
					$("#kepala_keluarga").append("<option value='"+penduduk.nik + " | " + penduduk.nama+"'");
				}
			}
		});
	}

	$("button[data-detail]").click(function(){
		var data = $(this).data('detail');
		$("input[name='nik']").val(data.nik);
		$("input[name='ayah']").val(data.ayah);
		$("input[name='ibu']").val(data.ibu);
		$("input[name='no_paspor']").val(data.no_paspor);
		$("input[name='no_kitap']").val(data.no_kitap);
		$("input[name='no_urut_kk']").val(data.no_urut_kk);
		// alamat btn-edit
		$("#modal-tambah form").attr('action', '{{ site_url('keluarga/ubah_anggota/') }}' + data.id);
		$("#modal-tambah").modal('show');
	});

	$('#modal-tambah').on('hidden.bs.modal', function (e) {
		// alamat semula
		$("#modal-tambah form").attr("action", "{{site_url('tambah')}}").trigger("reset");
	});
</script>
@endsection
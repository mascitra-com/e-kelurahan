@layout('_layout/dashboard/index')
@section('title')Keterangan Ijin Usaha@endsection
@section('nama-kelurahan')Lumajang@endsection

@section('content')
    <div class="panel panel-theme">
        <div class="panel-heading">
            <h3 class="panel-title pull-left">Keterangan Ijin Usaha</h3>
            <div class="btn-group pull-right">
                <button class="btn btn-default btn-sm" data-toggle="modal" data-target="#modal-konfirmasi">
                    @if($unconfirmeds !== 0)
                        <span class="badge badge-sm space-right-10">
					@if($unconfirmeds < 10)
                                {{ '0'.$unconfirmeds }}
                            @else
                                {{ $unconfirmeds }}
                            @endif
				</span>
                    @endif
                    <i class="fa fa-bell"></i>
                </button>
                <button class="btn btn-default btn-sm" data-toggle="modal" data-target="#modal-tambah"><i
                            class="fa fa-plus"></i></button>
                <button class="btn btn-default btn-sm reload"><i class="fa fa-refresh"></i></button>
                <button class="btn btn-default btn-sm" data-toggle="modal" data-target="#modal-cari"><i
                            class="fa fa-search"></i></button>
                <a href="#" class="btn btn-default btn-sm"><i class="fa fa-archive"></i></a>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="panel-body table-responsive table-full table-scroll">
            @if(!empty($ijin))
                <table class="table table-stripped table-hover table-bordered">
                    <thead>
                    <tr>
                        <th class="text-center">NO.</th>
                        <th>NO. SURAT</th>
                        <th>PENGAJU</th>
                        <th>JENIS USAHA</th>
                        <th>ALAMAT USAHA</th>
                        <th class="text-center">TGL PENGAJUAN</th>
                        <th class="text-center">TGL VERIFIKASI</th>
                        <th class="text-center">TGL AMBIL</th>
                        <th class="text-center">PENGAMBIL</th>
                        <th class="text-center">STATUS</th>
                        <th class="text-center">AKSI</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $no = 0; ?>
                    @foreach($ijin as $item)
                        @if($item->status == '1')
                            <tr>
                                <td class="text-center">{{ ++$no }}</td>
                                <td>{{ $item->no_surat }}</td>
                                <td><a href="{{ site_url('penduduk/detail/'. $item->nik) }}">{{ $item->penduduk->nama }}</a></td>
                                <td>{{ $item->jenis_usaha }}</td>
                                <td>{{ $item->alamat }}</td>
                                <td class="text-center">{{date('d/m/Y', strtotime($item->created_at))}}</td>
                                <td class="text-center">{{date('d/m/Y', strtotime($item->tanggal_verif))}}</td>
                                <td class="text-center">{{ empty($item->tanggal_ambil) ? '-' : $item->tanggal_ambil}}</td>
                                <td class="text-center">{{ empty($item->nama_pengambil) ? '-' : $item->nama_pengambil}}</td>
                                <td class="text-center"><span class="label label-{{ (!is_null($item->nama_pengambil)) ? 'success' : (( date('d-m-Y') > date('d-m-Y', strtotime($item->tanggal_verif. ' + 7 days')) ) ? 'danger' : 'warning') }}">
						{{ (!is_null($item->nama_pengambil)) ? 'diambil' : (( date('d-m-Y') > date('d-m-Y', strtotime($item->tanggal_verif. ' + 7 days')) ) ? 'kadaluarsa' : 'menunggu' ) }}
					</span></td>
                                <td class="text-center text-nowrap">
                                    @if(is_null($item->nama_pengambil) && !( date('d-m-Y') > date('d-m-Y', strtotime($item->tanggal_verif. ' + 7 days')) ))
                                        <button class="btn btn-block btn-success btn-xs btn-ambil" title="telah diambil" data-toggle="modal" data-target="#modal-ambil" data-id_surat={{ $item->id }}><i class="fa fa-check"></i></button>
                                    @elseif(is_null($item->nama_pengambil) && ( date('d-m-Y') > date('d-m-Y', strtotime($item->tanggal_verif. ' + 7 days')) ))
                                        <a href="{{ site_url('surat_ijin_usaha/arsipkan/'.$item->id) }}" class="btn btn-block btn-default btn-xs" onclick="return confirm('Anda yakin?')" title="arsipkan"><i class="fa fa-archive"></i></a>
                                    @else
                                        <a href="{{site_url('surat_ijin_usaha/detail/'.$item->id)}}" class="btn btn-default btn-xs" title="selengkapnya"><i class="fa fa-info"></i></a>
                                        <a href="{{site_url('surat_ijin_usaha/cetak/'.$item->id)}}" target="_blank" class="btn btn-default btn-xs" title="cetak"><i class="fa fa-print"></i></a>
                                        <a href="{{ site_url('surat_ijin_usaha/arsipkan/'.$item->id) }}" class="btn btn-default btn-xs" onclick="return confirm('Anda yakin?')" title="arsipkan"><i class="fa fa-archive"></i></a>
                                    @endif
                                </td>
                            </tr>
                        @endif
                    @endforeach
                    </tbody>
                </table>
            @else
                <br>
                <p class="text-center">Tidak ada data surat</p>
            @endif
        </div>
        <div class="panel-footer"><span class="text-grey">last edited by admin 12/02/2017 08:50</span></div>
    </div>
@endsection

@section('modal')
    <div class="modal fade" tabindex="-1" role="dialog" id="modal-tambah">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Tambah Data</h4>
                </div>
                <div class="modal-body">
                    <form action="{{ site_url('surat_ijin_usaha/simpan') }}" method="POST">
                        {{ $csrf }}
                        <div class="form-group">
                            <label for="">No Surat</label>
                            <input type="text" class="form-control" name="no_surat" placeholder="No Surat"/>
                        </div>
                        <div class="form-group">
                            <label for="">NIK / NAMA</label>
                            <input list="nik" class="form-control" placeholder="NIK/NAMA" autocomplete="off" name="nik"
                                   required>
                            <datalist id="nik">
                            </datalist>
                        </div>
                        <div class="form-group">
                            <label for="">Jenis Usaha</label>
                            <input type="text" class="form-control" name="jenis_usaha" placeholder="jenis usaha"
                                   required/>
                        </div>
                        <div class="form-group">
                            <label for="">Alamat Usaha</label>
                            <textarea class="form-control" name="alamat" placeholder="alamat usaha" required></textarea>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary"><i class="fa fa-save"></i> tambah</button>
                            <button class="btn btn-default" type="refresh"><i class="fa fa-refresh"></i> bersihkan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" tabindex="-1" role="dialog" id="modal-cari">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Filter Pencarian</h4>
                </div>
                <div class="modal-body">
                    <form action="#">
                        <div class="row">
                            <div class="col-xs-12- col-md-6">
                                <div class="form-group">
                                    <label for="">Nomor Surat</label>
                                    <input type="text" class="form-control" name="no_surat" placeholder="nomor surat"/>
                                </div>
                            </div>
                            <div class="col-xs-12- col-md-6">
                                <div class="form-group">
                                    <label for="">Nama Pengaju</label>
                                    <input type="text" class="form-control" name="nik" placeholder="NIK/Nama"/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12- col-md-6">
                                <div class="form-group">
                                    <label for="">Tanggal Pengajuan</label>
                                    <input type="date" class="form-control" name="tgl_pengajuan"
                                           placeholder="tanggal pengajuan"/>
                                </div>
                            </div>
                            <div class="col-xs-12- col-md-6">
                                <div class="form-group">
                                    <label for="">Tanggal Verifikasi</label>
                                    <input type="date" class="form-control" name="tgl_verifikasi"
                                           placeholder="tanggal verifikasi"/>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Urutkan</label>
                            <select name="order" class="form-control">
                                <option value="0">Nomor Surat ASC</option>
                                <option value="1">Nomor Surat DESC</option>
                                <option value="2">Pengaju ASC</option>
                                <option value="3">Pengaju DESC</option>
                                <option value="4">Tanggal Pengajuan ASC</option>
                                <option value="5">Tanggal Pengajuan DESC</option>
                                <option value="6">Tanggal Verifikasi ASC</option>
                                <option value="7">Tanggal Verifikasi DESC</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary"><i class="fa fa-search"></i> filter</button>
                            <button class="btn btn-default" type="refresh"><i class="fa fa-refresh"></i> bersihkan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" tabindex="-1" role="dialog" id="modal-konfirmasi">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Konfirmasi Pengajuan</h4>
                </div>
                <div class="modal-body table-responsive table-full">
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                        <tr>
                            <td class="text-center">No. Pengajuan</td>
                            <td class="text-center">NIK Pengaju</td>
                            <td>Nama Pengaju</td>
                            <td class="text-center">Tanggal Pengajuan</td>
                            <td class="text-center">Konfirmasi</td>
                        </tr>
                        </thead>
                        <tbody>
                        @for($i=0; $i < 4; $i++)
                            <tr>
                                <td class="text-center">00{{$i+1}}</td>
                                <td class="text-center">122410101086</td>
                                <td>Ainul Yaqin</td>
                                <td class="text-center">{{date('d-m-Y')}}</td>
                                <td class="text-center">
                                    <button class="btn btn-sm btn-success" data-konfirmasi="1" data-id="xxx"><i
                                                class="fa fa-check space-right-5"></i>setuju
                                    </button>
                                    <button class="btn btn-sm btn-danger" data-konfirmasi="2" data-id="xxx"><i
                                                class="fa fa-times space-right-5"></i>tolak
                                    </button>
                                </td>
                            </tr>
                        @endfor
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer"></div>
            </div>
        </div>
    </div>
    <div class="modal fade" tabindex="-1" role="dialog" id="modal-ambil">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Pengambilan Surat</h4>
                </div>
                <div class="modal-body">
                    <form action="#" method="POST">
                        <div class="form-group">
                            <label for="">Nama Pengambil</label>
                            <input type="text" class="form-control" name="nama" placeholder="nama pengambil" required/>
                        </div>
                        <div class="form-group">
                            <label for="">Keterangan</label>
                            <textarea class="form-control" name="keterangan" placeholder="keterangan"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Nomor Surat</label>
                            <input type="text" class="form-control" name="no_surat" placeholder="nomor surat"/>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary">simpan</button>
                            <button class="btn btn-default" data-dismiss="modal">batal</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" tabindex="-1" role="dialog" id="modal-konfirmasi-dialog">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Alasan <span class="status"></span></h4>
                </div>
                <div class="modal-body">
                    <form action="#" method="POST" id="form-konfirmasi">
                        <div class="form-group">
                            <label for="">Keterangan</label>
                            <input type="hidden" name="id" value="">
                            <input type="hidden" name="status" value="">
                            <textarea class="form-control" name="keterangan" placeholder="keterangan"></textarea>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary">simpan</button>
                            <button class="btn btn-default" data-dismiss="modal">batal</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('style')
    <style>
        .label {
            display: block;
            width: 100%;
            padding: 5px 0;
        }

        /*BARU DARISINI*/
        td, th {
            vertical-align: middle !important;
            font-size: 10pt;
        }
    </style>
@endsection

@section('javascript')
    <script>
        $(document).ready(function () {
            getKepNik();

            $("[data-konfirmasi]").click(function () {
                var status = ($(this).data('konfirmasi') == 1) ? 'Persetujuan' : 'Penolakan';
                $("#modal-konfirmasi-dialog .modal-title > .status").empty().html(status);
                $("#form-konfirmasi input[name='id']").val($(this).data('id'));
                $("#form-konfirmasi input[name='status']").val($(this).data('konfirmasi'));
                $("#modal-konfirmasi-dialog").modal('show');
            });
        });

        function getKepNik() {
            $.getJSON('{{ site_url() }}' + 'penduduk/ambil_nama_nik', function (result) {
                $("#nik").empty();
                if (result) {
                    for (var i = 0; i < result.length; i++) {
                        var penduduk = result[i];
                        $("#nik").append("<option value='" + penduduk.nik + " | " + penduduk.nama + "'");
                    }
                }
            });
        }
    </script>
@endsection
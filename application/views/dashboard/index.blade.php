@layout('_layout/dashboard/index')
@section('title')Dashboard@endsection
@section('nama-kelurahan')Lumajang@endsection

@section('content')
    <!-- WIDGET -->
    <div class="row">
        <div class="col-xs-6 col-md-3">
            <div class="panel panel-default panel-widget">
                <div class="panel-body">
                    <h4>Menunggu</h4>
                    <div class="break-5">100 Pengajuan</div>
                </div>
            </div>
        </div>
        <div class="col-xs-6 col-md-3">
            <div class="panel panel-default panel-widget">
                <div class="panel-body">
                    <h4>Disetujui</h4>
                    <div class="break-5">100 Pengajuan</div>
                </div>
            </div>
        </div>
        <div class="col-xs-6 col-md-3">
            <div class="panel panel-default panel-widget">
                <div class="panel-body">
                    <h4>Diambil</h4>
                    <div class="break-5">100 Pengajuan</div>
                </div>
            </div>
        </div>
        <div class="col-xs-6 col-md-3">
            <div class="panel panel-default panel-widget">
                <div class="panel-body">
                    <h4>Ditolak</h4>
                    <div class="break-5">100 Pengajuan</div>
                </div>
            </div>
        </div>
    </div>
    <!-- END WIDGET -->
    <!-- CHART -->
    <div class="row">
        <div class="col-xs-12">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">Insight</h3>
                </div>
                <div class="panel-body">
                    <img src="https://camo.githubusercontent.com/0072a77c22f005b035e3ae0bcbc55a11f5594b0a/687474703a2f2f7777772e726561637464332e6f72672f696d672f62617369632f636f7665722e706e67"
                         width="100%" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- END CHART -->
    <!-- NOTIFIKASI -->
    <div class="row">
        <div class="col-xs-12">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">Notifikasi Pengajuan Surat</h3>
                </div>
                <div class="panel-body">
                    <ul class="nav nav-tabs nav-justified">
                        <li role="presentation" class="active"><a href="#surat-0" data-toggle="tab">Surat Umum</a></li>
                        <li role="presentation"><a href="#surat-1" data-toggle="tab">Surat 1</a></li>
                        <li role="presentation"><a href="#surat-2" data-toggle="tab">Surat 2</a></li>
                        <li role="presentation"><a href="#surat-3" data-toggle="tab">Surat 3</a></li>
                        <li role="presentation"><a href="#surat-4" data-toggle="tab">Surat 4</a></li>
                    </ul>
                    <div class="tab-content">
                        <!-- SURAT UMUM -->
                        <div role="tabpanel" class="tab-pane fade in active table-responsive table-full" id="surat-0">
                            @if($surats)
                                <table class="table table-hover table-stripped table-bordered">
                                    <thead>
                                    <tr>
                                        <th>No. Pengajuan</th>
                                        <th>NIK</th>
                                        <th>Nama</th>
                                        <th>Tanggal Pengajuan</th>
                                        <th>AKSI</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($surats as $surat)
                                        <tr>
                                            <td>{{ $surat->id }}</td>
                                            <td>{{ $surat->nik }}</td>
                                            <td>{{ $surat->penduduk->nama }}</td>
                                            <td>{{ mdate('%l, %d %F %Y', strtotime(str_replace('-', '/', $surat->created_at))) }}</td>
                                            <td class="text-center">
                                                <button class="btn btn-sm btn-success" data-konfirmasi="1" data-id="{{ $surat->id }}" data-jenis="{{ $surat->jenis }}"><i class="fa fa-check space-right-5"></i>setuju</button>
                                                <button class="btn btn-sm btn-danger" data-konfirmasi="2" data-id="{{ $surat->id }}" data-jenis="{{ $surat->jenis }}"><i class="fa fa-times space-right-5"></i>tolak</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            @else
                                <p>Tidak ada data surat</p>
                            @endif
                        </div>
                        <!-- END SURAT UMUM -->
                        <div role="tabpanel" class="tab-pane fade" id="surat-1">Surat coming soon</div>
                        <div role="tabpanel" class="tab-pane fade" id="surat-2">Surat coming soon</div>
                        <div role="tabpanel" class="tab-pane fade" id="surat-3">Surat coming soon</div>
                        <div role="tabpanel" class="tab-pane fade" id="surat-4">Surat coming soon</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('modal')
    <div class="modal fade" tabindex="-1" role="dialog" id="modal-konfirmasi-dialog">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Alasan <span class="status"></span></h4>
                </div>
                <div class="modal-body">
                    <form action="{{ site_url('surat/konfirmasi') }}" method="POST" id="form-konfirmasi">
                        {{$csrf}}
                        <div class="form-group">
                            <label for="">Keterangan</label>
                            <input type="hidden" name="id" value="">
                            <input type="hidden" name="status" value="">
                            <input type="hidden" name="jenis" value="">
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

@section('javascript')
    <script type="text/javascript">
        $(document).ready(function(){
            $("[data-konfirmasi]").click(function(){
                var status = ($(this).data('konfirmasi') == 1) ? 'Persetujuan' : 'Penolakan';
                $("#modal-konfirmasi-dialog .modal-title > .status").empty().html(status);
                $("#form-konfirmasi input[name='id']").val($(this).data('id'));
                $("#form-konfirmasi input[name='jenis']").val($(this).data('jenis'));
                $("#form-konfirmasi input[name='status']").val($(this).data('konfirmasi'));
                $("#modal-konfirmasi-dialog").modal('show');
            });
        });
    </script>
@endsection
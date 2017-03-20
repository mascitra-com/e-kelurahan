@layout('_layout/dashboard/index')
@section('title')Galeri@endsection
@section('nama-kelurahan')Lumajang@endsection

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title pull-left">Album</h3>
                    <div class="btn-group pull-right">
                        <button class="btn btn-sm btn-default" data-toggle="modal" data-target="#modal-tambah"><i
                                    class="fa fa-plus"></i> Buat Album
                        </button>
                        <button class="btn btn-sm btn-default"><i class="fa fa-refresh"></i> Segarkan</button>
                    </div>
                    <div class="input-group input-group-sm input-search pull-right">
                        <input type="text" class="form-control" placeholder="Cari Album">
                        <div class="input-group-btn">
                            <button class="btn btn-default"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-body">
                    <div class="row">
                        @if($album)
                            @foreach($album as $list)
                                <?php $link = ! empty($list->galeri->link) ? base_url('assets/galeri/' . $list->galeri->link) : base_url('assets/images/default-folder.png') ?>
                                <div class="col-xs-4 col-sm-4 col-md-3">
                                    <a href="{{site_url('galeri/detail/'.$list->id)}}" class="thumbnail">
                                        <img src="{{ $link }}" alt="...">
                                        <div class="caption text-size-14 text-bold">{{ ucfirst($list->nama) }}</div>
                                    </a>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="panel-footer">
                    <nav aria-label="...">
                        <ul class="pager">
                            <li class="next"><a href="#">Baru <span aria-hidden="true">&rarr;</span></a></li>
                            <li class="previous"><a href="#"><span aria-hidden="true">&larr;</span> Lama</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('modal')
    <div class="modal fade" tabindex="-1" role="dialog" id="modal-tambah">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Tambah Album</h4>
                </div>
                <div class="modal-body">
                    <form action="{{ site_url('galeri/simpanAlbum') }}" method="POST">
                        {{ $csrf }}
                        <div class="form-group">
                            <div class="form-group">
                                <label for="">Nama Album</label>
                                <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama Album"/>
                            </div>
                            <div class="form-group">
                                <label for="">Deskripsi Album</label>
                                <textarea class="form-control" name="deskripsi" rows="4"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> Tambah</button>
                            <button class="btn btn-warning" type="reset"><i class="fa fa-refresh"></i> Bersihkan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('style')
    <style>
        .input-search {
            width: 200px;
            margin-right: 5px;
        }

        .pager {
            margin: 0;
        }
    </style>
@endsection
@layout('_layout/homepage/index')
@section('page_title')
    Album Foto
@endsection

@section('content')
    <div class="container-fluid container-content">
        <div class="row">
            <div class="col-xs-12">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title pull-left">Album</h3>
                        {{-- TODO Fix This --}}
                        {{--<div class="input-group input-group-sm input-search pull-right">--}}
                        {{--<div class="btn-group pull-right">--}}
                        {{--<button class="btn btn-sm btn-default"><i class="fa fa-refresh"></i> Segarkan</button>--}}
                        {{--</div>--}}

                        {{--<input type="text" class="form-control" placeholder="Cari Album">--}}
                        {{--<div class="input-group-btn">--}}
                        {{--<button class="btn btn-default"><i class="fa fa-search"></i></button>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            @if($album)
                                @foreach($album as $list)
                                    <?php $link = ! empty($list->galeri->link) ? 'galeri/' . $list->galeri->link : 'images/default-folder.png'?>
                                    <div class="col-xs-4 col-sm-4 col-md-3">
                                        <a href="{{site_url('homepage/'.$slug.'/galeri/'.$list->id)}}" class="thumbnail">
                                            <img src="{{base_url('assets/' . $link)}}" alt="...">
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
    </div>
@endsection

@section('style')
    <style>
        .container-content {
            min-height: 55vh;
            padding: 50px;
            padding-top: 125px;
        }
        .panel {
            padding: 15px;
        }
        td {
            vertical-align: middle !important;
        }
        .input-search {
            width: 200px;
            margin-right: 5px;
        }
        .pager {
            margin: 0;
        }
        .thumbnail:hover {
            box-shadow: 0 1px 5px rgba(0, 0, 0, .2);
            transition: box-shadow 0.5s ease;
        }
    </style>
@endsection
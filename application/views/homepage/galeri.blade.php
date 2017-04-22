@layout('_layout/homepage/index')
@section('page_title')
Galeri Foto
@endsection

@section('content')
<div class="container-fluid container-content">
    <div class="row">
        <div class="col-xs-12">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title pull-left">{{ ucfirst($album->nama) }}</h3>
                    {{-- TODO Fix This --}}
                    <div class="input-group input-group-sm input-search pull-right">
                        <input type="text" class="form-control" placeholder="Cari Di Album">
                        <div class="input-group-btn">
                            <button class="btn btn-default"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <a href="{{ site_url('homepage/'.$slug.'/album') }}" class="btn btn-default btn-sm"><i class="fa fa-arrow-left"></i> Kembali ke Album</a>
                </div>
                <div class="panel-body">
                    <div class="row">
                        @if($foto)
                        <?php $i = count($foto); ?>
                        @foreach($foto as $list)
                        <div class="col-xs-4 col-sm-4 col-md-2">
                            <a href="#" onclick="show('{{ $list->link }}')">
                                <figure class="thumbnail">
                                    <img src="{{base_url('assets/galeri/' . $list->link)}}"
                                    alt="{{ !empty($list->nama) ? $list->nama : 'Foto ' . $i }}">
                                    <figcaption
                                    style="text-align: center">{{ !empty($list->nama) ? $list->nama : 'Foto ' . $i }}</figcaption>
                                </figure>
                            </a>
                        </div>
                        <?php $i--; ?>
                        @endforeach
                        @endif
                    </div>
                </div>
                <div class="panel-footer">
                    <nav aria-label="...">
                        <ul class="pager">
                            <li class="previous"><a href="#"><span aria-hidden="true">&larr;</span> Lama</a></li>
                            <li class="next"><a href="#">Baru <span aria-hidden="true">&rarr;</span></a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('modal')
<div class="modal fade" tabindex="-1" role="dialog" id="modal-preview" style="margin-top: 50px;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <img src="" alt="image" width="100%" id="img-show">
            </div>
        </div>
    </div>
</div>
@endsection

@section('javascript')
<script>
    function show(img) {
        $('#img-show').attr('src', '{{ base_url('assets/galeri/') }}' + img);
        $('#modal-preview').modal('show');
    }
</script>
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

.thumbnail:hover {
    box-shadow: 0 1px 5px rgba(0, 0, 0, .2);
    transition: box-shadow 0.5s ease;
}
.container-content{
    min-height: 55vh;
    padding: 50px;
    padding-top: 125px;
}
.panel{
    padding: 15px;
}
td{
    vertical-align: middle!important;
}
</style>
@endsection
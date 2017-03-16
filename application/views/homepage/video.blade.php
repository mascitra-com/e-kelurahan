@layout('_layout/homepage/index')
@section('page_title')
    Galeri Video
@endsection

@section('content')
    <div class="container-fluid container-content">
        <div class="row">
            <div class="col-xs-12">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title pull-left">Galeri Video</h3>
                        {{-- TODO Fix This --}}
                        {{--<div class="input-group input-group-sm input-search pull-right">--}}
                            {{--<input type="text" class="form-control" placeholder="Cari Di Galeri">--}}
                            {{--<div class="input-group-btn">--}}
                                {{--<button class="btn btn-default"><i class="fa fa-search"></i></button>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            @if($videos)
                                <?php $i = count($videos); ?>
                                @foreach($videos as $list)
                                    <div class="col-xs-6 col-sm-6 col-md-4">
                                        <a href="#" onclick="show('{{ $list->link }}')">
                                            <figure>
                                                <video width="320" height="240" controls>
                                                    <source src="{{ base_url('assets/galeri/'.$list->link) }}">
                                                    Your browser does not support the video tag.
                                                </video>
                                                <figcaption
                                                        style="text-align: center">{{ !empty($list->nama) ? $list->nama : 'Video ' . $i }}</figcaption>
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
    <div class="modal fade" tabindex="-1" role="dialog" id="modal-preview">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <img src="" alt="image" width="100%" id="img-show">
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" tabindex="-1" role="dialog" id="modal-tambah">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Foto Album</h4>
                </div>
                <div class="modal-body">
                    <form action="{{ site_url('galeri/simpanVideo') }}" enctype="multipart/form-data" method="POST">
                        {{ $csrf }}
                        <div class="form-group">
                            <label for="">Judul Video</label>
                            <input type="text" class="form-control" name="nama" placeholder="Judul Foto"/>
                        </div>
                        <div class="form-group">
                            <label for="">Deskripsi Video</label>
                            <textarea class="form-control" name="deskripsi" rows="4"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Unggah</label>
                            <input type="file" name="link"/>
                            <p class="help-block">Maksimal 100MB</p>
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

@section('javascript')
    <script>
        function show(img) {
            $('#img-show').attr('src', '{{ base_url('assets/galeri/') }}' + img);
            $('#modal-preview').modal('show');
        }
    </script>
    <script>
        var videos = {{json_encode($videos)}};
        var index = 0;
        var video = document.getElementById('video');
        video.addEventListener('canplay', function () {
            this.currentTime = this.duration / 2;
        }, false);
        video.addEventListener('seeked', function () {
            getThumb();
        }, false);
        function nextVideo() {
            if (videos[index]) {
                video.src = '/uploads/' + videos[index];
                console.log(index);
                console.log('loading: ' + video.src);
                video.load();
                index++;
            } else {
                console.log('done');
            }
        }
        function getThumb() {
            var filename = video.src;
            var w = video.videoWidth;//video.videoWidth * scaleFactor;
            var h = video.videoHeight;//video.videoHeight * scaleFactor;
            var canvas = document.createElement('canvas');
            canvas.width = w;
            canvas.height = h;
            var ctx = canvas.getContext('2d');
            ctx.drawImage(video, 0, 0, w, h);
            //document.body.appendChild(canvas);
            var data = canvas.toDataURL("image/jpg");

            //send to php script
            var xmlhttp = new XMLHttpRequest;

            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    console.log('saved');
                    nextVideo();
                }
            }

            console.log('saving');
            xmlhttp.open("POST", location.href, true);
            xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlhttp.send('name=' + encodeURIComponent(filename) + '&data=' + data);
        }
        function failed(e) {
            // video playback failed - show a message saying why
            switch (e.target.error.code) {
                case e.target.error.MEDIA_ERR_ABORTED:
                    console.log('You aborted the video playback.');
                    break;
                case e.target.error.MEDIA_ERR_NETWORK:
                    console.log('A network error caused the video download to fail part-way.');
                    break;
                case e.target.error.MEDIA_ERR_DECODE:
                    console.log('The video playback was aborted due to a corruption problem or because the video used features your browser did not support.');
                    break;
                case e.target.error.MEDIA_ERR_SRC_NOT_SUPPORTED:
                    console.log('The video could not be loaded, either because the server or network failed or because the format is not supported.');
                    break;
                default:
                    console.log('An unknown error occurred.');
                    break;
            }

            nextVideo();
        }

        //let's go
        nextVideo();
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
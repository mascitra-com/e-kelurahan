@layout('_layout/dashboard/index')
@section('title')Profil Kelurahan@endsection
@section('nama-kelurahan')Lumajang@endsection

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-theme">
                <div class="panel-heading">
                    <h3 class="panel-title">Profil Kelurahan</h3>
                </div>
                <div class="panel-body">
                    <ul class="nav nav-tabs">
                        <li role="presentation" class="active"><a href="#tab1" data-toggle="tab">Profil Kelurahan</a>
                        </li>
                        <li role="presentation"><a href="#tab2" data-toggle="tab">Profil Lurah</a></li>
                        <li role="presentation"><a href="#tab3" data-toggle="tab">Info Kontak</a></li>
                        <li role="presentation"><a href="#tab4" data-toggle="tab">Akun</a></li>
                    </ul>
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="tab1">
                            <form action="{{ site_url('profil/'.(empty($profil) ? 'simpan' : 'ubah/'.$kelurahan->id)) }}" method="POST">
                            {{ $csrf }}
                                <input type="hidden" name="id_organisasi" value="{{ $kelurahan->id }}">
                                <div class="form-group">
                                    <label for="">Nama Kelurahan</label>
                                    <input type="text" class="form-control" value="{{ $kelurahan->nama }}"
                                           placeholder="Nama Kelurahan" readonly>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-md-6">
                                        <div class="form-group">
                                            <label for="">Deskripsi</label>
                                            <textarea class="form-control" name="deskripsi"
                                                      placeholder="Deskripsi kelurahan">{{ empty($profil->deskripsi) ? '' : $profil->deskripsi }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-6">
                                        <div class="form-group">
                                            <label for="">Alamat</label>
                                            <textarea class="form-control" name="alamat"
                                                      placeholder="Alamat Kelurahan">{{ empty($profil->alamat) ? '' : $profil->alamat }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">Kode Pos</label>
                                    <input type="text" class="form-control" name="kode_pos" placeholder="Kode Pos" value="{{ empty($profil->kode_pos) ? '' : $profil->kode_pos }}"/>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> Simpan
                                    </button>
                                    <button class="btn btn-default" type="reset"><i class="fa fa-refresh"></i>
                                        Kembalikan
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="tab2">
                            <form action="{{ empty($profil) ?: site_url('profil/ubah/'.$kelurahan->id) }}" method="POST">
                            {{ $csrf }}
                                <div class="row">
                                    <div class="col-xs-12 col-md-6">
                                        <div class="form-group">
                                            <label for="">Nama Lurah</label>
                                            <input type="text" class="form-control" name="nama_lurah" value="{{ empty($profil) ?: $profil->nama_lurah }}"
                                                   placeholder="Nama Lurah"/>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Nomor Induk Pegawai Lurah</label>
                                            <input type="text" class="form-control" name="nip" placeholder="NIP Lurah" value="{{ empty($profil) ?: $profil->nip }}"/>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Golongan Pegawai</label>
                                            <input class="form-control" name="id_golongan" list="golongan_list"
                                                   placeholder="Pilih Golongan" value="{{ empty($profil) ?: $profil->id_golongan . '. '.$profil->golongan->nama }}"/>
                                            <datalist id="golongan_list">
                                                @foreach($golongan as $item)
                                                    <option value="{{ $item->id . '. ' . $item->nama }}">
                                                @endforeach
                                            </datalist>
                                        </div>
                                        <div class="form-group">
                                            <button class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                                            <button class="btn btn-default" type="reset"><i class="fa fa-refresh"></i>
                                                Kembalikan
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="tab3">
                            <form action="{{ empty($profil) ?: site_url('profil/ubah/'.$kelurahan->id) }}" method="POST">
                                {{ $csrf }}
                                <div class="row">
                                    <div class="col-xs-12 col-md-6">
                                        <div class="form-group">
                                            <label for="">Telpon</label>
                                            <input type="text" class="form-control" name="telepon"
                                                   placeholder="Nomor Telepon" value="{{ empty($profil) ?: $profil->telepon }}"/>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-6">
                                        <div class="form-group">
                                            <label for="">Email</label>
                                            <input type="text" class="form-control" name="email"
                                                   placeholder="Alamat Email" value="{{ empty($profil) ?: $profil->email }}"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-md-6">
                                        <div class="form-group">
                                            <label for="">Facebook</label>
                                            <div class="input-group">
                                                <span class="input-group-addon">https://facebook.com/</span>
                                                <input type="text" class="form-control" name="facebook"
                                                       placeholder="Alamat Facebook" value="{{ empty($profil) ?: $profil->facebook }}"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-6">
                                        <div class="form-group">
                                            <label for="">Twitter</label>
                                            <div class="input-group">
                                                <span class="input-group-addon">https://twitter.com/</span>
                                                <input type="text" class="form-control" name="twitter"
                                                       placeholder="Alamat Twitter" value="{{ empty($profil) ?: $profil->twitter }}"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                                    <button class="btn btn-default" type="reset"><i class="fa fa-refresh"></i>
                                        Kembalikan
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="tab4">
                            <form action="{{ empty($profil) ?: site_url('profil/ganti_password/') }}" method="POST">
                                {{ $csrf }}
                                <div class="row">
                                    <div class="col-xs-12 col-md-6">
                                        <div class="form-group">
                                            <label for="">Username</label>
                                            <input type="text" class="form-control" name="username"
                                                   placeholder="Username" value="{{ empty($akun) ?: $akun->username }}" readonly/>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-6">
                                        <div class="form-group">
                                            <label for="">Waktu login terakhir</label>
                                            <input type="text" class="form-control" placeholder="Waktu Login" value="{{ empty($akun) ?: date('d-m-Y H:i:s', $akun->last_login) }}" readonly/>
                                        </div>
                                    </div>
                                </div>
                                <h4 class="break-top-20 break-10 text-grey">GANTI PASSWORD</h4>
                                <div class="form-group">
                                    <label for="">Password Lama</label>
                                    <input type="password" class="form-control" name="old_password"
                                           placeholder="Masukkan password lama"/>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-md-6">
                                        <div class="form-group">
                                            <label for="">Password Baru</label>
                                            <input type="password" class="form-control" name="new_password"
                                                   placeholder="Masukkan Password baru"/>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-6">
                                        <div class="form-group re-type">
                                            <label class="control-lable">Tulis Ulang Password Baru</label>
                                            <input type="password" class="form-control" name="new_password_re"
                                                   placeholder="Tulis Ulang Password Baru"/>
                                            <span class="help-block">Password Tidak Sama</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary btn-password" disabled><i class="fa fa-save"></i>
                                        Simpan
                                    </button>
                                    <button class="btn btn-default" type="reset"><i class="fa fa-refresh"></i>
                                        Kembalikan
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <span class="text-grey">Last edited by admin 12/02/2017 08:30</span>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('style')
    <style>
        .tab-pane {
            padding: 20px 15px;
            padding-bottom: 0;
        }
    </style>
@endsection
@section('javascript')
    <script>
        $(document).ready(function () {
            $(".help-block").hide();
        });
        $("[name='new_password_re']").keyup(function () {
            var value = $("input[name='new_password']").val();
            if ($(this).val() !== value) {
                $(".re-type").addClass('has-error');
                $(".btn-password").prop('disabled', true);
                $(".help-block").fadeIn(500);
            } else {
                $(".re-type").removeClass('has-error');
                $(".btn-password").prop('disabled', false);
                $(".help-block").fadeOut(500);
            }
        });
    </script>
@endsection
<head>
        <title>{{ $jdl }}</title>

        <style>
            .card{
                border: none !important;
                border: 1px solid #DCE0E5 !important ;
            }

            .card-header{
                border-bottom: 1px solid #DCE0E5 !important;
            }
        </style>
    </head>
    
    <!-- <script src="./dist/js/demo-theme.min.js?1684106062"></script>  -->
    <div class="page">
        <!-- Navbar -->
        @include('dash.header')
        @include('dash.menu')
        <div class="page-wrapper">
            <!-- Page header -->
            <div class="page-header d-print-none">
                <div class="container-xl">
                    <div class="row g-2 align-items-center">
                        <div class="col">
                            <!-- Page pre-title -->
                            <h2 class="page-title">
                                Tambah Endoser
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        
        <!-- Page body -->
        <div class="page-body">
            <div class="container-lg">
                <!-- <div class="row row-deck row-cards"> -->
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Form Tambah Endoser</h3>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="/storeEndorse(instagram)" enctype="multipart/form-data" class="row  g-3">
                                @csrf
                                <div class="form-group mb-3">
                                    <label for="product_id" class="form-label mb-3">Nama Product<span style="color:red">*</span></label>
                                        <select name="product_id" id="product_id" class="form-select">
                                            <option selected>-- Pilih Product --</option>
                                            @foreach($produk as $p)
                                            <option value="{{ $p->id }}">{{ $p->nm_product }}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('product_id'))
                                        <div class="text-danger">
                                            {{ $errors->first('product_id') }}
                                        </div>
                                        @endif
                                </div>
                                <div class="form-group mb-3">
                                    <label for="nm_endorse" class="form-label mb-3">Nama Endoser<span style="color:red">*</span></label>
                                    <input type="text" name="nm_endorse" value="{{ old('nm_endorse') }}" id="nm_endorse" class="form-control">
                                    @if($errors->has('nm_endorse'))
                                    <div class="text-danger">
                                        {{ $errors->first('nm_endorse') }}
                                    </div>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <label for="usia" class="form-label mb-3">Usia<span style="color:red">*</span></label>
                                    <input type="number" name="usia" value="{{ old('usia') }}" id="usia" class="form-control">
                                    @if($errors->has('usia'))
                                    <div class="text-danger">
                                        {{ $errors->first('usia') }}
                                    </div>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label mb-3">Jenis Kelamin<span style="color:red">*</span></label><br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="jns_kelamin"  id="laki-laki" value="laki-laki">
                                        <label class="form-check-label" for="laki-laki">Laki-laki</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="jns_kelamin"  id="perempuan" value="perempuan">
                                        <label class="form-check-label" for="perempuan">Perempuan</label>
                                    </div>
                                    @if($errors->has('jns_kelamin'))
                                    <div class="text-danger">
                                        {{ $errors->first('jns_kelamin') }}
                                    </div>
                                    @endif
                                   
                                </div>
                                <div class="form-group mb-3">
                                    <label for="alamat" class="form-label mb-3">Alamat<span style="color:red">*</span></label>
                                    <textarea name="alamat" value="{{ old('alamat') }} id="alamat" cols="30" rows="2" class="form-control"></textarea>
                                    @if($errors->has('alamat'))
                                    <div class="text-danger">
                                        {{ $errors->first('alamat') }}
                                    </div>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <label for="kontak_person" class="form-label mb-3">Kontak Person<span style="color:red">*</span></label>
                                    <div class="input-group">
                                    <span class="input-group-text" id="basic-addon1">+62</span>
                                    <input type="text" class="form-control" name="kontak_person" value="{{ old('kontak_person') }}"  aria-describedby="basic-addon1">
                                    </div>
                                    @if($errors->has('kontak_person'))
                                    <div class="text-danger">
                                        {{ $errors->first('kontak_person') }}
                                    </div>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <label for="kategori" class="form-label mb-3">Kategori Endoser<span style="color:red">*</span></label>
                                    <select name="kategori" id="kategori" class="form-select">
                                        <option selected>-- Pilih Kategori --</option>
                                        <option value="Nano">Nano</option>
                                        <option value="Mikro">Mikro</option>
                                        <option value="Makro">Makro</option>
                                        <option value="Mega">Mega</option>
                                        <option value="Big">Big</option>
                                    </select>
                                    @if($errors->has('kategori'))
                                    <div class="text-danger">
                                        {{ $errors->first('kategori') }}
                                    </div>
                                    @endif
                                   
                                </div>
                                <div class="form-group mb-3">
                                    <label for="form-label spesifikasi_akun" class="form-label mb-3">Spesifikasi Akun<span style="color:red">*</span></label>
                                    <select name="spesifikasi_akun" id="spesifikasi_akun" class="form-select">
                                        <option selected>-- Pilih Spesifikasi Akun --</option>
                                        <option value="Lifestyle">Lifestyle</option>
                                        <option value="Food Vloger">Food Vloger</option>
                                        <option value="Cooking">Cooking</option>
                                        <option value="Sport">Sport</option>
                                        <option value="Beauty">Beauty</option>
                                        <option value="Comedy">Comedy</option>
                                        <option value="Fashion">Fashion</option>
                                        <option value="Family">Family</option>
                                        <option value="Profesi">Profesi</option>
                                        <option value="Trend">Trend</option>
                                        <option value="Day My Life">Day My Life</option>
                                    </select>
                                    @if($errors->has('spesifikasi_akun'))
                                    <div class="text-danger">
                                        {{ $errors->first('spesifikasi_akun') }}
                                    </div>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <label for="link_akun" class="form-label mb-3">Link Akun Sosmed<span style="color:red">*</span></label>
                                    <div class="input-group">
                                    <span class="input-group-text" id="basic-addon1">http://</span>
                                    <input type="text" class="form-control" name="link_akun" value="{{ old('link_akun') }}" aria-describedby="basic-addon1">
                                    </div>
                                    @if($errors->has('link_akun'))
                                    <div class="text-danger">
                                        {{ $errors->first('link_akun') }}
                                    </div>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <label for="sosial_media" class="form-label mb-3">Sosial Media<span style="color:red">*</span></label>
                                    <select name="sosial_media" id="sosial_media" class="form-select">
                                        <option selected>-- Pilih Sosial Media --</option>
                                        <option value="Instagram">Instagram</option>
                                        <option value="Tiktok">Tiktok</option>
                                    </select>
                                    @if($errors->has('sosial_media'))
                                    <div class="text-danger">
                                        {{ $errors->first('sosial_media') }}
                                    </div>
                                    @endif
                                </div>
                                <div class="form-group col-md-6 mb-3">
                                    <label for="viewer" class="form-label mb-3">Viewer<span style="color:red">*</span></label>
                                    <input type="text" name="viewer" value="{{ old('viewer') }}" class="form-control" id="viewer">
                                    @if($errors->has('viewer'))
                                    <div class="text-danger">
                                        {{ $errors->first('viewer') }}
                                    </div>
                                    @endif
                                </div>
                                <div class="col-md-6 form-group mb-3">
                                    <label for="like" class="form-label mb-3">Like<span style="color:red">*</span></label>
                                    <input type="text" name="like"  value="{{ old('like') }}" class="form-control" id="like">
                                    @if($errors->has('like'))
                                    <div class="text-danger">
                                        {{ $errors->first('like') }}
                                    </div>
                                    @endif
                                </div>
                                <div class="form-group col-md-6 mb-3">
                                    <label for="follower" class="form-label mb-3">Follower<span style="color:red">*</span></label>
                                    <input type="text" name="follower" value="{{ old('follower') }}" class="form-control" id="follower">
                                    @if($errors->has('follower'))
                                    <div class="text-danger">
                                        {{ $errors->first('follower') }}
                                    </div>
                                    @endif
                                </div>
                                <div class="col-md-6 form-group mb-3">
                                    <label for="rate_card" class="form-label mb-3">Rate Card<span style="color:red">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon1">Rp.</span>
                                        <input type="text" class="form-control" name="rate_card" value="{{ old('rate_card') }}" aria-describedby="basic-addon1">
                                    </div>
                                    @if($errors->has('rate_card'))
                                    <div class="text-danger">
                                        {{ $errors->first('rate_card') }}
                                    </div>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <label for="engagement_rate" class="form-label mb-3">Engagement Rate</label>
                                    <input type="text" name="engagement_rate" value="{{ old('engagement_rate') }}" id="engagement_rate" class="form-control">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="owning" class="form-label mb-3">Owning<span style="color:red">*</span></label>
                                    <input type="text" name="owning" value="{{ old('owning') }}" id="owning" class="form-control">
                                    @if($errors->has('owning'))
                                    <div class="text-danger">
                                        {{ $errors->first('owning') }}
                                    </div>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <label for="foto" class="mb-3">Foto Profile<span style="color:red">*</span></label>
                                    <input type="file" name="foto" value="{{ old('foto') }}" id="foto_profile" class="form-control">
                                    <label style="font-size: 13px;margin-top:10px">File maksimal 5MB(PNG,JPG,JPEG,WPEG)</label>
                                    @if($errors->has('foto'))
                                    <div class="text-danger">
                                        {{ $errors->first('foto') }}
                                    </div>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <label for="deskripsi" class="form-label mb-3">Deskripsi</label>
                                    <textarea name="deskripsi" value="{{ old('deskripsi') }}" id="deskripsi" cols="30" rows="2" class="form-control"></textarea>
                                </div>

                                <div class="form-group">
                                    <input type="submit" value="Simpan" class="btn btn-primary">
                                    <a href="/endorse" class="btn btn-dark btn-pill">Kembali</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
    
    @include('dash.footer')

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
                                Edit Endoser
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
                            <h3 class="card-title">Form Edit Endoser</h3>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="\storeEditEndorse\{{ $endor->id }}" enctype="multipart/form-data" class="row  g-3">
                                @csrf
                                <div class="form-group mb-3">
                                    <label for="product_id" class="form-label mb-3">Nama Product<span style="color:red">*</span></label>
                                        <select name="product_id" id="product_id" class="form-select">
                                            <option selected>-- Pilih Product --</option>
                                            @foreach($produk as $p)
                                            <option value="{{ $p->id }}" {{ $p->id == $endor->product_id ? 'selected' : '' }}>{{ $p->nm_product }}</option>
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
                                    <input type="text" name="nm_endorse" value="{{ $endor->nm_endorse }}" id="nm_endorse" class="form-control">
                                    @if($errors->has('nm_endorse'))
                                    <div class="text-danger">
                                        {{ $errors->first('nm_endorse') }}
                                    </div>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <label for="usia" class="form-label mb-3">Usia<span style="color:red">*</span></label>
                                    <input type="number" name="usia" value="{{ $endor->usia }}" id="usia" class="form-control">
                                    @if($errors->has('usia'))
                                    <div class="text-danger">
                                        {{ $errors->first('usia') }}
                                    </div>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label mb-3">Jenis Kelamin<span style="color:red">*</span></label><br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="jns_kelamin" id="laki-laki" value="laki-laki" {{ $endor->jns_kelamin == 'laki-laki' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="laki-laki">Laki-laki</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="jns_kelamin"  id="perempuan" value="perempuan"  {{ $endor->jns_kelamin == 'perempuan' ? 'checked' : '' }}>
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
                                    <textarea name="alamat" id="alamat" cols="30" rows="2" class="form-control"> {{ $endor->alamat }}</textarea>
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
                                    <input type="text" class="form-control" name="kontak_person" value="{{ $endor->kontak_person }}"  aria-describedby="basic-addon1">
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
                                        <option value="">Pilih kategori</option>
                                        <option value="Nano" {{ $endor->kategori == 'Nano' ? 'selected' : '' }}>Nano</option>
                                        <option value="Mikro" {{ $endor->kategori == 'Mikro' ? 'selected' : '' }}  >Mikro</option>
                                        <option value="Makro" {{ $endor->kategori == 'Makro' ? 'selected' : '' }}>Makro</option>
                                        <option value="Mega" {{ $endor->kategori == 'Mega' ? 'selected' : '' }}>Mega</option>
                                        <option value="Big" {{ $endor->kategori == 'Big' ? 'selected' : '' }}>Big</option>
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
                                        <option value="Lifestyle" {{ $endor->spesifikasi_akun == 'Lifestyle' ? 'selected' : '' }}>Lifestyle</option>
                                        <option value="Food Vloger" {{ $endor->spesifikasi_akun == 'Food Vloger' ? 'selected' : '' }}>Food Vloger</option>
                                        <option value="Cooking" {{ $endor->spesifikasi_akun == 'Cooking' ? 'selected' : '' }}>Cooking</option>
                                        <option value="Sport" {{ $endor->spesifikasi_akun == 'Sport' ? 'selected' : '' }}>Sport</option>
                                        <option value="Beauty" {{ $endor->spesifikasi_akun == 'Beauty' ? 'selected' : '' }}>Beauty</option>
                                        <option value="Comedy" {{ $endor->spesifikasi_akun == 'Comedy' ? 'selected' : '' }}>Comedy</option>
                                        <option value="Fashion" {{ $endor->spesifikasi_akun == 'Fashion' ? 'selected' : '' }}>Fashion</option>
                                        <option value="Family" {{ $endor->spesifikasi_akun == 'Family' ? 'selected' : '' }}>Family</option>
                                        <option value="Profesi" {{ $endor->spesifikasi_akun == 'Profesi' ? 'selected' : '' }}>Profesi</option>
                                        <option value="Trend" {{ $endor->spesifikasi_akun == 'Tren' ? 'selected' : '' }}>Trend</option>
                                        <option value="Day My Life" {{ $endor->spesifikasi_akun == 'Day My Life' ? 'selected' : '' }}>Day My Life</option>
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
                                    <input type="text" class="form-control" name="link_akun" value="{{ $endor->link_akun }}" aria-describedby="basic-addon1">
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
                                        <option value="Instagram" {{ $endor->sosial_media == 'Instagram' ? 'selected' : '' }}>Instagram</option>
                                        <option value="Tiktok" {{ $endor->sosial_media == 'Tiktok' ? 'selected' : '' }}>Tiktok</option>
                                    </select>
                                    @if($errors->has('sosial_media'))
                                    <div class="text-danger">
                                        {{ $errors->first('sosial_media') }}
                                    </div>
                                    @endif
                                </div>
                                <div class="form-group col-md-6 mb-3">
                                    <label for="viewer" class="form-label mb-3">Viewer<span style="color:red">*</span></label>
                                    <input type="text" name="viewer" value="{{ $endor->viewer }}" class="form-control" id="viewer">
                                    @if($errors->has('viewer'))
                                    <div class="text-danger">
                                        {{ $errors->first('viewer') }}
                                    </div>
                                    @endif
                                </div>
                                <div class="col-md-6 form-group mb-3">
                                    <label for="like" class="form-label mb-3">Like<span style="color:red">*</span></label>
                                    <input type="text" name="like"  value="{{ $endor->like }}" class="form-control" id="like">
                                    @if($errors->has('like'))
                                    <div class="text-danger">
                                        {{ $errors->first('like') }}
                                    </div>
                                    @endif
                                </div>
                                <div class="form-group col-md-6 mb-3">
                                    <label for="follower" class="form-label mb-3">Follower<span style="color:red">*</span></label>
                                    <input type="text" name="follower" value="{{ $endor->follower }}" class="form-control" id="follower">
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
                                        <input type="text" class="form-control" name="rate_card" value="{{ $endor->rate_card }}" aria-describedby="basic-addon1">
                                    </div>
                                    @if($errors->has('rate_card'))
                                    <div class="text-danger">
                                        {{ $errors->first('rate_card') }}
                                    </div>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <label for="engagement_rate" class="form-label mb-3">Engagement Rate</label>
                                    <input type="text" name="engagement_rate" value="{{ $endor->engagement_rate }}" id="engagement_rate" class="form-control">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="owning" class="form-label mb-3">Owning<span style="color:red">*</span></label>
                                    <input type="text" name="owning" value="{{ $endor->owning }}" id="owning" class="form-control">
                                    @if($errors->has('owning'))
                                    <div class="text-danger">
                                        {{ $errors->first('owning') }}
                                    </div>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <label for="foto" class="mb-3">Foto Profile</label>
                                    <input type="file" name="foto" id="foto" class="form-control">
                                    <label style="font-size: 13px;margin-top:10px">File maksimal 5MB(PNG,JPG,JPEG,WPEG)</label>
                                    @if($errors->has('foto'))
                                    <div class="text-danger">
                                        {{ $errors->first('foto') }}
                                    </div>
                                    @endif
                                </div> 
                                <div class="form-group mb-3">
                                    <label for="deskripsi" class="form-label mb-3">Deskripsi</label>
                                    <textarea name="deskripsi" value="{{ $endor->deskripsi }}" id="deskripsi" cols="30" rows="2" class="form-control">{{ $endor->deskripsi }}</textarea>
                                </div>

                                <div class="form-group">
                                    <input type="submit" value="Update" class="btn btn-success btn-pill">
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

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/rowreorder/1.4.1/css/rowReorder.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css">

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
                            Edit
                        </h2>
                    </div>
                </div>
                <div class="btn-tambahUser mt-4 mb-2">
                    <button type="button" class="btn btn-danger btn-pill" onclick="window.history.back()">Back</button>
                </div>
            </div>
        </div>
        <!-- Page body -->
        <div class="page-body">
            <div class="container-xl">
                <!-- <div class="row row-deck row-cards"> -->
                <div class="col-md-12">
                    <form class="card" action="\storeChange\{{ $affiliator->id }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label required">Produk</label>
                                <select class="form-control" name="produk_id" id="produk_id">
                                    @foreach ($product as $p)
                                    <option value="{{ $p->id }}" {{ $p->id == $affiliator->produk_id ? 'selected' : '' }}>{{ $p->nm_product }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">Nama Affiliator</label>
                                <div>
                                    <input type="text" name="nama" class="form-control" aria-describedby="emailHelp" placeholder="Input Posisi" value="{{ $affiliator->nama }}">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">Usia</label>
                                <div>
                                    <input type="text" name="usia" class="form-control" aria-describedby="emailHelp" placeholder="Input Posisi" value="{{ $affiliator->usia }}">
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="form-label">Jenis Kelamin</div>
                                <div>
                                    <label class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="jekel" value="Laki-Laki" checked>
                                        <span class="form-check-label">Laki-Laki</span>
                                    </label>
                                    <label class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="jekel" value="Perempuan">
                                        <span class="form-check-label">Perempuan</span>
                                    </label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">Alamat</label>
                                <div>
                                    <input type="text" name="alamat" class="form-control" aria-describedby="emailHelp" placeholder="Input Posisi" value="{{ $affiliator->alamat }}">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">Akun Tiktok</label>
                                <div>
                                    <input type="text" name="akun" class="form-control" aria-describedby="emailHelp" placeholder="Input Posisi" value="{{ $affiliator->akun }}">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">Kontak Person</label>
                                <div>
                                    <input type="text" name="cp" class="form-control" aria-describedby="emailHelp" placeholder="Input Posisi" value="{{ $affiliator->cp }}">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">Kategori Affiliator</label>
                                <select class="form-control" id="kategori" name="kategori">
                                    <option value="Life Style" {{ $affiliator->kategori == "Life Style" ? 'selected' : '' }}>Life Style</option>
                                    <option value="Content Creator" {{ $affiliator->kategori == "Content Creator" ? 'selected' : '' }}>Content Creator</option>
                                    <option value="Food Vloger" {{ $affiliator->kategori == "Food Vloger" ? 'selected' : '' }}>Food Vloger</option>
                                    <option value="Cooking" {{ $affiliator->kategori == "Cooking" ? 'selected' : '' }}>Cooking</option>
                                    <option value="Sport" {{ $affiliator->kategori == "Sport" ? 'selected' : '' }}>Sport</option>
                                    <option value="Beauty" {{ $affiliator->kategori == "Beauty" ? 'selected' : '' }}>Beauty</option>
                                    <option value="Comedy" {{ $affiliator->kategori == "Comedy" ? 'selected' : '' }}>Comedy</option>
                                    <option value="Fashion" {{ $affiliator->kategori == "Fashion" ? 'selected' : '' }}>Fashion</option>
                                    <option value="Family" {{ $affiliator->kategori == "Family" ? 'selected' : '' }}>Family</option>
                                    <option value="Profesi" {{ $affiliator->kategori == "Profesi" ? 'selected' : '' }}>Profesi</option>
                                    <option value="Trend" {{ $affiliator->kategori == "Trend" ? 'selected' : '' }}>Trend</option>
                                    <option value="A Day In My Life" {{ $affiliator->kategori == "A Day In My Life" ? 'selected' : '' }}>A Day In My Life</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">Pendapatan/ GMV</label>
                                <div>
                                    <input type="text" name="gmv" class="form-control" aria-describedby="emailHelp" placeholder="Input Posisi" value="{{ $affiliator->gmv }}">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">Komisi</label>
                                <div>
                                    <input type="text" name="komisi" class="form-control" aria-describedby="emailHelp" placeholder="Input Posisi" value="{{ $affiliator->komisi }}">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">Agency</label>
                                <select class="form-control" id="agency" name="agency">
                                    <option value="Agency" {{ $affiliator->agency == "Agency" ? 'selected' : '' }}>Agency</option>
                                    <option value="Non Agency" {{ $affiliator->agency == "Non Agency" ? 'selected' : '' }}>Non Agency</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">Jumlah Viewer</label>
                                <div>
                                    <input type="text" name="viewers" class="form-control" aria-describedby="emailHelp" placeholder="Input Posisi" value="{{ $affiliator->viewers }}">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">jumlah Like</label>
                                <div>
                                    <input type="text" name="like" class="form-control" aria-describedby="emailHelp" placeholder="Input Posisi" value="{{ $affiliator->like }}">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">Jumlah Followers</label>
                                <div>
                                    <input type="text" name="followers" class="form-control" aria-describedby="emailHelp" placeholder="Input Posisi" value="{{ $affiliator->followers }}">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">Upload Foto Profil</label>
                                <div class="input-group">
                                    <input type="file" class="form-control" id="gambar" name="gambar" accept="image/png, image/jpeg">
                                    <button class="btn btn-outline-secondary" type="button" id="upload-button">Upload</button>
                                </div>
                                <small class="form-hint">File max 2mb dengan format PNG, JPG, JPEG</small>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">Deskripsi</label>
                                <div>
                                    <input type="text" name="deskripsi" class="form-control" aria-describedby="emailHelp" placeholder="Input Posisi" value="{{ $affiliator->deskripsi }}">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">Area Affiliator</label>
                                <select class="form-control" id="tim" name="tim">
                                    <option value="Purwokerto" {{ $affiliator->tim == "Purwokerto" ? 'selected' : '' }}>Purwokerto</option>
                                    <option value="Cilacap" {{ $affiliator->tim == "Cilacap" ? 'selected' : '' }}>Cilacap</option>
                                </select>
                            </div>
                            <div class="row">
                                <div class="col-6 col-sm-4 col-md-2 col-l py-3">
                                    <button type="submit" class="btn btn-success btn-pill">Simpan</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@include('sweetalert::alert')

<!-- <script src="/dist/js/tabler.min.js?1684106062" defer></script>
<script src="/dist/js/demo.min.js?1684106062" defer></script> -->


@include('dash.footer')
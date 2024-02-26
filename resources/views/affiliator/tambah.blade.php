<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/rowreorder/1.4.1/css/rowReorder.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css">


<style>
    .button-container {
        width: 100%;
        margin-top: 5px;
        /* Adjust the margin as needed */
    }

    .button-container .btn {
        width: 100%;
        /* Adjust button width */
    }

    .image-container {
        position: relative;
        width: 100%;
        padding-bottom: 100%;
        /* 1:1 Aspect Ratio */
        overflow: hidden;
    }

    .image-container img {
        position: absolute;
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
</style>
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
                        <h2 class="page-title">
                            {{$jdl}}
                        </h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-body">
            <div class="container-xl">
                <!-- <div class="row row-deck row-cards"> -->
                <div class="col-md-12">
                    <form class="card" action="/asave" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label required">Produk</label>
                                <select class="form-control" name="produk_id" id="produk_id">
                                    @foreach ($product as $p)
                                    <option value="<?= $p['id']; ?>"><?= $p['nm_product']; ?></option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">Nama Affiliator</label>
                                <div>
                                    <input type="text" name="nama" class="form-control" aria-describedby="emailHelp" placeholder="Input Nama Affiliator">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">Usia</label>
                                <div>
                                    <input type="text" name="usia" class="form-control" aria-describedby="emailHelp" placeholder="Input Usia">
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
                                    <input type="text" name="alamat" class="form-control" aria-describedby="emailHelp" placeholder="Input Alamat">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">Akun TikTok</label>
                                <div>
                                    <input type="text" name="akun" class="form-control" aria-describedby="emailHelp" placeholder="Input Akun TikTok">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">Kontak Person</label>
                                <div>
                                    <input type="text" name="cp" class="form-control" aria-describedby="emailHelp" placeholder="Input Kontak Person">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">Kategori Affiliator</label>
                                <select class="form-control" id="kategori" name="kategori">
                                    <option value="Life Style">Life Style</option>
                                    <option value="Content Creator">Content Creator</option>
                                    <option value="Food Vloger">Food Vloger</option>
                                    <option value="Cooking">Cooking</option>
                                    <option value="Sport">Sport</option>
                                    <option value="Beauty">Beauty</option>
                                    <option value="Comedy">Comedy</option>
                                    <option value="Fashion">Fashion</option>
                                    <option value="Family">Family</option>
                                    <option value="Profesi">Profesi</option>
                                    <option value="Trend">Trend</option>
                                    <option value="A Day In My Life">A Day In My Life</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">Pendapatan/ GMV</label>
                                <div>
                                    <input type="text" name="gmv" class="form-control" aria-describedby="emailHelp" placeholder="Input Pendapatan/ GMV">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">Komisi</label>
                                <div>
                                    <input type="text" name="komisi" class="form-control" aria-describedby="emailHelp" placeholder="Input Komisi">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">Agency</label>
                                <select class="form-control" id="agency" name="agency">
                                    <option value="Agency">Agency</option>
                                    <option value="Non Agency">Non Agency</option>
                                </select>
                            </div>
                            <!-- <div class="mb-3">
                                <label class="form-label required">Kontak Person</label>
                                <div>
                                    <input type="text" name="cp" class="form-control" aria-describedby="emailHelp" placeholder="Input Kontak Person">
                                </div>
                            </div> -->
                            <div class="mb-3">
                                <label class="form-label required">Jumlah Viewer</label>
                                <div>
                                    <input type="text" name="viewers" class="form-control" aria-describedby="emailHelp" placeholder="Input Jumlah Viewer">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">jumlah Like</label>
                                <div>
                                    <input type="text" name="like" class="form-control" aria-describedby="emailHelp" placeholder="Input jumlah Like">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">Jumlah Followers</label>
                                <div>
                                    <input type="text" name="followers" class="form-control" aria-describedby="emailHelp" placeholder="Input Jumlah Followers">
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
                                    <input type="text" name="deskripsi" class="form-control" aria-describedby="emailHelp" placeholder="Input Deskripsi">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">Area Affiliator</label>
                                <select class="form-control" id="tim" name="tim">
                                    <option value="Purwokerto">Purwokerto</option>
                                    <option value="Cilacap">Cilacap</option>
                                </select>
                            </div>
                            <div class="footer">
                                <button type=" submit" class="btn btn-success btn-pill">Submit</button>
                                <button type="reset" class="btn btn-secondary btn-pill"">Reset</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>


    </div>
    @include('dash.footer')
    <!-- Sweet Alert -->
    @include('sweetalert::alert')
    <script src=" https://code.jquery.com/jquery-3.7.0.js"></script>
                                    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
                                    <script src="https://cdn.datatables.net/rowreorder/1.4.1/js/dataTables.rowReorder.min.js"></script>
                                    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>

                                    <script>
                                        new DataTable('#table-hakAkses', {
                                            responsive: true,
                                            rowReorder: {
                                                selector: 'td:nth-child(2)'
                                            }
                                        });
                                    </script>
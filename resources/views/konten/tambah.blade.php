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
                            Bank Konten
                        </h2>
                    </div>
                </div>
                <div class="col col-sm-2 col-md-2 col-xl py-3">
                    <a href="javascript:history.back()" class="btn btn-ghost-warning active w-100">
                        <span style="margin-right: 8px;"></span>Kembali
                    </a>
                </div>

            </div>
        </div>
        <!-- Page body -->
        <div class="page-body">
            <div class="container-xl">
                <!-- <div class="row row-deck row-cards"> -->
                <div class="col-md-12">
                    <form class="card" action="/save" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label required">Produk</label>
                                <select class="form-control" name="product_id" id="product_id">
                                    @foreach ($product as $p)
                                    <option value="<?= $p['id']; ?>"><?= $p['nm_Product']; ?></option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">Judul</label>
                                <div>
                                    <input type="text" name="title" class="form-control" aria-describedby="emailHelp" placeholder="Input Judul">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">Sumber Konten</label>
                                <select class="form-control" id="konten" name="konten">
                                    <option value="Agency Luar">Agency Luar</option>
                                    <option value="ccp">ccp</option>
                                    <option value="cwm">cwm</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">Upload Konten Gambar</label>
                                <div>
                                    <input type="file" class="form-control-file" id="gambar" name="gambar">
                                    <small class="form-hint">File max 2mb dengan format PNG,JPG,JPEG</small>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6 col-sm-4 col-md-2 col-l py-3">
                                    <button type="submit" class="btn btn-success w-100">Simpan</button>
                                </div>
                                <div class="col-6 col-sm-4 col-md-2 col-l py-3">
                                    <!-- <button type="submit" class="btn btn-secondary w-100">Reset</button> -->
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
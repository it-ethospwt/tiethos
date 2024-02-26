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
                    <form class="card" action="\storeUbah\{{ $contents->content_id }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <!-- <div class="mb-3">
                                <label class="form-label required">Produk</label>
                                <div>
                                    <input type="text" class="form-control" id="product_id" name="product_id" placeholder="Input Produk" value="{{ $contents->product_id }}">
                                </div>
                            </div> -->
                            <div class="mb-3">
                                <label class="form-label required">Produk</label>
                                <select class="form-control" name="product_id" id="product_id">
                                    @foreach ($product as $p)
                                    <option value="{{ $p->id }}" {{ $p->id == $contents->product_id ? 'selected' : '' }}>{{ $p->nm_product }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">Judul</label>
                                <div>
                                    <input type="text" name="title" class="form-control" aria-describedby="emailHelp" placeholder="Input Posisi" value="{{ $contents->title }}">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">Sumber Konten</label>
                                <select class="form-control" id="konten" name="konten">
                                    <option value="Agency Luar" {{ $contents->konten == "Agency Luar" ? 'selected' : '' }}>Agency Luar</option>
                                    <option value="ccp" {{ $contents->konten == "ccp" ? 'selected' : '' }}>ccp</option>
                                    <option value="cwm" {{ $contents->konten == "cwm" ? 'selected' : '' }}>cwm</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">Upload Konten Gambar</label>
                                <div class="input-group">
                                    <input type="file" class="form-control" id="gambar" name="gambar" accept="image/png, image/jpeg">
                                    <button class="btn btn-outline-secondary" type="button" id="upload-button">Upload</button>
                                </div>
                                <small class="form-hint">File max 2mb dengan format PNG, JPG, JPEG</small>
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
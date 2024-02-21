<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/rowreorder/1.4.1/css/rowReorder.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css">


<style>
    /* styles.css */
    .custom-button {
        display: block;
        width: 100%;
        height: 100%;
        text-align: center;
        line-height: 32px;
        text-decoration: none;
        border-radius: 5px;
        color: white;
        font-size: 12px;
        font-family: Poppins;
        font-weight: 400;
        cursor: pointer;
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
                        <div class="btn-tambahUser mt-4 mb-2">
                            <button type="button" class="btn btn-danger btn-pill" onclick="window.history.back()">Back</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Page body -->
            <div class="page-body">
                <div class="container-xl">
                    <form class="card" action="/saveWeb" method="POST" enctype="multipart/form-data">
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
                                <label class="form-label">Judul</label>
                                <div>
                                    <input type="text" name="sub" class="form-control" aria-describedby="emailHelp" placeholder="Input Judul">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Description</label>
                                <textarea id="deskripsi" name="deskripsi" class="form-control" placeholder="Here can be your description"></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">Upload Konten Gambar</label>
                                <div class="input-group">
                                    <input type="file" class="form-control" id="gambar" name="gambar" accept="image/png, image/jpeg">
                                    <button class="btn btn-outline-secondary" type="button" id="upload-button">Upload</button>
                                </div>
                                <small class="form-hint">File max 2mb dengan format PNG, JPG, JPEG</small>
                            </div>
                            <div class="footer">
                                <button type=" submit" class="btn btn-success btn-pill">Submit</button>
                                <button type="reset" class="btn btn-secondary btn-pill"">Reset</button>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Sweet Alert -->
@include('sweetalert::alert')
<script src=" https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
                                    <script>
                                        ClassicEditor
                                            .create(document.querySelector('#deskripsi'))
                                            .catch(error => {
                                                console.error(error);
                                            });
                                    </script>

                                    @include('dash.footer')
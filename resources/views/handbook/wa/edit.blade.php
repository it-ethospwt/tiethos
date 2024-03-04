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
                    <form class="card" action="\wstoreChange\{{ $wa->wa_id }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label required">Produk</label>
                                <select class="form-control" name="product_id" id="product_id">
                                    @foreach ($product as $p)
                                    <option value="{{ $p->id }}" {{ $p->id == $wa->product_id ? 'selected' : '' }}>{{ $p->nm_product }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">Judul</label>
                                <div>
                                    <input type="text" name="sub" class="form-control" aria-describedby="emailHelp" placeholder="Input Posisi" value="{{ $wa->sub }}">
                                </div>
                            </div>
                            <!-- <div class="form-group mb-3">
                                <label for="deskripsi" class="mb-3">Deskripsi <span style="color:red">*</span></label>
                                <textarea class="form-control" name="deskripsi" id="summernote">{{ $wa->deskripsi }}</textarea>
                                @if($errors->has('deskripsi'))
                                <div class="text-danger">
                                    {{ $errors->first('deskripsi') }}
                                </div>
                                @endif
                            </div> -->
                            <div class="mb-3">
                                <label class="form-label">Description</label>
                                <textarea id="deskripsi" name="deskripsi" class="form-control" placeholder="{{ $wa->deskripsi }}" value="{{ $wa->deskripsi }}"></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">Upload Foto Profil</label>
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

<script src=" https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#deskripsi'))
        .catch(error => {
            console.error(error);
        });
</script>
@include('sweetalert::alert')

@include('dash.footer')
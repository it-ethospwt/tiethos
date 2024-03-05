<head>
    <title>{{ $jdl }}</title>

    <style>
        .card {
            border: none !important;
            border: 1px solid #DCE0E5 !important;
        }

        .card-header {
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
                            Edit Produk
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
                            <h3 class="card-title">Form Edit Data Produk</h3>
                        </div>
                        <div class="card-body">
                            <form method="post" action="\storeEdit\{{ $data->id }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group mb-3">
                                    <label for="nm_product" class="mb-3">Nama Product<span style="color:red">*</span></label>
                                    <input type="text" name="nm_product" id="nm_product" value="{{ $data->nm_product }}" class="form-control">
                                    @if($errors->has('nm_product'))
                                    <div class="text-danger">
                                        {{ $errors->first('nm_product') }}
                                    </div>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <label for="file" class="mb-3">Gambar Produk</label>
                                    <input type="file" name="file" id="file" class="form-control">
                                    <label style="font-size: 13px;margin-top:10px">File maksimal 5MB(PNG,JPG,JPEG,WPEG)</label>
                                    @if($errors->has('file'))
                                    <div class="text-danger">
                                        {{ $errors->first('file') }}
                                    </div>
                                    @endif
                                </div> 
                                <div class="form-group">
                                    <input type="submit" value="Update" class="btn btn-Success btn-pill">
                                    <a href="/produk" class="btn btn-dark btn-pill">Kembali</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('dash.footer')
</div>
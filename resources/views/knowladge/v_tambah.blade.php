<head>
    <title>{{ $jdl }}</title>

    <!-- include libraries(jQuery, bootstrap) -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <!-- include summernote css/js -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
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
                                {{ $jdl }}
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
                            <h3 class="card-title">Form Tambah Data Produk</h3>
                        </div>
                        <div class="card-body"> 
                            <form method="post" action="/storeKnowladge">
                                @csrf
                                <div class="form-group mb-3">
                                    <label for="product_id" class="mb-3">Nama Product<span style="color:red">*</span></label>
                                    <select name="product_id" id="product_id" class="form-select">
                                        <option selected>-- Pilih  Product --</option>
                                        @foreach($product as $p)
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
                                    <label for="deskripsi" class="mb-3">Deskripsi <span style="color:red">*</span></label>
                                    <textarea class="form-control" name="deskripsi" id="summernote"></textarea>
                                    @if($errors->has('deskripsi'))
                                        <div class="text-danger">
                                            {{ $errors->first('deskripsi') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <input type="submit" value="Simpan" class="btn btn-primary">
                                    <a href="/produk" class="btn btn-dark">Kembali</a>
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

    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                height : 150,
            });
        });
    </script>

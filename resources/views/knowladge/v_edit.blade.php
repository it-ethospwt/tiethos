<head>
    <title>{{ $jdl }}</title>

    <!-- include libraries(jQuery, bootstrap) -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <!-- include summernote css/js -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

    <style>
            .card{
                border: none !important;
                border: 1px solid #DCE0E5 !important ;
            }

            .card-header{
                border-bottom: 1px solid #DCE0E5 !important;
            }

            
            .note-icon-picture,
            .note-icon-video,
            .note-icon-code{
                display: none !important;
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
                            <h3 class="card-title">Form Edit Knowladge</h3>
                        </div>
                        <div class="card-body"> 
                            <form method="post" action="\storeEditKnowladge\{{ $data->id }}">
                                @csrf
                                @method('PUT')
                                <div class="form-group mb-3">
                                    <label for="product_id" class="mb-3">Nama Product<span style="color:red">*</span></label>
                                    <input class="form-control" type="text" name="product_id" value="{{ $data->product->nm_product }}"  id="product_id" readonly>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="deskripsi" class="mb-3">Deskripsi <span style="color:red">*</span></label>
                                    <textarea class="form-control" name="deskripsi" id="summernote">{{ $data->deskripsi }}</textarea>
                                    @if($errors->has('deskripsi'))
                                        <div class="text-danger">
                                            {{ $errors->first('deskripsi') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <input type="submit" value="Update" class="btn btn-success btn-pill">
                                    <a href="/knowladge" class="btn btn-dark btn-pill">Kembali</a>
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

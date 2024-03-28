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
                                Tambah Tim Baru
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
                            <h3 class="card-title">Form Tambah Tim Baru</h3>
                        </div>
                        <div class="card-body">
                            <form method="post" action="{{ route('manageTim.storeTim') }}">
                                @csrf
                                <div class="form-group mb-3">
                                    <label for="nama-tim" class="mb-3">Nama Tim<span style="color:red">*</span></label>
                                    <input type="text" name="nama_tim" id="nama_tim" class="form-control">
                                    @if($errors->has('nama_tim'))
                                    <div class="text-danger">
                                        {{ $errors->first('nama_tim') }}
                                    </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <input type="submit" value="Simpan" class="btn btn-primary">
                                    <a href="{{ route('manageTim.index') }}" class="btn btn-dark btn-pill">Kembali</a>
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

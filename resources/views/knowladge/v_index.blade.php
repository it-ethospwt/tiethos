    <head>
        <title>{{ $jdl }}</title>
        <style>
            .btn-primary{
                background-color: #FF8B03 !important;
            }

            .btn-show{
                background-color: #2989A8 !important;
            }

            .btn-edit{
                background-color: #4ECB71 !important;
                display: flex;
                justify-content: space-between;
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
                                List Knowladge
                            </h2>
                        </div>
                    </div>
                </div>  
            </div>
            
            <div class="container-lg">
                <div class="btn-tambahKnowladge mt-5 mb-4">
                    <a href="/tambahKnowladge" class="btn btn-primary"> <span style="margin-right: 8px;"><i class="fa fa-plus"></i></span> Data Knowladge</a>
                </div>
            </div>
            
            <!-- Page body -->
            <div class="page-body">
                <div class="container-lg">
                    <div class="col-12">
                        <div class="card">
                        <div class="card-body">
                            <div class="row g-0" style="display:flex; gap:51px; ">
                                    @foreach( $data as $d)
                                        @if($d->product && $imageUrls[$d->product->file])
                                            <div class="col-md-2" style="border: 1px solid #DCE0E5; border-radius:5px;display:flex;align-items:center;flex-direction:column">
                                                <img src="{{ $imageUrls[$d->product->file] }}" alt="" class="card-img-top" height="210">
                                                    <h3 class="text-center mb-2 mt-2 p-1">{{ $d->product->nm_product }}</h3>
                                                    <!-- <p class="text-center">{{ $d->deskripsi }}</p> -->
                                                <div class="col d-flex align-center flex-column" style="width: 80%;">
                                                    <a href="/show/{{ $d->id }}" class="btn btn-show text-white mb-3"><i class="fa-regular fa-eye fa-sm" style="color:#fff;margin-right:5px;"></i>Lihat</a>
                                                    <a href="#" class="btn btn-edit text-white w-100 mb-3"><i class="fa-solid fa-edit fa-sm" style="color:#fff;margin-right:5px;"></i>Edit</a>
                                            </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                                 <!-- link untuk membuat penomeran  Halaman -->
                                    <div class="d-flex justify-content-center mt-5" style="width: 100%;">
                                            {{ $data ->links() }}
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        @include('dash.footer')

         <!-- Sweet Alert -->
         @include('sweetalert::alert')
    


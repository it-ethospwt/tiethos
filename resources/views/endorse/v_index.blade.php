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
            
            .btn-primary{
                background-color: #FF8B03 !important;
            }

            .btn-ig{
               background-image: url("{{ asset('background-instagram.png') }}");
               background-position: center;
               background-repeat: no-repeat;
               background-size: cover;
            }

            .btn-tiktok{
                background-color: #010101 !important;
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
                                List Endorse
                            </h2>
                        </div>
                    </div>
                </div>  
            </div>

            <div class="container-lg">
                <div class="btn-tambahProduk mt-4 mb-3">
                    <a href="/tambahEndorse(instagram)" class="btn btn-primary"> <span style="margin-right: 8px;"><i class="fa fa-plus"></i></span> Endoser</a>
                </div>
            </div>
        
            <!-- Page body -->
            <div class="page-body">
                <div class="container-lg">
                    <div class="col-12">
                        <div class="card">
                        <div class="card-body">
                            <div class="row g-0" style="display:flex; gap:51px;">
                            @foreach($produk as $p) 
                                <div class="col-md-2" style="border: 1px solid #DCE0E5; border-radius:5px;display:flex;align-items:center;flex-direction:column">
                                        @if(isset($imageUrls[$p->id]))
                                        <img src="{{ $imageUrls[$p->id] }}" alt="Gambar Produk"  class="card-img-top" height="210">
                                        @endif
                                        <h2 class="text-center mb-3 mt-3 p-1">{{ $p->nm_product }}</h2>
                                        <div class="col d-flex align-center flex-column" style="width: 80%;">
                                            <a href="/endorse(instagram)?product_id={{ $p->id }}" class="btn btn-ig btn-pill text-white fw-normal mb-3">
                                                <i class="fa-brands fa-instagram fa-sm" style="color: #ffffff;margin-right:5px;">
                                            </i>Instagram 
                                                [{{ count($countEndorsByProduk[$p->id])  }}]
                                            </a>
                                            <a href="#" class="btn btn-tiktok btn-pill text-white fw-normal mb-3"><i class="fa-brands fa-tiktok fa-sm" style="color: #ffffff;margin-right:5px;"></i>Tiktok[0]</a>
                                        </div>
                                </div>
                                @endforeach
                                </div>
                                 <!-- link untuk membuat penomeran  Halaman -->
                                    <div class="d-flex justify-content-center mt-5" style="width: 100%;">
                                    {{ $produk->links(); }} 
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



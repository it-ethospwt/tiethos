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

            .btn-darke{
                background-color: #2989A8 !important;
                color: #fff !important;
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
                    <div class="col-12">
                        <!-- <div class="card"> -->
                        <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3 mb-3">
                                    <div class="card">
                                        <div class="card-body">
                                        <div class="d-flex flex-column align-items-center text-center">
                                            @if(isset($imageUrls[$endor->id ]))
                                            <img src="{{ $imageUrls[$endor->id] }}" alt="" class="rounded-circle" width="180">
                                            @endif
                                            <div class="mt-3">
                                            <h2>{{ $endor->nm_endorse }}</h2>
                                            <p class="text-secondary mb-1" style="color:#FF8B03 !important">{{ $endor->spesifikasi_akun }}</p>
                                            <p></p>
                                                <div class="row">
                                                     <div class="col-sm-6">
                                                        <p>Viewer</p>
                                                     </div>
                                                     <div class="col-sm-6">
                                                        <p class="text-secondary">{{ $endor->viewer }}</p>
                                                     </div>                   
                                                </div>
                                                <div class="row">
                                                     <div class="col-sm-6">
                                                        <p>Like</p>
                                                     </div>
                                                     <div class="col-sm-6">
                                                        <p class="text-secondary"> {{ $endor->like }} </p>
                                                     </div>                   
                                                </div>
                                                <div class="row">
                                                     <div class="col-sm-6">
                                                        <p>Follower</p>
                                                     </div>
                                                     <div class="col-sm-6">
                                                        <p class="text-secondary">{{ $endor->follower }}</p>
                                                     </div>                   
                                                </div>
                                                <div class="row">
                                                     <div class="col-sm-6">
                                                        <p>Create</p>
                                                     </div>
                                                     <div class="col-sm-6">
                                                        <p class="text-secondary">{{ $endor->created_at->format('d-m-Y H:i') }}</p>
                                                     </div>                   
                                                </div>
                                                <div class="row">
                                                     <div class="col-sm-6">
                                                        <p>Update</p>
                                                     </div>
                                                     <div class="col-sm-6">
                                                        <p class="text-secondary">{{ $endor->updated_at->format('d-m-Y H:i')  }}</p>
                                                     </div>                   
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    
                                    </div>
                                    <div class="col-md-9">
                                    <div class="card mb-3">
                                        <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                Akun Sosmed
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <em><a href="{{ $endor->link_akun }}" target="_blank" >{{ $endor->link_akun }}</a></em>
                                            </div>
                                        </div>
                                        <hr style="border-color: 1px solid #E8EEF3; margin-top:20px; margin-bottom:20px;">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                Usia
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                {{ $endor->usia }} Tahun
                                            </div>
                                        </div>
                                        <hr style="border-color: 1px solid #E8EEF3; margin-top:20px; margin-bottom:20px;">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                Jenis Kelamin 
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                {{ $endor->jns_kelamin }}
                                            </div>
                                        </div>
                                        <hr style="border-color: 1px solid #E8EEF3; margin-top:20px; margin-bottom:20px;">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                Kontak Person
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                {{ $endor->kontak_person }}
                                            </div>
                                        </div>
                                        <hr style="border-color: 1px solid #E8EEF3; margin-top:20px; margin-bottom:20px;">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                Alamat
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                {{ $endor->alamat }}
                                            </div>
                                        </div>
                                        <hr style="border-color: 1px solid #E8EEF3; margin-top:20px; margin-bottom:20px;">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                Kategori  Endorse
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                {{ $endor->kategori }}
                                            </div>
                                        </div>
                                        <hr style="border-color: 1px solid #E8EEF3; margin-top:20px; margin-bottom:20px;">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                Rate Card
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                Rp.{{ $endor->rate_card }}
                                            </div>
                                        </div>
                                        <hr style="border-color: 1px solid #E8EEF3; margin-top:20px; margin-bottom:20px;">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                Engagement Rate
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                {{ $endor->engagement_rate }}
                                            </div>
                                        </div>
                                        <hr style="border-color: 1px solid #E8EEF3; margin-top:20px; margin-bottom:20px;">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                Owning 
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                {{ $endor->owning }}
                                            </div>
                                        </div>
                                        <hr style="border-color: 1px solid #E8EEF3; margin-top:20px; margin-bottom:20px;">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                Deskripsi
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                {{ $endor->deskripsi }}
                                            </div>
                                        </div>
                                        <hr style="border-color: 1px solid #E8EEF3; margin-top:20px; margin-bottom:40px;">
                                           
                                        <div class="row">
                                            <div class="col-sm-12">
                                            <a class="btn btn-primary btn-pill" href="/tambahFile(instagram)/{{ $endor->id }}"><i class="fa fa-plus fa-sm" style="margin-right: 5px;"></i>File Foto</a>
                                            <a class="btn btn-darke btn-pill" href="/tambahVideo/{{ $endor->id }} "><i class="fa fa-plus fa-sm" style="margin-right: 5px;"></i>File Video</a>
                                            </div>
                                        </div>


                                        <div class="row mt-5">
                                            <div class="col-sm-12">
                                                <h3>File Gambar</h3>
                                            </div>
                                            <div class="col-sm-0">
                                            
                                            <div class="row g-0" style="display:flex; gap:110px; ">
                                                 @foreach($file_gambar as $fg)
                                                <div class="col-md-5" style="border: 1px solid #DCE0E5; border-radius:5px;display:flex;align-items:center;flex-direction:column">
                                                    @if(isset($file_imageUrls[$fg->id]))
                                                    <img src="{{  $file_imageUrls[$fg->id] }}" alt="" class="card-img-top" height="280">
                                                    @endif
                                                    <div class="d-flex align-center flex-row">
                                                        <a href="/download_file/{{ $fg->id }}" class="btn btn-darke text-white m-3 p-2"><i class="fa-solid fa-download" style="color:#fff;"></i></a>
                                                        <a href="/hapus_file/{{ $fg->id }}" class="btn btn-danger text-white m-3 p-2"><i class="fa-solid fa-trash " style="color:#fff;"></i></a>
                                                    </div>
                                                </div>
                                               @endforeach
                                            </div>
                                        
                                            </div>
                                        </div>
                                        <hr style="border-color: 1px solid #E8EEF3; margin-top:20px; margin-bottom:20px;">

                                        <div class="row mt-5">
                                            <div class="col-sm-12">
                                                <h3>File Video</h3>
                                            </div>
                                            <div class="col-sm-0">
                                            
                                            <div class="row g-0" style="display:flex; gap:110px; ">
                                                @foreach($file_video as $fv)
                                                <div class="col-md-5" style="border: 1px solid #DCE0E5; border-radius:5px;display:flex;align-items:center;flex-direction:column">
                                                @if(isset($file_videoUrls[$fv->id]))
                                                <video width="100%" height="280" controls> 
                                                    <source src="{{ $file_videoUrls[$fv->id] }}" type="video/mp4">
                                                    <source src="{{ $file_videoUrls[$fv->id] }}" type="video/quicktime">
                                                     Your browser does not support the video tag.
                                                </video>
                                                @endif

                                                    <div class="d-flex align-center flex-row">
                                                        <a href="/hapus_fileVideo/{{ $fv->id }}" class="btn btn-danger text-white m-3 p-2"><i class="fa-solid fa-trash " style="color:#fff;"></i></a>
                                                    </div>
                                                </div>
                                                @endforeach
                                                
                                            </div>
                                        
                                            </div>
                                        </div>
                                        <hr style="border-color: 1px solid #E8EEF3; margin-top:20px; margin-bottom:20px;">

                                        </div>
                                    </div>
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

    



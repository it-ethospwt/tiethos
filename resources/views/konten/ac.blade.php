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
                        <h2 class="page-title">
                            {{$jdl}}
                        </h2>
                        <div class="btn-tambahUser mt-4 mb-2">
                            <button type="button" class="btn btn-danger btn-pill" onclick="window.history.back()">Back</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page body -->
        <div class="page-body">
            <div class="container-xl">
                <div class="row row-cards">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <ul class="nav nav-tabs card-header-tabs" data-bs-toggle="tabs">
                                    <li class="nav-item">
                                        <a href="#tabs-home-1" class="nav-link active" data-bs-toggle="tab"><span style="margin-right: 8px;"><i class="fa fa-image"></i></span>Gambar</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#tabs-profile-1" class="nav-link" data-bs-toggle="tab"><span style="margin-right: 8px;"><i class="fa fa-video"></i></span>Video</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="tab-pane active show" id="tabs-home-1">
                                        <div class="row">
                                            <div class="row">
                                                @foreach ($contents as $k)
                                                @if (!empty($k->gambar) && $k->konten == "cwm")
                                                <div class="col-md-6 col-lg-3 mb-3">
                                                    <div class="card">
                                                        <!-- Photo -->
                                                        @if(isset($imageUrls[$k->content_id ]))
                                                        <div class="img-responsive img-responsive-21x9 card-img-top" style="background-image: url('{{ $imageUrls[$k->content_id] }}'); height: 150px;"></div>
                                                        @endif
                                                        <div class="card-body">
                                                            <h3 class="card-title">{{$k->title}}</h3>
                                                            <div class="row g-2 justify-content-center">
                                                                <div class="col-6 col-sm-4 col-md-2 col-xl-auto py-3">
                                                                    <a href="{{ url('unduh/'.$k->content_id) }}" class="btn btn-success"><i class="fa fa-download"></i></a>
                                                                </div>
                                                                <div class="col-6 col-sm-4 col-md-2 col-xl-auto py-3">
                                                                    <a href="/ubah/{{ $k->content_id }}" class="btn btn-primary">
                                                                        <i class="fas fa-edit"></i>
                                                                    </a>
                                                                </div>
                                                                <div class="col-6 col-sm-4 col-md-2 col-xl-auto py-3">
                                                                    <a href="/delete/{{ $k->content_id }}" class="btn btn-danger">
                                                                        <i class="fas fa-trash"></i>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                @endif
                                                @endforeach

                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tabs-profile-1">
                                        <div class="row">
                                            <div class="row">
                                                @foreach ($contents as $k)
                                                @if (!empty($k->video) && $k->konten == "cwm")
                                                <div class="col-md-6 col-lg-3 mb-3">
                                                    <div class="card">
                                                        <!-- Video -->
                                                        <div class="card-img-top">
                                                            @if(isset($videoUrls[$k->content_id ]))
                                                            <video controls style="width:100%; height:150px;">
                                                                <source src="{{ $videoUrls[$k->content_id] }}" type="video/mp4">
                                                                Your browser does not support the video tag.
                                                            </video>
                                                            @endif
                                                        </div>
                                                        <div class="card-body">
                                                            <h3 class="card-title">{{$k->title}}</h3>

                                                            <div class="row g-2 justify-content-center">
                                                                <div class="col-6 col-sm-4 col-md-2 col-xl-auto py-3">
                                                                    <a href="{{ url('unduh/'.$k->content_id) }}" class="btn btn-success"><i class="fa fa-download"></i></a>
                                                                </div>
                                                                <div class="col-6 col-sm-4 col-md-2 col-xl-auto py-3">
                                                                    <a href="/ganti/{{ $k->content_id }}" class="btn btn-primary">
                                                                        <i class="fas fa-edit"></i>
                                                                    </a>
                                                                </div>
                                                                <div class="col-6 col-sm-4 col-md-2 col-xl-auto py-3">
                                                                    <a href="/delete/{{ $k->content_id }}" class="btn btn-danger">
                                                                        <i class="fas fa-trash"></i>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endif
                                                @endforeach

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('sweetalert::alert')

<!-- <script src="/dist/js/tabler.min.js?1684106062" defer></script>
<script src="/dist/js/demo.min.js?1684106062" defer></script> -->


@include('dash.footer')
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
                            Detail {{$jdl}}
                        </h2>
                        <div class="col col-sm-2 col-md-2 col-xl py-3">
                            <a href="javascript:history.back()" class="btn btn-ghost-warning active w-100">
                                <span style="margin-right: 8px;"></span>Kembali
                            </a>
                        </div>
                        <!-- <div class="col col-sm-2 col-md-2 col-xl py-3">
                            <a href="#navbar-help" class="btn btn-ghost-warning active w-100" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false"> <span style="margin-right: 8px;"><i class="fa fa-plus"></i></span> Konten</a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="/konten/tambah">
                                    Gambar
                                </a>
                                <a class="dropdown-item" href="/konten/plus">
                                    Vidio
                                </a>
                            </div>
                        </div> -->
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
                                        <a href="#tabs-home-1" class="nav-link active" data-bs-toggle="tab">Gambar</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#tabs-profile-1" class="nav-link" data-bs-toggle="tab">Video</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="tab-pane active show" id="tabs-home-1">
                                        <div class="row">
                                            <div class="row">
                                                @foreach ($contents as $k)
                                                @if (!empty($k->gambar) && $k->konten == "Agency Luar")
                                                <div class="col-md-6 col-lg-3 mb-3">
                                                    <div class="card">
                                                        <!-- Photo -->
                                                        <div class="img-responsive img-responsive-21x9 card-img-top" style="background-image: url('{{ asset('public_imgTest/'.$k->gambar) }}'); height: 150px;"></div>
                                                        <div class="card-body">
                                                            <h3 class="card-title">{{$k->title}}</h3>
                                                            <div class="row g-2 justify-content-center">
                                                                <div class="col-6 col-sm-4 col-md-2 col-xl-auto py-3">
                                                                    <a href="{{ asset('public_imgTest/'.$k->gambar) }}" download="konten.jpg" class="btn btn-success">
                                                                        <i class="fas fa-download"></i>
                                                                    </a>
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
                                                @if (!empty($k->video) && $k->konten == "Agency Luar")
                                                <div class="col-md-6 col-lg-3 mb-3">
                                                    <div class="card">
                                                        <!-- Video -->
                                                        <div class="card-img-top">
                                                            <video controls style="width:100%; height:150px;">
                                                                <source src="{{ asset('public_videoTest/'.$k->video) }}" type="video/mp4">
                                                                Your browser does not support the video tag.
                                                            </video>
                                                        </div>
                                                        <div class="card-body">
                                                            <h3 class="card-title">{{$k->title}}</h3>
                                                            <div class="row g-2 justify-content-center">
                                                                <div class="col-6 col-sm-4 col-md-2 col-xl-auto py-3">
                                                                    <a href="{{ asset('public_videoTest/'.$k->video) }}" download="konten.mp4" class="btn btn-success">
                                                                        <i class="fas fa-download"></i>
                                                                    </a>
                                                                </div>
                                                                <div class="col-6 col-sm-4 col-md-2 col-xl-auto py-3">
                                                                    <a href="/edit/{{ $k->content_id }}" class="btn btn-primary">
                                                                        <i class="fas fa-edit"></i>
                                                                    </a>
                                                                </div>
                                                                <div class="col-6 col-sm-4 col-md-2 col-xl-auto py-3">
                                                                    <a href="/hapus/{{ $k->content_id }}" class="btn btn-danger">
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
        <footer class="footer footer-transparent d-print-none">
            <div class="container-xl">
                <div class="row text-center align-items-center flex-row-reverse">
                    <div class="col-lg-auto ms-lg-auto">
                        <ul class="list-inline list-inline-dots mb-0">
                            <li class="list-inline-item"><a href="https://tabler.io/docs" target="_blank" class="link-secondary" rel="noopener">Documentation</a></li>
                            <li class="list-inline-item"><a href="./license.html" class="link-secondary">License</a></li>
                            <li class="list-inline-item"><a href="https://github.com/tabler/tabler" target="_blank" class="link-secondary" rel="noopener">Source code</a></li>
                            <li class="list-inline-item">
                                <a href="https://github.com/sponsors/codecalm" target="_blank" class="link-secondary" rel="noopener">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/heart -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon text-pink icon-filled icon-inline" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" />
                                    </svg>
                                    Sponsor
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-12 col-lg-auto mt-3 mt-lg-0">
                        <ul class="list-inline list-inline-dots mb-0">
                            <li class="list-inline-item">
                                Copyright &copy; 2023
                                <a href="." class="link-secondary">Tabler</a>.
                                All rights reserved.
                            </li>
                            <li class="list-inline-item">
                                <a href="./changelog.html" class="link-secondary" rel="noopener">
                                    v1.0.0-beta19
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>
<!-- Libs JS -->
<!-- Tabler Core -->
<script src="/dist/js/tabler.min.js?1684106062" defer></script>
<script src="/dist/js/demo.min.js?1684106062" defer></script>
</body>
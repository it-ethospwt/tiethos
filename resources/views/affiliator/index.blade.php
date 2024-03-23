<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/rowreorder/1.4.1/css/rowReorder.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css">


<style>
    .btn-black {
        background-color: black;
        color: white;
        /* Tambahkan properti CSS lainnya sesuai kebutuhan */
        /* Misalnya: padding, border, dll. */
    }

    .button-container {
        width: 100%;
        margin-top: 5px;
        /* Adjust the margin as needed */
    }

    .button-container .btn {
        width: 100%;
        /* Adjust button width */
    }

    .image-container {
        position: relative;
        width: 100%;
        padding-bottom: 100%;
        /* 1:1 Aspect Ratio */
        overflow: hidden;
    }

    .image-container img {
        position: absolute;
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
</style>
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
                        <div class="col col-sm-2 col-md-1 col-xl py-3">
                            <a href="affiliator/tambah" class="btn btn-warning btn-pill mt-2"><span style="margin-right: 8px;"><i class="fas fa-plus"></i></span>{{$jdl}}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-body">
            <div class="container-xl">
                <div class="row row-cards">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-body">
                                    <div class="row">
                                        @foreach ($product as $p)
                                        <?php $hasKONTEN = false; ?>
                                        <?php foreach ($affiliator as $a) : ?>
                                            <?php if ($a['produk_id'] == $p['id']) {
                                                $hasKONTEN = true;
                                                break;
                                            } ?>
                                        <?php endforeach; ?>

                                        <?php if ($hasKONTEN) : ?>
                                            <div class="col-sm-6 col-lg-3 mb-3">
                                                <div class="card">
                                                    <!-- Apply a container div to maintain aspect ratio -->
                                                    <div class="image-container">
                                                        @if(isset($imageUrls[$p->id ]))
                                                        <img src="{{ $imageUrls[$p->id] }}" alt="Gambar Produk">
                                                        @endif
                                                    </div>
                                                    <div class="card-body text-center">
                                                        <h3 class="card-title">{{$p->nm_product}}</h3>
                                                        <div class="button-container">
                                                            <a href="#navbar-help" class="btn btn-dark btn-pill mt-2" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false"><span style="margin-right: 8px;"><i class="fab fa-tiktok"></i></span>TIKTOK</a>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item" href="{{ route('affiliator.purwokerto.index', $p->id) }}">
                                                                    TikTok Purwokerto
                                                                </a>
                                                                <a class="dropdown-item" href="{{ route('affiliator.cilacap.index', $p->id) }}">
                                                                    TikTok Cilacap
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                        @endforeach
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            {{ $product->links('pagination::bootstrap-5') }}
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
    @include('dash.footer')
    <!-- Sweet Alert -->
    @include('sweetalert::alert')
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/rowreorder/1.4.1/js/dataTables.rowReorder.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>

    <script>
        new DataTable('#table-hakAkses', {
            responsive: true,
            rowReorder: {
                selector: 'td:nth-child(2)'
            }
        });
    </script>
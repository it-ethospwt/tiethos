<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/rowreorder/1.4.1/css/rowReorder.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css">


<style>
    /* styles.css */
    /* .custom-button {
            display: block;
            width: 100%;
            height: 100%;
            text-align: center;
            line-height: 32px;
            text-decoration: none;
            border-radius: 5px;
            color: white;
            font-size: 12px;
            font-family: Poppins;
            font-weight: 400;
            cursor: pointer;
        } */
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
                                        <div class="col-sm-6 col-lg-3 mb-3">
                                            <div class="card">
                                                <!-- Apply a container div to maintain aspect ratio -->
                                                <div class="image-container">
                                                    <img src="{{ asset('/public_imgTest/' . $p->gmr_product) }}" alt="Gambar Produk">
                                                </div>
                                                <div class="card-body text-center">
                                                    <h3 class="card-title">{{$p->nm_Product}}</h3>
                                                    <div class="button-container">
                                                        <a href="{{ route('handbook.wa.index', $p->id) }}" class="btn btn-success btn-pill mt-2">Interaksi Whatsapp</a>
                                                    </div>
                                                    <div class="button-container">
                                                        <a href="{{ route('handbook.web.index', $p->id) }}" class="btn btn-info btn-pill mt-2">Konversi Web</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
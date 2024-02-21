<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/rowreorder/1.4.1/css/rowReorder.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css">


<style>
    /* styles.css */
    .custom-button {
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
    }
</style>

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
            <!-- Page body -->
            <div class="page-body">
                <div class="container-xl">
                    <div class="row justify-content-center">
                        <div class="col-lg-10 col-xl-12">
                            <div class="card card-lg">
                                <div class="card-body markdown">
                                    <h1 id="whos-that-then"> {{ $wa->sub }}</h1>
                                    <p><img src="{{ asset('/public_imgTest/' . $wa->gambar) }}" alt="Image Alt" /></p>
                                    <p>{!! $wa->deskripsi !!}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
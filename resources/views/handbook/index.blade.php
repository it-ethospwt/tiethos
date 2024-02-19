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
                            HANDBOOK {{$jdl}}
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
                                        <div class="col-sm-6 col-lg-3">
                                            <div style="width: 200px; height: 500px; position: relative">
                                                <div style="width: 200px; height: 350px; left: 0px; top: 0px; position: absolute; background: white; border-radius: 5px; border: 1px #DCE0E5 solid"></div>
                                                <img style="width: 200px; height: 200px; left: 0px; top: 0px; position: absolute; border-top-left-radius: 5px; border-top-right-radius: 5px" src="{{ asset('/dist/img/img/' . $p->gambar) }}" />
                                                <div style="width: 200px; height: 300px; left: 0px; top: 172px; position: absolute">
                                                    <div style="width: 200px; height: 200px; left: 0px; top: 0px; position: absolute; background: white; border-top-left-radius: 5px; border-top-right-radius: 5px; border: 1px #DCE0E5 solid"></div>
                                                    <div style="left: 71px; top: 5px; position: absolute; color: black; font-size: 14px; font-family: Poppins; font-weight: 400; word-wrap: break-word">{{$p->product_name}}</div>
                                                    <div style="width: 163px; height: 32px; left: 19px; top: 53px; position: absolute">
                                                        <a href="{{ route('handbook.wa.index', $p->product_id) }}" class="custom-button" style="background: #4ECB71;">
                                                            Interaksi Whatsapp
                                                        </a>
                                                    </div>
                                                    <div style="width: 163px; height: 32px; left: 19px; top: 98px; position: absolute">
                                                        <a href="#" class="custom-button" style="background: #2989A8;">
                                                            Konversi Web
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @include('dash.footer')
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
<head>
        <title>{{ $jdl }}</title>
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
                                Detail Knowladge
                            </h2>
                        </div>
                    </div>
                </div>  
            </div>
            
            <!-- Page body -->
            <div class="page-body">
                <div class="container-lg">
                    <div class="col-12">
                        <div class="card">
                        <div class="card-body">
                                {!! $data->deskripsi !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        @include('dash.footer')


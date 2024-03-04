<head>

    <!-- CSS DataTables Responsive -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/rowreorder/1.4.1/css/rowReorder.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css">

    <style>
        .card {
            border: none !important;
            border: 1px solid #DCE0E5 !important;
        }

        .card-header {
            border-bottom: 1px solid #DCE0E5 !important;
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
                            LIST {{$jdl}}
                        </h2>
                        <div class="col col-sm-2 col-md-2 col-xl py-3">
                            <a href="#" id="tambahHandbook" class="btn btn-warning btn-pill">
                                <span style="margin-right: 8px;"><i class="fa fa-plus"></i></span>Tambah Handbook
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <br><br>

        <!-- Page body -->
        <div class="card-body">
            <div class="container-lg">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">DATA {{$jdl}} </h3>
                        </div>
                        <div class="card-body">
                            <!-- Table -->
                            <table id="table-produkList" class="display wrap table-sm" style="width:100%">
                                <thead>
                                    <tr style="font-size: 90%;">
                                        <th>No</th>
                                        <th>Judul</th>
                                        <th>Create</th>
                                        <th>Update</th>
                                        <th style="width:18%;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    @foreach ($web as $wb)
                                    <tr style="font-size: 90%;">
                                        <td>{{$no++}}</td>
                                        <td>{{$wb->sub}}</td>
                                        <td>{{$wb->created_at->format('d-m-Y H:i')}}</td>
                                        <td>{{$wb->updated_at->format('d-m-Y H:i')}}</td>
                                        <td>
                                            <a href="{{ route('handbook.web.detail', $wb->web_id)}}" class="btn btn-primary">
                                                <i class="fas fa-search"></i>
                                            </a>
                                            <a href="/wbchange/{{ $wb->web_id }}" class="btn btn-success btn-pill "><i class="fa fa-edit"> </i></a>
                                            <a href="/wbhapus/{{ $wb->web_id }}" class="btn btn-danger btn-pill"><i class="fa fa-trash"> </i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="btn-tambahUser mt-4">
                                <button type="button" class="btn btn-danger btn-pill" onclick="window.history.back()">Back</button>
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
    new DataTable('#table-produkList', {
        responsive: true,
        rowReorder: {
            selector: 'td:nth-child(2)'
        }
    });
</script>
<script>
    var currentURL = window.location.href;

    // Extract the produk_id from the URL
    var matches = currentURL.match(/\/(\d+)\/handbook\/web/);
    var produk_id = matches ? matches[1] : null;

    // Build the new URL for the "Tambah Handbook" link
    var tambahHandbookURL = "/handbook/web/tambah?product_id=" + produk_id;

    // Update the href attribute of the link
    document.getElementById("tambahHandbook").setAttribute("href", tambahHandbookURL);
</script>
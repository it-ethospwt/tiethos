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
                            List Produk
                        </h2>
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
                            <h3 class="card-title">Data Produk</h3>
                        </div>
                        <div class="card-body">
                            <div class="btn-tambahProduk mt-2 mb-5">
                                <a href="\tambah" class="btn btn-primary"> <span style="margin-right: 8px;"><i
                                            class="fa fa-plus"></i></span>
                                    Data Produk</a>
                            </div>

                            <!-- Table -->
                            <table id="table-produkList" class="display wrap table-sm" style="width:100%">
                                <thead>
                                    <tr style="font-size: 90%;">
                                        <th>No</th>
                                        <th style="width:13%;text-align: center;">Gambar</th>
                                        <th>Nama Produk</th>
                                        <th>Created At</th>
                                        <th>Updated At</th>
                                        <th style="width:18%;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    @foreach( $data as $d)
                                    <tr style="font-size: 90%;">
                                        <td>{{$no++}}</td>
                                        <td align="center">
                                            @if(isset($imageUrls[$d->id ]))
                                            <img src="{{ $imageUrls[$d->id] }}" alt="Gambar Produk" width="80px">
                                            @endif
                                        </td>
                                        <td>{{ $d->nm_product }}</td>
                                        <td>{{ $d->created_at->format('d-m-Y H:i') }}</td>
                                        <td>{{ $d->updated_at->format('d-m-Y H:i') }}</td>
                                        <td>
                                            <a href="{{ url('download/'.$d->id) }}" class="btn btn-primary"><i
                                                    class="fa fa-download"></i></a>
                                            <a href="edit/{{ $d->id }}" class="btn btn-success btn-pill "><i
                                                    class="fa fa-edit"> </i></a>
                                            <a href="hapus/{{ $d->id }}" class="btn btn-danger btn-pill"><i
                                                    class="fa fa-trash"> </i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- /Table -->
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
<head>

    <!-- CSS DataTables Responsive -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/rowreorder/1.4.1/css/rowReorder.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css">

    <style>
        .image-zoom-container {
            position: relative;
        }

        .zoomable-img {
            z-index: 500;
            cursor: pointer;
            transition: transform 0.90s ease;
        }

        .zoomable-img:hover {
            transform: scale(3.4);
        }
    </style>
</head>

<!-- <script src="./dist/js/demo-theme.min.js?1684106062"></script>  -->
<div class="page">
    <!-- Navbar -->
    <x-dash.header />
    <x-dash.menu />
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
    </div>
    <!-- Page body -->
    <div class="page-body">
        <div class="container-lg">
            <!-- <div class="row row-deck row-cards"> -->
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Produk</h3>
                    </div>
                    <div class="card-body">
                        <<<<<<< HEAD <div class="btn-tambahProduk mt-5 mb-5">
                            <a href="#" class="btn btn-primary"> <span style="margin-right: 8px;"><i
                                        class="fa fa-plus"></i></span> Data Produk</a>
                    </div>
                    <!-- Table -->
                    <table id="table-hakAkses" class="display nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Gambar</th>
                                <th>Nama Produk</th>
                                <th>Deskripsi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @for($i=0; $i < 50; $i++) <tr>
                                <td align="center">1.</td>
                                <td>Rizal Salpatura</td>
                                <td align="center"><a href="detailAnggota.php"><button class="btn btn-sm"
                                            id="btn-detail"><i class="fa-solid fa-magnifying-glass fa-sm"
                                                style="color: #9C9C9A;margin-right : 5px;"></i>Lihat</button></a>
                                </td>
                                <td>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" role="switch"
                                            id="flexSwitchCheckChecked">
                                    </div>
                                </td>
                                <td></td>
                                </tr>
                                @endfor
                        </tbody>
                    </table>
                    <!-- /Table -->

                </div>
            </div>
        </div>

        <!-- </div> -->
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
        =======
        <div class="btn-tambahProduk mt-3 mb-5">
            <a href="\tambah" class="btn btn-primary"> <span style="margin-right: 8px;"><i
                        class="fa fa-plus"></i></span> Data Produk</a>
        </div>
        <!-- Table -->
        <table id="table-produkList" class="display wrap table-sm" style="width:100%">
            <thead>
                <tr style="font-size: 90%;">
                    <th>No</th>
                    <th style="width:13%;text-align: center;">Gambar</th>
                    <th>Nama Produk</th>
                    <th style="width:25%">Deskripsi</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                @foreach( $data as $d)
                <tr style="font-size: 90%;">
                    <td>{{$no++}}</td>
                    <td align="center">
                        <img src="public_imgTest/{{ $d->gmr_product }}" class="zoomable-img" alt="Gambar Produk"
                            width="80px">
                    </td>
                    <td>{{ $d->nm_product }}</td>
                    <td>{{ $d->dec_product }}</td>
                    <td>{{ $d->created_at->format('d-m-Y H:i') }}</td>
                    <td>{{ $d->updated_at->format('d-m-Y H:i') }}</td>
                    <td>
                        <a href="edit/{{ $d->id }}" class="btn btn-success"><i class="fa fa-edit"> </i></a>
                        <a href="hapus/{{ $d->id }}" class="btn btn-danger"><i class="fa fa-trash"> </i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <!-- /Table -->
    </div>
</div>
</div>

<x-dash.footer />
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
>>>>>>> e6f79a6b35a916d4e812770dbf01d1dcd78c9c8a
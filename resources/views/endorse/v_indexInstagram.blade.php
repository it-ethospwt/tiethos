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

        .btn-search{
            background-color: #2989A8 !important;
            border :1px  solid #fff !important;
        }

        .btn-primary{
                background-color: #FF8B03 !important;
                color: #fff !important;
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
                            @if($endor->isNotEmpty()) <!-- Memastikan Koleksi  Tidak Kosong -->
                                Instagram({{ $endor[0]->product->nm_product }}) <!-- Mengakses Properti Item Dari Koleksi pertama -->
                            @endif 
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
                            <div class="tittle">
                                <h3>Data Endoser Instagram  @if($endor->isNotEmpty()) Produk {{$endor[0]->product->nm_product }} @endif</h3>
                            </div>
                        </div>
                        <div class="card-body">
                            <!-- Table -->
                            <table id="table-produkList" class="display wrap table-sm" style="width:100%">
                                <thead>
                                    <tr style="font-size: 90%;">
                                        <th>No</th>
                                        <th>Nama Endoser</th>
                                        <th>Kontak Person</th>
                                        <th>Link Akun Sosmed</th>
                                        <th>Owning</th>
                                        <th>Created_at</th>
                                        <th style="width:18%;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no = 1;  @endphp
                                    @foreach($endor as  $e)
                                    <tr style="font-size: 90%;">
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $e->nm_endorse }}</td>
                                        <td>{{ $e->kontak_person }}</td>
                                        <td><em><a href="{{ $e->link_akun }}" target="_blank" >{{ $e->link_akun }}</a></em></td>
                                        <td>{{ $e->owning }}</td>
                                        <td>{{ \Carbon\Carbon::parse($e->created_at)->format('d-m-Y | H:m') }}</td>
                                        <td>
                                            <a href="/detailEndoser/{{ $e->id }}" class="btn btn-search btn-pill"><i class="fa fa-search" style="color: #fff;"></i></a>
                                            <a href="/editEndorse/{{ $e->id }}" class="btn btn-success btn-pill "><i class="fa fa-edit"></i></a>
                                            <a href="/hpsEndorse/{{ $e->id }}" class="btn btn-danger btn-pill"><i class="fa fa-trash"></i></a>
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
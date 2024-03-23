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
                                        <th>Nama Affiliator</th>
                                        <th>Kontak Person</th>
                                        <th>Akun Tiktok</th>
                                        <th>Follower</th>
                                        <th>Viewer</th>
                                        <th>Update</th>
                                        <th style="width:18%;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    @foreach( $affiliator as $a)
                                    @if ($a->tim == "Purwokerto")
                                    <tr style="font-size: 90%;">
                                        <td>{{$no++}}</td>
                                        <td>{{ $a->nama }}</td>
                                        <td>{{ $a->cp }}</td>
                                        <td>{{ $a->akun }}</td>
                                        <td>{{ $a->followers }}</td>
                                        <td>{{ $a->viewers }}</td>
                                        <td>{{ $a->updated_at->format('d-m-Y H:i') }}</td>
                                        <td>
                                            <a href="{{ route('affiliator.detail', $a->id)}}" class="btn btn-primary"><i class="fa fa-search"></i></a>
                                            <a href="{{ route('affiliator.edit', $a->id)}}" class="btn btn-success btn-pill "><i class="fa fa-edit"> </i></a>
                                            <a href="/ahapus/{{ $a->id }}" class="btn btn-danger btn-pill"><i class="fa fa-trash"> </i></a>
                                        </td>
                                    </tr>
                                    @endif
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
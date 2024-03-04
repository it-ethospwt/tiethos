<!-- CSS DataTables Responsive -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/rowreorder/1.4.1/css/rowReorder.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css">

<style>
    .small-text {
        font-size: 12px;
        /* Atur ukuran font sesuai kebutuhan */
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
                    </div>
                </div>
            </div>
        </div>
        <!-- Page body -->
        <div class="page-body">
            <div class="container-xl">
                <div class="row row-cards">
                    <div class="col-lg-3">
                        <div class="card">
                            <div class="image-container">
                                @if(isset($imageUrls[$affiliator->id ]))
                                <img src="{{ $imageUrls[$affiliator->id] }}" alt="Gambar Produk">
                                @endif
                            </div>
                            <div class="card-body text-center">
                                <h3 class="card-title">{{ $affiliator->nama }}</h3>
                                <h3 class="card-title"> {{ $affiliator->kategori }}</h3>
                                <table class="table table-vcenter card-table small-text">
                                    <tbody>
                                        <tr>
                                            <td>Viewer</td>
                                            <td class="text-muted">
                                                {{ $affiliator->viewers }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Like</td>
                                            <td class="text-muted">
                                                {{ $affiliator->like }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Follower</td>
                                            <td class="text-muted">
                                                {{ $affiliator->followers }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Created</td>
                                            <td class="text-muted">
                                                {{ $affiliator->created_at }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Update</td>
                                            <td class="text-muted">
                                                {{ $affiliator->updated_at }}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="card">
                            <div class="table-responsive">
                                <table class="table table-vcenter card-table">
                                    <tbody>
                                        <tr>
                                            <td>Akun Tiktok</td>
                                            <td class="text-muted">
                                                {{ $affiliator->akun }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Usia</td>
                                            <td class="text-muted">
                                                {{ $affiliator->usia }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Jenis Kelamin</td>
                                            <td class="text-muted">
                                                {{ $affiliator->jekel }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Kontak Person</td>
                                            <td class="text-muted">
                                                {{ $affiliator->cp }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Alamat</td>
                                            <td class="text-muted">
                                                {{ $affiliator->alamat }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Pendapatan/ GMV</td>
                                            <td class="text-muted">
                                                {{ $affiliator->gmv }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Komisi</td>
                                            <td class="text-muted">
                                                {{ $affiliator->komisi }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Agency</td>
                                            <td class="text-muted">
                                                {{ $affiliator->agency }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Deskripsi</td>
                                            <td class="text-muted">
                                                {{ $affiliator->deskripsi }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><button type="button" class="btn btn-primary" onclick="window.history.back()">Back</button></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('dash.footer')
    <!-- Page body -->
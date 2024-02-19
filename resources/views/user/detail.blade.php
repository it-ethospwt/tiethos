<!-- CSS DataTables Responsive -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/rowreorder/1.4.1/css/rowReorder.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css">


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
                            Detail
                        </h2>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page body -->
        <div class="page-body">
            <div class="container-xl">
                <div class="row row-cards">
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="empty">
                                <div class="empty-img"><img
                                        src="{{ asset('/static/photo_profile/' . $user->user_image) }}" height="128"
                                        alt="">
                                </div>
                                <p class="empty-title">{{ $user->username }}</p>
                                <p class="empty-subtitle text-muted">
                                    Try adjusting your search or filter to find what you're looking for.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="table-responsive">
                                <table class="table table-vcenter card-table">
                                    <tbody>
                                        <tr>
                                            <td>Username</td>
                                            <td class="text-muted">
                                                {{ $user->username }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Jenis Kelamin</td>
                                            <td class="text-muted">
                                                {{ $user->jenis_kelamin }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>No. Telp</td>
                                            <td class="text-muted">
                                            </td>

                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td class="text-muted">
                                                {{ $user->email }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Tim</td>
                                            <td class="text-muted">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Penempatan</td>
                                            <td class="text-muted">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Alamat</td>
                                            <td class="text-muted">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><button type="button" class="btn btn-primary"
                                                    onclick="window.history.back()">Back</button></td>
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
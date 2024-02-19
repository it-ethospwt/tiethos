<!-- CSS DataTables Responsive -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/rowreorder/1.4.1/css/rowReorder.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css">

<style>
    .status-online {
        background-color: green;
        color: white;
        /* Untuk mengubah warna teks agar lebih terlihat pada latar belakang hijau */
        padding: 2px 5px;
        /* Menambahkan sedikit padding agar lebih terlihat */
        border-radius: 5px;
        /* Memberikan sedikit sudut membulat */
    }

    .status-offline {
        background-color: red;
        color: white;
        /* Untuk mengubah warna teks agar lebih terlihat pada latar belakang merah */
        padding: 2px 5px;
        /* Menambahkan sedikit padding agar lebih terlihat */
        border-radius: 5px;
        /* Memberikan sedikit sudut membulat */
    }
</style>


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
                            Dashboard
                        </h2>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page body -->
        <div class="page-body">
            <div class="container-xl">
                <div class="row row-deck row-cards" style="justify-content: space-between;">
                    <div class="col-sm-6 col-lg-3">
                        <div style="width: 278px; height: 125px; position: relative">
                            <div
                                style="width: 248px; height: 118px; left: 30px; top: 0px; position: absolute; background: #FEB602; border-radius: 5px; border: 1px #DCE0E5 solid">
                            </div>
                            <div
                                style="width: 272px; height: 118px; left: 0px; top: 7px; position: absolute; background: white; border-radius: 5px; border: 1px #DCE0E5 solid">
                            </div>
                            <div
                                style="left: 17px; top: 60px; position: absolute; color: #1F2024; font-size: 25px; font-family: Poppins; font-weight: 500; word-wrap: break-word">
                                {{ $totalUsers }}</div>
                            <div
                                style="left: 17px; top: 34px; position: absolute; color: #667382; font-size: 14px; font-family: Poppins; font-weight: 400; word-wrap: break-word">
                                Total User </div>
                            <div style="width: 42px; height: 42px; left: 217px; top: 44px; position: absolute">
                                <div style="width: 42px; height: 42px; left: 0px; top: 0px; position: absolute"></div>
                                <div
                                    style="width: 14px; height: 14px; left: 8.75px; top: 5.25px; position: absolute; border: 2px #ACB2B9 solid">
                                </div>
                                <div
                                    style="width: 21px; height: 10.50px; left: 5.25px; top: 26.25px; position: absolute; border: 2px #ACB2B9 solid">
                                </div>
                                <div
                                    style="width: 5.26px; height: 13.56px; left: 28px; top: 5.48px; position: absolute; border: 2px #ACB2B9 solid">
                                </div>
                                <div
                                    style="width: 5.25px; height: 10.24px; left: 31.50px; top: 26.51px; position: absolute; border: 2px #ACB2B9 solid">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div style="width: 278px; height: 125px; position: relative">
                            <div
                                style="width: 248px; height: 118px; left: 30px; top: 0px; position: absolute; background: #1CA0E1; border-radius: 5px; border: 1px #DCE0E5 solid">
                            </div>
                            <div
                                style="width: 272px; height: 118px; left: 0px; top: 7px; position: absolute; background: white; border-radius: 5px; border: 1px #DCE0E5 solid">
                            </div>
                            <div
                                style="left: 17px; top: 60px; position: absolute; color: #1F2024; font-size: 25px; font-family: Poppins; font-weight: 500; word-wrap: break-word">
                                {{ $totalProduk }}</div>
                            <div
                                style="left: 17px; top: 34px; position: absolute; color: #667382; font-size: 14px; font-family: Poppins; font-weight: 400; word-wrap: break-word">
                                Total List Produk </div>
                            <div style="width: 42px; height: 42px; left: 219px; top: 44px; position: absolute">
                                <div style="width: 42px; height: 42px; left: 0px; top: 0px; position: absolute"></div>
                                <div
                                    style="width: 28px; height: 31.50px; left: 7px; top: 5.25px; position: absolute; border: 2px #ACB2B9 solid">
                                </div>
                                <div
                                    style="width: 14px; height: 7.88px; left: 21px; top: 13.12px; position: absolute; border: 2px #ACB2B9 solid">
                                </div>
                                <div
                                    style="width: 0px; height: 15.75px; left: 21px; top: 21px; position: absolute; border: 2px #ACB2B9 solid">
                                </div>
                                <div
                                    style="width: 14px; height: 7.88px; left: 7px; top: 13.12px; position: absolute; border: 2px #ACB2B9 solid">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div style="width: 278px; height: 125px; position: relative">
                            <div
                                style="width: 248px; height: 118px; left: 30px; top: 0px; position: absolute; background: #2FB344; border-radius: 5px; border: 1px #DCE0E5 solid">
                            </div>
                            <div
                                style="width: 272px; height: 118px; left: 0px; top: 7px; position: absolute; background: white; border-radius: 5px; border: 1px #DCE0E5 solid">
                            </div>
                            <div style="width: 42px; height: 42px; left: 217px; top: 46px; position: absolute">
                                <div style="width: 42px; height: 42px; left: 0px; top: 0px; position: absolute"></div>
                                <div
                                    style="width: 24.50px; height: 24.50px; left: 12.25px; top: 5.25px; position: absolute; border: 2px #ACB2B9 solid">
                                </div>
                                <div
                                    style="width: 24.50px; height: 24.50px; left: 5.25px; top: 12.25px; position: absolute; border: 2px #ACB2B9 solid">
                                </div>
                            </div>
                            <div
                                style="left: 17px; top: 60px; position: absolute; color: #1F2024; font-size: 25px; font-family: Poppins; font-weight: 500; word-wrap: break-word">
                                25</div>
                            <div
                                style="left: 17px; top: 34px; position: absolute; color: #667382; font-size: 14px; font-family: Poppins; font-weight: 400; word-wrap: break-word">
                                Total Content </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">User Yang Sedang Aktif</h3>
                            </div>
                            <div class="card-body">
                                <!-- Table -->
                                <table id="table-userAktif" class="display nowrap" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Posisi</th>
                                            <th>Last Seen</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $onlineUsersCount = 0; @endphp
                                        @foreach($users as $u)
                                        @if($u->last_seen >= now()->subMinutes(2))
                                        <tr>
                                            <td scope="row">{{ ++$onlineUsersCount }}.</td>
                                            <td>{{ $u->name }}</td>
                                            <td>{{ $u->email }}</td>
                                            <td>
                                                {{ Carbon\Carbon::parse($u->last_seen)->diffForHumans()}}
                                            </td>
                                            <td>
                                                <span class="status-online">
                                                    Online
                                                </span>
                                            </td>
                                        </tr>
                                        @endif
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
</div>
</div>
<!-- Libs JS -->
<script src=" https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js">
</script>
<script src="https://cdn.datatables.net/rowreorder/1.4.1/js/dataTables.rowReorder.min.js">
</script>
<script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js">
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if ($message = Session::get('error'))
<script>
    Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "{{ $message }}"
        });
</script>
@endif

@if(session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif

<script>
    new DataTable('#table-userAktif', {
    responsive: true,
    rowReorder: {
        selector: 'td:nth-child(2)'
    }
});
</script>
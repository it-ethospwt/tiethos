<head>
    <!-- CSS DataTables Responsive -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/rowreorder/1.4.1/css/rowReorder.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css">
</head>
    
    <!-- <script src="./dist/js/demo-theme.min.js?1684106062"></script> -->
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
                                <svg xmlns="http://www.w3.org/2000/svg" width="42" height="42" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M9 7m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
                                    <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                                    <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                                    <path d="M21 21v-2a4 4 0 0 0 -3 -3.85" />
                                </svg>
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
                                <svg xmlns="http://www.w3.org/2000/svg" width="42" height="42" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M12 3l8 4.5l0 9l-8 4.5l-8 -4.5l0 -9l8 -4.5" />
                                    <path d="M12 12l8 -4.5" />
                                    <path d="M12 12l0 9" />
                                    <path d="M12 12l-8 -4.5" />
                                </svg>
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
                                <svg xmlns="http://www.w3.org/2000/svg" width="42" height="42" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path
                                        d="M7 3m0 2a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v10a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2z" />
                                    <path d="M17 17v2a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-10a2 2 0 0 1 2 -2h2" />
                                </svg>
                            </div>
                            <div
                                style="left: 17px; top: 60px; position: absolute; color: #1F2024; font-size: 25px; font-family: Poppins; font-weight: 500; word-wrap: break-word">
                                {{ $totalKonten }}</div>
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
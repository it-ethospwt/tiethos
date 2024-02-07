<<<<<<< HEAD
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
                            List Produk
                        </h2>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page body -->
        <div class="page-body">
            <div class="container-xl">
                <!-- <div class="row row-deck row-cards"> -->
                <div class="col-12 mb-8">
                    <div class="card">
=======
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
                            <!-- Page pre-title -->
                            <h2 class="page-title">
                                List Produk
                            </h2>
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
>>>>>>> 2a8c072d46f3a7d2091e29046f3db09106f4da1b
                        <div class="card-header">
                            <h3 class="card-title"> Data Produk</h3>
                        </div>
                        <div class="card-body">
<<<<<<< HEAD
                            <div class="btn-tambahProduk">
                                <a href="#" class="btn btn-primary"><i class="fa fa-plush"></i> Data Produk</a>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Invoices</h3>
                        </div>
                        <div class="card-body border-bottom py-3">
                            <div class="d-flex">
                                <div class="text-muted">
                                    Show
                                    <div class="mx-2 d-inline-block">
                                        <input type="text" class="form-control form-control-sm" value="8" size="3"
                                            aria-label="Invoices count">
                                    </div>
                                    entries
                                </div>
                                <div class="ms-auto text-muted">
                                    Search:
                                    <div class="ms-2 d-inline-block">
                                        <input type="text" class="form-control form-control-sm"
                                            aria-label="Search invoice">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table card-table table-vcenter text-nowrap datatable">
                                <thead>
                                    <tr>
                                        <th class="w-1"><input class="form-check-input m-0 align-middle" type="checkbox"
                                                aria-label="Select all invoices"></th>
                                        <th class="w-1">No.
                                            <!-- Download SVG icon from http://tabler-icons.io/i/chevron-up -->
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-sm icon-thick"
                                                width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M6 15l6 -6l6 6" />
                                            </svg>
                                        </th>
                                        <th>Invoice Subject</th>
                                        <th>Client</th>
                                        <th>VAT No.</th>
                                        <th>Created</th>
                                        <th>Status</th>
                                        <th>Price</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><input class="form-check-input m-0 align-middle" type="checkbox"
                                                aria-label="Select invoice"></td>
                                        <td><span class="text-muted">001401</span></td>
                                        <td><a href="invoice.html" class="text-reset" tabindex="-1">Design
                                                Works</a></td>
                                        <td>
                                            <span class="flag flag-country-us"></span>
                                            Carlson Limited
                                        </td>
                                        <td>
                                            87956621
                                        </td>
                                        <td>
                                            15 Dec 2017
                                        </td>
                                        <td>
                                            <span class="badge bg-success me-1"></span> Paid
                                        </td>
                                        <td>$887</td>
                                        <td class="text-end">
                                            <span class="dropdown">
                                                <button class="btn dropdown-toggle align-text-top"
                                                    data-bs-boundary="viewport"
                                                    data-bs-toggle="dropdown">Actions</button>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item" href="#">
                                                        Action
                                                    </a>
                                                    <a class="dropdown-item" href="#">
                                                        Another action
                                                    </a>
                                                </div>
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input class="form-check-input m-0 align-middle" type="checkbox"
                                                aria-label="Select invoice"></td>
                                        <td><span class="text-muted">001402</span></td>
                                        <td><a href="invoice.html" class="text-reset" tabindex="-1">UX
                                                Wireframes</a></td>
                                        <td>
                                            <span class="flag flag-country-gb"></span>
                                            Adobe
                                        </td>
                                        <td>
                                            87956421
                                        </td>
                                        <td>
                                            12 Apr 2017
                                        </td>
                                        <td>
                                            <span class="badge bg-warning me-1"></span> Pending
                                        </td>
                                        <td>$1200</td>
                                        <td class="text-end">
                                            <span class="dropdown">
                                                <button class="btn dropdown-toggle align-text-top"
                                                    data-bs-boundary="viewport"
                                                    data-bs-toggle="dropdown">Actions</button>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item" href="#">
                                                        Action
                                                    </a>
                                                    <a class="dropdown-item" href="#">
                                                        Another action
                                                    </a>
                                                </div>
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input class="form-check-input m-0 align-middle" type="checkbox"
                                                aria-label="Select invoice"></td>
                                        <td><span class="text-muted">001403</span></td>
                                        <td><a href="invoice.html" class="text-reset" tabindex="-1">New
                                                Dashboard</a></td>
                                        <td>
                                            <span class="flag flag-country-de"></span>
                                            Bluewolf
                                        </td>
                                        <td>
                                            87952621
                                        </td>
                                        <td>
                                            23 Oct 2017
                                        </td>
                                        <td>
                                            <span class="badge bg-warning me-1"></span> Pending
                                        </td>
                                        <td>$534</td>
                                        <td class="text-end">
                                            <span class="dropdown">
                                                <button class="btn dropdown-toggle align-text-top"
                                                    data-bs-boundary="viewport"
                                                    data-bs-toggle="dropdown">Actions</button>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item" href="#">
                                                        Action
                                                    </a>
                                                    <a class="dropdown-item" href="#">
                                                        Another action
                                                    </a>
                                                </div>
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input class="form-check-input m-0 align-middle" type="checkbox"
                                                aria-label="Select invoice"></td>
                                        <td><span class="text-muted">001404</span></td>
                                        <td><a href="invoice.html" class="text-reset" tabindex="-1">Landing
                                                Page</a></td>
                                        <td>
                                            <span class="flag flag-country-br"></span>
                                            Salesforce
                                        </td>
                                        <td>
                                            87953421
                                        </td>
                                        <td>
                                            2 Sep 2017
                                        </td>
                                        <td>
                                            <span class="badge bg-secondary me-1"></span> Due in 2 Weeks
                                        </td>
                                        <td>$1500</td>
                                        <td class="text-end">
                                            <span class="dropdown">
                                                <button class="btn dropdown-toggle align-text-top"
                                                    data-bs-boundary="viewport"
                                                    data-bs-toggle="dropdown">Actions</button>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item" href="#">
                                                        Action
                                                    </a>
                                                    <a class="dropdown-item" href="#">
                                                        Another action
                                                    </a>
                                                </div>
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input class="form-check-input m-0 align-middle" type="checkbox"
                                                aria-label="Select invoice"></td>
                                        <td><span class="text-muted">001405</span></td>
                                        <td><a href="invoice.html" class="text-reset" tabindex="-1">Marketing
                                                Templates</a></td>
                                        <td>
                                            <span class="flag flag-country-pl"></span>
                                            Printic
                                        </td>
                                        <td>
                                            87956621
                                        </td>
                                        <td>
                                            29 Jan 2018
                                        </td>
                                        <td>
                                            <span class="badge bg-danger me-1"></span> Paid Today
                                        </td>
                                        <td>$648</td>
                                        <td class="text-end">
                                            <span class="dropdown">
                                                <button class="btn dropdown-toggle align-text-top"
                                                    data-bs-boundary="viewport"
                                                    data-bs-toggle="dropdown">Actions</button>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item" href="#">
                                                        Action
                                                    </a>
                                                    <a class="dropdown-item" href="#">
                                                        Another action
                                                    </a>
                                                </div>
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input class="form-check-input m-0 align-middle" type="checkbox"
                                                aria-label="Select invoice"></td>
                                        <td><span class="text-muted">001406</span></td>
                                        <td><a href="invoice.html" class="text-reset" tabindex="-1">Sales
                                                Presentation</a></td>
                                        <td>
                                            <span class="flag flag-country-br"></span>
                                            Tabdaq
                                        </td>
                                        <td>
                                            87956621
                                        </td>
                                        <td>
                                            4 Feb 2018
                                        </td>
                                        <td>
                                            <span class="badge bg-secondary me-1"></span> Due in 3 Weeks
                                        </td>
                                        <td>$300</td>
                                        <td class="text-end">
                                            <span class="dropdown">
                                                <button class="btn dropdown-toggle align-text-top"
                                                    data-bs-boundary="viewport"
                                                    data-bs-toggle="dropdown">Actions</button>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item" href="#">
                                                        Action
                                                    </a>
                                                    <a class="dropdown-item" href="#">
                                                        Another action
                                                    </a>
                                                </div>
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input class="form-check-input m-0 align-middle" type="checkbox"
                                                aria-label="Select invoice"></td>
                                        <td><span class="text-muted">001407</span></td>
                                        <td><a href="invoice.html" class="text-reset" tabindex="-1">Logo &
                                                Print</a></td>
                                        <td>
                                            <span class="flag flag-country-us"></span>
                                            Apple
                                        </td>
                                        <td>
                                            87956621
                                        </td>
                                        <td>
                                            22 Mar 2018
                                        </td>
                                        <td>
                                            <span class="badge bg-success me-1"></span> Paid Today
                                        </td>
                                        <td>$2500</td>
                                        <td class="text-end">
                                            <span class="dropdown">
                                                <button class="btn dropdown-toggle align-text-top"
                                                    data-bs-boundary="viewport"
                                                    data-bs-toggle="dropdown">Actions</button>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item" href="#">
                                                        Action
                                                    </a>
                                                    <a class="dropdown-item" href="#">
                                                        Another action
                                                    </a>
                                                </div>
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input class="form-check-input m-0 align-middle" type="checkbox"
                                                aria-label="Select invoice"></td>
                                        <td><span class="text-muted">001408</span></td>
                                        <td><a href="invoice.html" class="text-reset" tabindex="-1">Icons</a>
                                        </td>
                                        <td>
                                            <span class="flag flag-country-pl"></span>
                                            Tookapic
                                        </td>
                                        <td>
                                            87956621
                                        </td>
                                        <td>
                                            13 May 2018
                                        </td>
                                        <td>
                                            <span class="badge bg-success me-1"></span> Paid Today
                                        </td>
                                        <td>$940</td>
                                        <td class="text-end">
                                            <span class="dropdown">
                                                <button class="btn dropdown-toggle align-text-top"
                                                    data-bs-boundary="viewport"
                                                    data-bs-toggle="dropdown">Actions</button>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item" href="#">
                                                        Action
                                                    </a>
                                                    <a class="dropdown-item" href="#">
                                                        Another action
                                                    </a>
                                                </div>
                                            </span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer d-flex align-items-center">
                            <p class="m-0 text-muted">Showing <span>1</span> to <span>8</span> of
                                <span>16</span> entries
                            </p>
                            <ul class="pagination m-0 ms-auto">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">
                                        <!-- Download SVG icon from http://tabler-icons.io/i/chevron-left -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M15 6l-6 6l6 6" />
                                        </svg>
                                        prev
                                    </a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item active"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">4</a></li>
                                <li class="page-item"><a class="page-link" href="#">5</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#">
                                        next
                                        <!-- Download SVG icon from http://tabler-icons.io/i/chevron-right -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M9 6l6 6l-6 6" />
                                        </svg>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- </div> -->
        @include('dash.footer')
    </div>
</div>
=======
                        <div class="btn-tambahProduk mt-5 mb-5">
                            <a href="#" class="btn btn-primary"> <span style="margin-right: 8px;"><i class="fa fa-plus"></i></span> Data Produk</a>
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
                            @for($i=0; $i < 50;  $i++)
                            <tr>
                                <td align="center">1.</td>
                                <td>Rizal Salpatura</td>
                                <td align="center"><a href="detailAnggota.php"><button class="btn btn-sm" id="btn-detail"><i class="fa-solid fa-magnifying-glass fa-sm" style="color: #9C9C9A;margin-right : 5px;"></i>Lihat</button></a></td>
                                <td>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked">
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
>>>>>>> 2a8c072d46f3a7d2091e29046f3db09106f4da1b

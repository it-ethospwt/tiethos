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
                            {{$jdl}}
                        </h2>
                        <div class="btn-tambahUser mt-4 mb-2">
                            <a href="/konten" class="btn btn-danger btn-pill">Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page body -->
        <div class="page-body">
            <div class="container-xl">
                <div class="row row-cards">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <form action="{{ route('frbm', $product_id) }}" method="GET">
                                    <div class="input-group mb-3">
                                        <select name="month" class="form-select" id="month-select">
                                            <option value="1" data-content="Januari">Januari</option>
                                            <option value="2" data-content="Februari">Februari</option>
                                            <option value="3" data-content="Maret">Maret</option>
                                            <option value="4" data-content="April">April</option>
                                            <option value="5" data-content="Mei">Mei</option>
                                            <option value="6" data-content="Juni">Juni</option>
                                            <option value="7" data-content="Juli">Juli</option>
                                            <option value="8" data-content="Agustus">Agustus</option>
                                            <option value="9" data-content="September">September</option>
                                            <option value="10" data-content="Oktober">Oktober</option>
                                            <option value="11" data-content="November">November</option>
                                            <option value="12" data-content="Desember">Desember</option>
                                        </select>

                                        <a href="{{ route('konten.ac', $product_id) }}" class="btn btn-primary">All</a>
                                    </div>
                                </form>
                            </div>
                            <div class="card-header">
                                <ul class="nav nav-tabs card-header-tabs" data-bs-toggle="tabs">
                                    <li class="nav-item">
                                        <a href="#tabs-home-1" class="nav-link active" data-bs-toggle="tab"><span style="margin-right: 8px;"><i class="fa fa-image"></i></span>Gambar</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#tabs-profile-1" class="nav-link" data-bs-toggle="tab"><span style="margin-right: 8px;"><i class="fa fa-video"></i></span>Video</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="tab-pane active show" id="tabs-home-1">
                                        <div class="row">
                                            <div class="row">
                                                @foreach ($contents as $k)
                                                @if (!empty($k->gambar) && $k->konten == "cwm")
                                                <div class="col-md-6 col-lg-3 mb-3">
                                                    <div class="card">
                                                        <!-- Photo -->
                                                        @if(isset($imageUrls[$k->content_id ]))
                                                        <div class="img-responsive img-responsive-21x9 card-img-top" style="background-image: url('{{ $imageUrls[$k->content_id] }}'); height: 150px;">
                                                        </div>
                                                        @endif
                                                        <div class="card-body">
                                                            <h3 class="card-title">{{$k->title}}</h3>
                                                            <div class="row g-2 justify-content-center">
                                                                <div class="col-6 col-sm-4 col-md-2 col-xl-auto py-3">
                                                                    <a href="{{ url('unduh/'.$k->content_id) }}" class="btn btn-success btn-pill">
                                                                        <i class="fa fa-download"></i>
                                                                    </a>
                                                                </div>
                                                                @can('admin-only')
                                                                <div class="col-6 col-sm-4 col-md-2 col-xl-auto py-3">
                                                                    <a href="{{ route('konten.edit', $k->content_id) }}" class="btn btn-primary btn-pill">
                                                                        <i class="fas fa-edit"></i>
                                                                    </a>
                                                                </div>
                                                                <div class="col-6 col-sm-4 col-md-2 col-xl-auto py-3">
                                                                    <a href="#" class="btn btn-danger btn-pill" data-bs-toggle="modal" data-bs-target="#modal-danger">
                                                                        <i class="fas fa-trash"></i>
                                                                    </a>
                                                                </div>
                                                                <div class="modal modal-blur fade" id="modal-danger" tabindex="-1" role="dialog" aria-hidden="true">
                                                                    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                                                                        <div class="modal-content">
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                            <div class="modal-status bg-danger"></div>
                                                                            <div class="modal-body text-center py-4">
                                                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2 text-danger icon-lg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                                                    <path d="M10.24 3.957l-8.422 14.06a1.989 1.989 0 0 0 1.7 2.983h16.845a1.989 1.989 0 0 0 1.7 -2.983l-8.423 -14.06a1.989 1.989 0 0 0 -3.4 0z" />
                                                                                    <path d="M12 9v4" />
                                                                                    <path d="M12 17h.01" />
                                                                                </svg>
                                                                                <h3>Are you sure?</h3>
                                                                                <div class="text-muted">Kamu yakin ingin menghapus gambar konten dengan judul {{$k->title}}?</div>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <div class="w-100">
                                                                                    <div class="row">
                                                                                        <div class="col">
                                                                                            <button type="button" class="btn w-100 btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                                                        </div>
                                                                                        <div class="col">
                                                                                            <a href="/delete/{{ $k->content_id }}" class="btn btn-danger w-100">Hapus</a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                @endcan
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                @endif
                                                @endforeach

                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tabs-profile-1">
                                        <div class="row">
                                            <div class="row">
                                                @foreach ($contents as $k)
                                                @if (!empty($k->video) && $k->konten == "cwm")
                                                <div class="col-md-6 col-lg-3 mb-3">
                                                    <div class="card">
                                                        <!-- Video -->
                                                        <div class="card-img-top">
                                                            @if(isset($videoUrls[$k->content_id ]))
                                                            <video controls style="width:100%; height:150px;">
                                                                <source src="{{ $videoUrls[$k->content_id] }}" type="video/mp4">
                                                                Your browser does not support the video tag.
                                                            </video>
                                                            @endif
                                                        </div>
                                                        <div class="card-body">
                                                            <h3 class="card-title">{{$k->title}}</h3>
                                                            <div class="row g-2 justify-content-center">
                                                                <div class="col-6 col-sm-4 col-md-2 col-xl-auto py-3">
                                                                    <a href="{{ url('unduh/'.$k->content_id) }}" class="btn btn-success btn-pill">
                                                                        <i class="fa fa-download"></i>
                                                                    </a>
                                                                </div>
                                                                @can('admin-only')
                                                                <div class="col-6 col-sm-4 col-md-2 col-xl-auto py-3">
                                                                    <a href="{{ route('konten.ganti', $k->content_id) }}" class="btn btn-primary btn-pill">
                                                                        <i class="fas fa-edit"></i>
                                                                    </a>
                                                                </div>
                                                                <div class="col-6 col-sm-4 col-md-2 col-xl-auto py-3">
                                                                    <a href="#" class="btn btn-danger btn-pill" data-bs-toggle="modal" data-bs-target="#modal-danger2">
                                                                        <i class="fas fa-trash"></i>
                                                                    </a>
                                                                </div>
                                                                <div class="modal modal-blur fade" id="modal-danger2" tabindex="-1" role="dialog" aria-hidden="true">
                                                                    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                                                                        <div class="modal-content">
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                            <div class="modal-status bg-danger"></div>
                                                                            <div class="modal-body text-center py-4">
                                                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2 text-danger icon-lg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                                                    <path d="M10.24 3.957l-8.422 14.06a1.989 1.989 0 0 0 1.7 2.983h16.845a1.989 1.989 0 0 0 1.7 -2.983l-8.423 -14.06a1.989 1.989 0 0 0 -3.4 0z" />
                                                                                    <path d="M12 9v4" />
                                                                                    <path d="M12 17h.01" />
                                                                                </svg>
                                                                                <h3>Are you sure?</h3>
                                                                                <div class="text-muted">Kamu yakin ingin menghapus gambar konten dengan judul {{$k->title}}?</div>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <div class="w-100">
                                                                                    <div class="row">
                                                                                        <div class="col">
                                                                                            <button type="button" class="btn w-100 btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                                                        </div>
                                                                                        <div class="col">
                                                                                            <a href="/delete/{{ $k->content_id }}" class="btn btn-danger w-100">Hapus</a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                @endcan
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endif
                                                @endforeach

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const selectMonth = document.querySelector('select[name="month"]');

        // Event listener untuk perubahan nilai pada dropdown
        selectMonth.addEventListener('change', function(event) {
            // Redirect ke rute frbm dengan bulan yang dipilih
            window.location.href = "{{ route('frbm', $product_id) }}?month=" + this.value;
        });
    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const selectMonth = document.querySelector('#month-select');

        // Event listener untuk perubahan nilai pada dropdown
        selectMonth.addEventListener('change', function(event) {
            // Redirect ke rute frbm dengan bulan yang dipilih
            window.location.href = "{{ route('frbm', $product_id) }}?month=" + this.value;
        });

        // Ambil nilai bulan dari URL jika ada
        const urlParams = new URLSearchParams(window.location.search);
        const selectedMonth = urlParams.get('month');
        if (selectedMonth) {
            // Setel nilai bulan yang dipilih pada dropdown
            selectMonth.value = selectedMonth;
            // Setel teks yang dipilih sesuai dengan data-content
            const selectedOption = selectMonth.querySelector(`option[value="${selectedMonth}"]`);
            if (selectedOption) {
                selectMonth.dataset.selectedContent = selectedOption.dataset.content;
            }
        }

        // Event listener untuk memperbarui teks yang ditampilkan pada dropdown saat nilai berubah
        selectMonth.addEventListener('change', function() {
            const selectedOption = this.options[this.selectedIndex];
            if (selectedOption) {
                this.dataset.selectedContent = selectedOption.dataset.content;
            }
        });
    });
</script>
@include('sweetalert::alert')

<!-- <script src="/dist/js/tabler.min.js?1684106062" defer></script>
<script src="/dist/js/demo.min.js?1684106062" defer></script> -->


@include('dash.footer')
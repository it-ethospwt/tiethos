<!-- CSS DataTables Responsive -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/rowreorder/1.4.1/css/rowReorder.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css" />


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
                            List FAQ
                        </h2>
                    </div>
                    <div class="btn-tambahUser mt-4 mb-2">
<<<<<<< HEAD
                        <a href="{{ route('faq.tambahKeluhan') }}" class="btn btn-primary"> <span style="margin-right: 8px;"><i class="fa fa-plus"></i></span>Tag Keluhan</a>
                        <a href="{{ route('faq.tambahFaqDetail') }}" class="btn btn-primary btn-pill"> <span style="margin-right: 8px;"><i class="fa fa-plus"></i></span>Tambah FAQ</a>
=======
                        <a href="{{ route('faq.tambahKeluhan') }}" class="btn btn-warning btn-pill"> <span
                                style="margin-right: 8px;"><i class="fa fa-plus"></i></span>Tag Keluhan</a>
                        <a href="{{ route('faq.tambahFaqDetail') }}" class="btn btn-warning btn-pill"> <span
                                style="margin-right: 8px;"><i class="fa fa-plus"></i></span>Tambah FAQ</a>
>>>>>>> dd4ebb253581aaea6090a30610d27d06b6d4bc7f
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
                                <div class="card-body">
                                    <div class="row">
                                        @foreach ($produk as $p)
                                        @php
                                        $keluhanProduk = $keluhan->where('id_produk', $p->id);
                                        @endphp
                                        @if (!$keluhanProduk->isEmpty())
                                        <div class="col-sm-6 col-lg-3">
                                            <div class="card">
                                                <img src="public_imgTest/{{ $p->gmr_product }}" alt="Gambar Produk">
                                                <div class="card-body text-center">
                                                    <h3 class="card-title">{{ $p->nm_Product }}</h3>
                                                    @foreach ($keluhanProduk as $k)
                                                    <a href="{{ route('faqIndex', ['id' => $k->id]) }}" class="btn btn-secondary btn-pill mt-2">{{ $k->nama }}</a>
                                                    @endforeach
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
    @include('dash.footer')
</div>
@include('dash.footer')
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/rowreorder/1.4.1/js/dataTables.rowReorder.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script type="text/javascript">
    $(function() {
        $(document).on('click', '.deleteButton', function(e) {
            e.preventDefault();
            var formAction = $(this).closest('form').attr('action');
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    // Di sini Anda bisa melakukan ajax request untuk menghapus data atau submit form secara langsung.
                    // Misalnya:
                    // $.ajax({
                    //     type: "DELETE",
                    //     url: formAction,
                    //     success: function(data) {
                    //         Swal.fire("Deleted!", "Your file has been deleted.", "success");
                    //     },
                    //     error: function(data) {
                    //         Swal.fire("Error!", "An error occurred while deleting the file.", "error");
                    //     }
                    // });

                    // Atau, jika Anda ingin langsung submit form:
                    $(this).closest('form').submit();
                }
            });
        });
    });
</script>


@if ($message = Session::get('success'))
<script>
    const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.onmouseenter = Swal.stopTimer;
            toast.onmouseleave = Swal.resumeTimer;
        }
    });
    Toast.fire({
        icon: "success",
        title: "{{$message}}"
    });
</script>
@endif
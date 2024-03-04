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
                        <h2 class="page-title mb-3">
                            Detail KOL
                        </h2>
                        <button type="button" class="btn btn-warning btn-pill" onclick="" data-bs-toggle="modal"
                            data-bs-target="#modal-gambar"
                            data-url="{{ route('upload.gambar', ['id' => $kol->id]) }}">Tambah
                            Gambar</button>
                        <button type="button" class="btn btn-warning btn-pill" onclick="" data-bs-toggle="modal"
                            data-bs-target="#modal-video"
                            data-url="{{ route('upload.video', ['id' => $kol->id]) }}">Tambah
                            Video</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page body -->
        <div class="page-body">
            <div class="container-lg">
                <div class="col-12">
                    <div class="card">
                        <div class="table-responsive">
                            <table class="table card-table">
                                <tbody>
                                    <tr>
                                        <td>Nama KOL</td>
                                        <td class="text-muted">
                                            {{ $kol->nama }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal Tayang</td>
                                        <td class="text-muted">
                                            {{ $kol->tanggal_tayang }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Owning</td>
                                        <td class="text-muted">
                                            {{ $kol->owning }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Rate Card</td>
                                        <td class="text-muted">
                                            {{ $kol->rate_card }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Ket. Transfer</td>
                                        <td class="text-muted">
                                            {{ $kol->transfer }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Resi</td>
                                        <td class="text-muted">
                                            {{ $kol->resi }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Ekspedisi</td>
                                        <td class="text-muted">
                                            {{ $kol->ekspedisi }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Produk</td>
                                        <td class="text-muted">
                                            @php
                                            $product = App\Models\Product::find($kol->id_produk);
                                            if ($product) {
                                            echo $product->nm_product;
                                            } else {
                                            echo "Product not found";
                                            }
                                            @endphp
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Nama User</td>
                                        <td class="text-muted">
                                            {{ $kol->user }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Create</td>
                                        <td class="text-muted">
                                            {{ $kol->created_at }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Update</td>
                                        <td class="text-muted">
                                            {{ $kol->updated_at }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Gambar Content KOL</td>
                                    </tr>
                                    <td class="text-muted">
                                        @if(isset($imageUrls[$kol->id ]))
                                        <img src="{{ $imageUrls[$kol->id] }}" alt="Gambar Produk" width="400px">
                                        @endif
                                    </td>
                                    <tr>
                                        <td>Video Content KOL</td>
                                    <tr class="text-muted">
                                    </tr>
                                    </tr>
                                    <tr>
                                        <td>
                                            <button type="button" class="btn btn-danger btn-pill"
                                                onclick="window.history.back()">Back</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="modal modal-blur fade" id="modal-gambar" tabindex="-1" role="dialog"
                                aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <form action="{{ route('upload.gambar', ['id' => $kol->id]) }}" method="post"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="modal-header">
                                                <h5 class="modal-title">Upload File Gambar</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label class="form-label">Gambar</label>
                                                    <input type="file" name="gambar" class="form-control">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-link link-secondary"
                                                    data-bs-dismiss="modal">Cancel</button>
                                                <button type="submit" class="btn btn-primary ms-auto">Upload</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="modal modal-blur fade" id="modal-video" tabindex="-1" role="dialog"
                                aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <form action="{{ route('upload.video', ['id' => $kol->id]) }}" method="post"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="modal-header">
                                                <h5 class="modal-title">Upload File Video</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label class="form-label">Video</label>
                                                    <input type="file" name="video" class="form-control">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-link link-secondary"
                                                    data-bs-dismiss="modal">Cancel</button>
                                                <button type="submit" class="btn btn-primary ms-auto">Upload</button>
                                            </div>
                                        </form>
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
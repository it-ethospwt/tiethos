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
                            Content KOL
                        </h2>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page body -->
        <div class="page-body">
            <div class="container-lg">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Data Content KOL</h3>
                        </div>
                        <div class="card-body">
                            <div class="btn-tambahUser mt-2 mb-5">
                                <a href="{{route ('kol.tambah')}}" class="btn btn-warning btn-pill"> <span
                                        style="margin-right: 8px;"><i class="fa fa-plus"></i></span> Content KOL</a>
                            </div>
                            <!-- Table -->
                            <table id="table-kol" class="display nowrap" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama KOL</th>
                                        <th>Tanggal Tayang</th>
                                        <th>Owning</th>
                                        <th>Produk</th>
                                        <th>Data User</th>
                                        <th>Update</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kol as $k)
                                    <tr style="font-size: 90%;">
                                        <td scope="row">{{ $loop->iteration }}.</td>
                                        <td>{{ $k->nama }}</td>
                                        <td>{{ $k->tanggal_tayang }}</td>
                                        <td>{{ $k->owning }}</td>
                                        <td>
                                            @php
                                            $product = App\Models\Product::find($k->id_produk);
                                            if ($product) {
                                            echo $product->nm_product;
                                            } else {
                                            echo "Product not found";
                                            }
                                            @endphp
                                        </td>
                                        <td>{{ $k->user }}</td>
                                        <td>{{ $k->updated_at }}</td>
                                        <td>
                                            <a href="{{ route('kol.detail', $k->id)}}" class="btn btn-primary btn-pill">
                                                <span class="ti ti-search" style="color: white;"></span>
                                            </a>
                                            <a href="" class="btn btn-success btn-pill">
                                                <span class="ti ti-edit" style="color: white;"></span>
                                            </a>
                                            <form action="" method="POST" id="deleteForm" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-pill deleteButton">
                                                    <span class="ti ti-trash" style="color: white;"></span>
                                                </button>
                                            </form>
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

<script>
    new DataTable('#table-kol', {
                    responsive: true,
                    rowReorder: {
                        selector: 'td:nth-child(2)'
                    }
                });
</script>
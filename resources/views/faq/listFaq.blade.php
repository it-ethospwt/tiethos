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
                            Keluhan + FAQ
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
                            <h3 class="card-title">Data Keluhan</h3>
                        </div>
                        <div class="card-body">
                            <!-- Table -->
                            <table id="table-keluhan" class="display nowrap" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Produk</th>
                                        <th>Keluhan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($keluhan as $k)
                                    <tr style="font-size: 90%;">
                                        <td scope="row">{{ $loop->iteration }}.</td>
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
                                        <td>{{ $k->nama }}</td>
                                        <td>
                                            <form action="{{ route('keluhan.delete', $k->id)}}" method="POST"
                                                id="deleteForm" class="d-inline">
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
                <br>
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">FAQ</h3>
                        </div>
                        <div class="card-body">
                            <!-- Table -->
                            <table id="table-kol" class="display nowrap" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Produk</th>
                                        <th>Keluhan</th>
                                        <th>Pertanyaan</th>
                                        <th>Jawaban</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($faq as $f)
                                    <tr style="font-size: 90%;">
                                        <td scope="row">{{ $loop->iteration }}.</td>
                                        <td>
                                            @php
                                            $product = App\Models\Product::find($f->id_produk);
                                            if ($product) {
                                            echo $product->nm_product;
                                            } else {
                                            echo "Product not found";
                                            }
                                            @endphp
                                        </td>
                                        <td>
                                            @php
                                            $keluhan = App\Models\Keluhan::find($f->id_keluhan);
                                            if ($keluhan) {
                                            echo $keluhan->nama;
                                            } else {
                                            echo "Keluhan not found";
                                            }
                                            @endphp
                                        </td>
                                        <td>{{ $f->pertanyaan }}</td>
                                        <td>{{ $f->jawaban }}</td>
                                        <td>
                                            <form action="{{ route('faq.delete', $f->id)}}" method="POST"
                                                id="deleteForm" class="d-inline">
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
    new DataTable('#table-keluhan', {
        responsive: true,
        rowReorder: {
            selector: 'td:nth-child(2)'
        }
    });
</script>

<script>
    new DataTable('#table-kol', {
        responsive: true,
        rowReorder: {
            selector: 'td:nth-child(2)'
        }
    });
</script>
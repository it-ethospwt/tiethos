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
                            Tambah FAQ
                        </h2>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page body -->
        <div class="page-body">
            <div class="container-lg">
                <!-- <div class="row row-deck row-cards"> -->
                <div class="page-body">
                    <div class="container-xl">
                        <div class="row row-cards">
                            <div class="col-12">
                                <form class="card" action="{{ route('storeFaq') }}" method="POST">
                                    @csrf
                                    <div class="card-header">
                                        <h3 class="card-title">Form Tambah FAQ</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label class="form-label">Produk</label>
                                            <div>
                                                <!-- Menampilkan dropdown produk -->
                                                <select id="produk" name="produk" class="form-select">
                                                    <option value="">Pilih</option>
                                                    @foreach ($produk as $p)
                                                    <option value="{{ $p->id }}">{{ $p->nm_Product }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label required">Keluhan / Judul Tag</label>
                                            <div>
                                                <!-- Menampilkan dropdown keluhan berdasarkan produk yang dipilih -->
                                                <select id="keluhan" name="keluhan" class="form-select">
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label required">Pertanyaan</label>
                                            <div>
                                                <input type="text" name="pertanyaan" class="form-control"
                                                    placeholder="Enter Pertanyaan">
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label required">Jawaban</label>
                                            <div>
                                                <textarea rows="5" type="text" name="jawaban" class="form-control"
                                                    placeholder="Enter Jawaban"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer text-end">
                                        <button type="button" class="btn btn-danger btn-pill"
                                            onclick="window.history.back()">Back</button>
                                        <button type="submit" class="btn btn-primary btn-pill">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('dash.footer')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
        $('#produk').on('change', function(){
            var id_produk = $(this).val();
            if (id_produk) {
                $.ajax({
                    url: '/faq/tambahFaqDetail/' + id_produk,
                    type: 'GET',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    dataType: 'json',
                    success: function(data){
                        if (data && data.length > 0) {
                            $('#keluhan').empty();
                            $('#keluhan').append('<option value="">-PILIH KELUHAN-</option>');
                            $.each(data, function(key, keluhan){
                                $('#keluhan').append($('<option>').val(keluhan.id).text(keluhan.nama));    
                            });
                        } else {
                            $('#keluhan').empty();
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            } else {
                $('#keluhan').empty();
            }
        })
    });
    </script>

</div>
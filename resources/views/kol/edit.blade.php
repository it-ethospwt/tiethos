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
                            Tambah Content KOL
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
                    <div class="container-lg">
                        <div class="row row-cards">
                            <div class="col-12">
                                <form class="card" action="\kstoreEdit\{{ $kol->id }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT') <!-- Tambahkan ini untuk menentukan bahwa ini adalah operasi pembaruan -->
                                    <div class="card-header">
                                        <h3 class="card-title">Form Edit Content KOL</h3> <!-- Ubah judul sesuai dengan konteks edit -->
                                    </div>
                                    <div class="card-body">
                                        <!-- Isi nilai default pada inputan form -->
                                        <div class="mb-3">
                                            <label class="form-label required">Nama KOL</label>
                                            <div>
                                                <input type="text" name="nama" class="form-control" placeholder="Input Nama KOL" value="{{ $kol->nama }}">
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label required">Tanggal Tayang</label>
                                            <div>
                                                <input type="date" name="tanggal_tayang" class="form-control" placeholder="YYYY-MM-DD" value="{{ $kol->tanggal_tayang }}">
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label required">Owning</label>
                                            <div>
                                                <input type="text" name="owning" class="form-control" placeholder="Input owning KOL" value="{{ $kol->owning }}">
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label required">Rate Card</label>
                                            <div class="input-group mb-2">
                                                <span class="input-group-text">
                                                    Rp
                                                </span>
                                                <input type="text" name="rate_card" class="form-control" placeholder="Input Rate Card" autocomplete="off" value="{{ $kol->rate_card }}">
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label required">Keterangan Transfer</label>
                                            <div>
                                                <input type="text" name="transfer" class="form-control" placeholder="Input Keterangan Transfer" value="{{ $kol->transfer }}">
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Resi</label>
                                            <div>
                                                <input type="text" name="resi" class="form-control" placeholder="Input Resi" value="{{ $kol->resi }}">
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Ekspedisi</label>
                                            <div>
                                                <input type="text" name="ekspedisi" class="form-control" placeholder="Input Ekspedisi" value="{{ $kol->ekspedisi }}">
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label required">Produk</label>
                                            <select class="form-control" name="id_produk" id="id_produk">
                                                @foreach ($product as $p)
                                                <option value="{{ $p->id }}" {{ $p->id == $kol->id_produk ? 'selected' : '' }}>{{ $p->nm_product }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label required">Nama User</label>
                                            <div>
                                                <input type="text" name="user" class="form-control" placeholder="Input Nama User" value="{{ $kol->user }}">
                                            </div>
                                        </div>

                                        <input type="hidden" name="id" value="{{ $kol->id }}">
                                        <!-- Sisipkan kode lainnya sesuai kebutuhan -->
                                    </div>
                                    <div class="card-footer text-end">
                                        <button type="button" class="btn btn-danger btn-pill" onclick="window.history.back()">Back</button>
                                        <button type="submit" class="btn btn-primary">Update</button> <!-- Ubah label tombol sesuai konteks -->
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
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if ($errors->any())
<script>
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: '@foreach ($errors->all() as $error){{ $error }}@endforeach',
    });
</script>
@endif
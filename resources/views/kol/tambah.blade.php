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
                    <div class="container-xl">
                        <div class="row row-cards">
                            <div class="col-12">
                                <form class="card" action="{{ route('kol.store') }}" method="POST">
                                    @csrf
                                    <div class="card-header">
                                        <h3 class="card-title">Form Tambah Content KOL</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label class="form-label required">Nama KOL</label>
                                            <div>
                                                <input type="text" name="nama" class="form-control"
                                                    placeholder="Input Nama KOL">
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label required">Tanggal Tayang</label>
                                            <div>
                                                <input type="date" name="tanggal_tayang" class="form-control"
                                                    placeholder="YYYY-MM-DD">
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label required">Owning Berapa Lama</label>
                                            <div>
                                                <input type="text" name="owning" class="form-control"
                                                    placeholder="Input Owning">
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label required">Rate Card</label>
                                            <div class="input-group mb-2">
                                                <span class="input-group-text">
                                                    Rp
                                                </span>
                                                <input type="text" name="rate_card" class="form-control"
                                                    placeholder="Input Rate Card" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label required">Keterangan Transfer</label>
                                            <div>
                                                <input type="text" name="transfer" class="form-control"
                                                    placeholder="Input Keterangan Transfer">
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Resi</label>
                                            <div>
                                                <input type="text" name="resi" class="form-control"
                                                    placeholder="Input Resi">
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Ekspedisi</label>
                                            <div>
                                                <input type="text" name="ekspedisi" class="form-control"
                                                    placeholder="Input Ekspedisi">
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label required">Produk</label>
                                            <div>
                                                <select name="id_produk" class="form-select">
                                                    @foreach($produk as $p)
                                                    <option value="{{ $p->id }}">{{ $p->nm_product }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label required">Nama User</label>
                                            <div>
                                                <input type="text" name="user" class="form-control"
                                                    placeholder="Input Nama User">
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <div class="form-label">Upload Gambar</div>
                                            <input type="file" name="gambar" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <div class="form-label">Upload Video</div>
                                            <input type="file" name="video" class="form-control">
                                        </div>
                                    </div>
                                    <div class="card-footer text-end">
                                        <button type="button" class="btn btn-danger btn-pill"
                                            onclick="window.history.back()">Back</button>
                                        <button type="submit" class="btn btn-primary">Submit</button>
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
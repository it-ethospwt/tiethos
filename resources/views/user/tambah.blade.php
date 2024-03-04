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
                            Tambah User
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
                                <form class="card" action="{{ route('admin.users.store') }}" method="POST">
                                    @csrf
                                    <div class="card-header">
                                        <h3 class="card-title">Form Tambah User</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label class="form-label required">Email address</label>
                                            <div>
                                                <input type="email" name="email" class="form-control"
                                                    aria-describedby="emailHelp" placeholder="Enter email">
                                                <small class="form-hint">We'll never share your email with anyone
                                                    else.</small>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label required">Username</label>
                                            <div>
                                                <input type="text" name="username" class="form-control"
                                                    placeholder="Enter Username">
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label required">Nama</label>
                                            <div>
                                                <input type="text" name="name" class="form-control"
                                                    placeholder="Enter Name">
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label required">Password</label>
                                            <div>
                                                <input type="text" name="password" class="form-control"
                                                    placeholder="Password">
                                                <small class="form-hint">
                                                    Your password must be 8-20 characters long
                                                </small>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Jenis Kelamin</label>
                                            <div>
                                                <select name="jenis_kelamin" class="form-select">
                                                    <option>Laki - Laki</option>
                                                    <option>Perempuan</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Posisi</label>
                                            <div>
                                                <select name="role" class="form-select">
                                                    <option>Admin</option>
                                                    <option>ADV</option>
                                                    <option>CS</option>
                                                </select>
                                            </div>
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
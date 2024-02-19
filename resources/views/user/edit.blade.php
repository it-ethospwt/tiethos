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
                            Edit User
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
                                <form class="card" action="{{ route('admin.users.update', $user->id) }}" method="POST">
                                    @csrf
                                    <div class="card-header">
                                        <h3 class="card-title">Form Edit User</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label class="form-label required">Email address</label>
                                            <div>
                                                <input type="email" name="email" class="form-control"
                                                    aria-describedby="emailHelp" placeholder="Enter email"
                                                    value="{{ $user->email }}">
                                                <small class="form-hint">We'll never share your email with anyone
                                                    else.</small>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label required">Username</label>
                                            <div>
                                                <input type="text" name="username" class="form-control"
                                                    placeholder="Enter Username" value="{{ $user->username }}">
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label required">Nama</label>
                                            <div>
                                                <input type="text" name="name" class="form-control"
                                                    placeholder="Enter Name" value="{{ $user->name }}">
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label required">Password</label>
                                            <div>
                                                <input type="password" name="password" class="form-control"
                                                    placeholder="Leave blank to keep current password">
                                                <small class="form-hint">
                                                    Your password must be 8-20 characters long, contain letters and
                                                    numbers, and must not contain spaces or special characters.
                                                </small>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Jenis Kelamin</label>
                                            <div>
                                                <select name="jenis_kelamin" class="form-select"
                                                    value="{{ $user->jenis_kelamin }}">
                                                    <option>Laki - Laki</option>
                                                    <option>Perempuan</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Posisi</label>
                                            <div>
                                                <select name="role" class="form-select" value="{{ $user->role }}">
                                                    <option>Admin</option>
                                                    <option>ADV</option>
                                                    <option>CS</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer text-end">
                                        <button type="button" class="btn btn-danger"
                                            onclick="window.history.back()">Back</button>
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- </div> -->
    @include('dash.footer')
</div>
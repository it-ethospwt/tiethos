<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Sign in</title>
    <!-- CSS files -->
    <link href="./dist/css/tabler.min.css?1684106062" rel="stylesheet" />
    <link href="./dist/css/tabler-flags.min.css?1684106062" rel="stylesheet" />
    <link href="./dist/css/tabler-payments.min.css?1684106062" rel="stylesheet" />
    <link href="./dist/css/tabler-vendors.min.css?1684106062" rel="stylesheet" />
    <link href="./dist/css/demo.min.css?1684106062" rel="stylesheet" />
    <style>
        @import url('https://rsms.me/inter/inter.css');

        :root {
            --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
        }

        body {
            font-feature-settings: "cv03", "cv04", "cv11";
        }
    </style>
</head>

<body class=" d-flex flex-column">
    <script src="./dist/js/demo-theme.min.js?1684106062"></script>
    <div class="page page-center">
        <div class="container py-4">
            {{-- <div class="text-center mb-4">
                <a href="." class="navbar-brand navbar-brand-autodark"><img src="./static/logo.svg" height="36"
                        alt=""></a>
            </div> --}}
            <div class="card card-md" style="border-radius: 50px 20px;">
                <div class="row g-0">
                    <div class="col-md-5">
                        <img src="./dist/img/icon_login.png" class="" alt="">
                    </div>
                    <div class="col-md-7">
                        <div class="card-body">
                            <h2 class="h2 text-center mt-7 mb-4">Login</h2>
                            <form action="{{ route('login-proses') }}" method="post">
                                @csrf
                                <!-- Sertakan token CSRF -->
                                <div class="mb-2">
                                    <label class="form-label">Username</label>
                                    <input type="text" name="username" class="form-control" placeholder="Username"
                                        autocomplete="off">
                                </div>
                                @error('username')
                                <small>{{ $message }}</small>
                                @enderror
                                <div class="mb-2">
                                    <label class="form-label">Password</label>
                                    <div class="input-group input-group-flat">
                                        <input id="passwordInput" type="password" name="password" class="form-control"
                                            placeholder="Your password" autocomplete="off">
                                        <span class="input-group-text">
                                            <a href="#" class="link-secondary" title="Show password" id="showPassword"
                                                data-bs-toggle="tooltip">
                                                <!-- Download SVG icon from http://tabler-icons.io/i/eye -->
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24"
                                                    height="24" viewBox="0 0 24 24" stroke-width="2"
                                                    stroke="currentColor" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                                    <path
                                                        d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" />
                                                </svg>
                                            </a>
                                        </span>
                                    </div>
                                </div>
                                @error('password')
                                <small>{{ $message }}</small>
                                @enderror
                                <div class="form-footer">
                                    <button type="submit" class="btn btn-primary">Sign in</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>

            {{-- <div class="text-center text-muted mt-3">
                Don't have account yet? <a href="./sign-up.html" tabindex="-1">Sign up</a>
            </div> --}}
        </div>
    </div>
    <!-- Libs JS -->
    <!-- Tabler Core -->
    <script src="./dist/js/tabler.min.js?1684106062" defer></script>
    <script src="./dist/js/demo.min.js?1684106062" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        document.getElementById('showPassword').addEventListener('click', function () {
            var passwordInput = document.getElementById('passwordInput');
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
            } else {
                passwordInput.type = "password";
            }
        });
    </script>


    @if ($message = Session::get('failed'))
    <script>
        Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "{{ $message }}"
        });
    </script>
    @endif

    @if ($message = Session::get('success'))
    <script>
        Swal.fire({
            title: "Selamat!",
            text: "{{ $message }}",
            icon: "success"
        });
    </script>
    @endif
</body>

</html>
<header class="navbar-expand-md">
    <div class="collapse navbar-collapse" id="navbar-menu">
        <div class="navbar">
            <div class="container-xl">
                <ul class="navbar-nav">
                    <li class="nav-item {{ request()->is('dashboard*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('dashboard')}} ">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <!-- Download SVG icon from http://tabler-icons.io/i/home -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M5 12l-2 0l9 -9l9 9l-2 0" />
                                    <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                                    <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
                                </svg>
                            </span>
                            <span class="nav-link-title">
                                Home
                            </span>
                        </a>
                    </li>
                    @if (Auth::check() && Auth::user()->role == 'Admin')
                    <li class="nav-item {{ request()->routeIs('admin.users*') ? 'active' : '' }}">
                        <a class="nav-link " href="{{ route('admin.users') }}" data-bs-toggle=""
                            data-bs-auto-close="outside" role="button" aria-expanded="false">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <!-- Download SVG icon from http://tabler-icons.io/i/package -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M12 3l8 4.5l0 9l-8 4.5l-8 -4.5l0 -9l8 -4.5" />
                                    <path d="M12 12l8 -4.5" />
                                    <path d="M12 12l0 9" />
                                    <path d="M12 12l-8 -4.5" />
                                    <path d="M16 5.25l-8 4.5" />
                                </svg>
                            </span>
                            <span class="nav-link-title">
                                List User
                            </span>
                        </a>
                    </li>
                    @endif
                    @if (Auth::check() && (Auth::user()->role == 'Admin' || Auth::user()->role == 'ADV'))
                    <li class="nav-item dropdown {{ request()->is('produk*') ? 'active' : '' }}">
                        <a class="nav-link" href="/produk">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <!-- Download SVG icon from http://tabler-icons.io/i/checkbox -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M9 11l3 3l8 -8" />
                                    <path d="M20 12v6a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h9" />
                                </svg>
                            </span>
                            <span class="nav-link-title">
                                List Produk
                            </span>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="/konten" data-bs-toggle="" data-bs-auto-close="outside" role="button"
                            aria-expanded="false">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path
                                        d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" />
                                </svg>
                            </span>
                            <span class="nav-link-title">
                                Bank Content
                            </span>
                        </a>
                    </li>
                    <li class="nav-item dropdown {{ request()->is('kol*') ? 'active' : '' }}">
                        <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-bs-toggle="dropdown"
                            data-bs-auto-close="outside" role="button" aria-expanded="false">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <!-- Download SVG icon from http://tabler-icons.io/i/layout-2 -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path
                                        d="M4 4m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v1a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z" />
                                    <path
                                        d="M4 13m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v3a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z" />
                                    <path
                                        d="M14 4m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v3a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z" />
                                    <path
                                        d="M14 15m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v1a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z" />
                                </svg>
                            </span>
                            <span class="nav-link-title">
                                Bank KOL
                            </span>
                        </a>
                        <div class="dropdown-menu">
                            <div class="dropdown-menu-columns">
                                <div class="dropdown-menu-column">
                                    <a class="dropdown-item" href="{{ route('kol') }}">
                                        Contect KOL
                                    </a>
                                    <a class="dropdown-item" href="">
                                        List Endorse
                                    </a>
                                    <a class="dropdown-item" href="">
                                        List Affiliator
                                    </a>
                                </div>
                            </div>
                        </div>
                    </li>
                    @endif
                    @if (Auth::check() && (Auth::user()->role == 'Admin' || Auth::user()->role == 'ADV' ||
                    Auth::user()->role == 'CS'))
                    <li class="nav-item">
                        <a class="nav-link" href="/knowladge">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <!-- Download SVG icon from http://tabler-icons.io/i/ghost -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path
                                        d="M5 11a7 7 0 0 1 14 0v7a1.78 1.78 0 0 1 -3.1 1.4a1.65 1.65 0 0 0 -2.6 0a1.65 1.65 0 0 1 -2.6 0a1.65 1.65 0 0 0 -2.6 0a1.78 1.78 0 0 1 -3.1 -1.4v-7" />
                                    <path d="M10 10l.01 0" />
                                    <path d="M14 10l.01 0" />
                                    <path d="M10 14a3.5 3.5 0 0 0 4 0" />
                                </svg>
                            </span>
                            <span class="nav-link-title">
                                Bank Knowladge
                            </span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/handbook" data-bs-toggle="" data-bs-auto-close="outside"
                            role="button" aria-expanded="false">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <!-- Download SVG icon from http://tabler-icons.io/i/lifebuoy -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M12 12m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
                                    <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                                    <path d="M15 15l3.35 3.35" />
                                    <path d="M9 15l-3.35 3.35" />
                                    <path d="M5.65 5.65l3.35 3.35" />
                                    <path d="M18.35 5.65l-3.35 3.35" />
                                </svg>
                            </span>
                            <span class="nav-link-title">
                                Handbook
                            </span>
                        </a>
                    </li>
                    <li class="nav-item {{ request()->is('faq*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('faq') }}">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <!-- Download SVG icon from http://tabler-icons.io/i/ghost -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path
                                        d="M5 11a7 7 0 0 1 14 0v7a1.78 1.78 0 0 1 -3.1 1.4a1.65 1.65 0 0 0 -2.6 0a1.65 1.65 0 0 1 -2.6 0a1.65 1.65 0 0 0 -2.6 0a1.78 1.78 0 0 1 -3.1 -1.4v-7" />
                                    <path d="M10 10l.01 0" />
                                    <path d="M14 10l.01 0" />
                                    <path d="M10 14a3.5 3.5 0 0 0 4 0" />
                                </svg>
                            </span>
                            <span class="nav-link-title">
                                FAQ
                            </span>
                        </a>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</header>
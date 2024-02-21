<link href="/dist/css/tabler.min.css?1684106062" rel="stylesheet" />
<link href="/dist/css/tabler-flags.min.css?1684106062" rel="stylesheet" />
<link href="/dist/css/tabler-payments.min.css?1684106062" rel="stylesheet" />
<link href="/dist/css/tabler-vendors.min.css?1684106062" rel="stylesheet" />
<link href="/dist/css/demo.min.css?1684106062" rel="stylesheet" />

<div class="page">
    <!-- Navbar -->
    @include('dash.header')
    @include('dash.menu')
    <script src="/dist/js/demo-theme.min.js?1684106062"></script>
    <div class="page-wrapper">
        <!-- Page header -->
        <div class="page-header d-print-none">
            <div class="container-xl">
                <div class="row g-2 align-items-center">
                    <div class="col">
                        <!-- Page pre-title -->
                        <h2 class="page-title">
                            Detail FAQ
                        </h2>
                    </div>
                    <div class="btn-tambahUser mt-4 mb-2">
                        <button type="button" class="btn btn-danger btn-pill"
                            onclick="window.history.back()">Back</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page body -->
        <div class="page-body">
            <div class="container-xl">
                <div class="row row-cards">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="accordion" id="accordion-example">
                                @if ($faq->isEmpty())
                                <p class="text-center mt-2">Belum Ada FAQ</p>
                                @else
                                @foreach ($faq as $f)
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="heading-{{ $f->id }}">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapse-{{ $f->id }}" aria-expanded="true">
                                            {{ $f->pertanyaan }}
                                        </button>
                                    </h2>
                                    <div id="collapse-{{ $f->id }}" class="accordion-collapse collapse"
                                        data-bs-parent="#accordion-example">
                                        <div class="accordion-body pt-0">
                                            {!! nl2br(e($f->jawaban)) !!}
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('dash.footer')
</div>

<!-- Tabler Core -->
<script src="/dist/js/tabler.min.js?1684106062" defer></script>
<script src="/dist/js/demo.min.js?1684106062" defer></script>
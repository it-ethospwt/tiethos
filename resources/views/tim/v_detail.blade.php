<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/rowreorder/1.4.1/css/rowReorder.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css">

<style>
    /* styles.css */
    /* .custom-button {
            display: block;
            width: 100%;
            height: 100%;
            text-align: center;
            line-height: 32px;
            text-decoration: none;
            border-radius: 5px;
            color: white;
            font-size: 12px;
            font-family: Poppins;
            font-weight: 400;
            cursor: pointer;
        } */
    .button-container {
        width: 100%;
        margin-top: 5px;
        /* Adjust the margin as needed */
    }

    .button-container .btn {
        width: 100%;
        /* Adjust button width */
    }

    .image-container {
        position: relative;
        width: 100%;
        padding-bottom: 100%;
        /* 1:1 Aspect Ratio */
        overflow: hidden;
    }

    .image-container img {
        position: absolute;
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    #daf-anggota{
        background-color: none;
        border: 1px solid #e5e5e5;
        border-radius: 20px;
    }
</style>
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
                        <h2 class="page-title">
                            {{$jdl}}
                        </h2>
                        <div class="col mt-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="col py-0">
                                        <div class="col-md-12 py-1">
                                            Nama Tim     : <span class="fw-medium">{{ $tim->nama_tim }}</span>
                                        </div>
                                        <div class="col-md-12 py-1">
                                            Nama Leader  : <span class="fw-medium">{{ $tim->User->name }}</span>
                                        </div>
                                        <div class="col-md-12 py-3">
                                                <div class="accordion accordion-flush" id="accordionFlushExample">
                                                <div class="accordion-item"  id="daf-anggota">
                                                    <h5 class="accordion-header">
                                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                                            @foreach($totalAnggotaPerTim as $timId => $total)
                                                                @if($timId == $timIdIndex)
                                                                    <span class="fw-medium">Total Anggota : {{ $total }}</span>
                                                                @endif
                                                            @endforeach    
                                                        </button>
                                                    </h5>
                                                        <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                                            <div class="accordion-body">
                                                            @foreach($users as $us)
                                                                <form action="{{ route('manageTim.destroyAnggota',['id' => $us->id ]) }}" method="post">
                                                                @csrf
                                                                @method('DELETE')
                                                                <div class="cont mb-3" style="display: flex; flex-direction:row; align-items:center; gap:8px;">
                                                                    <div class="foto-profile">
                                                                        <img src="{{ asset('static/photo_profile/'.$us->user_image)}}" class="rounded-circle" alt="..." width="50" height="50" style="border: 1px solid #e5e5e5;">
                                                                    </div>
                                                                    <div class="nama-anggota">
                                                                        <div class="nama mb-1">
                                                                            {{ $us->name  }}
                                                                        </div>
                                                                        <div class="aksi">
                                                                            <button  type="submit" class="btn btn-pill btn-outline-danger btn-sm"><i class="fa fa-trash"></i></button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                    </form> 
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                </div>
                                            </div> 
                                        </div>     
                                    </div>
                                </div>
                            </div>        
                        </div>  
                        <div class="form-group mt-5">
                            <a href="{{ route('manageTim.index') }}" class="btn btn-dark btn-pill">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Data Yang Dihilangkan  Pag-Body -->
        
    </div>
</div>


@include('dash.footer')
<!-- Sweet Alert -->
@include('sweetalert::alert')
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/rowreorder/1.4.1/js/dataTables.rowReorder.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>

<script>
    new DataTable('#table-hakAkses', {
        responsive: true,
        rowReorder: {
            selector: 'td:nth-child(2)'
        }
    });
</script>
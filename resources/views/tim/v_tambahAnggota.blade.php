<head>
        <title>{{ $jdl }}</title>

            <link href="{{ asset('dist/css/virtual-select.min.css') }}" rel="stylesheet">
            <script src="{{ asset('dist/js/virtual-select.min.js') }}"></script>
        <style>
            .card{
                border: none !important;
                border: 1px solid #DCE0E5 !important ;
            }

            .card-header{
                border-bottom: 1px solid #DCE0E5 !important;
            }

            .progress{
                padding: 0px;
                height: 18px !important;
            }

            .bar{
                background-color: #FF8B03;
        
            }

            .percent{
                position: absolute;
                left: 50%;
                top: 50%;
                color: #000;
                font-size: 13px;
            }

            .vscomp-ele-wrapper{
                /* border: 5px  solid #000; */
                width: 495%;
            }

            .vscomp-toggle-button{
                border-radius: 5px;
                /* background-color: red !important; */
            }
        </style>
    </head>
    
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
                                {{ $jdl }}
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
       
         
        <!-- Page body -->
        <div class="page-body">
            <div class="container-lg">
                <!-- <div class="row row-deck row-cards"> -->
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Form Tambah Anggota</h3>
                        </div>
                        <div class="card-body">
                            <form method="post" action="{{ route('manageTim.storeAnggota') }}">
                                @csrf
                                <div class="form-group mb-3">
                                    <label for="tim_id" class="mb-3">Tim<span style="color:red">*</span></label><br>
                                        <select name="tim_id" id="tim_id" class="form-select">
                                            <option value="">--Plih Tim --</option>
                                            @foreach($tim as  $t)
                                                <option value="{{ $t['id'] }}">{{ $t['nama_tim'] }}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('tim_id'))
                                         <div class="text-danger">{{ $errors->first('tim_id') }}</div>
                                        @endif
                                </div>
                                <div class="form-group mb-3">
                                    <label for="anggota" class="mb-3">Anggota <span style="color:red">*</span></label><br>
                                        <select id="multipleSelect" multiple name="user_id[]" placeholder="Pilih Anggota" data-search="true" data-silent-initial-value-set="true">
                                            @foreach ($user as $us)
                                                @if($us['role'] == 'ADV' || $us['role'] == 'CWM')
                                                    <option value="{{ $us['id'] }}">{{ $us['name'] }}</option>
                                                @endif
                                            @endforeach 
                                        </select>
                                        @if($errors->has('user_id'))
                                            <div class="text-danger"> {{ $errors->first('user_id') }}</div>
                                        @endif
                                </div>
                                <div class="form-group">
                                    <input type="submit" value="Simpan" class="btn btn-primary">
                                    <a href="{{ route('manageTim.index') }}" class="btn btn-dark btn-pill">Kembali</a>
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
    
    <script>
        VirtualSelect.init({ 
            ele: '#multipleSelect'
        });
    </script>

    <!-- JQuery Script Libary -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!-- JQuery  form pulgin -->
    <script src="https://cdn.jsdelivr.net/npm/jquery-form@4.3.0/dist/jquery.form.min.js"></script>


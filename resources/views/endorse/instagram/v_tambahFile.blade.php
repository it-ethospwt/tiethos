<head>
        <title>{{ $jdl }}</title>

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
                            <h3 class="card-title">Form Tambah File Gambar</h3>
                        </div>
                        <div class="card-body">
                            <form method="post" action="\storeFile\{{ $endor->id }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group mb-3">
                                    <input type="hidden" name="endors_id" id="endors_id" value="{{ $endor->id }}" class="form-control" readonly>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="nm_endors" class="mb-3">Nama Endoser</label>
                                    <input type="text" name="" id="nm_endors" value="{{ $endor->nm_endorse }}" class="form-control" readonly>
                                </div>

                                <div class="form-group mb-5">
                                    <label for="file" class="mb-3">File Gambar<span style="color:red">*</span></label>
                                    <input type="file" name="file" id="file" class="form-control">
                                    <label style="font-size: 13px;margin-top:10px">File maksimal  5MB Untuk Gambar(PNG,JPG,JPEG,WPEG,HEIC)</label>
                                    @if($errors->has('file'))
                                    <div class="text-danger">
                                        {{ $errors->first('file') }}
                                    </div>
                                    @endif

                                    <div class="progress mb-3 mt-3">
                                        <div class="bar"></div>
                                        <div class="percent">0%</div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="submit" value="Simpan" class="btn btn-primary">
                                    <a href="/endorse" class="btn btn-dark btn-pill">Kembali</a>
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

    <!-- JQuery Script Libary -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!-- JQuery  form pulgin -->
    <script src="https://cdn.jsdelivr.net/npm/jquery-form@4.3.0/dist/jquery.form.min.js"></script>

    <script>
        $(document).ready(function(){
            var  bar = $('.bar');
            var  percent = $('.percent');


            $('form').ajaxForm({
                beforeSend:function(){
                    var percentVal = '0%';
                    bar.width(percentVal);
                    percent.html(percentVal);
                },
                uploadProgress:function(event,position,total,percentComplate){
                    var  percenVal = percentComplate+'%';
                    bar.width(percenVal);
                    percent.html(percenVal);
                },

                complete:function(response){
                     // Redirect sesuai response dari server
                    window.location.href = response.responseJSON.redirect_urlGambar;

                     // Menampilkan pesan sukses menggunakan SweetAlert
                    if(response.responseJSON.berhasil) {
                    Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: response.responseJSON.berhasil,
                        });
                    }
                } 
            });
        });
    </script>


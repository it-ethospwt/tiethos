<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/rowreorder/1.4.1/css/rowReorder.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css">

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
                            {{$jdl}}
                        </h2>
                    </div>
                </div>
                <div class="btn-tambahUser mt-4 mb-2">
                    <button type="button" class="btn btn-danger btn-pill" onclick="window.history.back()">Back</button>
                </div>
            </div>
        </div>
        <!-- Page body -->
        <div class="page-body">
            <div class="container-xl">
                <!-- <div class="row row-deck row-cards"> -->
                <div class="col-md-12">
                    <form class="card" action="/toko" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label required">Produk</label>
                                <select class="form-control" name="product_id" id="product_id">
                                    @foreach ($product as $p)
                                    <option value="<?= $p['id']; ?>"><?= $p['nm_product']; ?></option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">Judul</label>
                                <div>
                                    <input type="text" name="title" class="form-control" aria-describedby="emailHelp" placeholder="Input Judul">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">Sumber Konten</label>
                                <select class="form-control" id="konten" name="konten">
                                    <option value="Agency Luar">Agency Luar</option>
                                    <option value="ccp">ccp</option>
                                    <option value="cwm">cwm</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">Upload Konten Video</label>
                                <div class="input-group">
                                    <input type="file" class="form-control" id="video" name="video" accept="video/mp4, video/mov">
                                    <button class="btn btn-outline-secondary" type="button" id="upload-button">Upload</button>
                                </div>
                                <small class="form-hint">File max 20mb dengan format mp4, mov, avi</small>
                            </div>
                            <div id="progress" style="display: none;">
                                <div class="progress">
                                    <div id="progress-bar" class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;">
                                        0%
                                    </div>
                                </div>
                            </div>
                            <div class="footer">
                                <button type="submit" class="btn btn-success btn-pill" id="submit-button">Submit</button>
                                <button type="reset" class="btn btn-secondary btn-pill">Reset</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.getElementById('submit-button').addEventListener('click', function() {
        var fileInput = document.getElementById('video');
        var file = fileInput.files[0];
        if (file) {
            var formData = new FormData();
            formData.append('file', file);

            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'url/to/upload/endpoint', true);

            xhr.upload.onprogress = function(e) {
                if (e.lengthComputable) {
                    var percentComplete = (e.loaded / e.total) * 100;
                    document.getElementById('progress').style.display = 'block';

                    // Membagi progress menjadi beberapa tahapan
                    var progressStages = [25, 50, 75, 100];
                    var currentStage = 0;
                    for (var i = 0; i < progressStages.length; i++) {
                        if (percentComplete <= progressStages[i]) {
                            currentStage = i;
                            break;
                        }
                    }

                    // Menampilkan progress sesuai tahapan
                    document.getElementById('progress-bar').style.width = progressStages[currentStage] + '%';
                    document.getElementById('progress-bar').innerHTML = progressStages[currentStage] + '%';
                }
            };

            xhr.onload = function() {
                if (xhr.status === 200) {
                    // File uploaded successfully
                    console.log('File uploaded successfully');
                    // Add code here to submit the form
                    document.getElementById('submit-button').closest('form').submit();
                } else {
                    // Error uploading file
                    console.error('Error uploading file');
                }
            };

            xhr.send(formData);
        } else {
            // No file selected
            console.error('No file selected');
        }
    });
</script>

@include('dash.footer')
@include('sweetalert::alert')
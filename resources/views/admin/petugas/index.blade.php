@extends('admin.layouts.main')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-lg-12 mb-4 order-0">
                <div class="row">
                    <div class="col-xxl">
                        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Layouts/</span> petugas</h4>
                        <!-- Table Layout Start -->
                        <div class="card mb-4">
                            <div class="table-responsive p-3">
                            
                                <button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal"
                                    data-bs-target="#petugasTambah">
                                    <i class="menu-icon tf-icons bx bx-plus m-0"></i>Tambah
                                </button>

                                <!-- Tabel  Start-->
                                <div id="dataPage">
                                    <div class="d-flex justify-content-center mt-3">
                                        <div class="spinner-border" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- Tabel End-->
                            </div>
                        </div>
                        <!-- Table Layout End -->
                        <!-- Modal Tambah Start -->
                        <div class="modal fade" id="petugasTambah" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel3">Tambah petugas</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                    <p id="error-modal"></p>
                                        <!-- Form Layout Start-->
                                        <form action="" method="post" id="add_petugas_form">
                                            @csrf 
                                            <!-- Personal Information -->
                                            <div>
                                                <!-- Kode Petugas -->
                                                <div class="mb-3">
                                                    <label for="kode_petugas" class="form-label">Kode Petugas</label>
                                                    <input type="text" class="form-control" id="kode_petugas" name="kode_petugas" />
                                                </div>
                                        
                                                <!-- Nama -->
                                                <div class="mb-3">
                                                    <label for="nama" class="form-label">Nama</label>
                                                    <input type="text" class="form-control" id="nama" name="nama" />
                                                </div>
                                        
                                                <!-- Jenis Kelamin -->
                                                <div class="mb-3">
                                                    <label for="jeniskelamin class="form-label">Jenis Kelamin</label>
                                                    <select class="form-select" id="jeniskelamin" name="jeniskelamin" required>
                                                        <option value="" disabled selected>Pilih Jenis Kelamin</option>
                                                        <option value="Laki-laki">Laki-laki</option>
                                                        <option value="Perempuan">Perempuan</option>
                                                    </select>
                                                </div>
                                        
                                                <!-- Tempat Lahir -->
                                                <div class="mb-3">
                                                    <label for="tempatlahir" class="form-label">Tempat Lahir</label>
                                                    <input type="text" class="form-control" id="tempatlahir" name="tempatlahir"/>
                                                </div>
                                        
                                                <!-- Tanggal Lahir -->
                                                <div class="mb-3">
                                                    <label for="tanggallahir" class="form-label">Tanggal Lahir</label>
                                                    <input type="date" class="form-control" id="tanggallahir" name="tanggallahir" />
                                                </div>
                                            </div>
                                        
                                            <!-- Contact Information -->
                                            <div>
                                                <!-- Email -->
                                                <div class="mb-3">
                                                    <label for="email" class="form-label">Email</label>
                                                    <input type="email" class="form-control" id="email" name="email" />
                                                </div>
                                        
                                                <!-- Password -->
                                                <div class="mb-3">
                                                    <label for="password" class="form-label">Password</label>
                                                    <input type="password" class="form-control" id="password" name="password"/>
                                                </div>
                                        
                                                <!-- Telepon -->
                                                <div class="mb-3">
                                                    <label for="telepon" class="form-label">Telepon</label>
                                                    <input type="tel" class="form-control" id="telepon" name="telepon" />
                                                </div>
                                        
                                                <!-- Alamat -->
                                                <div class="mb-3">
                                                    <label for="alamat" class="form-label">Alamat</label>
                                                    <textarea class="form-control" id="alamat" name="alamat"></textarea>
                                                </div>
                                            </div>
                                        
                                            <!-- Image -->
                                            <div class="mb-3">
                                                <label for="formFileTambah" class="form-label">Foto <span class=" text-muted">(png/jpg)</span></label>
                                                <input type="file" class="form-control" type="file" id="image" name="foto" onchange="previewImage()" />
                                                <img id="img-preview" class="my-2 col-sm-5" alt="">
                                            </div>
                                        
                                            <div class="row justify-content-end">
                                                <div class="col-sm-12">
                                                    <button type="submit" class="btn btn-primary" name="simpan" id="add_petugas_btn">Simpan</button>
                                                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
                                                </div>
                                            </div>
                                        </form>                                        
                                        <!-- Form Layout End-->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal Tambah End -->
                        <!-- Modal Edit Start -->
                        <div class="modal fade" id="petugasEdit" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel3">Edit petugas</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                    <p id="error-modal"></p>
                                        <!-- Form Layout Start-->
                                        <form action="" method="post" id="edit_petugas_form">
                                            @csrf 
                                            <input type="hidden" name="id_petugas" id="id_petugasedit">
                                            <!-- Personal Information -->
                                            <div class="mb-3">
                                                <!-- Kode Petugas -->
                                                <label for="kode_petugasEdit" class="form-label">Kode Petugas</label>
                                                <input type="text" class="form-control" id="kode_petugasEdit" name="kode_petugas" />
                                                <span id="error-kode_petugas" class="text-danger"></span>
                                            </div>
                                            <div class="mb-3">
                                                <!-- Nama -->
                                                <label for="namaEdit" class="form-label">Nama</label>
                                                <input type="text" class="form-control" id="namaEdit" name="nama" value="" />
                                                <span id="error-nama" class="text-danger"></span>
                                            </div>
                                        
                                            <div class="mb-3">
                                                <!-- Jenis Kelamin -->
                                                <label for="jeniskelaminNew" class="form-label">Jenis Kelamin</label>
                                                <select class="form-select" id="jeniskelaminNew" name="jeniskelamin" required>
                                                    <option>-- Pilih Jenis Kelamin --</option>
                                                    @foreach ($jeniskelamin as $item)
                                                        <option value="{{ $item->jeniskelamin }}">
                                                            {{ $item->jeniskelamin }}
                                                        </option>
                                                    @endforeach
                                                </select>         
                                                <span id="error-jeniskelamin" class="text-danger"></span>                                       
                                            </div>

                                            <div class="mb-3">
                                                <!-- Tempat Lahir -->
                                                <label for="tempatlahirEdit" class="form-label">Tempat Lahir</label>
                                                <input type="text" class="form-control" id="tempatlahirEdit" name="tempatlahir" />
                                                <span id="error-tempatlahir" class="text-danger"></span>
                                            </div>
                                        
                                            <div class="mb-3">
                                                <!-- Tanggal Lahir -->
                                                <label for="tanggallahirEdit" class="form-label">Tanggal Lahir</label>
                                                <input type="date" class="form-control" id="tanggallahirEdit" name="tanggallahir" />
                                                <span id="error-tanggallahir" class="text-danger"></span>
                                            </div>
                                        
                                            <!-- Contact Information -->
                                            <div class="mb-3">
                                                <!-- Email -->
                                                <label for="emailEdit" class="form-label">Email</label>
                                                <input type="email" class="form-control" id="emailEdit" name="email" />
                                                <span id="error-email" class="text-danger"></span>
                                            </div>

                                            <div class="mb-3">
                                                <!-- Password -->
                                                <label for="passwordEdit" class="form-label">Password</label>
                                                <input type="password" class="form-control" id="passwordEdit" name="password" />
                                                <span id="error-password" class="text-danger"></span>
                                            </div>
                                            
                                            <div class="mb-3">
                                                <!-- Telepon -->
                                                <label for="teleponEdit" class="form-label">Telepon</label>
                                                <input type="tel" class="form-control" id="teleponEdit" name="telepon" />
                                                <span id="error-telepon" class="text-danger"></span>
                                            </div>

                                            <div class="mb-3">
                                                <!-- Alamat -->
                                                <label for="alamatEdit" class="form-label">Alamat</label>
                                                <textarea class="form-control" id="alamatEdit" name="alamat"></textarea>
                                                <span id="error-alamat" class="text-danger"></span>
                                            </div>
                                        
                                            <!-- Image -->
                                            <div>
                                                <label for="formFileEdit" class="form-label">Foto <span 
                                                    class="text-muted">(png/jpg)</span></label>
                                                    <input type="file" class="form-control" type="file" id="imageEdit"
                                                    name="foto" onchange="previewImageEdit()" />
                                                <img id="img-previewEdit" class="my-2 col-sm-5" alt="">
                                                <span id="error-foto" class="text-danger"></span>
                                            </div>
                                        
                                            <div class="row justify-content-end">
                                                <div class="col-sm-12">
                                                    <button type="submit" class="btn btn-primary" name="simpan" id="edit_petugas_btn">Simpan</button>
                                                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
                                                </div>
                                            </div>
                                        </form>
                                        <!-- Form Layout End-->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal Edit End -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(function() {

            // add ajax request
            // jika form dengan id add_petugas_form disubmit
            $("#add_petugas_form").submit(function(e) {
                // jeda untuk melakukan proses pengecekan
                e.preventDefault();
                // simpan isi form dalam obyek dataForm
                const dataForm = new FormData(this);
                // ganti tulisan button simpan
                $("#add_petugas_btn").text('Adding ...');
                $.ajax({
                    // panggil route name save.petugas
                    url: '{{ route('save.petugas') }}',
                    // method pengiriman data POST
                    method: 'POST',
                    // isi data: obyek dataForm
                    data: dataForm,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    // jika sukses return respon json
                    success: function(response) {
                        // console.log(response.message);
                        // jika respon array key:status = 200
                        if (response.status == 200) {
                            // tampilkan data dengan mengirimkan parameter array key:succes
                            fetch('success', 'Berhasil tambah data');
                            // reset isi formulir tambah
                            $("#add_petugas_form")[0].reset();
                        } else {
                            // jika respon array key:status selain 200
                            // tampilkan data dengan mengirimkan parameter array key:danger
                            fetch('danger', 'Gagal tambah data');
                        }
                        // kembalikan tulisan button simpan
                        $("#add_petugas_btn").text('Submit');
                        // tutup tampilan modal petugas tambah
                        $("#petugasTambah").modal('hide');
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.log(jqXHR);
                        $('#error-modal').html(jqXHR.responseJSON.message);
                        $('#error-modal').addClass('alert alert-danger');
                        $("#add_petugas_btn").text('Submit');
                    }
                });
            });

              // delete ajax request
            // jika class deletepetugas pada datapetugas.blade di klik
            $(document).on('click', '.deletepetugas', function(e) {
                // jeda untuk melakukan proses pengecekan
                e.preventDefault();
                // buat variabel id dengan isi data dari atribut id pada class detelepetugas
                let id = $(this).attr('id');
                // buat variabel csrf
                let csrf = '{{ csrf_token() }}';
                // jika confirm hapus true
                if (confirm('Yakin hapus data ini ?')) {
                    $.ajax({
                        // panggil route name delete.petugas
                        url: '{{ route('delete.petugas') }}',
                        // methode DELETE
                        method: 'DELETE',
                        // isi data : id_petugas dan token
                        data: {
                            id_petugas: id,
                            _token: csrf
                        },
                        // jika sukses return respon json
                        success: function(response) {
                            // jika respon array key:status = 200
                            if (response.status == 200) {
                                // tampilkan data dengan mengirimkan parameter array key:succes
                                fetch('success', 'Berhasil hapus data');
                            } else {
                                // jika respon array key:status selain 200
                                // tampilkan data dengan mengirimkan parameter array key:danger
                                fetch('danger', 'Gagal hapus data');
                            }
                        }
                    });
                } else {
                    // jika confirm hapus false/ tidak hapus
                    // tampilkan data dengan mengirimkan parameter array key:info
                    fetch('info', 'Data aman');
                }

            });

            // edit ajax request
            // jika class editpetugas pada datapetugas.blade di klik
            $(document).on('click', '.editpetugas', function(e) {
                // jeda untuk melakukan proses pengecekan
                e.preventDefault();
                // buat variabel id dengan isi data dari atribut id pada class editpetugas
                let id = $(this).attr('id');
                $.ajax({
                    // panggil route name edit.petugas
                    url: '{{ route('edit.petugas') }}',
                    // method GET
                    method: 'GET',
                    // isi data : id_petugas dan token
                    data: {
                        id_petugas: id,
                        _token: '{{ csrf_token() }}'
                    },
                    // jika sukses return respon json
                    success: function(response) {
                        // tampilkan setiap value dari id inputan form
                        $("#id_petugasedit").val(response.id_petugas);
                        $("#kode_petugasEdit").val(response.kode_petugas);
                        $("#namaEdit").val(response.nama);
                        $("#jeniskelaminNew").val(response.jeniskelamin);
                        $("#tempatlahirEdit").val(response.tempatlahir);
                        $("#tanggallahirEdit").val(response.tanggallahir);
                        $("#emailEdit").val(response.email);
                        $("#passwordEdit").val(response.password);
                        $("#teleponEdit").val(response.telepon);
                        $("#alamatEdit").val(response.alamat);
                    }
                });
            });

            // update ajax request
            // jika form dengan id edit_petugas_form disubmit
            $("#edit_petugas_form").submit(function(e) {
                // jeda untuk melakukan proses pengecekan
                e.preventDefault();
                // dapatkan form edit
                var form = $('#edit_petugas_form')[0];
                // simpan isi form dalam obyek dataForm
                var dataForm = new FormData(form);
                // ganti tulisan button simpan
                $("#edit_petugas_btn").text('Updating ...');
                $.ajax({
                    // panggil route name update.petugas
                    url: '{{ route('update.petugas') }}',
                    // method POST
                    method: 'POST',
                    // isi data: obyek dataForm
                    data: dataForm,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    // jika sukses return respons json
                    success: function(response) {
                        // jika respon array key:status = 200
                        if (response.status == 200) {
                            // tampilkan data dengan mengirimkan parameter array key:succes
                            fetch('success', 'Berhasil edit data');
                        } else {
                            // jika respon array key:status selain 200
                            // tampilkan data dengan mengirimkan parameter array key:danger
                            fetch('danger', 'Gagal edit data');

                        }
                        // kembalikan tulisan button simpan
                        $("#edit_petugas_btn").text('Submit');
                        // tutup tampilan modal petugas edit
                        $("#petugasEdit").modal('hide');
                    },
                    error: function(xhr) {
                        // Handle errors
                        if (xhr.status === 422) {
                            var errors = xhr.responseJSON.errors;

                            // Loop through errors and display them in the corresponding element
                            $.each(errors, function(key, value) {
                                $('#error-' + key).text(value);
                                // Add the 'is-invalid' class to the input with an error
                                $('[name="' + key + '"]').addClass('is-invalid');
                            });
                            // Prevent the default console error handling
                            return false;
                        } else {
                            fetch('danger', 'Hubungi Admin');
                        }
                    }
                });
            });

            //get record
            fetch('', '');

            // fungsi menampilkan data
            //parameter String type dan message
            function fetch(type = '', message = '') {
                $.ajax({
                    // panggil route name fetch.petugas
                    url: '{{ route('fetch.petugas') }}',
                    // method GET
                    method: 'GET',
                    // jika sukses return respons json
                    success: function(response) {
                        // isi id dataPage dengan sintax html berisi response
                        $("#dataPage").html(response);
                        // buat tag table menjadi datatable
                        $("table").DataTable({
                            order: [0, 'desc']
                        });
                        // jika parameter type dan message tidak kosong
                        if (type && message) {
                            // Buat element alert sesuai parameter
                            const alertHtml =
                                `<div class="alert alert-${type} alert-dismissible fade show" role="alert">
                                ${message}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>`;
                            // tampilkan element alert pada class .alert-notif pada view datapetugas.blade
                            $(".alert-notif").append(alertHtml);

                        }

                    }
                });
            }
        });

        // fungsi menampilkan foto pada form tambah
        function previewImage() {
            // pilih foto pada input file dengan id image
            const image = document.querySelector('#image');
            // pilih tempat tampil foto pada id img-preview
            const imgPreview = document.querySelector('#img-preview')
            const blob = URL.createObjectURL(image.files[0]);
            imgPreview.src = blob;
        }

        // fungsi menampilkan foto pada form edit
        function previewImageEdit() {
            // pilih foto pada input file dengan id imageEdit
            const image = document.querySelector('#imageEdit');
            // pilih tempat tampil foto pada id img-previewEdit
            const imgPreview = document.querySelector('#img-previewEdit')
            // buat blob dari const image
            const blob = URL.createObjectURL(image.files[0]);
            // tampilkan blob pada imgPreview
            imgPreview.src = blob;
        }
    </script>
@endsection

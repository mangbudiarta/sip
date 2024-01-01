@extends('admin.layouts.main')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-lg-12 mb-4 order-0">
                <div class="row">
                    <div class="col-xxl">
                        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">UMKM/</span> Gambar</h4>
                        <div class="card mb-4">
                            <div class="card-header d-flex align-items-center justify-content-between">
                                <h5 class="mb-0">Data UMKM Gambar</h5>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="col-form-label" for="namaumkm">Nama UMKM</label>
                                    <input type="text" class="form-control" id="namaumkm" name="namaumkm" disabled
                                        readonly value="{{ $umkm->namaumkm }}" />
                                </div>
                            </div>
                        </div>

                        <div class="card mb-4">
                            <div class="table-responsive p-3">
                                <button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal"
                                    data-bs-target="#GambarTambah">
                                    <i class="menu-icon tf-icons bx bx-plus m-0"></i>Tambah
                                </button>
                                <input type="hidden" class="id_umkm" data-id="{{ $umkm->id_umkm }}">
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
                        <!-- Modal Tambah Start -->
                        <div class="modal fade" id="GambarTambah" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="ModalTambah">Tambah Gambar</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Form Layout Start-->
                                        <form action="" method="post" id="add_gambar_form">
                                            @csrf
                                            <input type="hidden" name="id_umkm" id="id_umkm"
                                                value="{{ $umkm->id_umkm }}">
                                            <div>
                                                <label for="image" class="form-label">Gambar <span
                                                        class=" text-muted">(png/jpg)</span></label>
                                                <input type="file" class="form-control" type="file" id="image"
                                                    name="gambar" onchange="previewImage()" />
                                                <img id="img-preview" class="my-2 col-sm-5" alt="">
                                                <span id="error-gambar" class="text-danger"></span>
                                            </div>
                                            <div class="row justify-content-end">
                                                <div class="col-sm-12">
                                                    <button type="submit" class="btn btn-primary" id="add_gambar_btn"
                                                        name="simpan">Simpan</button>
                                                    <button type="button" class="btn btn-outline-secondary"
                                                        data-bs-dismiss="modal">
                                                        Close
                                                    </button>
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
                        <div class="modal fade" id="GambarEdit" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="ModalEdit">Edit Gambar</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Form Layout Start-->
                                        <form action="" method="post" id="edit_gambar_form">
                                            @csrf
                                            <input type="hidden" name="id_umkm" id="id_umkmedit"
                                                value="{{ $umkm->id_umkm }}">
                                            <input type="hidden" name="id_gambar" id="id_gambaredit">
                                            <div>
                                                <label for="image" class="form-label">Gambar <span
                                                        class=" text-muted">(png/jpg)</span></label>
                                                <input type="file" class="form-control" type="file" id="imageEdit"
                                                    name="gambar" onchange="previewImageEdit()" />
                                                <img id="img-previewEdit" class="my-2 col-sm-5" alt="">
                                                <span id="error-gambar-edit" class="text-danger"></span>
                                            </div>
                                            <div class="row justify-content-end">
                                                <div class="col-sm-12">
                                                    <button type="submit" class="btn btn-primary" id="edit_gambar_btn"
                                                        name="simpan">Simpan</button>
                                                    <button type="button" class="btn btn-outline-secondary"
                                                        data-bs-dismiss="modal">
                                                        Close
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                        <!-- Form Layout End-->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal Tambah End -->

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(function() {

            // add ajax request
            // jika form dengan id add_gambar_form disubmit
            $("#add_gambar_form").submit(function(e) {
                // jeda untuk melakukan proses pengecekan
                e.preventDefault();
                // simpan isi form dalam obyek dataForm
                const dataForm = new FormData(this);
                // ganti tulisan button simpan
                $("#add_gambar_btn").text('Adding ...');
                $.ajax({
                    // panggil route name save.umkmgambar
                    url: '{{ route('save.umkmgambar') }}',
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
                        // jika respon array key:status = 200
                        if (response.status == 200) {
                            // tampilkan data dengan mengirimkan parameter array key:succes
                            fetch('success', 'Berhasil tambah data');
                            // reset isi formulir tambah
                            $("#add_gambar_form")[0].reset();
                        } else {
                            // jika respon array key:status selain 200
                            // tampilkan data dengan mengirimkan parameter array key:danger
                            fetch('danger', 'Gagal tambah data');
                        }
                        // kembalikan tulisan button simpan
                        $("#add_gambar_btn").text('Submit');
                        // tutup tampilan modal gambar tambah
                        $("#GambarTambah").modal('hide');
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

            // delete ajax request
            // jika class deletegambar pada datagambar.blade di klik
            $(document).on('click', '.deletegambar', function(e) {
                // jeda untuk melakukan proses pengecekan
                e.preventDefault();
                // buat variabel id dengan isi data dari atribut id pada class detelegambar
                let id = $(this).attr('id');
                // buat variabel csrf
                let csrf = '{{ csrf_token() }}';
                // jika confirm hapus true
                if (confirm('Yakin hapus data ini ?')) {
                    $.ajax({
                        // panggil route name delete.umkmgambar
                        url: '{{ route('delete.umkmgambar') }}',
                        // methode DELETE
                        method: 'DELETE',
                        // isi data : id_gambar dan token
                        data: {
                            id_gambar: id,
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
            // jika class editgambar pada datagambar.blade di klik
            $(document).on('click', '.editgambar', function(e) {
                // jeda untuk melakukan proses pengecekan
                e.preventDefault();
                // buat variabel id dengan isi data dari atribut id pada class editgambar
                let id = $(this).attr('id');
                $.ajax({
                    // panggil route name edit.umkmgambar
                    url: '{{ route('edit.umkmgambar') }}',
                    // method GET
                    method: 'GET',
                    // isi data : id_gambar dan token
                    data: {
                        id_gambar: id,
                        _token: '{{ csrf_token() }}'
                    },
                    // jika sukses return respon json
                    success: function(response) {
                        // tampilkan setiap value dari id inputan form
                        $("#id_gambaredit").val(response.id_gambar);
                        $("#id_umkmedit").val(response.id_umkm);
                    }
                });
            });

            // update ajax request
            // jika form dengan id edit_gambar_form disubmit
            $("#edit_gambar_form").submit(function(e) {
                // jeda untuk melakukan proses pengecekan
                e.preventDefault();
                // dapatkan form edit
                var form = $('#edit_gambar_form')[0];
                // simpan isi form dalam obyek dataForm
                var dataForm = new FormData(form);
                // ganti tulisan button simpan
                $("#edit_gambar_btn").text('Updating ...');
                $.ajax({
                    // panggil route name update.umkmgambar
                    url: '{{ route('update.umkmgambar') }}',
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
                        $("#edit_gambar_btn").text('Submit');
                        // tutup tampilan modal gambar edit
                        $("#GambarEdit").modal('hide');
                    },
                    error: function(xhr) {
                        // Handle errors
                        if (xhr.status === 422) {
                            var errors = xhr.responseJSON.errors;

                            // Loop through errors and display them in the corresponding element
                            $.each(errors, function(key, value) {
                                $('#error-' + key + '-edit').text(value);
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
                // buat variabel id dengan isi data dari atribut id pada class detelegambar
                let id = $('.id_umkm').data('id');
                $.ajax({
                    // panggil route name fetch.umkmgambar
                    url: '{{ route('fetch.umkmgambar') }}',
                    // method GET
                    method: 'GET',
                    data: {
                        id_umkm: id
                    },
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
                            // tampilkan element alert pada class .alert-notif pada view datagambar.blade
                            $(".alert-notif").append(alertHtml);

                        }

                    }
                });
            }
        });

        // fungsi menampilkan gambar pada form tambah
        function previewImage() {
            // pilih gambar pada input file dengan id image
            const image = document.querySelector('#image');
            // pilih tempat tampil gambar pada id img-preview
            const imgPreview = document.querySelector('#img-preview')
            const blob = URL.createObjectURL(image.files[0]);
            imgPreview.src = blob;
        }

        // fungsi menampilkan gambar pada form edit
        function previewImageEdit() {
            // pilih gambar pada input file dengan id imageEdit
            const image = document.querySelector('#imageEdit');
            // pilih tempat tampil gambar pada id img-previewEdit
            const imgPreview = document.querySelector('#img-previewEdit')
            // buat blob dari const image
            const blob = URL.createObjectURL(image.files[0]);
            // tampilkan blob pada imgPreview
            imgPreview.src = blob;
        }
    </script>
@endsection

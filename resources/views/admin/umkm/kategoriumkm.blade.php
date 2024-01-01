@extends('admin.layouts.main')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-lg-12 mb-4 order-0">
                <div class="row">
                    <div class="col-xxl">
                        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">UMKM/</span> Kategori</h4>
                        <!-- Table Layout Start -->
                        <div class="card mb-4">
                            <div class="table-responsive p-3">
                                <button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal"
                                    data-bs-target="#KategoriTambah">
                                    <i class="menu-icon tf-icons bx bx-plus m-0"></i>Tambah
                                </button>
                                <!-- Tabel Start-->
                                <div id="dataPage">
                                    <div class="d-flex justify-content-center mt-3">
                                        <div class="spinner-border" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- Tabel End -->
                            </div>
                        </div>
                        <!-- Table Layout End -->
                        <!-- Modal Tambah Start -->
                        <div class="modal fade" id="KategoriTambah" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="ModalTambah">Tambah Kategori</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Form Layout Start-->
                                        <form action="" method="post" id="add_kategori_form">
                                            @csrf
                                            <div class="mb-3">
                                                <label class="col-form-label" for="namakategori">Nama Kategori</label>
                                                <input type="text" class="form-control" id="namakategori"
                                                    name="namakategori" placeholder="ex : Alam" />
                                                <span id="error-namakategori" class="text-danger"></span>
                                            </div>
                                            <div class="row justify-content-end">
                                                <div class="col-sm-12">
                                                    <button type="submit" class="btn btn-primary" name="simpan"
                                                        id="add_kategori_btn">Simpan</button>
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
                        <div class="modal fade" id="KategoriEdit" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="ModalEdit">Edit Kategori</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Form Layout Start-->
                                        <form action="" method="post" id="edit_kategori_form">
                                            @csrf
                                            <input type="hidden" class="form-control" id="id_kategori"
                                                name="id_kategori" />
                                            <div class="mb-3">
                                                <label class="col-form-label" for="namakategoriedit">Nama Kategori</label>
                                                <input type="text" class="form-control" id="namakategoriedit"
                                                    name="namakategori" placeholder="ex : Alam" />
                                                <span id="error-namakategori-edit" class="text-danger"></span>
                                            </div>
                                            <div class="row justify-content-end">
                                                <div class="col-sm-12">
                                                    <button type="submit" class="btn btn-primary" name="simpan"
                                                        id="edit_kategori_btn">Simpan</button>
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
                        <!-- Modal Edit End -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(function() {

            // add ajax request
            // jika form dengan id add_kategori_form disubmit
            $("#add_kategori_form").submit(function(e) {
                // jeda untuk melakukan proses pengecekan
                e.preventDefault();
                // simpan isi form dalam obyek dataForm
                const dataForm = new FormData(this);
                // ganti tulisan button simpan
                $("#add_kategori_btn").text('Adding ...');
                $.ajax({
                    // panggil route name save.kategoriumkm
                    url: '{{ route('save.kategoriumkm') }}',
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
                            $("#add_kategori_form")[0].reset();
                        } else {
                            // jika respon array key:status selain 200
                            // tampilkan data dengan mengirimkan parameter array key:danger
                            fetch('danger', 'Gagal tambah data');
                        }
                        // kembalikan tulisan button simpan
                        $("#add_kategori_btn").text('Simpan');
                        // tutup tampilan modal kategori tambah
                        $("#KategoriTambah").modal('hide');
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
            // jika class deletekategori pada datakategori.blade di klik
            $(document).on('click', '.deletekategori', function(e) {
                // jeda untuk melakukan proses pengecekan
                e.preventDefault();
                // buat variabel id dengan isi data dari atribut id pada class detelekategori
                let id = $(this).attr('id');
                // buat variabel csrf
                let csrf = '{{ csrf_token() }}';
                // jika confirm hapus true
                if (confirm('Yakin hapus data ini ?')) {
                    $.ajax({
                        // panggil route name delete.kategoriumkm
                        url: '{{ route('delete.kategoriumkm') }}',
                        // method DELETE
                        method: 'DELETE',
                        // isi data: id_kategori dan token
                        data: {
                            id_kategori: id,
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
            // jika class editkategori pada datakategori.blade di klik
            $(document).on('click', '.editkategori', function(e) {
                // jeda untuk melakukan proses pengecekan
                e.preventDefault();
                // buat variabel id dengan isi data dari atribut id pada class editkategori
                let id = $(this).attr('id');
                $.ajax({
                    // panggil route name edit.kategoriumkm
                    url: '{{ route('edit.kategoriumkm') }}',
                    // method GET
                    method: 'GET',
                    // isi data : id_kategori dan token
                    data: {
                        id_kategori: id,
                        _token: '{{ csrf_token() }}'
                    },
                    // jika sukses return respon json
                    success: function(response) {
                        // tampilkan setiap value dari id inputan form
                        $("#namakategoriedit").val(response.namakategori);
                        $("#id_kategori").val(response.id_kategori);
                    }
                });
            });

            // update ajax request
            // jika form dengan id edit_kategori_form disubmit
            $("#edit_kategori_form").submit(function(e) {
                // jeda untuk melakukan proses pengecekan
                e.preventDefault();
                // Get form
                var form = $('#edit_kategori_form')[0];
                // simpan isi form dalam obyek dataForm
                var dataForm = new FormData(form);
                // ganti tulisan button simpan
                $("#edit_kategori_btn").text('Updating ...');
                $.ajax({
                    // panggil route name update.kategoriumkm
                    url: '{{ route('update.kategoriumkm') }}',
                    // method POST
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
                            fetch('success', 'Berhasil edit data');
                        } else {
                            // jika respon array key:status selain 200
                            // tampilkan data dengan mengirimkan parameter array key:danger
                            fetch('danger', 'Gagal edit data');
                        }
                        // kembalikan tulisan button simpan
                        $("#edit_kategori_btn").text('Simpan');
                        // tutup tampilan modal kategori edit
                        $("#KategoriEdit").modal('hide');
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
                $.ajax({
                    // panggil route name fetch.kategoriumkm
                    url: '{{ route('fetch.kategoriumkm') }}',
                    // method GET
                    method: 'GET',
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
                            // tampilkan element alert pada class .alert-notif pada view datakategori.blade
                            $(".alert-notif").append(alertHtml);
                        }
                    }
                });
            }
        });
    </script>
@endsection

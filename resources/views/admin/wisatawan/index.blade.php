@extends('admin.layouts.main')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-lg-12 mb-4 order-0">
                <div class="row">
                    <div class="col-xxl">
                        <h4 class="fw-bold py-3 mb-4">Wisatawan</h4>
                        <!-- Table Layout Start -->
                        <div class="card mb-4">
                            <div class="table-responsive p-3">

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
                        <!-- Modal Edit Start -->
                        <div class="modal fade" id="WisatawanEdit" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="ModalEdit">Edit Wisatawan</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Form Layout Start-->
                                        <form action="" method="post" id="edit_wisatawan_form">
                                            @csrf
                                            <input type="hidden" class="form-control" id="id_wisatawanedit"
                                                name="id_wisatawan" />
                                            <div class="mb-3">
                                                <label class="col-form-label" for="namaedit">Nama Wisatawan</label>
                                                <input type="text" class="form-control" id="namaedit" name="nama"
                                                    placeholder="ex : Nama Wisatawan" required />
                                            </div>
                                            <div class="mb-3">
                                                <label class="col-form-label" for="emailedit">Email</label>
                                                <input type="email" class="form-control" id="emailedit" name="email"
                                                    placeholder="ex : Email" required readonly />
                                            </div>
                                            <div>
                                                <label for="imageEdit" class="form-label">Gambar Cover<span
                                                        class=" text-muted">(png/jpg Max: 1 Mb)</span></label>
                                                <input type="file" class="form-control" type="file" id="imageEdit"
                                                    name="foto" onchange="previewImageEdit()" />
                                                <img id="img-previewEdit" class="my-2 col-sm-5" alt="">
                                            </div>
                                            <div class="row justify-content-end">
                                                <div class="col-sm-12">
                                                    <button type="submit" class="btn btn-primary" name="simpan"
                                                        id="edit_wisatawan_btn">Simpan</button>
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
            // delete ajax request
            // jika class deletewisatawan pada datawisatawan.blade di klik
            $(document).on('click', '.deletewisatawan', function(e) {
                // jeda untuk melakukan proses pengecekan
                e.preventDefault();
                // buat variabel id dengan isi data dari atribut id pada class detelewisatawan
                let id = $(this).attr('id');
                // buat variabel csrf
                let csrf = '{{ csrf_token() }}';
                // jika confirm hapus true
                if (confirm('Yakin hapus data ini ?')) {
                    $.ajax({
                        // panggil route name delete.wisatawan
                        url: '{{ route('delete.wisatawan') }}',
                        // methode DELETE
                        method: 'DELETE',
                        // isi data : id_wisatawan dan token
                        data: {
                            id_wisatawan: id,
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
            // jika class editwisatawan pada datawisatawan.blade di klik
            $(document).on('click', '.editwisatawan', function(e) {
                // jeda untuk melakukan proses pengecekan
                e.preventDefault();
                // buat variabel id dengan isi data dari atribut id pada class editwisatawan
                let id = $(this).attr('id');
                $.ajax({
                    // panggil route name edit.wisatawan
                    url: '{{ route('edit.wisatawan') }}',
                    // method GET
                    method: 'GET',
                    // isi data : id_wisatawan dan token
                    data: {
                        id_wisatawan: id,
                        _token: '{{ csrf_token() }}'
                    },
                    // jika sukses return respon json
                    success: function(response) {
                        // tampilkan setiap value dari id inputan form
                        $("#id_wisatawanedit").val(response.id_wisatawan);
                        $("#namaedit").val(response.nama);
                        $("#emailedit").val(response.email);
                    }
                });
            });

            // update ajax request
            // jika form dengan id edit_wisatawan_form disubmit
            $("#edit_wisatawan_form").submit(function(e) {
                // jeda untuk melakukan proses pengecekan
                e.preventDefault();
                // dapatkan form edit
                var form = $('#edit_wisatawan_form')[0];
                // simpan isi form dalam obyek dataForm
                var dataForm = new FormData(form);
                // ganti tulisan button simpan
                $("#edit_wisatawan_btn").text('Updating ...');
                $.ajax({
                    // panggil route name update.wisatawan
                    url: '{{ route('update.wisatawan') }}',
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
                        $("#edit_wisatawan_btn").text('Submit');
                        // tutup tampilan modal wisatawan edit
                        $("#WisatawanEdit").modal('hide');
                    }
                });
            });

            //get record
            fetch('', '');

            // fungsi menampilkan data
            //parameter String type dan message
            function fetch(type = '', message = '') {
                $.ajax({
                    // panggil route name fetch.wisatawan
                    url: '{{ route('fetch.wisatawan') }}',
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
                            // tampilkan element alert pada class .alert-notif pada view datawisatawan.blade
                            $(".alert-notif").append(alertHtml);

                        }

                    }
                });
            }
        });

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

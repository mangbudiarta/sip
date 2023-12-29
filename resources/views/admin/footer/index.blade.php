@extends('admin.layouts.main')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-lg-12 mb-4 order-0">
                <div class="row">
                    <div class="col-xxl">
                        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Layouts/</span> footer</h4>
                        <!-- Table Layout Start -->
                        <div class="card mb-4">
                            <div class="table-responsive p-3">
                                <button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal"
                                    data-bs-target="#footerTambah">
                                    <i class="menu-icon tf-icons bx bx-plus m-0"></i>Tambah
                                </button>

                                <!-- Tabel  Start-->
                                <div id="dataPage">
                                    <div class="d-flex justify-content-center mt-3">
                                        <div class="spinner-border"  role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- Tabel End-->

                            </div>
                        </div>
                        <!-- Table Layout End -->
                        <!-- Modal Tambah Start -->
                        <div class="modal fade" id="footerTambah" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="ModalTambah">Tambah footer</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Form Layout Start-->
                                        <form action="" method="post" id="add_footer_form">
                                            @csrf
                                            <div class="mb-3">
                                                <label class="col-form-label" for="deskripsiTambah">Deskripsi footer</label>
                                                <textarea id="deskripsiTambah" class="form-control" name="deskripsi"
                                                placeholder="ex: Desa Candikuning merupakan desa wisata yang ada di Tabanan"
                                                aria-label="ex: Desa Candikuning merupakan desa wisata yang ada di Tabanan"
                                                aria-describedby="Deskrispi footer Tambah" required></textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label class="col-form-label" for="petaTambah">Peta footer</label>
                                                <input type="text" class="form-control" id="petaTambah" name="peta"
                                                    placeholder=" ex : https://loremipsun/loremm" required/>
                                            </div>
                                            <div>
                                                <label for="formFileTambah" class="form-label">Gambar <span
                                                        class=" text-muted">(png/jpg)</span></label>
                                                        <input type="file" class="form-control" type="file" id="image"
                                                    name="gambar" onchange="previewImage()" />
                                                <img id="img-preview" class="my-2 col-sm-5" alt="">
                                            </div>
                                            <div class="row justify-content-end">
                                                <div class="col-sm-12">
                                                    <button type="submit" class="btn btn-primary" id="add_footer_btn"
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
                        <div class="modal fade" id="footerEdit" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="ModalEdit">Edit footer</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Form Layout Start-->
                                        <form action="" method="post" id="edit_footer_form">
                                            @csrf
                                            <input type="hidden" name="id_footer" id="id_footeredit">
                                            <div class="mb-3">
                                                <label class="col-form-label" for="deskripsiEdit">Deskripsi footer</label>
                                                <textarea id="deskripsiEdit" class="form-control" name="deskripsi"
                                                placeholder="ex: Desa Candikuning merupakan desa wisata yang ada di Tabanan"
                                                aria-label="ex: Desa Candikuning merupakan desa wisata yang ada di Tabanan"
                                                aria-describedby="Deskripsi footer Edit" required></textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label class="col-form-label" for="petaEdit">Peta footer</label>
                                                <input type="text" class="form-control" id="petaEdit" name="peta"
                                                    placeholder="ex : https://loremipsun/loremm" required/>
                                            </div>
                                            <div>
                                                <label for="formFileEdit" class="form-label">Gambar <span
                                                        class=" text-muted">(png/jpg)</span></label>
                                                        <input type="file" class="form-control" type="file" id="imageEdit"
                                                        name="gambar" onchange="previewImageEdit()" />
                                                <img id="img-previewEdit" class="my-2 col-sm-5" alt="">
                                            </div>
                                            <div class="row justify-content-end">
                                                <div class="col-sm-12">
                                                    <button type="submit" class="btn btn-primary" id="edit_footer_btn"
                                                        name="simpan">Simpan</button>
                                                    <button type="button" class="btn btn-outline-secondary"
                                                        data-bs-dismiss="modal">
                                                        Batal
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
                <script>
        $(function() {

            // add ajax request
            // jika form dengan id add_footer_form disubmit
            $("#add_footer_form").submit(function(e) {
                // jeda untuk melakukan proses pengecekan
                e.preventDefault();
                // simpan isi form dalam obyek dataForm
                const dataForm = new FormData(this);
                // ganti tulisan button simpan
                $("#add_footer_btn").text('Adding ...');
                $.ajax({
                    // panggil route name save.footer
                    url: '{{ route('save.footer') }}',
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
                            $("#add_footer_form")[0].reset();
                        } else {
                            // jika respon array key:status selain 200
                            // tampilkan data dengan mengirimkan parameter array key:danger
                            fetch('danger', 'Gagal tambah data');
                        }
                        // kembalikan tulisan button simpan
                        $("#add_footer_btn").text('Submit');
                        // tutup tampilan modal footer tambah
                        $("#footerTambah").modal('hide');
                    }
                });
            });

            // delete ajax request
            // jika class deletefooter pada datafooter.blade di klik
            $(document).on('click', '.deletefooter', function(e) {
                // jeda untuk melakukan proses pengecekan
                e.preventDefault();
                // buat variabel id dengan isi data dari atribut id pada class detelefooter
                let id = $(this).attr('id');
                // buat variabel csrf
                let csrf = '{{ csrf_token() }}';
                // jika confirm hapus true
                if (confirm('Yakin hapus data ini ?')) {
                    $.ajax({
                        // panggil route name delete.footer
                        url: '{{ route('delete.footer') }}',
                        // methode DELETE
                        method: 'DELETE',
                        // isi data : id_footer dan token
                        data: {
                            id_footer: id,
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
            // jika class editfooter pada datafooter.blade di klik
            $(document).on('click', '.editfooter', function(e) {
                // jeda untuk melakukan proses pengecekan
                e.preventDefault();
                // buat variabel id dengan isi data dari atribut id pada class editfooter
                let id = $(this).attr('id');
                $.ajax({
                    // panggil route name edit.footer
                    url: '{{ route('edit.footer') }}',
                    // method GET
                    method: 'GET',
                    // isi data : id_footer dan token
                    data: {
                        id_footer: id,
                        _token: '{{ csrf_token() }}'
                    },
                    // jika sukses return respon json
                    success: function(response) {
                        // tampilkan setiap value dari id inputan form
                        $("#id_footeredit").val(response.id_footer);
                        $("#deskripsiEdit").val(response.deskripsi);
                        $("#petaEdit").val(response.peta);
                    }
                });
            });

            // update ajax request
            // jika form dengan id edit_footer_form disubmit
            $("#edit_footer_form").submit(function(e) {
                // jeda untuk melakukan proses pengecekan
                e.preventDefault();
                // dapatkan form edit
                var form = $('#edit_footer_form')[0];
                // simpan isi form dalam obyek dataForm
                var dataForm = new FormData(form);
                // ganti tulisan button simpan
                $("#edit_footer_btn").text('Updating ...');
                $.ajax({
                    // panggil route name update.footer
                    url: '{{ route('update.footer') }}',
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
                        $("#edit_footer_btn").text('Submit');
                        // tutup tampilan modal footer edit
                        $("#footerEdit").modal('hide');
                    }
                });
            });

            //get record
            fetch('', '');

            // fungsi menampilkan data
            //parameter String type dan message
            function fetch(type = '', message = '') {
                $.ajax({
                    // panggil route name fetch.footer
                    url: '{{ route('fetch.footer') }}',
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
                            // tampilkan element alert pada class .alert-notif pada view datafooter.blade
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

@extends('admin.layouts.main')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-lg-12 mb-4 order-0">
                <div class="row">
                    <div class="col-xxl">
                        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Layouts/</span> Info Wilayah</h4>

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

                        <!-- Modal Tambah Start -->
                        <div class="modal fade" id="InfoWilayahTambah" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="ModalTambah">Tambah Info Wilayah</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Form Layout Start-->
                                        <form action="" method="post" id="add_infowilayah_form">
                                            @csrf
                                            <div class="mb-3">
                                                <label class="col-form-label" for="judul">Judul</label>
                                                <input type="text" class="form-control" id="judul"
                                                    name="judul" placeholder="ex : Desa Candikuning" required />
                                            </div>
                                            <div class="mb-3">
                                                <label class="col-form-label" for="deskripsi">Deskripsi</label>
                                                <textarea id="deskripsi" class="form-control" name="deskripsi" placeholder="ex: Homestay Terbaik Di Candikuning"
                                                    aria-label="ex: Homestay Terbaik Di Candikuning" aria-describedby="basic-icon-default-message2"></textarea>
                                            </div>
                                            <div>
                                                <label for="formFile1" class="form-label">Gambar Cover<span
                                                        class=" text-muted">(png/jpg)</span></label>
                                                <input type="file" class="form-control" type="file" id="image"
                                                    name="gambarcover" onchange="previewImage()" />
                                                <img id="img-preview" class="my-2 col-sm-5" alt="">
                                            </div>
                                            <div class="row justify-content-end">
                                                <div class="col-sm-12">
                                                    <button type="submit" class="btn btn-primary"
                                                        name="simpan"id="add_infowilayah_btn">Simpan</button>
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
                        <div class="modal fade" id="InfoWilayahEdit" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel3">Edit Banner</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Form Layout Start-->
                                        <form action="" method="post" id="edit_infowilayah_form">
                                            @csrf
                                            <input type="hidden" name="id_infowilayah" id="id_infowilayahedit">
                                            <div class="mb-3">
                                                <label class="col-form-label" for="judulinfo">Judul</label>
                                                <input type="text" class="form-control" id="judulinfo" name="judul"
                                                    placeholder="ex : Desa Wisata & Indah" />
                                            </div>
                                            <div class="mb-3">
                                                <label class="col-form-label" for="deskripsi">Deskripsi</label>
                                                <textarea id="deskripsiedit" class="form-control" name="deskripsi"
                                                    placeholder="ex: Desa Candikuning merupakan desa wisata yang ada di Tabanan"
                                                    aria-label="ex: Desa Candikuning merupakan desa wisata yang ada di Tabanan"
                                                    aria-describedby="basic-icon-default-message2"></textarea>
                                            </div>
                                            <div>
                                                <label for="formFile" class="form-label">Gambar Cover<span
                                                        class=" text-muted">(png/jpg)</span></label>
                                                <input type="file" class="form-control" type="file" id="imageEdit"
                                                    name="gambarcover" onchange="previewImageEdit()" />
                                                <div class="overflow-auto">
                                                    <img id="img-previewEdit" class="my-2" alt="">
                                                </div>
                                            </div>
                                            <div class="row justify-content-end">
                                                <div class="col-sm-12">
                                                    <button type="submit" class="btn btn-primary"
                                                        name="simpan" id="edit_infowilayah">Simpan</button>
                                                    <button type="button" class="btn btn-outline-secondary"
                                                        data-bs-dismiss="modal">Batal</button>
                                                </div>
                                            </div>
                                        </form>
                                        <!-- Form Layout End-->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal Edit End -->

                        <!-- Modal Detail Start-->
                        <div class="modal fade" id="InfoWilayahDetail" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="ModalDetail">Detail Info Wilayah</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Form Layout Start-->
                                        <form id="detail_infowilayah_form">
                                            @csrf
                                            <input type="hidden" name="id_infowilayah">
                                            <div id="img-previewdetail" class="my-2 d-flex justify-content-center"
                                                alt="">
                                            </div>
                                            <div class="mb-3">
                                                <label class="col-form-label" for="judul">Judul</label>
                                                <input type="text" class="form-control" id="juduldetail"
                                                    name="judul" placeholder="ex : Kadek Homestay" readonly
                                                    required />
                                            </div>
                                            <div class="mb-3">
                                                <label class="col-form-label" for="detail">Deskripsi</label>
                                                <textarea id="deskripsidetail" class="form-control" name="deskripsi"
                                                    placeholder="ex: Homestay Terbaik Di Candikuning" aria-label="ex: Homestay Terbaik Di Candikuning"
                                                    aria-describedby="basic-icon-default-message2" readonly required></textarea>
                                            </div>
                                            <div class="row justify-content-end">
                                                <div class="col-sm-12">
                                                    <button type="button" class="btn btn-secondary"
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
                        <!-- Modal Detail End -->

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(function() {

            // add ajax request
            // jika form dengan id add_infowilayah_form disubmit
            $("#add_infowilayah_form").submit(function(e) {
                // jeda untuk melakukan proses pengecekan
                e.preventDefault();
                // simpan isi form dalam obyek dataForm
                const dataForm = new FormData(this);
                // ganti tulisan button simpan
                $("#add_infowilayah_btn").text('Adding ...');
                $.ajax({
                    // panggil route name save.infowilayah
                    url: '{{ route('save.infowilayah') }}',
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
                            $("#add_infowilayah_form")[0].reset();
                        } else {
                            // jika respon array key:status selain 200
                            // tampilkan data dengan mengirimkan parameter array key:danger
                            fetch('danger', 'Gagal tambah data');
                        }
                        // kembalikan tulisan button simpan
                        $("#add_infowilayah_btn").text('Submit');
                        // tutup tampilan modal infowilayah tambah
                        $("#InfoWilayahTambah").modal('hide');
                    }
                });
            });

            // delete ajax request
            // jika class deleteinfowilayah pada datainfowilayah.blade di klik
            $(document).on('click', '.deleteInfoWilayah', function(e) {
                // jeda untuk melakukan proses pengecekan
                e.preventDefault();
                // buat variabel id dengan isi data dari atribut id pada class deteleinfowilayah
                let id = $(this).attr('id');
                // buat variabel csrf
                let csrf = '{{ csrf_token() }}';
                // jika confirm hapus true
                if (confirm('Yakin hapus data ini ?')) {
                    $.ajax({
                        // panggil route name delete.infowilayah
                        url: '{{ route('delete.infowilayah') }}',
                        // methode DELETE
                        method: 'DELETE',
                        // isi data : id_infowilayah dan token
                        data: {
                            id_infowilayah: id,
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

            // detail ajax request
            // jika class detailinfowilayah pada datainfowilayah.blade di klik
            $(document).on('click', '.detailInfoWilayah', function(e) {
                // jeda untuk melakukan proses pengecekan
                e.preventDefault();
                // buat variabel id dengan isi data dari atribut id pada class detailinfowilayah
                let id = $(this).attr('id');
                $.ajax({
                    // panggil route name detail.infowilayah
                    url: '{{ route('detail.infowilayah') }}',
                    // method GET
                    method: 'GET',
                    // isi data : id_infowilayah dan token
                    data: {
                        id_infowilayah: id,
                        _token: '{{ csrf_token() }}'
                    },
                    // jika sukses return respon json
                    success: function(response) {
                        // tampilkan setiap value dari id inputan form
                        $("#juduldetail").val(response.infowilayah.judul);
                        $("#deskripsidetail").val(response.infowilayah.deskripsi);
                        // id img-previewdetail menampilkan gambar dari lokasi penyimpanan
                        $("#img-previewdetail").html(
                            `<img src="{{ asset('/storage/infowilayah_img/${response.infowilayah.gambarcover}') }}" width="200" height="200" class="img-fluid img-thumbnail">`
                        );
                    }
                });
            });

            // edit ajax request
            // jika class editinfowilayah pada datainfowilayah.blade di klik
            $(document).on('click', '.editInfoWilayah', function(e) {
                // jeda untuk melakukan proses pengecekan
                e.preventDefault();
                // buat variabel id dengan isi data dari atribut id pada class editinfowilayah
                let id = $(this).attr('id');
                $.ajax({
                    // panggil route name edit.infowilayah
                    url: '{{ route('edit.infowilayah') }}',
                    // method GET
                    method: 'GET',
                    // isi data : id_infowilayah dan token
                    data: {
                        id_infowilayah: id,
                        _token: '{{ csrf_token() }}'
                    },
                    // jika sukses return respon json
                    success: function(response) {
                        // tampilkan setiap value dari id inputan form
                        $("#id_infowilayahedit").val(response.id_infowilayah);
                        $("#judulinfo").val(response.judul);
                        $("#deskripsiedit").val(response.deskripsi);
                    }
                });
            });

            // update ajax request
            // jika form dengan id edit_infowilayah_form disubmit
            $("#edit_infowilayah_form").submit(function(e) {
                // jeda untuk melakukan proses pengecekan
                e.preventDefault();
                // dapatkan form edit
                var form = $('#edit_infowilayah_form')[0];
                // simpan isi form dalam obyek dataForm
                var dataForm = new FormData(form);
                // ganti tulisan button simpan
                $("#edit_infowilayah_btn").text('Updating ...');
                $.ajax({
                    // panggil route name update.infowilayah
                    url: '{{ route('update.infowilayah') }}',
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
                        $("#edit_infowilayah_btn").text('Submit');
                        // tutup tampilan modal infowilayah edit
                        $("#InfoWilayahEdit").modal('hide');
                    }
                });
            });

            //get record
            fetch('', '');

            // fungsi menampilkan data
            //parameter String type dan message
            function fetch(type = '', message = '') {
                $.ajax({
                    // panggil route name fetch.infowilayah
                    url: '{{ route('fetch.infowilayah') }}',
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
                            // tampilkan element alert pada class .alert-notif pada view datafasilitas.blade
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

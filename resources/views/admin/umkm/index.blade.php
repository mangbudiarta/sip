@extends('admin.layouts.main')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-lg-12 mb-4 order-0">
                <div class="row">
                    <div class="col-xxl">
                        <h4 class="fw-bold py-3 mb-4">UMKM</h4>

                        <!-- Table Layout Start -->
                        <div class="card mb-4">
                            <div class="table-responsive p-3">
                                <button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal"
                                    data-bs-target="#ModalUmkmTambah">
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
                        <div class="modal fade" id="ModalUmkmTambah" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="ModalUmkmTambah">Tambah UMKM</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Form Layout Start-->
                                        <form action="" method="post" id="add_umkm_form">
                                            @csrf
                                            <div class="mb-3">
                                                <label class="col-form-label" for="namaumkm">Nama UMKM</label>
                                                <input type="text" class="form-control" id="namaumkm" name="namaumkm"
                                                    placeholder="ex : UMKM Teko" required oninput="generateSlugTambah()" />
                                                <span id="error-namaumkm" class="text-danger"></span>
                                            </div>
                                            <div class="mb-3">
                                                <label class="col-form-label" for="slug">Slug</label>
                                                <input type="text" class="form-control" id="slug" name="slug"
                                                    placeholder="ex : UMKM-Teko" required readonly />
                                                <span id="error-slug" class="text-danger"></span>
                                            </div>
                                            <div class="mb-3">
                                                <label class="col-form-label" for="deskripsi">Deskripsi</label>
                                                <textarea id="deskripsi" class="form-control editor" name="deskripsi"
                                                    placeholder="ex: UMKM Teko adalah umkm yang ada di Desa Candikuning"
                                                    aria-label="ex: UMKM Teko adalah umkm yang ada di Desa Candikuning" cols="100%" rows="10"
                                                    aria-describedby="basic-icon-default-message2" required></textarea>
                                                <span id="error-deskripsi" class="text-danger"></span>
                                            </div>
                                            <div class="mb-3">
                                                <label class="col-form-label" for="infopemilik">Info Pemilik <span
                                                        class=" text-muted">(no telepon/media sosial)</span></label>
                                                <input type="text" class="form-control" id="infopemilik"
                                                    name="infopemilik" placeholder="ex: +62831123123" required />
                                                <span id="error-infopemilik" class="text-danger"></span>
                                            </div>
                                            <div class="mb-3">
                                                <label class="col-form-label" for="kategori">Kategori</label>
                                                {{-- Select option value from database --}}
                                                <select class="form-select form-select" name="id_kategori" id="kategori"
                                                    required>
                                                    <option>-- Pilih Kategori --</option>
                                                    @foreach ($kategori as $item)
                                                        <option value="{{ $item->id_kategori }}">
                                                            {{ $item->namakategori }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <span id="error-id_kategori" class="text-danger"></span>
                                            </div>
                                            <div>
                                                <label for="formFile2" class="form-label">Gambar Cover<span
                                                        class=" text-muted">(png/jpg)</span></label>
                                                <input type="file" class="form-control" type="file" id="image"
                                                    name="gambarcover" onchange="previewImage()" />
                                                <img id="img-preview" class="my-2 col-sm-5" alt="">
                                                <span id="error-gambarcover" class="text-danger"></span>
                                            </div>
                                            <div class="row justify-content-end">
                                                <div class="col-sm-12">
                                                    <button type="submit" class="btn btn-primary" name="simpan"
                                                        id="add_umkm_btn">Simpan</button>
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
                        <div class="modal fade" id="UmkmEdit" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="ModalEdit">Edit UMKM</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Form Layout Start-->
                                        <form action="" method="post" id="edit_umkm_form">
                                            @csrf
                                            <input type="hidden" class="form-control" id="id_umkm" name="id_umkm" />
                                            <div class="mb-3">
                                                <label class="col-form-label" for="namaumkmedit">Nama UMKM</label>
                                                <input type="text" class="form-control" id="namaumkmedit"
                                                    name="namaumkm" placeholder="ex : UMKM Teko" required
                                                    oninput="generateSlugEdit()" />
                                                <span id="error-namaumkm-edit" class="text-danger"></span>
                                            </div>
                                            <div class="mb-3">
                                                <label class="col-form-label" for="slugedit">Slug</label>
                                                <input type="text" class="form-control" id="slugedit" name="slug"
                                                    placeholder="ex : UMKM-Teko" required readonly />
                                                <span id="error-slug-edit" class="text-danger"></span>
                                            </div>
                                            <div class="mb-3">
                                                <label class="col-form-label" for="deskripsiedit">Deskripsi</label>
                                                <textarea id="deskripsiedit" class="form-control editoredit" name="deskripsi"
                                                    placeholder="ex: UMKM Teko adalah umkm yang ada di Desa Candikuning"
                                                    aria-label="ex: UMKM Teko adalah umkm yang ada di Desa Candikuning" aria-describedby="basic-icon-default-message2"
                                                    cols="100%" rows="10" required></textarea>
                                                <span id="error-deskripsi-edit" class="text-danger"></span>
                                            </div>
                                            <div class="mb-3">
                                                <label class="col-form-label" for="pemilikedit">Info Pemilik<span
                                                        class=" text-muted">(no telepon/media sosial)</span></label>
                                                <input type="text" class="form-control" id="pemilikedit"
                                                    name="infopemilik" placeholder="ex: +62831123123" required />
                                                <span id="error-pemilik-edit" class="text-danger"></span>
                                            </div>
                                            <div class="mb-3">
                                                <label class="col-form-label" for="kategoriedit">Kategori <span
                                                        class=" text-muted">(data kategori berasal dari menu
                                                        kategori)</span></label>
                                                {{-- Select option value from database --}}
                                                <select class="form-select form-select" name="id_kategori"
                                                    id="kategoriedit" required>
                                                    <option>-- Pilih Kategori --</option>
                                                    @foreach ($kategori as $item)
                                                        <option value="{{ $item->id_kategori }}">
                                                            {{ $item->namakategori }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <span id="error-id_kategori-edit" class="text-danger"></span>
                                            </div>
                                            <div>
                                                <label for="formFile2" class="form-label">Gambar Cover<span
                                                        class=" text-muted">(png/jpg)</span></label>
                                                <input type="file" class="form-control" type="file" id="imageEdit"
                                                    name="gambarcover" onchange="previewImageEdit()" />
                                                <img id="img-previewEdit" class="my-2 col-sm-5" alt="">
                                                <span id="error-gambarcover-edit" class="text-danger"></span>
                                            </div>
                                            <div class="row justify-content-end">
                                                <div class="col-sm-12">
                                                    <button type="submit" class="btn btn-primary" name="simpan"
                                                        id="edit_umkm_btn">Simpan</button>
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
                        <!-- Modal Detail Start -->
                        <div class="modal fade" id="UmkmDetail" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="ModalEdit">Detail UMKM</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Form Layout Start-->
                                        <form action="" method="post">
                                            @csrf
                                            <input type="hidden" class="form-control" id="id_umkm" name="id_umkm" />
                                            <div id="img-previewdetail" class="my-2 d-flex justify-content-center"
                                                alt="">
                                            </div>
                                            <div class="mb-3">
                                                <label class="col-form-label" for="namaumkmdetail">Nama UMKM</label>
                                                <input type="text" class="form-control" id="namaumkmdetail"
                                                    name="namaumkm" placeholder="ex : UMKM Teko" readonly />
                                            </div>
                                            <div class="mb-3">
                                                <label class="col-form-label" for="slugdetail">Slug</label>
                                                <input type="text" class="form-control" id="slugdetail"
                                                    name="slug" placeholder="ex : UMKM-Teko" readonly />
                                            </div>
                                            <div class="mb-3">
                                                <label class="col-form-label" for="deskripsidetail">Deskripsi</label>
                                                <textarea id="deskripsidetail" class="form-control editoredit" name="deskripsi"
                                                    placeholder="ex: UMKM Teko adalah umkm yang ada di Desa Candikuning"
                                                    aria-label="ex: UMKM Teko adalah umkm yang ada di Desa Candikuning" aria-describedby="basic-icon-default-message2"
                                                    cols="100%" rows="10" readonly></textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label class="col-form-label" for="pemilikdetail">Info Pemilik<span
                                                        class=" text-muted">(no telepon/media sosial)</span></label>
                                                <input type="text" class="form-control" id="pemilikdetail"
                                                    name="infopemilik" placeholder="ex: +62831123123" readonly />
                                            </div>
                                            <div class="mb-3">
                                                <label class="col-form-label" for="kategoridetail">Kategori <span
                                                        class=" text-muted">(data kategori berasal dari menu
                                                        kategori)</span></label>
                                                {{-- Select option value from database --}}
                                                <select class="form-select form-select" name="id_kategori"
                                                    id="kategoridetail" disabled>
                                                    <option>-- Pilih Kategori --</option>
                                                    @foreach ($kategori as $item)
                                                        <option value="{{ $item->id_kategori }}">
                                                            {{ $item->namakategori }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="row justify-content-end">
                                                <div class="col-sm-12">
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
                        <!-- Modal Detail End -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(function() {

            // add ajax request
            // jika form dengan id add_umkm_form disubmit
            $("#add_umkm_form").submit(function(e) {
                // jeda untuk melakukan proses pengecekan
                e.preventDefault();
                // simpan isi form dalam obyek dataForm
                const dataForm = new FormData(this);
                // ganti tulisan button simpan
                $("#add_umkm_btn").text('Adding ...');
                $.ajax({
                    // panggil route name save.umkm
                    url: '{{ route('save.umkm') }}',
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
                            $("#add_umkm_form")[0].reset();
                        } else {
                            // jika respon array key:status selain 200
                            // tampilkan data dengan mengirimkan parameter array key:danger
                            fetch('danger', 'Gagal tambah data');
                        }
                        // kembalikan tulisan button simpan
                        $("#add_umkm_btn").text('Submit');
                        // tutup tampilan modal umkm tambah
                        $("#ModalUmkmTambah").modal('hide');
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
            // jika class deletefasilitas pada dataumkm.blade di klik
            $(document).on('click', '.deleteumkm', function(e) {
                // jeda untuk melakukan proses pengecekan
                e.preventDefault();
                // buat variabel id dengan isi data dari atribut id pada class deteleumkm
                let id = $(this).attr('id');
                // buat variabel csrf
                let csrf = '{{ csrf_token() }}';
                // jika confirm hapus true
                if (confirm('Yakin hapus data ini ?')) {
                    $.ajax({
                        // panggil route name delete.umkm
                        url: '{{ route('delete.umkm') }}',
                        // methode DELETE
                        method: 'DELETE',
                        // isi data : id_umkm dan token
                        data: {
                            id_umkm: id,
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
            // jika class detailUmkm pada dataumkm.blade di klik
            $(document).on('click', '.detailUmkm', function(e) {
                // jeda untuk melakukan proses pengecekan
                e.preventDefault();
                // buat variabel id dengan isi data dari atribut id pada class detailUmkm
                let id = $(this).attr('id');
                $.ajax({
                    // panggil route name detail.umkm
                    url: '{{ route('detail.umkm') }}',
                    // method GET
                    method: 'GET',
                    // isi data : id_umkm dan token
                    data: {
                        id_umkm: id,
                        _token: '{{ csrf_token() }}'
                    },
                    // jika sukses return respon json
                    success: function(response) {
                        // tampilkan setiap value dari id inputan form
                        $("#namaumkmdetail").val(response.umkm.namaumkm);
                        $("#slugdetail").val(response.umkm.slug);
                        $("#deskripsidetail").val(response.umkm.deskripsi);
                        $("#pemilikdetail").val(response.umkm.infopemilik);
                        $("#kategoridetail").val(response.umkm.id_kategori);
                        // id img-previewdetail menampilkan gambar dari lokasi penyimpanan WKWKW OKE
                        $("#img-previewdetail").html(
                            `<img src="{{ asset('/storage/umkm_img/${response.umkm.gambarcover}') }}" width="200" height="200" class="img-fluid img-thumbnail">`
                        );
                    }
                });
            });

            // edit ajax request
            // jika class editumkm pada dataumkm.blade di klik
            $(document).on('click', '.editumkm', function(e) {
                // jeda untuk melakukan proses pengecekan
                e.preventDefault();
                // buat variabel id dengan isi data dari atribut id pada class editumkm
                let id = $(this).attr('id');
                $.ajax({
                    // panggil route name edit.umkm
                    url: '{{ route('edit.umkm') }}',
                    // method GET
                    method: 'GET',
                    // isi data : id_umkm dan token
                    data: {
                        id_umkm: id,
                        _token: '{{ csrf_token() }}'
                    },
                    // jika sukses return respon json
                    success: function(response) {
                        // tampilkan setiap value dari id inputan form
                        $("#id_umkm").val(response.id_umkm);
                        $("#namaumkmedit").val(response.namaumkm);
                        $("#slugedit").val(response.slug);
                        $("#deskripsiedit").val(response.deskripsi);
                        $("#pemilikedit").val(response.infopemilik);
                        $("#kategoriedit").val(response.id_kategori);
                    }
                });
            });

            // update ajax request
            // jika form dengan id edit_umkm_form disubmit
            $("#edit_umkm_form").submit(function(e) {
                // jeda untuk melakukan proses pengecekan
                e.preventDefault();
                // dapatkan form edit
                var form = $('#edit_umkm_form')[0];
                // simpan isi form dalam obyek dataForm
                var dataForm = new FormData(form);
                // ganti tulisan button simpan
                $("#edit_umkm_btn").text('Updating ...');
                $.ajax({
                    // panggil route name update.umkm
                    url: '{{ route('update.umkm') }}',
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
                        $("#edit_umkm_btn").text('Submit');
                        // tutup tampilan modal umkm edit
                        $("#UmkmEdit").modal('hide');
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
                    // panggil route name fetch.umkm
                    url: '{{ route('fetch.umkm') }}',
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

        // fungsi membuat slug otomatis
        function generateSlugTambah() {
            const titleInput = document.getElementById('namaumkm');
            const slugInput = document.getElementById('slug');

            const title = titleInput.value.trim().toLowerCase();
            const slug = title.replace(/\s+/g, '-').slice(0, 50); // Mengambil hanya 50 karakter pertama

            slugInput.value = slug;
        }

        function generateSlugEdit() {
            const titleInput = document.getElementById('namaumkmedit');
            const slugInput = document.getElementById('slugedit');

            const title = titleInput.value.trim().toLowerCase();
            const slug = title.replace(/\s+/g, '-').slice(0, 50); // Mengambil hanya 50 karakter pertama

            slugInput.value = slug;
        }
    </script>
@endsection

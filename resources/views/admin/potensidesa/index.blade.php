@extends('admin.layouts.main')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-lg-12 mb-4 order-0">
                <div class="row">
                    <div class="col-xxl">
                        <h4 class="fw-bold py-3 mb-4">Potensi Desa</h4>

                        <!-- Table Layout Start -->
                        <div class="card mb-4">
                            <div class="table-responsive p-3">
                                <button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal"
                                    data-bs-target="#PotensiTambah">
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
                        <div class="modal fade" id="PotensiTambah" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="ModalTambah">Tambah Potensi Desa</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Form Layout Start-->
                                        <form action="" method="post" id="add_potensi_form">
                                            @csrf
                                            <div class="mb-3">
                                                <label class="col-form-label" for="namapotensi">Nama Potensi</label>
                                                <input type="text" class="form-control" id="namapotensi"
                                                    name="namapotensi" placeholder="ex : Pantai Kaca" required
                                                    oninput="generateSlugTambah()" />
                                            </div>
                                            <div class="mb-3">
                                                <label class="col-form-label" for="lokasi">Maps Lokasi</label>
                                                <input type="text" class="form-control" id="lokasi" name="lokasi"
                                                    placeholder="ex : https:maps.google.com/ssss" required />
                                            </div>
                                            <div class="mb-3">
                                                <label class="col-form-label" for="slug">Slug</label>
                                                <input type="text" class="form-control" id="slug" name="slug"
                                                    placeholder="ex : Pantai-Kaca" required readonly />
                                            </div>
                                            <div class="mb-3">
                                                <label class="col-form-label" for="deskripsi">Deskripsi</label>
                                                <textarea id="deskripsi" class="form-control editor" name="deskripsi"
                                                    placeholder="ex: Desa Candikuning merupakan desa wisata yang ada di Tabanan"
                                                    aria-label="ex: Desa Candikuning merupakan desa wisata yang ada di Tabanan"
                                                    aria-describedby="basic-icon-default-message2" required></textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label class="col-form-label" for="PenulisTambah">Penulis</label>
                                                <input type="text" class="form-control" id="PenulisTambah" name="penulis"
                                                    value="Admin" readonly required />
                                            </div>
                                            <div class="mb-3">
                                                <label class="col-form-label" for="tglposting">Tanggal posting</label>
                                                <input type="date" class="form-control" id="tglposting"
                                                    name="tanggalposting" placeholder="ex :23/08/2023" required readonly />
                                            </div>
                                            <div class="mb-3">
                                                <label class="col-form-label" for="kategori">KategoriKategori <span
                                                        class=" text-muted">(data kategori berasal dari menu
                                                        kategori)</span></label>
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
                                            </div>
                                            <div>
                                                <label for="image" class="form-label">Gambar Cover<span
                                                        class=" text-muted">(png/jpg Max: 1 Mb)</span></label>
                                                <input type="file" class="form-control" type="file" id="image"
                                                    name="gambarcover" onchange="previewImage()" />
                                                <img id="img-preview" class="my-2 col-sm-5" alt="">
                                            </div>
                                            <div class="row justify-content-end">
                                                <div class="col-sm-12">
                                                    <button type="submit" class="btn btn-primary" name="simpan"
                                                        id="add_potensi_btn">Simpan</button>
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
                        <div class="modal fade" id="PotensiEdit" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="ModalEdit">Edit Potensi Desa</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Form Layout Start-->
                                        <form action="" method="post" id="edit_potensi_form">
                                            @csrf
                                            <input type="hidden" class="form-control" id="id_potensidesa"
                                                name="id_potensidesa" />
                                            <div class="mb-3">
                                                <label class="col-form-label" for="namapotensiedit">Nama Potensi</label>
                                                <input type="text" class="form-control" id="namapotensiedit"
                                                    name="namapotensi" placeholder="ex : Pantai Kaca" required
                                                    oninput="generateSlugEdit()" />
                                            </div>
                                            <div class="mb-3">
                                                <label class="col-form-label" for="lokasiedit">Maps Lokasi</label>
                                                <input type="text" class="form-control" id="lokasiedit"
                                                    name="lokasi" placeholder="ex : https:maps.google.com/ssss"
                                                    required />
                                            </div>
                                            <div class="mb-3">
                                                <label class="col-form-label" for="slugedit">Slug</label>
                                                <input type="text" class="form-control" id="slugedit" name="slug"
                                                    placeholder="ex : Pantai-Kaca" required readonly />
                                            </div>
                                            <div class="mb-3">
                                                <label class="col-form-label" for="deskripsiedit">Deskripsi</label>
                                                <textarea id="deskripsiedit" class="form-control editoredit" name="deskripsi"
                                                    placeholder="ex: Desa Candikuning merupakan desa wisata yang ada di Tabanan"
                                                    aria-label="ex: Desa Candikuning merupakan desa wisata yang ada di Tabanan"
                                                    aria-describedby="basic-icon-default-message2" required></textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label class="col-form-label" for="penulisedit">Penulis</label>
                                                <input type="text" class="form-control" id="penulisedit"
                                                    name="penulis" readonly required />
                                            </div>
                                            <div class="mb-3">
                                                <label class="col-form-label" for="tglpostingedit">Tanggal posting</label>
                                                <input type="date" class="form-control" id="tglpostingedit"
                                                    name="tanggalposting" placeholder="ex :23/08/2023" readonly
                                                    required />
                                            </div>
                                            <div class="mb-3">
                                                <label class="col-form-label" for="kategoriedit">KategoriKategori <span
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
                                            </div>
                                            <div>
                                                <label for="imageEdit" class="form-label">Gambar Cover<span
                                                        class=" text-muted">(png/jpg Max: 1 Mb)</span></label>
                                                <input type="file" class="form-control" type="file" id="imageEdit"
                                                    name="gambarcover" onchange="previewImageEdit()" />
                                                <img id="img-previewEdit" class="my-2 col-sm-5" alt="">
                                            </div>
                                            <div class="row justify-content-end">
                                                <div class="col-sm-12">
                                                    <button type="submit" class="btn btn-primary" name="simpan"
                                                        id="edit_potensi_btn">Simpan</button>
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
                        <div class="modal fade" id="PotensiDetail" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="ModalDetail">Detail Potensi Desa</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Form Layout Start-->
                                        <form action="" method="post">
                                            <input type="hidden" class="form-control" id="id_potensidesa"
                                                name="id_potensidesa" />
                                            <div id="img-previewdetail" class="my-2 d-flex justify-content-center"
                                                alt="gambar Potensi desa">
                                            </div>
                                            <div class="mb-3">
                                                <label class="col-form-label" for="namapotensidetail">Nama
                                                    Potensi</label>
                                                <input type="text" class="form-control" id="namapotensidetail"
                                                    name="namapotensi" placeholder="ex : Pantai Kaca" readonly />
                                            </div>
                                            <div class="mb-3">
                                                <label class="col-form-label" for="lokasidetail">Maps Lokasi</label>
                                                <input type="text" class="form-control" id="lokasidetail"
                                                    name="lokasi" placeholder="ex : https:maps.google.com/ssss"
                                                    readonly />
                                            </div>
                                            <div class="mb-3">
                                                <label class="col-form-label" for="slugdetail">Slug</label>
                                                <input type="text" class="form-control" id="slugdetail"
                                                    name="slug" placeholder="ex : Pantai-Kaca" readonly />
                                            </div>
                                            <div class="mb-3">
                                                <label class="col-form-label" for="deskripsidetail">Deskripsi</label>
                                                <textarea id="deskripsidetail" class="form-control editoredit" name="deskripsi"
                                                    placeholder="ex: Desa Candikuning merupakan desa wisata yang ada di Tabanan"
                                                    aria-label="ex: Desa Candikuning merupakan desa wisata yang ada di Tabanan"
                                                    aria-describedby="basic-icon-default-message2"readonly></textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label class="col-form-label" for="penulisdetail">Penulis</label>
                                                <input type="text" class="form-control" id="penulisdetail"
                                                    name="penulis" readonly />
                                            </div>
                                            <div class="mb-3">
                                                <label class="col-form-label" for="tglpostingdetail">Tanggal
                                                    posting</label>
                                                <input type="date" class="form-control" id="tglpostingdetail"
                                                    name="tanggalposting" placeholder="ex :23/08/2023" readonly />
                                            </div>
                                            <div class="mb-3">
                                                <label class="col-form-label" for="kategoridetail">KategoriKategori
                                                    <span class=" text-muted">(data kategori berasal dari menu
                                                        kategori)</span></label>
                                                {{-- Select option value from database --}}
                                                <select class="form-select form-select" name="id_kategori"
                                                    id="kategoridetail" required disabled>
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
            // jika form dengan id add_potensi_form disubmit
            $("#add_potensi_form").submit(function(e) {
                // jeda untuk melakukan proses pengecekan
                e.preventDefault();
                // simpan isi form dalam obyek dataForm
                const dataForm = new FormData(this);
                // ganti tulisan button simpan
                $("#add_potensi_btn").text('Adding ...');
                $.ajax({
                    // panggil route name save.potensidesa
                    url: '{{ route('save.potensidesa') }}',
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
                            $("#add_potensi_form")[0].reset();
                        } else {
                            // jika respon array key:status selain 200
                            // tampilkan data dengan mengirimkan parameter array key:danger
                            fetch('danger', 'Gagal tambah data');
                        }
                        // kembalikan tulisan button simpan
                        $("#add_potensi_btn").text('Submit');
                        // tutup tampilan modal potensi tambah
                        $("#PotensiTambah").modal('hide');
                    }
                });
            });

            // delete ajax request
            // jika class deletepotensi pada datapotensi.blade di klik
            $(document).on('click', '.deletepotensi', function(e) {
                // jeda untuk melakukan proses pengecekan
                e.preventDefault();
                // buat variabel id dengan isi data dari atribut id pada class detelepotensi
                let id = $(this).attr('id');
                // buat variabel csrf
                let csrf = '{{ csrf_token() }}';
                // jika confirm hapus true
                if (confirm('Yakin hapus data ini ?')) {
                    $.ajax({
                        // panggil route name delete.potensidesa
                        url: '{{ route('delete.potensidesa') }}',
                        // methode DELETE
                        method: 'DELETE',
                        // isi data : id_potensi dan token
                        data: {
                            id_potensidesa: id,
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
            // jika class detailpotensi pada datapotensi.blade di klik
            $(document).on('click', '.detailpotensi', function(e) {
                // jeda untuk melakukan proses pengecekan
                e.preventDefault();
                // buat variabel id dengan isi data dari atribut id pada class detailpotensi
                let id = $(this).attr('id');
                $.ajax({
                    // panggil route name detail.potensidesa
                    url: '{{ route('detail.potensidesa') }}',
                    // method GET
                    method: 'GET',
                    // isi data : id_potensi dan token
                    data: {
                        id_potensidesa: id,
                        _token: '{{ csrf_token() }}'
                    },
                    // jika sukses return respon json
                    success: function(response) {
                        // tampilkan setiap value dari id inputan form (pada array key:potensi di potensiController fungsi show)
                        $("#namapotensidetail").val(response.potensidesa.namapotensi);
                        $("#lokasidetail").val(response.potensidesa.lokasi);
                        $("#tglpostingdetail").val(response.potensidesa.tanggalposting);
                        $("#penulisdetail").val(response.potensidesa.penulis);
                        $("#deskripsidetail").val(response.potensidesa.deskripsi);
                        $("#slugdetail").val(response.potensidesa.slug);
                        $("#kategoridetail").val(response.potensidesa.id_kategori);
                        // id img-previewdetail menampilkan gambar dari lokasi penyimpanan
                        $("#img-previewdetail").html(
                            `<img src="{{ asset('/storage/potensi_img/${response.potensidesa.gambarcover}') }}" width="200" height="200" class="img-fluid img-thumbnail">`
                        );
                    }
                });
            });

            // edit ajax request
            // jika class editpotensi pada datapotensi.blade di klik
            $(document).on('click', '.editpotensi', function(e) {
                // jeda untuk melakukan proses pengecekan
                e.preventDefault();
                // buat variabel id dengan isi data dari atribut id pada class editpotensi
                let id = $(this).attr('id');
                $.ajax({
                    // panggil route name edit.potensidesa
                    url: '{{ route('edit.potensidesa') }}',
                    // method GET
                    method: 'GET',
                    // isi data : id_potensi dan token
                    data: {
                        id_potensidesa: id,
                        _token: '{{ csrf_token() }}'
                    },
                    // jika sukses return respon json
                    success: function(response) {
                        // tampilkan setiap value dari id inputan form
                        $("#id_potensidesa").val(response.id_potensidesa);
                        $("#namapotensiedit").val(response.namapotensi);
                        $("#lokasiedit").val(response.lokasi);
                        $("#tglpostingedit").val(response.tanggalposting);
                        $("#penulisedit").val(response.penulis);
                        $("#deskripsiedit").val(response.deskripsi);
                        $("#slugedit").val(response.slug);
                        $("#kategoriedit").val(response.id_kategori);
                    }
                });
            });

            // update ajax request
            // jika form dengan id edit_potensi_form disubmit
            $("#edit_potensi_form").submit(function(e) {
                // jeda untuk melakukan proses pengecekan
                e.preventDefault();
                // dapatkan form edit
                var form = $('#edit_potensi_form')[0];
                // simpan isi form dalam obyek dataForm
                var dataForm = new FormData(form);
                // ganti tulisan button simpan
                $("#edit_potensi_btn").text('Updating ...');
                $.ajax({
                    // panggil route name update.potensidesa
                    url: '{{ route('update.potensidesa') }}',
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
                        $("#edit_potensi_btn").text('Submit');
                        // tutup tampilan modal potensi edit
                        $("#PotensiEdit").modal('hide');
                    }
                });
            });

            //get record
            fetch('', '');

            // fungsi menampilkan data
            //parameter String type dan message
            function fetch(type = '', message = '') {
                $.ajax({
                    // panggil route name fetch.potensidesa
                    url: '{{ route('fetch.potensidesa') }}',
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
                            // tampilkan element alert pada class .alert-notif pada view datapotensi.blade
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

        // fungsi set tanggal posting hari ini
        document.getElementById('tglposting').valueAsDate = new Date();

        // fungsi membuat slug otomatis
        function generateSlugTambah() {
            const titleInput = document.getElementById('namapotensi');
            const slugInput = document.getElementById('slug');

            const title = titleInput.value.trim().toLowerCase();
            const slug = title.replace(/\s+/g, '-').slice(0, 50); // Mengambil hanya 50 karakter pertama

            slugInput.value = slug;
        }

        function generateSlugEdit() {
            const titleInput = document.getElementById('namapotensiedit');
            const slugInput = document.getElementById('slugedit');

            const title = titleInput.value.trim().toLowerCase();
            const slug = title.replace(/\s+/g, '-').slice(0, 50); // Mengambil hanya 50 karakter pertama

            slugInput.value = slug;
        }
    </script>
@endsection

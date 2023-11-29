@extends('admin.layouts.main')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-lg-12 mb-4 order-0">
                <div class="row">
                    <div class="col-xxl">
                        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Berita/</span> Daftar Berita</h4>
                        <div class="card mb-4">
                            <div class="card-datatable table-responsive p-3">
                                <button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal"
                                    data-bs-target="#BeritaTambah">
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

                        <!-- Modal Tambah Start -->
                        <div class="modal fade" id="BeritaTambah" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="ModalTambah">Tambah Berita</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Form Layout Start-->
                                        <form action="" method="post" id="add_berita_form">
                                            @csrf
                                            <div class="mb-3">
                                                <label class="col-form-label" for="judulberitatambah">Judul Berita</label>
                                                <input type="text" class="form-control" id="judulberitatambah"
                                                    name="judulberita" placeholder="ex : Pantai Kaca" required />
                                            </div>
                                            <div class="mb-3">
                                                <label class="col-form-label" for="slug">Slug</label>
                                                <input type="text" class="form-control" id="slug" name="slug"
                                                    placeholder="ex : Pantai-Kaca" required />
                                            </div>
                                            <div class="mb-3">
                                                <label class="col-form-label" for="isiberita">Isi berita</label>
                                                <textarea id="isiberita" class="form-control" name="isiberita"
                                                    placeholder="ex: Desa Candikuning merupakan desa wisata yang ada di Tabanan"
                                                    aria-label="ex: Desa Candikuning merupakan desa wisata yang ada di Tabanan"
                                                    aria-describedby="basic-icon-default-message2" cols="100%" rows="10" required></textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label class="col-form-label" for="PenulisTambah">Penulis</label>
                                                <input type="text" class="form-control" id="PenulisTambah" name="penulis"
                                                    required />
                                            </div>
                                            <div class="mb-3">
                                                <label class="col-form-label" for="tglposting">Tanggal posting</label>
                                                <input type="date" class="form-control" id="tglposting"
                                                    name="tanggalposting" placeholder="ex :23/08/2023" required />
                                            </div>
                                            <div class="mb-3">
                                                <label class="col-form-label" for="kategori">Kategori <span
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
                                                        id="add_berita_btn">Simpan</button>
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
                        <div class="modal fade" id="BeritaEdit" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="ModalEdit">Edit Berita</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Form Layout Start-->
                                        <form action="" method="post" id="edit_berita_form">
                                            @csrf
                                            <input type="hidden" class="form-control" id="id_beritaedit"
                                                name="id_berita" />
                                            <div class="mb-3">
                                                <label class="col-form-label" for="judulberitaedit">Judul Berita</label>
                                                <input type="text" class="form-control" id="judulberitaedit"
                                                    name="judulberita" placeholder="ex : Pantai Kaca" required />
                                            </div>
                                            <div class="mb-3">
                                                <label class="col-form-label" for="slugedit">Slug</label>
                                                <input type="text" class="form-control" id="slugedit" name="slug"
                                                    placeholder="ex : Pantai-Kaca" required />
                                            </div>
                                            <div class="mb-3">
                                                <label class="col-form-label" for="isiberitaedit">Isi Berita</label>
                                                <textarea id="isiberitaedit" class="form-control" name="isiberita"
                                                    placeholder="ex: Desa Candikuning merupakan desa wisata yang ada di Tabanan"
                                                    aria-label="ex: Desa Candikuning merupakan desa wisata yang ada di Tabanan"
                                                    aria-describedby="basic-icon-default-message2" cols="100%" rows="10" required></textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label class="col-form-label" for="penulisedit">Penulis</label>
                                                <input type="text" class="form-control" id="penulisedit"
                                                    name="penulis" required />
                                            </div>
                                            <div class="mb-3">
                                                <label class="col-form-label" for="tglpostingedit">Tanggal posting</label>
                                                <input type="date" class="form-control" id="tglpostingedit"
                                                    name="tanggalposting" placeholder="ex :23/08/2023" required />
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
                                                        id="edit_berita_btn">Simpan</button>
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
                        <div class="modal fade" id="BeritaDetail" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="ModalEdit">Detail Berita</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Form Layout Start-->
                                        <form action="" method="post" id="detail_berita_form">
                                            @csrf
                                            <input type="hidden" class="form-control" id="id_berita"
                                                name="id_berita" />
                                            <div id="img-previewdetail" class="my-2 d-flex justify-content-center"
                                                alt="gambar berita">
                                            </div>
                                            <div class="mb-3">
                                                <label class="col-form-label" for="judulberitadetail">Judul Berita</label>
                                                <input type="text" class="form-control" id="judulberitadetail"
                                                    name="judulberita" placeholder="ex : Pantai Kaca" required readonly />
                                            </div>
                                            <div class="mb-3">
                                                <label class="col-form-label" for="slugdetail">Slug</label>
                                                <input type="text" class="form-control" id="slugdetail"
                                                    name="slug" placeholder="ex : Pantai-Kaca" required readonly />
                                            </div>
                                            <div class="mb-3">
                                                <label class="col-form-label" for="isiberitadetail">Isi Berita</label>
                                                <textarea id="isiberitadetail" class="form-control" name="isiberita"
                                                    placeholder="ex: Desa Candikuning merupakan desa wisata yang ada di Tabanan"
                                                    aria-label="ex: Desa Candikuning merupakan desa wisata yang ada di Tabanan"
                                                    aria-describedby="basic-icon-default-message2" cols="100%" rows="10" required readonly></textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label class="col-form-label" for="penulisdetail">Penulis</label>
                                                <input type="text" class="form-control" id="penulisdetail"
                                                    name="penulis" disabled required readonly />
                                            </div>
                                            <div class="mb-3">
                                                <label class="col-form-label" for="tglpostingdetail">Tanggal
                                                    posting</label>
                                                <input type="date" class="form-control" id="tglpostingdetail"
                                                    name="tanggalposting" placeholder="ex :23/08/2023" required
                                                    readonly />
                                            </div>
                                            <div class="mb-3">
                                                <label class="col-form-label" for="kategoridetail">KategoriKategori <span
                                                        class=" text-muted">(data kategori berasal dari menu
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
            // jika form dengan id add_berita_form disubmit
            $("#add_berita_form").submit(function(e) {
                // jeda untuk melakukan proses pengecekan
                e.preventDefault();
                // simpan isi form dalam obyek dataForm
                const dataForm = new FormData(this);
                // ganti tulisan button simpan
                $("#add_berita_btn").text('Adding ...');
                $.ajax({
                    // panggil route name save.berita
                    url: '{{ route('save.berita') }}',
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
                            $("#add_berita_form")[0].reset();
                        } else {
                            // jika respon array key:status selain 200
                            // tampilkan data dengan mengirimkan parameter array key:danger
                            fetch('danger', 'Gagal tambah data');
                        }
                        // kembalikan tulisan button simpan
                        $("#add_berita_btn").text('Submit');
                        // tutup tampilan modal berita tambah
                        $("#BeritaTambah").modal('hide');
                    }
                });
            });

            // delete ajax request
            // jika class deleteberita pada databerita.blade di klik
            $(document).on('click', '.deleteBerita', function(e) {
                // jeda untuk melakukan proses pengecekan
                e.preventDefault();
                // buat variabel id dengan isi data dari atribut id pada class deteleberita
                let id = $(this).attr('id');
                // buat variabel csrf
                let csrf = '{{ csrf_token() }}';
                // jika confirm hapus true
                if (confirm('Yakin hapus data ini ?')) {
                    $.ajax({
                        // panggil route name delete.berita
                        url: '{{ route('delete.berita') }}',
                        // methode DELETE
                        method: 'DELETE',
                        // isi data : id_berita dan token
                        data: {
                            id_berita: id,
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
            // jika class detailberita pada databerita.blade di klik
            $(document).on('click', '.detailBerita', function(e) {
                // jeda untuk melakukan proses pengecekan
                e.preventDefault();
                // buat variabel id dengan isi data dari atribut id pada class detailberita
                let id = $(this).attr('id');
                $.ajax({
                    // panggil route name detail.berita
                    url: '{{ route('detail.berita') }}',
                    // method GET
                    method: 'GET',
                    // isi data : id_berita dan token
                    data: {
                        id_berita: id,
                        _token: '{{ csrf_token() }}'
                    },
                    // jika sukses return respon json
                    success: function(response) {
                        // tampilkan setiap value dari id inputan form (pada array key:berita di BeritaController fungsi show)
                        $("#judulberitadetail").val(response.berita.judulberita);
                        $("#tglpostingdetail").val(response.berita.tanggalposting);
                        $("#penulisdetail").val(response.berita.penulis);
                        $("#isiberitadetail").val(response.berita.isiberita);
                        $("#slugdetail").val(response.berita.slug);
                        $("#kategoridetail").val(response.berita.id_kategori);
                        // id img-previewdetail menampilkan gambar dari lokasi penyimpanan
                        $("#img-previewdetail").html(
                            `<img src="{{ asset('/storage/berita_img/${response.berita.gambarcover}') }}" width="200" height="200" class="img-fluid img-thumbnail">`
                        );
                    }
                });
            });

            // edit ajax request
            // jika class editberita pada databerita.blade di klik
            $(document).on('click', '.editBerita', function(e) {
                // jeda untuk melakukan proses pengecekan
                e.preventDefault();
                // buat variabel id dengan isi data dari atribut id pada class editberita
                let id = $(this).attr('id');
                $.ajax({
                    // panggil route name edit.berita
                    url: '{{ route('edit.berita') }}',
                    // method GET
                    method: 'GET',
                    // isi data : id_berita dan token
                    data: {
                        id_berita: id,
                        _token: '{{ csrf_token() }}'
                    },
                    // jika sukses return respon json
                    success: function(response) {
                        // tampilkan setiap value dari id inputan form
                        $("#id_beritaedit").val(response.id_berita);
                        $("#judulberitaedit").val(response.judulberita);
                        $("#tglpostingedit").val(response.tanggalposting);
                        $("#penulisedit").val(response.penulis);
                        $("#isiberitaedit").val(response.isiberita);
                        $("#slugedit").val(response.slug);
                        $("#kategoriedit").val(response.id_kategori);
                    }
                });
            });

            // update ajax request
            // jika form dengan id edit_berita_form disubmit
            $("#edit_berita_form").submit(function(e) {
                // jeda untuk melakukan proses pengecekan
                e.preventDefault();
                // dapatkan form edit
                var form = $('#edit_berita_form')[0];
                // simpan isi form dalam obyek dataForm
                var dataForm = new FormData(form);
                // ganti tulisan button simpan
                $("#edit_berita_btn").text('Updating ...');
                $.ajax({
                    // panggil route name update.berita
                    url: '{{ route('update.berita') }}',
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
                        $("#edit_berita_btn").text('Submit');
                        // tutup tampilan modal berita edit
                        $("#BeritaEdit").modal('hide');
                    }
                });
            });

            //get record
            fetch('', '');

            // fungsi menampilkan data
            //parameter String type dan message
            function fetch(type = '', message = '') {
                $.ajax({
                    // panggil route name fetch.berita
                    url: '{{ route('fetch.berita') }}',
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
                            // tampilkan element alert pada class .alert-notif pada view databerita.blade
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

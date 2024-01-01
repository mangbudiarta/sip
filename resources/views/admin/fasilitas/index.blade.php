@extends('admin.layouts.main')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-lg-12 mb-4 order-0">
                <div class="row">
                    <div class="col-xxl">
                        <h4 class="fw-bold py-3 mb-4">Fasilitas</h4>
                        <div class="card mb-4">
                            <div class="table-responsive p-3">
                                <button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal"
                                    data-bs-target="#FasilitasTambah">
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
                        <div class="modal fade" id="FasilitasTambah" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="ModalTambah">Tambah Fasilitas</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Form Layout Start-->
                                        <form action="" method="post" id="add_fasilitas_form">
                                            @csrf
                                            <div class="mb-3">
                                                <label class="col-form-label" for="namafasilitas">Nama Fasilitas</label>
                                                <input type="text" class="form-control" id="namafasilitas"
                                                    name="namafasilitas" placeholder="ex : Kadek Homestay" required />
                                                <span id="error-namafasilitas" class="text-danger"></span>
                                            </div>
                                            <div class="mb-3">
                                                <label class="col-form-label" for="deskripsi">Deskripsi</label>
                                                <textarea id="deskripsi" class="form-control" name="deskripsi" placeholder="ex: Homestay Terbaik Di Candikuning"
                                                    aria-label="ex: Homestay Terbaik Di Candikuning" aria-describedby="basic-icon-default-message2"></textarea>
                                                <span id="error-deskripsi" class="text-danger"></span>
                                            </div>
                                            <div class="mb-3">
                                                <label class="col-form-label" for="lokasi">Lokasi <span
                                                        class=" text-muted">(link maps)</span></label>
                                                <input type="text" class="form-control" id="lokasi" name="lokasi"
                                                    placeholder="ex : https://maps.google.com/ssss" />
                                                <span id="error-lokasi" class="text-danger"></span>
                                            </div>
                                            <div class="mb-3">
                                                <label class="col-form-label" for="kontak">Kontak <span
                                                        class=" text-muted">(no telepon/media sosial)</span></label>
                                                <input type="text" class="form-control" id="kontak" name="kontak"
                                                    placeholder="ex: +62831123123" />
                                                <span id="error-kontak" class="text-danger"></span>
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
                                                <span id="error-id_kategori" class="text-danger"></span>
                                            </div>
                                            <div>
                                                <label for="formFile1" class="form-label">Gambar <span
                                                        class=" text-muted">(png/jpg)</span></label>
                                                <input type="file" class="form-control" type="file" id="image"
                                                    name="gambar" onchange="previewImage()" />
                                                <img id="img-preview" class="my-2 col-sm-5" alt="">
                                                <span id="error-gambar" class="text-danger"></span>
                                            </div>
                                            <div class="row justify-content-end">
                                                <div class="col-sm-12">
                                                    <button type="submit" class="btn btn-primary"
                                                        name="simpan"id="add_fasilitas_btn">Simpan</button>
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
                        <div class="modal fade" id="FasilitasEdit" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="ModalEdit">Edit Fasilitas</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Form Layout Start-->
                                        <form action="" method="post" id="edit_fasilitas_form">
                                            @csrf
                                            <input type="hidden" name="id_fasilitas" id="id_fasilitasedit">
                                            <div class="mb-3">
                                                <label class="col-form-label" for="namafasilitasedit">Nama
                                                    Fasilitas</label>
                                                <input type="text" class="form-control" id="namafasilitasedit"
                                                    name="namafasilitas" placeholder="ex : Kadek Homestay" required />
                                                <span id="error-namafasilitas-edit" class="text-danger"></span>
                                            </div>
                                            <div class="mb-3">
                                                <label class="col-form-label" for="edit">Deskripsi</label>
                                                <textarea id="deskripsiedit" class="form-control" name="deskripsi" placeholder="ex: Homestay Terbaik Di Candikuning"
                                                    aria-label="ex: Homestay Terbaik Di Candikuning" aria-describedby="basic-icon-default-message2"></textarea>
                                                <span id="error-tdeskripsi-edit" class="text-danger"></span>
                                            </div>
                                            <div class="mb-3">
                                                <label class="col-form-label" for="lokasiedit">Lokasi <span
                                                        class=" text-muted">(link maps)</span></label>
                                                <input type="text" class="form-control" id="lokasiedit"
                                                    name="lokasi" placeholder="ex : https://maps.google.com/ssss" />
                                                <span id="error-lokasi-edit" class="text-danger"></span>
                                            </div>
                                            <div class="mb-3">
                                                <label class="col-form-label" for="kontakedit">Kontak <span
                                                        class=" text-muted">(no telepon/media sosial)</span></label>
                                                <input type="text" class="form-control" id="kontakedit"
                                                    name="kontak" placeholder="ex: +62831123123" />
                                                <span id="error-kontak-edit" class="text-danger"></span>
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
                                                <label for="formFile2" class="form-label">Gambar <span
                                                        class=" text-muted">(png/jpg)</span></label>
                                                <input type="file" class="form-control" type="file" id="imageEdit"
                                                    name="gambar" onchange="previewImageEdit()" />
                                                <img id="img-previewEdit" class="my-2 col-sm-5" alt="">
                                                <span id="error-gambar-edit" class="text-danger"></span>
                                            </div>
                                            <div class="row justify-content-end">
                                                <div class="col-sm-12">
                                                    <button type="submit" class="btn btn-primary" name="simpan"
                                                        id="edit_fasilitas_btn">Simpan</button>
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

                        <!-- Modal Detail Start-->
                        <div class="modal fade" id="FasilitasDetail" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="ModalDetail">Detail Fasilitas</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Form Layout Start-->
                                        <form id="detail_fasilitas_form">
                                            @csrf
                                            <input type="hidden" name="id_fasilitas">
                                            <div id="img-previewdetail" class="my-2 d-flex justify-content-center"
                                                alt="">
                                            </div>
                                            <div class="mb-3">
                                                <label class="col-form-label" for="namafasilitasdetail">Nama
                                                    Fasilitas</label>
                                                <input type="text" class="form-control" id="namafasilitasdetail"
                                                    name="namafasilitas" placeholder="ex : Kadek Homestay" readonly
                                                    required />
                                            </div>
                                            <div class="mb-3">
                                                <label class="col-form-label" for="detail">Deskripsi</label>
                                                <textarea id="deskripsidetail" class="form-control" name="deskripsi"
                                                    placeholder="ex: Homestay Terbaik Di Candikuning" aria-label="ex: Homestay Terbaik Di Candikuning"
                                                    aria-describedby="basic-icon-default-message2" readonly required></textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label class="col-form-label" for="lokasidetail">Lokasi <span
                                                        class=" text-muted">(link maps)</span></label>
                                                <input type="text" class="form-control" id="lokasidetail"
                                                    name="lokasi" placeholder="ex : https://maps.google.com/ssss"
                                                    readonly required />
                                            </div>
                                            <div class="mb-3">
                                                <label class="col-form-label" for="kontakdetail">Kontak <span
                                                        class=" text-muted">(no telepon/media sosial)</span></label>
                                                <input type="text" class="form-control" id="kontakdetail"
                                                    name="kontak" placeholder="ex: +62831123123" readonly required />
                                            </div>
                                            <div class="mb-3">
                                                <label class="col-form-label" for="kategoridetail">Kategori <span
                                                        class=" text-muted">(data kategori berasal dari menu
                                                        kategori)</span></label>
                                                {{-- Select option value from database --}}
                                                <select class="form-select form-select" name="id_kategori"
                                                    id="id_kategoridetail" disabled>
                                                    <option>-- Pilih Kategori --</option>
                                                    @foreach ($kategori as $item)
                                                        <option value="{{ $item->id_kategori }}"readonly="readonly">
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
            // jika form dengan id add_fasilitas_form disubmit
            $("#add_fasilitas_form").submit(function(e) {
                // jeda untuk melakukan proses pengecekan
                e.preventDefault();
                // simpan isi form dalam obyek dataForm
                const dataForm = new FormData(this);
                // ganti tulisan button simpan
                $("#add_fasilitas_btn").text('Adding ...');
                $.ajax({
                    // panggil route name save.fasilitas
                    url: '{{ route('save.fasilitas') }}',
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
                            $("#add_fasilitas_form")[0].reset();
                        } else {
                            // jika respon array key:status selain 200
                            // tampilkan data dengan mengirimkan parameter array key:danger
                            fetch('danger', 'Gagal tambah data');
                        }
                        // kembalikan tulisan button simpan
                        $("#add_fasilitas_btn").text('Submit');
                        // tutup tampilan modal fasilitas tambah
                        $("#FasilitasTambah").modal('hide');
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
            // jika class deletefasilitas pada datafasilitas.blade di klik
            $(document).on('click', '.deletefasilitas', function(e) {
                // jeda untuk melakukan proses pengecekan
                e.preventDefault();
                // buat variabel id dengan isi data dari atribut id pada class detelefasilitas
                let id = $(this).attr('id');
                // buat variabel csrf
                let csrf = '{{ csrf_token() }}';
                // jika confirm hapus true
                if (confirm('Yakin hapus data ini ?')) {
                    $.ajax({
                        // panggil route name delete.fasilitas
                        url: '{{ route('delete.fasilitas') }}',
                        // methode DELETE
                        method: 'DELETE',
                        // isi data : id_fasilitas dan token
                        data: {
                            id_fasilitas: id,
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
            // jika class detailFasilitas pada datafasilitas.blade di klik
            $(document).on('click', '.detailFasilitas', function(e) {
                // jeda untuk melakukan proses pengecekan
                e.preventDefault();
                // buat variabel id dengan isi data dari atribut id pada class detailFasilitas
                let id = $(this).attr('id');
                $.ajax({
                    // panggil route name detail.fasilitas
                    url: '{{ route('detail.fasilitas') }}',
                    // method GET
                    method: 'GET',
                    // isi data : id_fasilitas dan token
                    data: {
                        id_fasilitas: id,
                        _token: '{{ csrf_token() }}'
                    },
                    // jika sukses return respon json
                    success: function(response) {
                        // tampilkan setiap value dari id inputan form
                        $("#namafasilitasdetail").val(response.fasilitas.namafasilitas);
                        $("#deskripsidetail").val(response.fasilitas.deskripsi);
                        $("#lokasidetail").val(response.fasilitas.lokasi);
                        $("#kontakdetail").val(response.fasilitas.kontak);
                        $("#id_kategoridetail").val(response.fasilitas.id_kategori);
                        // id img-previewdetail menampilkan gambar dari lokasi penyimpanan
                        $("#img-previewdetail").html(
                            `<img src="{{ asset('/storage/fasilitas_img/${response.fasilitas.gambar}') }}" width="200" height="200" class="img-fluid img-thumbnail">`
                        );
                    }
                });
            });

            // edit ajax request
            // jika class editfasilitas pada datafasilitas.blade di klik
            $(document).on('click', '.editfasilitas', function(e) {
                // jeda untuk melakukan proses pengecekan
                e.preventDefault();
                // buat variabel id dengan isi data dari atribut id pada class editFasilitas
                let id = $(this).attr('id');
                $.ajax({
                    // panggil route name edit.fasilitas
                    url: '{{ route('edit.fasilitas') }}',
                    // method GET
                    method: 'GET',
                    // isi data : id_fasilitas dan token
                    data: {
                        id_fasilitas: id,
                        _token: '{{ csrf_token() }}'
                    },
                    // jika sukses return respon json
                    success: function(response) {
                        // tampilkan setiap value dari id inputan form
                        $("#id_fasilitasedit").val(response.id_fasilitas);
                        $("#namafasilitasedit").val(response.namafasilitas);
                        $("#deskripsiedit").val(response.deskripsi);
                        $("#kontakedit").val(response.kontak);
                        $("#lokasiedit").val(response.lokasi);
                        $("#kategoriedit").val(response.id_kategori);
                    }
                });
            });

            // update ajax request
            // jika form dengan id edit_fasilitas_form disubmit
            $("#edit_fasilitas_form").submit(function(e) {
                // jeda untuk melakukan proses pengecekan
                e.preventDefault();
                // dapatkan form edit
                var form = $('#edit_fasilitas_form')[0];
                // simpan isi form dalam obyek dataForm
                var dataForm = new FormData(form);
                // ganti tulisan button simpan
                $("#edit_fasilitas_btn").text('Updating ...');
                $.ajax({
                    // panggil route name update.fasilitas
                    url: '{{ route('update.fasilitas') }}',
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
                        $("#edit_fasilitas_btn").text('Submit');
                        // tutup tampilan modal fasilitas edit
                        $("#FasilitasEdit").modal('hide');
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
                    // panggil route name fetch.fasilitas
                    url: '{{ route('fetch.fasilitas') }}',
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

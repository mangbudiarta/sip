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
                                            </div>
                                            <div class="mb-3">
                                                <label class="col-form-label" for="deskripsi">Deskripsi</label>
                                                <textarea id="deskripsi" class="form-control" name="deskripsi" placeholder="ex: Homestay Terbaik Di Candikuning"
                                                    aria-label="ex: Homestay Terbaik Di Candikuning" aria-describedby="basic-icon-default-message2"></textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label class="col-form-label" for="lokasi">Lokasi <span
                                                        class=" text-muted">(link maps)</span></label>
                                                <input type="text" class="form-control" id="lokasi" name="lokasi"
                                                    placeholder="ex : https://maps.google.com/ssss" />
                                            </div>
                                            <div class="mb-3">
                                                <label class="col-form-label" for="kontak">Kontak <span
                                                        class=" text-muted">(no telepon/media sosial)</span></label>
                                                <input type="text" class="form-control" id="kontak" name="kontak"
                                                    placeholder="ex: +62831123123" />
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
                                                <label for="formFile1" class="form-label">Gambar <span
                                                        class=" text-muted">(png/jpg)</span></label>
                                                <input type="file" class="form-control" type="file" id="image"
                                                    name="gambar" onchange="previewImage()" />
                                                <img id="img-preview" class="my-2 col-sm-5" alt="">
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
                                            </div>
                                            <div class="mb-3">
                                                <label class="col-form-label" for="edit">Deskripsi</label>
                                                <textarea id="deskripsiedit" class="form-control" name="deskripsi" placeholder="ex: Homestay Terbaik Di Candikuning"
                                                    aria-label="ex: Homestay Terbaik Di Candikuning" aria-describedby="basic-icon-default-message2"></textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label class="col-form-label" for="lokasiedit">Lokasi <span
                                                        class=" text-muted">(link maps)</span></label>
                                                <input type="text" class="form-control" id="lokasiedit"
                                                    name="lokasi" placeholder="ex : https://maps.google.com/ssss" />
                                            </div>
                                            <div class="mb-3">
                                                <label class="col-form-label" for="kontakedit">Kontak <span
                                                        class=" text-muted">(no telepon/media sosial)</span></label>
                                                <input type="text" class="form-control" id="kontakedit"
                                                    name="kontak" placeholder="ex: +62831123123" />
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
                                            </div>
                                            <div>
                                                <label for="formFile2" class="form-label">Gambar <span
                                                        class=" text-muted">(png/jpg)</span></label>
                                                <input type="file" class="form-control" type="file" id="imageEdit"
                                                    name="gambar" onchange="previewImageEdit()" />
                                                <img id="img-previewEdit" class="my-2 col-sm-5" alt="">
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
            $("#add_fasilitas_form").submit(function(e) {
                e.preventDefault();
                const dataForm = new FormData(this);
                $("#add_fasilitas_btn").text('Adding ...');
                $.ajax({
                    url: '{{ route('save.fasilitas') }}',
                    method: 'POST',
                    data: dataForm,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    success: function(response) {
                        if (response.status == 200) {
                            fetch('success', 'Berhasil tambah data');
                            $("#add_fasilitas_form")[0].reset();
                        } else {
                            fetch('danger', 'Gagal tambah data');
                        }
                        $("#add_fasilitas_btn").text('Submit');
                        $("#FasilitasTambah").modal('hide');
                    }
                });
            });

            // delete ajax request
            $(document).on('click', '.deletefasilitas', function(e) {
                e.preventDefault();
                let id = $(this).attr('id');
                let csrf = '{{ csrf_token() }}';
                if (confirm('Yakin hapus data ini ?')) {
                    $.ajax({
                        url: '{{ route('delete.fasilitas') }}',
                        method: 'DELETE',
                        data: {
                            id_fasilitas: id,
                            _token: csrf
                        },
                        success: function(response) {
                            if (response.status == 200) {
                                fetch('success', 'Berhasil hapus data');
                            } else {
                                fetch('danger', 'Gagal hapus data');
                            }
                        }
                    });
                } else {
                    fetch('info', 'Data aman');
                }

            });

            // detail ajax request
            $(document).on('click', '.detailFasilitas', function(e) {
                e.preventDefault();
                let id = $(this).attr('id');
                $.ajax({
                    url: '{{ route('detail.fasilitas') }}',
                    method: 'GET',
                    data: {
                        id_fasilitas: id,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        $("#namafasilitasdetail").val(response.fasilitas.namafasilitas);
                        $("#deskripsidetail").val(response.fasilitas.deskripsi);
                        $("#lokasidetail").val(response.fasilitas.lokasi);
                        $("#kontakdetail").val(response.fasilitas.kontak);
                        $("#id_kategoridetail").val(response.fasilitas.id_kategori);
                        $("#img-previewdetail").html(
                            `<img src="{{ asset('/storage/fasilitas_img/${response.fasilitas.gambar}') }}" width="200" height="200" class="img-fluid img-thumbnail">`
                        );
                    }
                });
            });

            // edit ajax request
            $(document).on('click', '.editfasilitas', function(e) {
                e.preventDefault();
                let id = $(this).attr('id');
                $.ajax({
                    url: '{{ route('edit.fasilitas') }}',
                    method: 'GET',
                    data: {
                        id_fasilitas: id,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
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
            $("#edit_fasilitas_form").submit(function(e) {
                //stop submit the form, we will post it manually.
                e.preventDefault();
                // Get form
                var form = $('#edit_fasilitas_form')[0];
                // FormData object
                var dataForm = new FormData(form);
                $("#edit_fasilitas_btn").text('Updating ...');
                $.ajax({
                    url: '{{ route('update.fasilitas') }}',
                    method: 'POST',
                    data: dataForm,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    success: function(response) {
                        if (response.status == 200) {
                            fetch('success', 'Berhasil edit data');
                        } else {
                            fetch('danger', 'Gagal edit data');

                        }
                        $("#edit_fasilitas_btn").text('Submit');
                        $("#FasilitasEdit").modal('hide');
                    }
                });
            });

            //get record
            fetch();

            function fetch(type = '', message = '') {
                $.ajax({
                    url: '{{ route('fetch.fasilitas') }}',
                    method: 'GET',
                    success: function(response) {
                        $("#dataPage").html(response);
                        $("table").DataTable({
                            order: [0, 'desc']
                        });
                        if (type && message) {
                            // Create and append new alert
                            const alertHtml =
                                `<div class="alert alert-${type} alert-dismissible fade show" role="alert">
                                ${message}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>`;
                            $(".alert-notif").append(alertHtml);

                        }

                    }
                });
            }
        });

        // preview image add
        function previewImage() {
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('#img-preview')
            const blob = URL.createObjectURL(image.files[0]);
            imgPreview.src = blob;
        }

        // preview image edit
        function previewImageEdit() {
            const image = document.querySelector('#imageEdit');
            const imgPreview = document.querySelector('#img-previewEdit')
            const blob = URL.createObjectURL(image.files[0]);
            imgPreview.src = blob;
        }
    </script>
@endsection

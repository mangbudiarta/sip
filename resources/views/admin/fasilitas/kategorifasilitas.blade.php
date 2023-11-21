@extends('admin.layouts.main')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-lg-12 mb-4 order-0">
                <div class="row">
                    <div class="col-xxl">
                        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Fasilitas/</span> Kategori</h4>
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
                                                    name="namakategori" placeholder="ex : Alam" required />
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
                                                    name="namakategori" placeholder="ex : Alam" required />
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
            $("#add_kategori_form").submit(function(e) {
                e.preventDefault();
                const dataForm = new FormData(this);
                $("#add_kategori_btn").text('Adding ...');
                $.ajax({
                    url: '{{ route('save.kategorifasilitas') }}',
                    method: 'POST',
                    data: dataForm,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    success: function(response) {
                        if (response.status == 200) {
                            fetch('success', 'Berhasil tambah data');
                            $("#add_kategori_form")[0].reset();
                        } else {
                            fetch('danger', 'Gagal tambah data');
                        }
                        $("#add_kategori_btn").text('Simpan');
                        $("#KategoriTambah").modal('hide');
                    }
                });
            });

            // delete ajax request
            $(document).on('click', '.deletekategori', function(e) {
                e.preventDefault();
                let id = $(this).attr('id');
                let csrf = '{{ csrf_token() }}';
                if (confirm('Yakin hapus data ini ?')) {
                    $.ajax({
                        url: '{{ route('delete.kategorifasilitas') }}',
                        method: 'DELETE',
                        data: {
                            id_kategori: id,
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

            // edit ajax request
            $(document).on('click', '.editkategori', function(e) {
                e.preventDefault();
                let id = $(this).attr('id');
                $.ajax({
                    url: '{{ route('edit.kategorifasilitas') }}',
                    method: 'GET',
                    data: {
                        id_kategori: id,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        $("#namakategoriedit").val(response.namakategori);
                        $("#id_kategori").val(response.id_kategori);
                    }
                });
            });

            // update ajax request
            $("#edit_kategori_form").submit(function(e) {
                //stop submit the form, we will post it manually.
                e.preventDefault();
                // Get form
                var form = $('#edit_kategori_form')[0];
                // FormData object
                var dataForm = new FormData(form);
                $("#edit_kategori_btn").text('Updating ...');
                $.ajax({
                    url: '{{ route('update.kategorifasilitas') }}',
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
                        $("#edit_kategori_btn").text('Simpan');
                        $("#KategoriEdit").modal('hide');
                    }
                });
            });

            //get record
            fetch();

            function fetch(type = '', message = '') {
                $.ajax({
                    url: '{{ route('fetch.kategorifasilitas') }}',
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
    </script>
@endsection

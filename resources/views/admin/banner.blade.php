@extends('admin.layouts.main')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-lg-12 mb-4 order-0">
                <div class="row">
                    <div class="col-xxl">
                        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Layouts/</span> Banner</h4>
                        <!-- Table Layout Start -->
                        <div class="card mb-4">
                            <div class="card-datatable table-responsive p-3">
                                <button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal"
                                    data-bs-target="#BannerTambah">
                                    <i class="menu-icon tf-icons bx bx-plus m-0"></i>Tambah
                                </button>
                                <table class="datatables table border-top">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Judul</th>
                                            <th>Deskripsi</th>
                                            <th>Gambar</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Web Desa</td>
                                            <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iure, voluptatum!
                                            </td>
                                            <td>gambar.jpg</td>
                                            <td>
                                                <a href="/" class="btn btn-info btn-sm"><i
                                                        class="menu-icon tf-icons bx bx-show m-0"></i></a>
                                                <a href="#" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                                    data-bs-target="#BannerEdit"><i
                                                        class="menu-icon tf-icons bx bx-edit m-0"></i></a>
                                                <a href="#" class="btn btn-danger btn-sm"><i
                                                        class="menu-icon tf-icons bx bx-trash m-0"></i></a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- Table Layout End -->
                        <!-- Modal Tambah Start -->
                        <div class="modal fade" id="BannerTambah" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="ModalTambah">Tambah Banner</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Form Layout Start-->
                                        <form action="" method="post">
                                            <div class="mb-3">
                                                <label class="col-form-label" for="judulTambah">Judul Banner</label>
                                                <input type="text" class="form-control" id="judulTambah" name="judul"
                                                    placeholder="ex : Desa Wisata & Indah" />
                                            </div>
                                            <div class="mb-3">
                                                <label class="col-form-label" for="deskripsiTambah">Deskripsi Banner</label>
                                                <textarea id="deskripsiTambah" class="form-control" name="deskripsi"
                                                    placeholder="ex: Desa Candikuning merupakan desa wisata yang ada di Tabanan"
                                                    aria-label="ex: Desa Candikuning merupakan desa wisata yang ada di Tabanan"
                                                    aria-describedby="Deskrispi Banner Tambah"></textarea>
                                            </div>
                                            <div>
                                                <label for="formFileTambah" class="form-label">Gambar <span
                                                        class=" text-muted">(png/jpg)</span></label>
                                                <input type="file" class="form-control" type="file"
                                                    id="formFileTambah" name="gambar" onchange="handleFiles(event)" />
                                                <div class="overflow-auto">
                                                    <img id="imageView1" class="my-2" alt="">
                                                </div>
                                            </div>
                                            <div class="row justify-content-end">
                                                <div class="col-sm-12">
                                                    <button type="submit" class="btn btn-primary"
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
                        <div class="modal fade" id="BannerEdit" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="ModalEdit">Edit Banner</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Form Layout Start-->
                                        <form action="" method="post">
                                            <div class="mb-3">
                                                <label class="col-form-label" for="judulEdit">Judul Banner</label>
                                                <input type="text" class="form-control" id="judulEdit" name="judul"
                                                    placeholder="ex : Desa Wisata & Indah" />
                                            </div>
                                            <div class="mb-3">
                                                <label class="col-form-label" for="deskripsiEdit">Deskripsi Banner</label>
                                                <textarea id="deskripsiEdit" class="form-control" name="deskripsi"
                                                    placeholder="ex: Desa Candikuning merupakan desa wisata yang ada di Tabanan"
                                                    aria-label="ex: Desa Candikuning merupakan desa wisata yang ada di Tabanan"
                                                    aria-describedby="Deskripsi Banner Edit"></textarea>
                                            </div>
                                            <div>
                                                <label for="formFileEdit" class="form-label">Gambar <span
                                                        class=" text-muted">(png/jpg)</span></label>
                                                <input type="file" class="form-control" type="file"
                                                    id="formFileEdit" name="gambar" onchange="handleFiles(event)" />
                                                <div class="overflow-auto">
                                                    <img id="imageView2" class="y-2" alt="">
                                                </div>
                                            </div>
                                            <div class="row justify-content-end">
                                                <div class="col-sm-12">
                                                    <button type="submit" class="btn btn-primary"
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
                    function handleFiles(e) {
                        const imageView1 = document.getElementById('imageView1');
                        const imageView2 = document.getElementById('imageView2');
                        const file = e.target.files[0];
                        const blobURL = URL.createObjectURL(file);
                        imageView1.src = blobURL;
                        imageView2.src = blobURL;
                    }
                </script>
            @endsection

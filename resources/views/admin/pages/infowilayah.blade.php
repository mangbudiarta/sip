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
                            <div class="card-datatable table-responsive p-3">
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
                                                <a href="/#infowilayah" class="btn btn-info btn-sm"><i
                                                        class="menu-icon tf-icons bx bx-show m-0"></i></a>
                                                <a href="#" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                                    data-bs-target="#InfoWilayahEdit"><i
                                                        class="menu-icon tf-icons bx bx-edit m-0"></i></a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- Table Layout End -->
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
                                        <form action="" method="post">
                                            <div class="mb-3">
                                                <label class="col-form-label" for="judul">Judul</label>
                                                <input type="text" class="form-control" id="judul" name="judul"
                                                    placeholder="ex : Desa Wisata & Indah" />
                                            </div>
                                            <div class="mb-3">
                                                <label class="col-form-label" for="deskripsi">Deskripsi</label>
                                                <textarea id="deskripsi" class="form-control" name="deskripsi"
                                                    placeholder="ex: Desa Candikuning merupakan desa wisata yang ada di Tabanan"
                                                    aria-label="ex: Desa Candikuning merupakan desa wisata yang ada di Tabanan"
                                                    aria-describedby="basic-icon-default-message2"></textarea>
                                            </div>
                                            <div>
                                                <label for="formFile" class="form-label">Gambar Cover<span
                                                        class=" text-muted">(png/jpg)</span></label>
                                                <input type="file" class="form-control" type="file" id="formFile"
                                                    name="gambarcover" onchange="handleFiles(event)" />
                                                <div class="overflow-auto">
                                                    <img id="imageView" class="my-2" alt="">
                                                </div>
                                            </div>
                                            <div class="row justify-content-end">
                                                <div class="col-sm-12">
                                                    <button type="submit" class="btn btn-primary"
                                                        name="simpan">Simpan</button>
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

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function handleFiles(e) {
            const imageView = document.getElementById('imageView');
            const file = e.target.files[0];
            const blobURL = URL.createObjectURL(file);
            imageView.src = blobURL;
        }
    </script>
@endsection

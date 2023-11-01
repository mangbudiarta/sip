@extends('admin.layouts.main')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-lg-12 mb-4 order-0">
                <div class="row">
                    <div class="col-xxl">
                        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Berita/</span> Daftar Berita</h4>
                        <!-- Table Layout Start -->
                        <div class="card mb-4">
                            <div class="card-datatable table-responsive p-3">
                                <button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal"
                                    data-bs-target="#BeritaTambah">
                                    <i class="menu-icon tf-icons bx bx-plus m-0"></i>Tambah
                                </button>
                                <table class="datatables table border-top">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Judul Berita</th>
                                            <th>Isi Berita</th>
                                            <th>Penulis</th>
                                            <th>Tgl Posting</th>
                                            <th>Gambar</th>
                                            <th>Slug</th>
                                            <th>Kategori</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Web Desa</td>
                                            <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iure, voluptatum!
                                            </td>
                                            <td>Admin</td>
                                            <td>23-08-2023</td>
                                            <td>gambar.jpg</td>
                                            <td>Pantai-Kaca</td>
                                            <td>Alam</td>
                                            <td>
                                                <a href="" class="btn btn-info btn-sm"><i
                                                        class="menu-icon tf-icons bx bx-show m-0"></i></a>
                                                <a href="#" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                                    data-bs-target="#BeritaEdit"><i
                                                        class="menu-icon tf-icons bx bx-edit m-0"></i></a>
                                                <a href="" class="btn btn-danger btn-sm"><i
                                                        class="menu-icon tf-icons bx bx-trash m-0"></i></a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- Table Layout End -->
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
                                        <form>
                                            <div class="mb-3">
                                                <label class="col-form-label" for="judulberitatambah">Judul Berita</label>
                                                <input type="text" class="form-control" id="judulberitatambah"
                                                    name="judulberita" placeholder="ex : Pantai Kaca" />
                                            </div>
                                            <div class="mb-3">
                                                <label class="col-form-label" for="slug">Slug</label>
                                                <input type="text" class="form-control" id="slug" name="slug"
                                                    placeholder="ex : Pantai-Kaca" />
                                            </div>
                                            <div class="mb-3">
                                                <label class="col-form-label" for="isiberita">Isi berita</label>
                                                <textarea id="isiberita" class="form-control editor" name="isiberita"
                                                    placeholder="ex: Desa Candikuning merupakan desa wisata yang ada di Tabanan"
                                                    aria-label="ex: Desa Candikuning merupakan desa wisata yang ada di Tabanan"
                                                    aria-describedby="basic-icon-default-message2"></textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label class="col-form-label" for="PenulisTambah">Penulis</label>
                                                <input type="text" class="form-control" id="PenulisTambah" name="penulis"
                                                    disabled />
                                            </div>
                                            <div class="mb-3">
                                                <label class="col-form-label" for="tglposting">Tanggal posting</label>
                                                <input type="date" class="form-control" id="tglposting"
                                                    name="tanggalposting" placeholder="ex :23/08/2023" />
                                            </div>
                                            <div>
                                                <label for="formFile1" class="form-label">Gambar Cover<span
                                                        class=" text-muted">(png/jpg)</span></label>
                                                <input type="file" class="form-control" type="file" id="formFile1"
                                                    name="gambarcover" onchange="handleFiles(event)" />
                                                <div class="overflow-auto">
                                                    <img id="imageView1" class="my-2" alt="">
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label class="col-form-label" for="kategori">Kategori</label>
                                                <input type="text" class="form-control" id="kategori"
                                                    name="kategori" />
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
                        <div class="modal fade" id="BeritaEdit" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="ModalEdit">Edit Potensi Desa</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Form Layout Start-->
                                        <form>
                                            <input type="hidden" class="form-control" id="id_berita"
                                                name="id_berita" />
                                            <div class="mb-3">
                                                <label class="col-form-label" for="judulberitaedit">Judul Berita</label>
                                                <input type="text" class="form-control" id="judulberitaedit"
                                                    name="judulberita" placeholder="ex : Pantai Kaca" />
                                            </div>
                                            <div class="mb-3">
                                                <label class="col-form-label" for="slugedit">Slug</label>
                                                <input type="text" class="form-control" id="slugedit" name="slug"
                                                    placeholder="ex : Pantai-Kaca" />
                                            </div>
                                            <div class="mb-3">
                                                <label class="col-form-label" for="isiberitaedit">Isi Berita</label>
                                                <textarea id="isiberitaedit" class="form-control editoredit" name="isiberita"
                                                    placeholder="ex: Desa Candikuning merupakan desa wisata yang ada di Tabanan"
                                                    aria-label="ex: Desa Candikuning merupakan desa wisata yang ada di Tabanan"
                                                    aria-describedby="basic-icon-default-message2"></textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label class="col-form-label" for="Penulis">Penulis</label>
                                                <input type="text" class="form-control" id="Penulis" name="penulis"
                                                    disabled />
                                            </div>
                                            <div class="mb-3">
                                                <label class="col-form-label" for="tglpostingedit">Tanggal posting</label>
                                                <input type="date" class="form-control" id="tglpostingedit"
                                                    name="tanggalposting" placeholder="ex :23/08/2023" />
                                            </div>
                                            <div>
                                                <label for="formFileedit" class="form-label">Gambar Cover<span
                                                        class=" text-muted">(png/jpg)</span></label>
                                                <input type="file" class="form-control" type="file"
                                                    id="formFileedit" name="gambarcover" onchange="handleFiles(event)" />
                                                <div class="overflow-auto">
                                                    <img id="imageView2" class="my-2" alt="">
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label class="col-form-label" for="kategoriedit">Kategori</label>
                                                <input type="text" class="form-control" id="kategoriedit"
                                                    name="kategori" />
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
                        <!-- Modal Edit End -->
                    </div>
                </div>
            </div>
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
    <script>
        window.addEventListener("load", (e) => {
            ClassicEditor.create(document.querySelector('.editor'))
                .then(editor => {
                    console.log(editor);

                })
                .catch(error => {
                    console.error(error);
                });
        });
        window.addEventListener("load", (e) => {
            ClassicEditor.create(document.querySelector('.editoredit'))
                .then(editoredit => {
                    console.log(editoredit);

                })
                .catch(error => {
                    console.error(error);
                });
        });
    </script>
@endsection

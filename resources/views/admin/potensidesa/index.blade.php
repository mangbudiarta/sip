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
                            <div class="card-datatable table-responsive p-3">
                                <button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal"
                                    data-bs-target="#PotensiTambah">
                                    <i class="menu-icon tf-icons bx bx-plus m-0"></i>Tambah
                                </button>
                                <table class="datatables table border-top">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Potensi</th>
                                            <th>Deskripsi</th>
                                            <th>Lokasi</th>
                                            <th>Penulis</th>
                                            <th>Tgl Posting</th>
                                            <th>Gambar</th>
                                            <th>Slug</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Web Desa</td>
                                            <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iure, voluptatum!
                                            </td>
                                            <td><a href="/" class="btn btn-sm btn-info">Lokasi</a></td>
                                            <td>Admin</td>
                                            <td>23-08-2023</td>
                                            <td>gambar.jpg</td>
                                            <td>Pantai-Kaca</td>
                                            <td>
                                                <a href="" class="btn btn-info btn-sm"><i
                                                        class="menu-icon tf-icons bx bx-show m-0"></i></a>
                                                <a href="/admin/potensigambar" class="btn btn-success btn-sm"><i
                                                        class="menu-icon tf-icons bx bx-image m-0"></i></a>
                                                <a href="#" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                                    data-bs-target="#PotensiEdit"><i
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
                                        <form action="" method="post">
                                            <div class="mb-3">
                                                <label class="col-form-label" for="namapotensi">Nama Potensi</label>
                                                <input type="text" class="form-control" id="namapotensi"
                                                    name="namapotensi" placeholder="ex : Pantai Kaca" />
                                            </div>
                                            <div class="mb-3">
                                                <label class="col-form-label" for="lokasi">Maps Lokasi</label>
                                                <input type="text" class="form-control" id="lokasi" name="lokasi"
                                                    placeholder="ex : https:maps.google.com/ssss" />
                                            </div>
                                            <div class="mb-3">
                                                <label class="col-form-label" for="slug">Slug</label>
                                                <input type="text" class="form-control" id="slug" name="slug"
                                                    placeholder="ex : Pantai-Kaca" />
                                            </div>
                                            <div class="mb-3">
                                                <label class="col-form-label" for="deskripsi">Deskripsi</label>
                                                <textarea id="deskripsi" class="form-control editor" name="deskripsi"
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
                                            <div class="mb-3">
                                                <label class="col-form-label" for="kategori">Kategori</label>
                                                <select class="form-select form-select" name="id_kategori" id="kategori">
                                                    <option>-- Pilih Kategori --</option>
                                                    <option value="Hotel">Hotel</option>
                                                    <option value="Transportasi">Trabsportasi</option>
                                                    <option value="Rumah Sakit">Rumah Sakit</option>
                                                </select>
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
                                        <form action="" method="post">
                                            <input type="hidden" class="form-control" id="id_potensidesa"
                                                name="id_potensidesa" />
                                            <div class="mb-3">
                                                <label class="col-form-label" for="namapotensitambah">Nama Potensi</label>
                                                <input type="text" class="form-control" id="namapotensitambah"
                                                    name="namapotensi" placeholder="ex : Pantai Kaca" />
                                            </div>
                                            <div class="mb-3">
                                                <label class="col-form-label" for="lokasiedit">Maps Lokasi</label>
                                                <input type="text" class="form-control" id="lokasiedit"
                                                    name="lokasi" placeholder="ex : https:maps.google.com/ssss" />
                                            </div>
                                            <div class="mb-3">
                                                <label class="col-form-label" for="slugedit">Slug</label>
                                                <input type="text" class="form-control" id="slugedit" name="slug"
                                                    placeholder="ex : Pantai-Kaca" />
                                            </div>
                                            <div class="mb-3">
                                                <label class="col-form-label" for="deskripsiedit">Deskripsi</label>
                                                <textarea id="deskripsiedit" class="form-control editoredit" name="deskripsi"
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
                                            <div class="mb-3">
                                                <label class="col-form-label" for="kategorediti">Kategori</label>
                                                <select class="form-select form-select" name="id_kategori"
                                                    id="kategoriedit">
                                                    <option>-- Pilih Kategori --</option>
                                                    <option value="Hotel">Hotel</option>
                                                    <option value="Transportasi">Trabsportasi</option>
                                                    <option value="Rumah Sakit">Rumah Sakit</option>
                                                </select>
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

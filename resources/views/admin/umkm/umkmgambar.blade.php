@extends('admin.layouts.main')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-lg-12 mb-4 order-0">
                <div class="row">
                    <div class="col-xxl">
                        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">UMKM/</span> Gambar</h4>
                        <!-- Form Layout Start-->
                        <div class="card mb-4">
                            <div class="card-header d-flex align-items-center justify-content-between">
                                <h5 class="mb-0">Tambah UMKM Gambar</h5>
                            </div>
                            <div class="card-body">
                                <form action="" method="post">
                                    <input type="hidden" name="id_umkm">
                                    <div class="mb-3">
                                        <label class="col-form-label" for="namaumkm">Nama UMKM</label>
                                        <input type="text" class="form-control" id="namaumkm" name="namaumkm" disabled
                                            readonly />
                                    </div>
                                    <div>
                                        <label for="formFile" class="form-label">Gambar <span
                                                class=" text-muted">(png/jpg)</span></label>
                                        <input type="file" class="form-control" type="file" id="formFile"
                                            name="gambarnav" onchange="handleFiles(event)" />
                                        <img id="imageView" class="my-2" alt="">
                                    </div>
                                    <div class="row justify-content-end">
                                        <div class="col-sm-12">
                                            <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- Form Layout End-->
                        <!-- Table Layout Start -->
                        <div class="card mb-4">
                            <div class="card-datatable table-responsive p-3">
                                <table class="datatables table border-top">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama UMKM</th>
                                            <th>Gambar</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Toko Bagus</td>
                                            <td>navbar.png</td>
                                            <td>
                                                <a href="#" class="btn btn-danger btn-sm"><i
                                                        class="menu-icon tf-icons bx bxs-trash m-0"></i></a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- Table Layout End -->
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

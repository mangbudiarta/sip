@extends('admin.layouts.main')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-lg-12 mb-4 order-0">
                <div class="row">
                    <div class="col-xxl">
                        <h4 class="fw-bold py-3 mb-4">Petugas</h4>
                        <!-- Table Layout Start -->
                        <div class="card mb-4">
                            <div class="card-datatable table-responsive p-3">
                                <button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal"
                                    data-bs-target="#PetugasTambah">
                                    <i class="menu-icon tf-icons bx bx-plus m-0"></i>Tambah
                                </button>
                                <table class="datatables table border-top">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>JK</th>
                                            <th>Tempat Lahir</th>
                                            <th>Tgl Lahir/th>
                                            <th>Email</th>
                                            <th>Telepon</th>
                                            <th>Alamat</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Kadek</td>
                                            <td>Laki-laki</td>
                                            <td>Badung</td>
                                            <td>23-08-2000</td>
                                            <td>petugas@gmail.com</td>
                                            <td>089123123</td>
                                            <td>Badung Bali</td>
                                            <td>
                                                <a href="#" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                                    data-bs-target="#PetugasEdit"><i
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
                        <div class="modal fade" id="PetugasTambah" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="ModalTambah">Tambah Petugas</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Form Layout Start-->
                                        <form>
                                            <div class="mb-3">
                                                <label class="col-form-label" for="nama">Nama Petugas</label>
                                                <input type="text" class="form-control" id="nama" name="nama"
                                                    placeholder="ex : Kadek" />
                                            </div>
                                            <div class="mb-3">
                                                <label class="col-form-label" for="jeniskelamin">Jenis Kelamin</label><br>
                                                <input type="radio" name="jeniskelamin" id="laki-laki" value="Laki-Laki">
                                                <label class="col-form-label me-1">Laki-laki</label>
                                                <input type="radio" name="jeniskelamin" id="perempuan" value="Perempuan">
                                                <label class="col-form-label me-1">Perempuan</label>
                                            </div>
                                            <div class="mb-3">
                                                <label class="col-form-label" for="tempatlahir">Tempat Lahir</label>
                                                <input type="text" class="form-control" id="tempatlahir"
                                                    placeholder="Badung" name="tempatlahir" />
                                            </div>
                                            <div class="mb-3">
                                                <label class="col-form-label" for="tanggallahir">Tanggal Lahir</label>
                                                <input type="date" class="form-control" id="tanggallahir"
                                                    name="tanggalposting" placeholder="ex :23/08/2023" />
                                            </div>
                                            <div class="mb-3">
                                                <label class="col-form-label" for="email">Email</label>
                                                <div class="input-group input-group-merge">
                                                    <input type="text" id="email" class="form-control"
                                                        placeholder="ex: admin@gmail.com" name="email" />
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label class="col-form-label" for="telepon">Telepon</label>
                                                <input type="text" id="telepon" class="form-control phone-mask"
                                                    name="telepon" placeholder="ex: 086587998941" />
                                            </div>
                                            <div class="mb-3">
                                                <label class="col-form-label" for="alamat">Alamat</label>
                                                <textarea id="alamat" class="form-control" placeholder="ex :Jalan Semangka, Denpasar"></textarea>
                                            </div>
                                            <div class="justify-content-end">
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
                        <div class="modal fade" id="PetugasEdit" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="ModalEdit">Edit Petugas</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Form Layout Start-->
                                        <form>
                                            <input type="hidden" class="form-control" id="id_petugas"
                                                name="id_petugas" />
                                            <div class="mb-3">
                                                <label class="col-form-label" for="namaedit">Nama Petugas</label>
                                                <input type="text" class="form-control" id="namaedit" name="nama"
                                                    placeholder="ex : Kadek" />
                                            </div>
                                            <div class="mb-3">
                                                <label class="col-form-label" for="jeniskelamin">Jenis Kelamin</label><br>
                                                <input type="radio" name="jeniskelamin" id="laki-lakiedit"
                                                    value="Laki-Laki">
                                                <label class="col-form-label me-1">Laki-laki</label>
                                                <input type="radio" name="jeniskelamin" id="perempuanedit"
                                                    value="Perempuan">
                                                <label class="col-form-label me-1">Perempuan</label>
                                            </div>
                                            <div class="mb-3">
                                                <label class="col-form-label" for="tempatlahiredit">Tempat Lahir</label>
                                                <input type="text" class="form-control" id="tempatlahiredit"
                                                    placeholder="Badung" name="tempatlahir" />
                                            </div>
                                            <div class="mb-3">
                                                <label class="col-form-label" for="tanggallahiredit">Tanggal Lahir</label>
                                                <input type="date" class="form-control" id="tanggallahiredit"
                                                    name="tanggalposting" placeholder="ex :23/08/2023" />
                                            </div>
                                            <div class="mb-3">
                                                <label class="col-form-label" for="emailedit">Email</label>
                                                <div class="input-group input-group-merge">
                                                    <input type="text" id="emailedit" class="form-control"
                                                        placeholder="ex: admin@gmail.com" name="email" />
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label class="col-form-label" for="teleponedit">Telepon</label>
                                                <input type="text" id="teleponedit" class="form-control phone-mask"
                                                    name="telepon" placeholder="ex: 086587998941" />
                                            </div>
                                            <div class="mb-3">
                                                <label class="col-form-label" for="alamatedit">Alamat</label>
                                                <textarea id="alamatedit" class="form-control" placeholder="ex :Jalan Semangka, Denpasar"></textarea>
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
@endsection

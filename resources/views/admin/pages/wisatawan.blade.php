@extends('admin.layouts.main')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-lg-12 mb-4 order-0">
                <div class="row">
                    <div class="col-xxl">
                        <h4 class="fw-bold py-3 mb-4">Wisatawan</h4>
                        <!-- Table Layout Start -->
                        <div class="card mb-4">
                            <div class="card-datatable table-responsive p-3">
                                <table class="datatables table border-top">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Foto</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Kadek</td>
                                            <td>Wisatawan@gmail.com</td>
                                            <td>foto.jpg</td>
                                            <td>
                                                <a href="" class="btn btn-danger btn-sm"><i
                                                        class="menu-icon tf-icons bx bx-trash m-0"></i></a>
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
@endsection

@extends('admin.layouts.main')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-lg-8 mb-4 order-0">
                <div class="card">
                    <div class="d-flex align-items-end row">
                        <div class="col-sm-7">
                            <div class="card-body">
                                @if (Session::has('petugas.nama'))
                                <h5 class="card-title text-primary">Welcome, {{ Session::get('petugas_nama') }}</h5>
                                <!-- Tambahkan konten dashboard sesuai kebutuhan -->
                                @else
                                    <p>Unauthorized access</p>
                                @endif
                                <p class="mb-4">
                                    Selamat Datang di <span class="fw-bold">Sistem Informasi Desa Candikuning</span>
                                </p>
                            </div>
                        </div>
                        <div class="col-sm-5 text-center text-sm-left">
                            <div class="card-body pb-0 px-0 px-md-4">
                                <img src="{{ asset('backend/assets/img/illustrations/man-with-laptop-light.png') }}"
                                    height="140" alt="View Badge User"
                                    data-app-dark-img="illustrations/man-with-laptop-dark.png"
                                    data-app-light-img="illustrations/man-with-laptop-light.png" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

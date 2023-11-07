@extends('frontend.layouts.main') @section('content')
    <!-- Potensi Start -->
    <div class="container-xxl contact py-5">
        <div class="container">
            <div class="section-title text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <h2 class="display-6">Daftar Potensi Desa</h2>
            </div>
            <div class="row justify-content-center wow fadeInUp" data-wow-delay="0.1s">
                <div class="col-lg-8 justify-content-center">
                    <form action="/" method="get">
                        <div class="row mb-3 justify-content-center">
                            <div class="col-sm-5 mb-3">
                                <input type="text" class="form-control" id="cari" name="keyword"
                                    placeholder="Pencarian">
                            </div>
                            <div class="col-sm-5 mb-3">
                                <select class="form-select form-select">
                                    <option>Kategori</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <button type="submit" class="btn btn-primary px-4">Cari</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row product py-3 justify-content-center wow fadeInUp" data-wow-delay="0.5s">
                <div class="col-lg-12">
                    <div class="row g-5">
                        <div class="product-item col-lg-4 rounded">
                            <div class="row">
                                <img src="{{ asset('frontend/img/product-1.jpg') }}" alt="" />
                            </div>
                            <div class="bg-white shadow-sm text-center p-4 position-relative mt-n5 mx-4">
                                <a href="/review" class="text-center mb-3 rating-star">
                                    <small class="fa fa-star text-warning"></small>
                                    <small class="fa fa-star text-warning"></small>
                                    <small class="fa fa-star text-warning"></small>
                                    <small class="fa fa-star text-warning"></small>
                                    <small class="fa fa-star text-warning"></small>
                                    <small>(5)</small>
                                </a>
                                <a href="/potensidetail" class="h4 d-block text-primary">Potensi Satu</a>
                                <span class="text-body deskripsi">Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                                    Corrupti vitae magnam quia praesentium eum quae vero ipsa
                                    tempore quidem officiis.</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Potensi Start -->
@endsection

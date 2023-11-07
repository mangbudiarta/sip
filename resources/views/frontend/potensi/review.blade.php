@extends('frontend.layouts.main') @section('content')
    <!-- Contact Start -->
    <div class="container-xxl contact py-5">
        <div class="container">
            <div class="row justify-content-center wow fadeInUp mb-5" data-wow-delay="0.1s">
                <div class="col-lg-4">
                    <div class="mx-auto wow fadeInUp mb-2" data-wow-delay="0.1s">
                        <h2 class="display-6">Wisata Petik Buah</h2>
                    </div>
                    <!-- Carousel Start -->
                    <div class="container-fluid px-0 mb-5">
                        <div id="header-carousel" class="carousel slide carousel-fade m-auto" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img class="w-100" src="{{ asset('frontend/img/carousel-1.jpg') }}" alt="Image" />
                                </div>
                                <div class="carousel-item">
                                    <img class="w-100" src="{{ asset('frontend/img/carousel-2.jpg') }}" alt="Image" />
                                </div>
                                <div class="carousel-item">
                                    <img class="w-100" src="{{ asset('frontend/img/carousel-2.jpg') }}" alt="Image" />
                                </div>
                            </div>

                            <button class="detail carousel-control-prev detail ms-2" type="button"
                                data-bs-target="#header-carousel" data-bs-slide="prev">
                                <span class="detail carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="detail carousel-control-next detail me-2" type="button"
                                data-bs-target="#header-carousel" data-bs-slide="next">
                                <span class="detail carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                    <!-- Carousel End -->

                </div>
                <div class="col-lg-8">
                    <!-- Form Review Start-->
                    <form action="" method="post">
                        <input type="hidden" class="form-control" id="id_potensidesa" name="id_potensidesa" />
                        <input type="hidden" class="form-control" id="google_id" name="google_id" />
                        <div class="form-group">
                            <label for="rating">Rating:</label>
                            <select class="form-control" id="rating" required>
                                <option value="">-- Pilih Rating --</option>
                                <option value="1">1 Bintang</option>
                                <option value="2">2 Bintang</option>
                                <option value="3">3 Bintang</option>
                                <option value="4">4 Bintang</option>
                                <option value="5">5 Bintang</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label" for="review">Ulasan</label>
                            <textarea id="review" class="form-control" name="review" rows="10"
                                placeholder="ex: Pemandangannya Indah dan Sejuk" required></textarea>
                        </div>
                        <div class="row justify-content-end">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
                                <button type="button" class="btn btn-outline-secondary">
                                    Close
                                </button>
                            </div>
                        </div>
                    </form>
                    <!-- Form Review End-->
                </div>
            </div>
            <div class="row justify-content-center wow fadeInUp" data-wow-delay="0.1s">
                <h3 class="h3 mb-2">Apa Kata Mereka?</h3>
                <div class="col-lg-4 order-md-2">
                    <form action="/" method="get">
                        <div class="row mb-3 justify-content-center">
                            <div class="mb-3">
                                <input type="text" class="form-control" id="cari" name="keyword"
                                    placeholder="Pencarian">
                            </div>
                            <div class="mb-3">
                                <select class="form-select form-select">
                                    <option>Kategori</option>
                                    <option value="1">1 Bintang</option>
                                    <option value="2">2 Bintang</option>
                                    <option value="3">3 Bintang</option>
                                    <option value="4">4 Bintang</option>
                                    <option value="5">5 Bintang</option>
                                </select>
                            </div>
                            <div class="">
                                <button type="submit" class="btn btn-primary px-4">Cari</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-8 order-md-1">
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Kadek Agus </h5>
                            <h6 class="card-subtitle mb-2 text-muted">Rating: 5 <i class="fa fa-star text-warning"></i>
                            </h6>
                            <p class="card-text">Pemandangannya Sangat Indah</p>
                        </div>
                    </div>
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Rizki</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Rating: 5 <i class="fa fa-star text-warning"></i>
                            </h6>
                            <p class="card-text">Keren Banget</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact Start -->
@endsection

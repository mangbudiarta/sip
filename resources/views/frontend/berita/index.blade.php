@extends('frontend.layouts.main') @section('content')
    <!-- Berita Start -->
    <div class="container-xxl contact py-5">
        <div class="container">
            <div class="section-title text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <h2 class="display-6">Daftar Berita</h2>
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

            <div class="row wow fadeInUp" data-wow-delay="0.1s">
                <div class="col-lg-4 col-md-12 mb-4">
                    <div class="card">
                        <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                            <img src="{{ asset('frontend/img/product-1.jpg') }}" class="img-fluid" />
                            <a href="#!">
                                <div class="mask" style="background-color: rgba(251, 251, 251, 0.15)"></div>
                            </a>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Post title</h5>
                            <p class="card-text deskripsi">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Error
                                quas, corrupti est a odit nihil suscipit ipsam? Sequi, nostrum
                                eaque?
                            </p>
                            <a href="/beritadetail" class="btn btn-outline-primary">Baca</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Berita End -->
@endsection

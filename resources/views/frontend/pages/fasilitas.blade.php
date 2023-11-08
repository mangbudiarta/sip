@extends('frontend.layouts.main') @section('content')
    <!-- Potensi Start -->
    <div class="container-xxl contact py-5">
        <div class="container">
            <div class="section-title text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <h2 class="display-6">Daftar Fasilitas Wisata</h2>
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
                                    <option value="Hotel">Hotel</option>
                                    <option value="Transportasi">Trabsportasi</option>
                                    <option value="Rumah Sakit">Rumah Sakit</option>
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <button type="submit" class="btn btn-primary px-4">Cari</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row py-3 justify-content-center wow fadeInUp" data-wow-delay="0.5s">
                <div class="col-lg-12">
                    <div class="row g-5">
                        <div class="col-lg-4 col-md-12 mb-4 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="store-item position-relative text-center shadow-sm">
                                <img class="img-fluid" src="{{ asset('frontend/img/store-product-1.jpg') }}"
                                    alt="" />
                                <div class="p-4">
                                    <h4 class="mb-3">Kadek Homestay</h4>
                                    <p class="deskripsi">
                                        Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                                        Ipsam sapiente repellat repellendus, voluptatibus ullam unde?
                                    </p>
                                </div>
                                <div class="store-overlay">
                                    <a href="https://maps.app.goo.gl/KWBkuRuPTJ3dtdVq6"
                                        class="btn btn-primary rounded-pill py-2 px-4 m-2" target="_blank">Lokasi<i
                                            class="fa fa-map-marker-alt ms-2"></i></a>
                                    <a href="" class="btn btn-dark rounded-pill py-2 px-4 m-2">Kontak<i
                                            class="fa fa-phone-alt ms-2"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Potensi Start -->
@endsection

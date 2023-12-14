@extends('frontend.layouts.main')
@section('content')
    <!-- Carousel Start -->
    <div class="container-fluid px-0 mb-5">
        <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" style="height: 600px;" src="{{ asset('frontend/img/carousel-1.jpg') }}"
                        alt="Image" />
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-7 text-center">
                                    <p class="fs-4 text-white animated zoomIn">
                                        Selamat Datang di
                                        <strong class="text-dark">Desa Candikuning</strong>
                                    </p>
                                    <h2 class="display-1 text-dark mb-4 animated zoomIn">
                                        Desa Wisata Budaya & Alam
                                    </h2>
                                    <a href="#about" class="btn btn-light rounded-pill py-3 px-5 animated zoomIn">Jelajahi
                                        Sekarang</a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                {{-- Perulangan data banner --}}
                @forelse ($banner as $item)
                    <div class="carousel-item">
                        {{-- gambar banner --}}
                        <img class="w-100" style="height: 600px;" src="/storage/banner_img/{{ $item->gambar }}"
                            alt="Gambar banner" />
                        <div class="carousel-caption">
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-lg-7 text-center">
                                        <h2 class="display-6 text-dark mb-4 animated zoomIn">
                                            {{ $item->judul }}
                                        </h2>
                                        <p class="fs-4 text-white animated zoomIn">
                                            {{ $item->deskripsi }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    {{-- jika data fasilitas kosong tampilkan pesan kosong --}}
                    <div class="text-center">
                        <p>Data banner Kosong</p>
                    </div>
                @endforelse
                {{-- akhir perulangan data banner --}}
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    </div>
    <!-- Carousel End -->

    <!-- About Start -->
    <div class="container-xxl py-5" id="about">
        <div class="container">
            <div class="row g-5">
                {{-- Perulangan data berita --}}
                @forelse ($profildesa as $item)
                    <div class="col-lg-6 position-relative">
                        <button type="button" class="btn-play position-absolute top-50 start-50 z-index-1"
                            data-bs-toggle="modal" data-src="{{ $item->video }}" data-bs-target="#videoModal">
                            <span></span>
                        </button>
                        <img style="width: 510px" class="img-fluid bg-white mb-3 wow fadeIn" data-wow-delay="0.1s"
                            src="/storage/profildesa_img/{{ $item->gambarcover }}" alt="profil desa Candikuning" />
                    </div>
                    <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                        <div class="section-title">
                            <p class="fs-5 fw-medium fst-italic text-primary">Profil Desa</p>
                            <h1 class="display-6"> {{ $item->judul }}</h1>
                        </div>
                        <div class="row g-3 mb-3">
                            <p class="mb-0 deskripsi-large">
                                {{ $item->deskripsi }}
                            </p>
                        </div>
                        <a href="/profil"
                            class="btn btn-outline-primary rounded-pill py-2 px-4 animated zoomIn">Selengkapnya</a>
                    </div>
            </div>
        @empty
            @endforelse
        </div>
    </div>
    <!-- About End -->

    <!-- Video Modal Start -->
    <div class="modal modal-video fade" id="videoModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content rounded-0">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">Youtube Video</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- 16:9 aspect ratio -->
                    <div class="ratio ratio-16x9">
                        <iframe class="embed-responsive-item" src="" id="video" allowfullscreen
                            allowscriptaccess="always" allow="autoplay"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Video Modal End -->

    <!-- Info Wilayah Start -->
    @forelse ($infowilayah as $item)
        <div class="container-fluid product py-5 my-5" id="infowilayah"
            style="background: linear-gradient(rgba(245, 240, 240, 0.1), rgba(242, 245, 239, 0.1)),
        url(/storage/infowilayah_img/{{ $item->gambarcover }}) left bottom no-repeat;
      background-size: cover;">
            <div class="container py-5">
                <div class="section-title text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px">
                    <p class="fs-5 fw-medium fst-italic text-primary">Info Wilayah</p>
                    <h2 class="display-6">{{ $item->judul }}</h2>
                </div>
                <div class="border-top mb-4"></div>
                <div class="row g-3">
                    <p class="mb-0 text-center">
                        {{ $item->deskripsi }}
                    </p>
                </div>
            </div>
        </div>
    @empty
        {{-- jika data fasilitas kosong tampilkan pesan kosong --}}
        <div class="text-center">
            <p>Data Info Wilayah</p>
        </div>
    @endforelse
    <!-- Info Wilayah End -->


    <!-- Potensi Desa Start -->
    <div class="container-fluid product py-5 my-5" id="potensidesa">
        <div class="container py-5">
            <div class="section-title text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px">
                <p class="fs-5 fw-medium fst-italic text-primary">Potensi Desa</p>
                <h2 class="display-6">Temukan Tempat yang Indah Bagaikan Surga</h2>
            </div>
            <div class="owl-carousel product-carousel wow fadeInUp" data-wow-delay="0.5s">
                <div class="product-item rounded">
                    <img src="{{ asset('frontend/img/product-1.jpg') }}" alt="" />
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
                <div class="product-item rounded">
                    <img src="{{ asset('frontend/img/product-1.jpg') }}" alt="" />
                    <div class="bg-white shadow-sm text-center p-4 position-relative mt-n5 mx-4">
                        <a href="/review" class="text-center mb-3 rating-star">
                            <small class="fa fa-star text-warning"></small>
                            <small class="fa fa-star text-warning"></small>
                            <small class="fa fa-star text-warning"></small>
                            <small class="fa fa-star text-warning"></small>
                            <small class="fa fa-star text-warning"></small>
                            <small>(5)</small>
                        </a>
                        <a href="/kontak" class="h4 d-block text-primary">Potensi Dua</a>
                        <span class="text-body deskripsi">Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                            Corrupti vitae magnam quia praesentium eum quae vero ipsa
                            tempore quidem officiis.</span>
                    </div>
                </div>
                <div class="product-item rounded">
                    <img src="{{ asset('frontend/img/product-1.jpg') }}" alt="" />
                    <div class="bg-white shadow-sm text-center p-4 position-relative mt-n5 mx-4">
                        <a href="/review" class="text-center mb-3 rating-star">
                            <small class="fa fa-star text-warning"></small>
                            <small class="fa fa-star text-warning"></small>
                            <small class="fa fa-star text-warning"></small>
                            <small class="fa fa-star text-warning"></small>
                            <small class="fa fa-star text-warning"></small>
                            <small>(5)</small>
                        </a>
                        <a href="/kontak" class="h4 d-block text-primary">Potensi Tiga</a>
                        <span class="text-body deskripsi">Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                            Corrupti vitae magnam quia praesentium eum quae vero ipsa
                            tempore quidem officiis.</span>
                    </div>
                </div>
                <div class="product-item rounded">
                    <img src="{{ asset('frontend/img/product-1.jpg') }}" alt="" />
                    <div class="bg-white shadow-sm text-center p-4 position-relative mt-n5 mx-4">
                        <a href="/review" class="text-center mb-3 rating-star">
                            <small class="fa fa-star text-warning"></small>
                            <small class="fa fa-star text-warning"></small>
                            <small class="fa fa-star text-warning"></small>
                            <small class="fa fa-star text-warning"></small>
                            <small class="fa fa-star text-warning"></small>
                            <small>(5)</small>
                        </a>
                        <a href="/kontak" class="h4 d-block text-primary">Potensi Empat</a>
                        <span class="text-body deskripsi">Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                            Corrupti vitae magnam quia praesentium eum quae vero ipsa
                            tempore quidem officiis.</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Potensi Desa End -->

    <!-- UMKM Start -->
    <div class="container-xxl py-5" id="umkm">
        <div class="container">
            <div class="section-title text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px">
                <p class="fs-5 fw-medium fst-italic text-primary">UMKM</p>
                <h2 class="display-6">Jelajahi Tempat dengan Keajaiban di Sini!</h2>
            </div>
            <div class="owl-carousel product-carousel wow fadeInUp" data-wow-delay="0.5s">
                {{-- perulangan data umkm --}}
                @forelse ($umkm as $item)
                    <div class="wow fadeInUp" data-wow-delay="0.1s">
                        <div class="store-item position-relative text-center">
                            <img class="img-fluid" src="/storage/umkm_img/{{ $item->gambarcover }}" alt="gambar umkm" />
                            <div class="p-4">
                                <!-- nama umkm -->
                                <h4 class="mb-3">{{ $item->namaumkm }}</h4>
                                <!-- deskripsi umkm -->
                                <p class="deskripsi">
                                    {{ $item->deskripsi }}
                                </p>
                            </div>
                            <div class="store-overlay">
                                <a href="/umkmdetail/{{ $item->slug }}"
                                    class="btn btn-primary rounded-pill py-2 px-4 m-2">Info
                                    Selengkapnya<i class="fa fa-arrow-right ms-2"></i></a>
                                {{-- jika infopemilik berisi karakter '+' --}}
                                @if (Str::contains($item->infopemilik, '+'))
                                    {{-- tambahkan link wa dan no wa --}}
                                    <a href="https://wa.me/{{ $item->infopemilik }}"
                                        class="btn btn-dark rounded-pill py-2 px-4 m-2" target="_blank">Info Pemilik<i
                                            class="fa fa-phone-alt ms-2"></i></a>
                                @else
                                    {{-- jika infopemilik tidak berisi karakter '+', gunakan isi infopemilik --}}
                                    <a href="{{ $item->infopemilik }}" class="btn btn-dark rounded-pill py-2 px-4 m-2"
                                        target="_blank">Info Pemilik<i class="fa fa-phone-alt ms-2"></i></a>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    {{-- jika data umkm kosong tampilkan $pesan --}}
                    <div class="text-center">
                        <p>Data UMKM Kosong</p>
                    </div>
                @endforelse
                {{-- akhir perulangan data umkm --}}
            </div>
        </div>
    </div>
    </div>
    <!-- UMKM End -->

    <!-- Fasilitas Start -->
    <div class="container-fluid video my-5">
        <div class="container">
            <div class="row g-0 justify-content-center">
                <div class="col-lg-7 py-5 wow fadeIn" data-wow-delay="0.1s">
                    <div class="py-2">
                        <h2 class="display-6 mb-4 text-white">
                            <span class="text-dark">Jelajahi Fasilitas</span> Desa
                            <br>Wisata Candikuning <span class="text-dark"> Disini</span>
                        </h2>
                    </div>
                </div>
                <div class="col-lg-3 py-5 wow fadeIn" data-wow-delay="0.1s">
                    <div class="py-5">
                        <a href="/fasilitas" class="btn btn-light rounded-pill py-3 px-5 animated zoomIn">Jelajahi
                            Sekarang</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Fasilitas End -->

    <!-- Berita Start -->
    <div class="container-xxl contact py-5" id="berita">
        <div class="container">
            <div class="section-title text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px">
                <p class="fs-5 fw-medium fst-italic text-primary">Berita</p>
                <h2 class="display-6">Informasi Terbaru Dari Kami</h2>
            </div>
            <div class="row wow fadeInUp" data-wow-delay="0.1s">
                {{-- Perulangan data berita --}}
                @forelse ($berita as $item)
                    <div class="col-lg-4 col-md-12 mb-4">
                        <div class="card h-100 d-flex flex-column">
                            <div class="bg-image hover-overlay ripple max-height:350px;background-size: cover"
                                data-mdb-ripple-color="light">
                                {{-- gambar berita --}}
                                <img class="img-fluid" src="/storage/berita_img/{{ $item->gambarcover }}"
                                    alt="Gambar berita" />
                            </div>
                            <div class="card-body d-flex flex-column">
                                {{-- judul berita --}}
                                <h5 class="card-title">{{ $item->judulberita }}</h5>
                                {{-- isi berita --}}
                                <p class="card-text deskripsi flex-grow-1">
                                    {{ $item->isiberita }}
                                </p>
                                {{-- route beritadetail dengan parameter slug --}}
                                <a href="/beritadetail/{{ $item->slug }}"
                                    class="btn btn-outline-primary mt-auto rounded-pill">Baca</a>
                            </div>
                        </div>
                    </div>
                @empty
                    {{-- jika data fasilitas kosong tampilkan pesan kosong --}}
                    <div class="text-center">
                        <p>Data Berita Kosong</p>
                    </div>
                @endforelse
                {{-- akhir perulangan data berita --}}
            </div>
            {{-- Jika jumlah berita == 3, tampilkan tombol berita lainnya --}}
            @if (count($berita) == 3)
                <a href="/berita" class="btn btn-primary rounded-pill py-2 px-4">Berita Lainnya</a>
            @endif
        </div>
    </div>
    <!-- Berita End -->

    <!-- Kontak Start -->
    <div class="container-xxl contact py-5">
        <div class="container">
            <div class="section-title text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <p class="fs-5 fw-medium fst-italic text-primary">Kontak</p>
                <h2 class="display-6">Hubungi Kami untuk Informasi Lainnya</h2>
            </div>
            <div class="row justify-content-center wow fadeInUp" data-wow-delay="0.1s">
                <div class="col-lg-8">
                    <div class="row g-5">
                        <div class="col-md-3 text-center wow fadeInUp" data-wow-delay="0.3s">
                            <div class="btn-square mx-auto mb-3">
                                <i class="fa fa-envelope fa-2x text-white"></i>
                            </div>
                            <p class="mb-2">Email</p>
                            <p class="mb-0">support@example.com</p>
                        </div>
                        <div class="col-md-3 text-center wow fadeInUp" data-wow-delay="0.4s">
                            <div class="btn-square mx-auto mb-3">
                                <i class="fa fa-phone fa-2x text-white"></i>
                            </div>
                            <p class="mb-2">Telepon/Wa</p>
                            <p class="mb-0">+012 345 67890</p>
                        </div>
                        <div class="col-md-3 text-center wow fadeInUp" data-wow-delay="0.5s">
                            <div class="btn-square mx-auto mb-3">
                                <i class="fa fa-map-marker-alt fa-2x text-white"></i>
                            </div>
                            <p class="mb-2">Alamat Kantor Desa</p>
                            <p class="mb-0">Jalan Raya Bedugul, Candikuning Tabanan</p>
                        </div>
                        <div class="col-md-3 text-center wow fadeInUp" data-wow-delay="0.5s">
                            <div class="btn-square mx-auto mb-3">
                                <i class="fa fa-map-marked-alt fa-2x text-white"></i>
                            </div>
                            <p class="mb-2">Maps Kantor Desa</p>
                            <p class="mb-0"><a href="https://maps.app.goo.gl/KWBkuRuPTJ3dtdVq6" target="_blank">Link
                                    Maps</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Kontak End -->
@endsection

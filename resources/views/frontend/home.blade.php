@extends('frontend.layouts.main')
@section('content')
  <!-- Carousel Start -->
  <div class="container-fluid px-0 mb-5">
    <div
      id="header-carousel"
      class="carousel slide carousel-fade"
      data-bs-ride="carousel"
    >
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="w-100" src="{{ asset('frontend/img/carousel-1.jpg') }}" alt="Image" />
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
                  <a
                    href="#about"
                    class="btn btn-light rounded-pill py-3 px-5 animated zoomIn"
                    >Jelajahi Sekarang</a
                  >
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <img class="w-100" src="{{ asset('frontend/img/carousel-2.jpg') }}" alt="Image" />
          <div class="carousel-caption">
            <div class="container">
              <div class="row justify-content-center">
                <div class="col-lg-7 text-center">
                  <h2 class="display-6 text-dark mb-4 animated zoomIn">
                    Desa Candikuning
                  </h2>
                  <p class="fs-4 text-white animated zoomIn">
                    Desa Candikuning terletak di ujung utara kecamatan
                    Baturiti, Kabupaten Tabanan, Bali, Indonesia. Desa ini
                    terkenal dengan objek wisata Pura Ulun Danu Bratan. Desa
                    ini terdiri dari enam banjar: Batusesa, Bukitcatu,
                    Candikuning I, Candikuning II, Kembangmerta, dan
                    Pemuteran.
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <img class="w-100" src="{{ asset('frontend/img/carousel-2.jpg') }}" alt="Image" />
          <div class="carousel-caption">
            <div class="container">
              <div class="row justify-content-center">
                <div class="col-lg-7 text-center">
                  <h2 class="display-6 text-dark mb-4 animated zoomIn">
                    Sistem Informasi Pariwisata Desa Candikuning
                  </h2>
                  <p class="fs-4 text-white animated zoomIn">
                    Sistem informasi yang menyampaikan informasi wisata di
                    Desa Candikuning Tabanan
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <button
        class="carousel-control-prev"
        type="button"
        data-bs-target="#header-carousel"
        data-bs-slide="prev"
      >
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button
        class="carousel-control-next"
        type="button"
        data-bs-target="#header-carousel"
        data-bs-slide="next"
      >
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
        <div class="col-lg-6 position-relative">
          <button
            type="button"
            class="btn-play position-absolute top-50 start-50 z-index-1"
            data-bs-toggle="modal"
            data-src="https://www.youtube.com/embed/DWRcNpR6Kdc"
            data-bs-target="#videoModal"
          >
            <span></span>
          </button>
          <img
            style="width: 510px"
            class="img-fluid bg-white mb-3 wow fadeIn"
            data-wow-delay="0.1s"
            src="{{ asset('frontend/img/profildesa.png') }}"
            alt="profil desa Candikuning"
          />
        </div>
        <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
          <div class="section-title">
            <p class="fs-5 fw-medium fst-italic text-primary">Profil Desa</p>
            <h1 class="display-6">Desa Wisata Candikuning</h1>
          </div>
          <div class="border-top mb-4"></div>
          <div class="row g-3">
            <p class="mb-0">
              Lorem ipsum dolor sit amet consectetur adipisicing elit.
              Excepturi, corporis blanditiis. Consequatur optio minus impedit
              adipisci, amet reiciendis dolor officiis eligendi voluptatum
              dolore laboriosam aliquid eius! Ratione molestiae quod
              cupiditate.
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- About End -->

  <!-- Video Modal Start -->
  <div
    class="modal modal-video fade"
    id="videoModal"
    tabindex="-1"
    aria-labelledby="exampleModalLabel"
    aria-hidden="true"
  >
    <div class="modal-dialog">
      <div class="modal-content rounded-0">
        <div class="modal-header">
          <h3 class="modal-title" id="exampleModalLabel">Youtube Video</h3>
          <button
            type="button"
            class="btn-close"
            data-bs-dismiss="modal"
            aria-label="Close"
          ></button>
        </div>
        <div class="modal-body">
          <!-- 16:9 aspect ratio -->
          <div class="ratio ratio-16x9">
            <iframe
              class="embed-responsive-item"
              src=""
              id="video"
              allowfullscreen
              allowscriptaccess="always"
              allow="autoplay"
            ></iframe>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Video Modal End -->

  <!-- Info Wilayah Start -->
  <div class="container-fluid product py-5 my-5">
    <div class="container py-5">
      <div
        class="section-title text-center mx-auto wow fadeInUp"
        data-wow-delay="0.1s"
        style="max-width: 500px"
      >
        <p class="fs-5 fw-medium fst-italic text-primary">Info Wilayah</p>
        <h2 class="display-6">Desa Sejuk Nan Eksotis</h2>
      </div>
      <div class="border-top mb-4"></div>
      <div class="row g-3">
        <p class="mb-0 text-center">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut, odio.
          Eveniet voluptatibus dignissimos ex corporis, iusto natus harum
          eligendi doloremque illum hic possimus maxime, et magni cumque
          nobis, ipsum architecto molestiae! At, molestias in quia beatae
          animi, nihil ab quaerat, distinctio harum illum fugit ad? Soluta
          molestias placeat adipisci eos!
        </p>
      </div>
    </div>
  </div>
  <!-- Info Wilayah End -->

  <!-- Potensi Desa Start -->
  <div class="container-fluid product py-5 my-5">
    <div class="container py-5">
      <div
        class="section-title text-center mx-auto wow fadeInUp"
        data-wow-delay="0.1s"
        style="max-width: 500px"
      >
        <p class="fs-5 fw-medium fst-italic text-primary">Potensi Desa</p>
        <h2 class="display-6">Temukan Tempat yang Indah Bagaikan Surga</h2>
      </div>
      <div
        class="owl-carousel product-carousel wow fadeInUp"
        data-wow-delay="0.5s"
      >
        <a href="" class="d-block product-item rounded">
          <img src="{{ asset('frontend/img/product-1.jpg') }}" alt="" />
          <div
            class="bg-white shadow-sm text-center p-4 position-relative mt-n5 mx-4"
          >
            <h4 class="text-primary">Potensi Satu</h4>
            <span class="text-body deskripsi"
              >Lorem ipsum dolor sit amet consectetur, adipisicing elit.
              Corrupti vitae magnam quia praesentium eum quae vero ipsa
              tempore quidem officiis.</span
            >
          </div>
        </a>
        <a href="" class="d-block product-item rounded">
          <img src="{{ asset('frontend/img/product-2.jpg') }}" alt="" />
          <div
            class="bg-white shadow-sm text-center p-4 position-relative mt-n5 mx-4"
          >
            <h4 class="text-primary">Potensi Dua</h4>
            <span class="text-body deskripsi"
              >Lorem ipsum dolor sit amet consectetur, adipisicing elit.
              Corrupti vitae magnam quia praesentium eum quae vero ipsa
              tempore quidem officiis.</span
            >
          </div>
        </a>
        <a href="" class="d-block product-item rounded">
          <img src="{{ asset('frontend/img/product-3.jpg') }}" alt="" />
          <div
            class="bg-white shadow-sm text-center p-4 position-relative mt-n5 mx-4"
          >
            <h4 class="text-primary">Potensi Tiga</h4>
            <span class="text-body deskripsi"
              >Lorem ipsum dolor sit amet consectetur, adipisicing elit.
              Corrupti vitae magnam quia praesentium eum quae vero ipsa
              tempore quidem officiis.</span
            >
          </div>
        </a>
        <a href="" class="d-block product-item rounded">
          <img src="{{ asset('frontend/img/product-4.jpg') }}" alt="" />
          <div
            class="bg-white shadow-sm text-center p-4 position-relative mt-n5 mx-4"
          >
            <h4 class="text-primary">Potensi Empat</h4>
            <span class="text-body deskripsi"
              >Lorem ipsum dolor sit amet consectetur, adipisicing elit.
              Corrupti vitae magnam quia praesentium eum quae vero ipsa
              tempore quidem officiis.</span
            >
          </div>
        </a>
      </div>
    </div>
  </div>
  <!-- Potensi Desa End -->

  <!-- UMKM Start -->
  <div class="container-xxl py-5">
    <div class="container">
      <div
        class="section-title text-center mx-auto wow fadeInUp"
        data-wow-delay="0.1s"
        style="max-width: 500px"
      >
        <p class="fs-5 fw-medium fst-italic text-primary">UMKM</p>
        <h2 class="display-6">Jelajahi Tempat Keajaiban Disini!</h2>
      </div>
      <div
        class="owl-carousel product-carousel wow fadeInUp"
        data-wow-delay="0.5s"
      >
        <div class="wow fadeInUp" data-wow-delay="0.1s">
          <div class="store-item position-relative text-center">
            <img class="img-fluid" src="{{ asset('frontend/img/store-product-1.jpg') }}" alt="" />
            <div class="p-4">
              <div class="text-center mb-3">
                <small class="fa fa-star text-primary"></small>
                <small class="fa fa-star text-primary"></small>
                <small class="fa fa-star text-primary"></small>
                <small class="fa fa-star text-primary"></small>
                <small class="fa fa-star text-primary"></small>
              </div>
              <h4 class="mb-3">UMKM SATU</h4>
              <p class="deskripsi">
                Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                Ipsam sapiente repellat repellendus, voluptatibus ullam unde?
              </p>
            </div>
            <div class="store-overlay">
              <a href="" class="btn btn-primary rounded-pill py-2 px-4 m-2"
                >Info Selengkapnya<i class="fa fa-arrow-right ms-2"></i
              ></a>
              <a href="" class="btn btn-dark rounded-pill py-2 px-4 m-2"
                >Hubungi Pemilik <i class="fa fa-phone-alt ms-2"></i
              ></a>
            </div>
          </div>
        </div>
        <div class="wow fadeInUp" data-wow-delay="0.3s">
          <div class="store-item position-relative text-center">
            <img class="img-fluid" src="{{ asset('frontend/img/store-product-2.jpg') }}" alt="" />
            <div class="p-4">
              <div class="text-center mb-3">
                <small class="fa fa-star text-primary"></small>
                <small class="fa fa-star text-primary"></small>
                <small class="fa fa-star text-primary"></small>
                <small class="fa fa-star text-primary"></small>
                <small class="fa fa-star text-primary"></small>
              </div>
              <h4 class="mb-3">UMKM DUA</h4>
              <p class="deskripsi">
                Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                Tempore, sit quasi commodi consequatur totam quo!
              </p>
            </div>
            <div class="store-overlay">
              <a href="" class="btn btn-primary rounded-pill py-2 px-4 m-2"
                >Info Selengkapnya<i class="fa fa-arrow-right ms-2"></i
              ></a>
              <a href="" class="btn btn-dark rounded-pill py-2 px-4 m-2"
                >Hubungi Pemilik <i class="fa fa-phone-alt ms-2"></i
              ></a>
            </div>
          </div>
        </div>
        <div class="wow fadeInUp" data-wow-delay="0.5s">
          <div class="store-item position-relative text-center">
            <img class="img-fluid" src="{{ asset('frontend/img/store-product-3.jpg') }}" alt="" />
            <div class="p-4">
              <div class="text-center mb-3">
                <small class="fa fa-star text-primary"></small>
                <small class="fa fa-star text-primary"></small>
                <small class="fa fa-star text-primary"></small>
                <small class="fa fa-star text-primary"></small>
                <small class="fa fa-star text-primary"></small>
              </div>
              <h4 class="mb-3">UMKM TIGA</h4>
              <p class="deskripsi">
                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                Mollitia quod odit obcaecati officiis id dolorem.
              </p>
            </div>
            <div class="store-overlay">
              <a href="" class="btn btn-primary rounded-pill py-2 px-4 m-2"
                >Info Selengkapnya<i class="fa fa-arrow-right ms-2"></i
              ></a>
              <a href="" class="btn btn-dark rounded-pill py-2 px-4 m-2"
                >Hubungi Pemilik <i class="fa fa-phone-alt ms-2"></i
              ></a>
            </div>
          </div>
        </div>
        <div class="wow fadeInUp" data-wow-delay="0.5s">
          <div class="store-item position-relative text-center">
            <img class="img-fluid" src="{{ asset('frontend/img/store-product-3.jpg') }}" alt="" />
            <div class="p-4">
              <div class="text-center mb-3">
                <small class="fa fa-star text-primary"></small>
                <small class="fa fa-star text-primary"></small>
                <small class="fa fa-star text-primary"></small>
                <small class="fa fa-star text-primary"></small>
                <small class="fa fa-star text-primary"></small>
              </div>
              <h4 class="mb-3">UMKM EMPAT</h4>
              <p class="deskripsi">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Non
                hic itaque earum ab mollitia voluptatem!
              </p>
            </div>
            <div class="store-overlay">
              <a href="" class="btn btn-primary rounded-pill py-2 px-4 m-2"
                >Info Selengkapnya<i class="fa fa-arrow-right ms-2"></i
              ></a>
              <a href="" class="btn btn-dark rounded-pill py-2 px-4 m-2"
                >Hubungi Pemilik <i class="fa fa-phone-alt ms-2"></i
              ></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- UMKM End -->

  <!-- Langganan Start -->
  <div class="container-fluid video my-5">
    <div class="container">
      <div class="row g-0">
        <div class="col-lg-6 py-5 wow fadeIn" data-wow-delay="0.1s">
          <div class="py-2">
            <h2 class="display-6 mb-4">
              <span class="text-white">Ikuti Halaman Kami</span> untuk
              Informasi Terbaru
            </h2>
          </div>
        </div>
        <div class="col-lg-6 d-flex align-items-center">
          <div class="position-relative w-100">
            <input
              class="form-control bg-white w-100 py-3 ps-4 pe-5"
              type="text"
              placeholder="Your email"
            />
            <button
              type="button"
              class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2"
            >
              SignUp
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Langganan End -->

  <!-- Berita Start -->
  <div class="container-xxl contact py-5">
    <div class="container">
      <div
        class="section-title text-center mx-auto wow fadeInUp"
        data-wow-delay="0.1s"
        style="max-width: 500px"
      >
        <p class="fs-5 fw-medium fst-italic text-primary">Berita</p>
        <h2 class="display-6">Informasi Terbaru Dari Kami</h2>
      </div>
      <div
        class="row justify-content-center wow fadeInUp"
        data-wow-delay="0.1s"
      >
        <div class="col-lg-4 col-md-12 mb-4">
          <div class="card">
            <div
              class="bg-image hover-overlay ripple"
              data-mdb-ripple-color="light"
            >
              <img src="{{ asset('frontend/img/product-1.jpg') }}" class="img-fluid" />
              <a href="#!">
                <div
                  class="mask"
                  style="background-color: rgba(251, 251, 251, 0.15)"
                ></div>
              </a>
            </div>
            <div class="card-body">
              <h5 class="card-title">Post title</h5>
              <p class="card-text deskripsi">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Error
                quas, corrupti est a odit nihil suscipit ipsam? Sequi, nostrum
                eaque?
              </p>
              <a href="#!" class="btn btn-primary">Baca</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-12 mb-4">
          <div class="card">
            <div
              class="bg-image hover-overlay ripple"
              data-mdb-ripple-color="light"
            >
              <img src="{{ asset('frontend/img/product-1.jpg') }}" class="img-fluid" />
              <a href="#!">
                <div
                  class="mask"
                  style="background-color: rgba(251, 251, 251, 0.15)"
                ></div>
              </a>
            </div>
            <div class="card-body">
              <h5 class="card-title">Post title</h5>
              <p class="card-text deskripsi">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Error
                quas, corrupti est a odit nihil suscipit ipsam? Sequi, nostrum
                eaque?
              </p>
              <a href="#!" class="btn btn-primary">Baca</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-12 mb-4">
          <div class="card">
            <div
              class="bg-image hover-overlay ripple"
              data-mdb-ripple-color="light"
            >
              <img src="{{ asset('frontend/img/product-1.jpg') }}" class="img-fluid" />
              <a href="#!">
                <div
                  class="mask"
                  style="background-color: rgba(251, 251, 251, 0.15)"
                ></div>
              </a>
            </div>
            <div class="card-body">
              <h5 class="card-title">Post title</h5>
              <p class="card-text deskripsi">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Error
                quas, corrupti est a odit nihil suscipit ipsam? Sequi, nostrum
                eaque?
              </p>
              <a href="#!" class="btn btn-primary">Baca</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-12 mb-4">
          <div class="card">
            <div
              class="bg-image hover-overlay ripple"
              data-mdb-ripple-color="light"
            >
              <img src="{{ asset('frontend/img/product-1.jpg') }}" class="img-fluid" />
              <a href="#!">
                <div
                  class="mask"
                  style="background-color: rgba(251, 251, 251, 0.15)"
                ></div>
              </a>
            </div>
            <div class="card-body">
              <h5 class="card-title">Post title</h5>
              <p class="card-text deskripsi">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Error
                quas, corrupti est a odit nihil suscipit ipsam? Sequi, nostrum
                eaque?
              </p>
              <a href="#!" class="btn btn-primary">Baca</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-12 mb-4">
          <div class="card">
            <div
              class="bg-image hover-overlay ripple"
              data-mdb-ripple-color="light"
            >
              <img src="{{ asset('frontend/img/product-1.jpg') }}" class="img-fluid" />
              <a href="#!">
                <div
                  class="mask"
                  style="background-color: rgba(251, 251, 251, 0.15)"
                ></div>
              </a>
            </div>
            <div class="card-body">
              <h5 class="card-title">Post title</h5>
              <p class="card-text deskripsi">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Error
                quas, corrupti est a odit nihil suscipit ipsam? Sequi, nostrum
                eaque?
              </p>
              <a href="#!" class="btn btn-primary">Baca</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-12 mb-4">
          <div class="card">
            <div
              class="bg-image hover-overlay ripple"
              data-mdb-ripple-color="light"
            >
              <img src="{{ asset('frontend/img/product-1.jpg') }}" class="img-fluid" />
              <a href="#!">
                <div
                  class="mask"
                  style="background-color: rgba(251, 251, 251, 0.15)"
                ></div>
              </a>
            </div>
            <div class="card-body">
              <h5 class="card-title">Post title</h5>
              <p class="card-text deskripsi">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Error
                quas, corrupti est a odit nihil suscipit ipsam? Sequi, nostrum
                eaque?
              </p>
              <a href="#!" class="btn btn-primary">Baca</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Berita End -->

@endsection
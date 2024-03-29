<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Desa Wisata Candikuning - Kabupaten Tabanan | {{ $title }}</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta name="title" content="Desa Wisata Candikuning" />
    <meta name="description"
        content="Desa Candikuning adalah sebuah desa yang terletak di Kecamatan Baturiti, Kabupaten Tabanan, Bali, Indonesia. Desa ini memiliki obyek wisata terkenal seperti Danau Beratan dan Taman Raya Bedugul" />
    <meta name="keywords"
        content="Sistem Informasi Pariwisata Desa Kamasan Candikuning, Desa Wisata Candikuning Tabanan, Potensi Wisata Tabanan" />
    <meta name="robots" content="index, follow" />

    <!-- Favicon -->
    <link href="{{ asset('frontend/img/favicon.png') }}" rel="icon" />

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Playfair+Display:wght@700;900&display=swap"
        rel="stylesheet" />

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('frontend/lib/animate/animate.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('frontend/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('frontend/css/bootstrap.min.css') }}" rel="stylesheet" />

    <!-- Template Stylesheet -->
    <link href="{{ asset('frontend/css/style.css') }}" rel="stylesheet" />

    {{-- Link css APi Maps --}}
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <script src="{{ asset('backend/assets/js/config.js') }}"></script>
    <script src="{{ asset('backend/assets/vendor/libs/jquery/jquery.js') }}"></script>
</head>

<body>

    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error:</strong> {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Menampilkan pesan sukses -->
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success:</strong> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif


    <!-- Navbar Start -->
    <div class="container-fluid bg-white sticky-top">
        <div class="container">
            <nav class="navbar navbar-expand-lg bg-white navbar-light py-2 py-lg-0">
                <a href="/" class="navbar-brand">
                    @forelse ($navbar as $item)
                        <img class="img-fluid" src="/storage/navbar_img/{{ $item->gambarnav }}"
                            alt="Logo Desa Candikuning" style="width: 250px" />
                    @empty <img class="img-fluid" src="{{ asset('frontend/img/logo.png') }}"
                            alt="Logo Desa Candikuning" style="width: 250px" />
                    @endforelse
                </a>
                <button type="button" class="navbar-toggler ms-auto me-0" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto">
                        <a href="/" class="nav-item nav-link {{ $title == 'Home' ? 'active' : '' }}">Home</a>
                        <a href="/potensi"
                            class="nav-item nav-link {{ $title == 'potensi desa' ? 'active' : '' }}">Potensi</a>
                        <a href="/umkm" class="nav-item nav-link {{ $title == 'Umkm' ? 'active' : '' }}">UMKM</a>
                        <a href="/fasilitas"
                            class="nav-item nav-link {{ $title == 'Fasilitas' ? 'active' : '' }}">Fasilitas</a>
                        <a href="/berita" class="nav-item nav-link {{ $title == 'Berita' ? 'active' : '' }}">Berita</a>
                    </div>
                    @auth
                        <a href="{{ route('logout') }}"
                            class="btn btn-outline-primary rounded-pill py-2 px-4 animated zoomIn">
                            Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    @else
                        <a href="{{ route('auth') }}"
                            class="btn btn-outline-primary rounded-pill py-2 px-4 animated zoomIn">Login</a>
                    @endauth

                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->

    @yield('content')

    <!-- Footer Start -->
    <div class="container-fluid bg-dark footer mt-5 py-5 wow fadeIn" data-wow-delay="0.1s" id="footer">
        <div class="container py-5">
            <div class="row g-5">
                @forelse ($footer as $item)
                    <div class="col-lg-4 col-md-6">
                        <div class="text-center mb-4">
                            <img src="/storage/footer_img/{{ $item->gambar }}" alt="logo desa candikuning"
                                style="width: 80px" />
                        </div>
                        <p class="mb-2">
                            {{ $item->deskripsi }}
                        </p>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h4 class="text-primary mb-4">Media Sosial</h4>
                        <div class="d-flex pt-3">
                            <a class="btn btn-square btn-primary rounded-circle me-2" href=""><i
                                    class="fab fa-twitter"></i></a>
                            <a class="btn btn-square btn-primary rounded-circle me-2" href=""><i
                                    class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-square btn-primary rounded-circle me-2" href=""><i
                                    class="fab fa-youtube"></i></a>
                            <a class="btn btn-square btn-primary rounded-circle me-2" href=""><i
                                    class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-6">
                        <h4 class="text-primary mb-4">Peta Desa</h4>
                        <iframe width="100%" height="400px" id="gmap_canvas" src="{{ $item->peta }}"
                            frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                    </div>
            </div>
        @empty
            @endforelse
        </div>
    </div>
    <!-- Footer End -->

    <!-- Copyright Start -->
    <div class="container-fluid copyright py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    &copy; <a class="fw-medium" href="#">Kelompok 1</a>,
                    All Right Reserved.
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                    Designed By
                    <a class="fw-medium" href="https://htmlcodex.com">HTML Codex</a>
                    Distributed By
                    <a class="fw-medium" href="https://themewagon.com">ThemeWagon</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Copyright End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i
            class="bi bi-arrow-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('frontend/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('frontend/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('frontend/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('frontend/lib/owlcarousel/owl.carousel.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('frontend/js/main.js') }}"></script>
</body>

</html>

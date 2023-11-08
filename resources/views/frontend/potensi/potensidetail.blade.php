@extends('frontend.layouts.main') @section('content')
    <!-- Potensi Start -->
    <div class="container-xxl contact py-5">
        <div class="container">
            <h1 class="text-center">Wisata Petik buah Stoberir</h1>
            <!-- Carousel Start -->
            <div class="container-fluid px-0 mb-5">
                <div id="header-carousel" class="carousel slide carousel-fade m-auto col-lg-8" data-bs-ride="carousel">
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

            <ul class="post-info d-flex list-unstyled">
                <li class="pe-lg-4 pe-3"><i class="bi bi-person-check"></i> By Admin</li>
                <li class="pe-lg-4 pe-3"><i class="bi bi-calendar-date"></i> 2-June-2023</li>
                <li class="pe-lg-4 pe-3"><i class="bi bi-list"></i> Wisata sejarah</li>
                <li class="pe-lg-4 pe-3"><a href="/" class="btn btn-sm btn-info">Lokasi</a>
                </li>
            </ul>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque officia pariatur enim rem laborum. Delectus
                ex voluptates facilis doloribus quasi tenetur, molestiae ipsum, obcaecati sint fugit placeat. Voluptatibus
                nemo esse earum beatae accusamus similique dolore at ea sequi officiis adipisci saepe recusandae architecto,
                sint neque. Dicta, maxime animi? Laborum, unde dolores modi consequatur numquam amet error officia totam.
                Repudiandae provident eligendi non, laborum mollitia dolorum tenetur, suscipit sint sit corrupti quibusdam
                ab alias. Fugiat veritatis cum sit consequatur modi temporibus rerum neque, sed dolore quas delectus
                possimus dolor aliquam nemo? Fugiat voluptatibus corrupti repellat eum ipsam sit deleniti, recusandae, optio
                dicta ducimus iusto possimus quia provident ipsum veniam non culpa neque error iste asperiores qui animi! Id
                ipsa dignissimos reiciendis quis veniam temporibus deleniti earum error, cumque alias modi ut nulla
                assumenda minima atque. Accusamus assumenda eligendi maxime quasi dignissimos, tenetur neque fuga at
                mollitia recusandae, nobis labore aut harum nesciunt reprehenderit vero optio rem, amet ut! Iste culpa
                dolorum maxime animi suscipit, exercitationem obcaecati voluptates, laboriosam aliquid aut earum impedit
                dolores praesentium temporibus dolorem natus iusto sed? Dicta mollitia dolore, quos consectetur
                exercitationem et. Provident ratione temporibus exercitationem repudiandae sit distinctio, repellendus, odit
                nihil eum ab facere nostrum. Iusto.</p>
        </div>
    </div>
    <!-- Potensi Start -->
@endsection

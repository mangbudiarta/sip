@extends('frontend.layouts.main') @section('content')
    <!-- Potensi Start -->
    <div class="container-xxl contact py-5">
        <div class="container">
            <h1 class="text-center">{{ $umkmdetail->namaumkm }}</h1>
            <!-- Carousel Start -->
            <div class="container-fluid px-0 mb-5">
                <div id="header-carousel" class="carousel slide carousel-fade m-auto col-lg-8" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="w-100" src="/storage/umkm_img/{{ $umkmdetail->gambarcover }}" alt="Image" style=" height: 350px; "/>
                        </div>
                        @forelse($gambarumkm as $item)
                        <div class="carousel-item">
                            <img class="w-100" src="/storage/umkmgambar_img/{{ $item->gambar }}" alt="Image" style=" height: 350px; "/>
                        </div>
                        @empty
                        @endforelse
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
                <li class="pe-lg-4 pe-3"><i class="bi bi-list"></i> {{ $umkmdetail->kategoriumkm->namakategori }}</li>
            </ul>
            <p class="text-justify">
                {{ $umkmdetail->deskripsi }}
            </p>
        </div>
    </div>
    <!-- Potensi Start -->
@endsection

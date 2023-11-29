@extends('frontend.layouts.main') @section('content')
    <!-- Potensi Start -->
    <div class="container-xxl contact py-5">
        <div class="container">
            <h1 class="text-center">{{ $beritadetail->judulberita }}</h1>
            <img src="/storage/berita_img/{{ $beritadetail->gambarcover }}" class="my-4 d-block m-auto" alt="Gambar"
                width="80%">
            <ul class="post-info d-flex list-unstyled">
                <li class="pe-lg-4 pe-3"><i class="bi bi-person-check d-inline me-1"></i> {{ $beritadetail->penulis }}</li>
                <li class="pe-lg-4 pe-3"><i
                        class="bi bi-calendar-date d-inline me-1"></i>{{ $beritadetail->tanggalposting }}</li>
                <li class="pe-lg-4 pe-3"><i
                        class="bi bi-list d-inline me-1"></i>{{ $beritadetail->kategoriberita->namakategori }}</li>
            </ul>
            <p class="text-justify">
                {{ $beritadetail->isiberita }}
            </p>
        </div>
    </div>
    <!-- Potensi Start -->
@endsection

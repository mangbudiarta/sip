@extends('frontend.layouts.main') @section('content')
    <!-- Potensi Start -->
    <div class="container-xxl contact py-5">
        <div class="container">
            <div class="section-title text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <h2 class="display-6">Daftar Potensi Desa</h2>
            </div>
            <div class="row justify-content-center wow fadeInUp" data-wow-delay="0.1s">
                <div class="col-lg-8 justify-content-center">
                    <form action="/potensi" method="get">
                        <div class="row mb-3 justify-content-center">
                            <div class="col-sm-5 mb-3">
                                <input type="text" class="form-control" id="cari" name="keyword"
                                    placeholder="Pencarian">
                            </div>
                            <div class="col-sm-5 mb-3">
                                <select class="form-select form-select" id="id_kategori" name="id_kategori">
                                    {{-- list nama kategori --}}
                                    <option value="">Kategori</option>
                                    @foreach ($kategori as $item)
                                        <option value="{{ $item->id_kategori }}">
                                            {{ $item->namakategori }}
                                        </option>
                                    @endforeach
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
                        {{-- Perulangan data potensidesa --}}
                        @forelse ($potensidesa as $item)
                            <div class="product-item col-lg-4 rounded">
                                <div class="row">
                                    <img src="/storage/potensi_img/{{ $item->gambarcover }}" alt=""
                                        height="280px" />
                                </div>
                                <div class="bg-white shadow-sm text-center p-4 position-relative mt-n5 mx-4">
                                    <a href="/potensidetail/{{ $item->slug }}"
                                        class="h4 d-block text-primary">{{ $item->namapotensi }}</a>
                                    <span class="text-body deskripsi">{{ $item->deskripsi }}</span>
                                    <a href="/review/{{ $item->id_potensidesa }}" class="text-warning">
                                        Lihat Review
                                        <i class="fas fa-external-link-alt"></i>
                                    </a>
                                </div>
                            </div>
                        @empty
                            {{-- jika data berita kosong tampilkan $pesan --}}
                            <div class="text-center">
                                {{ $message }}
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Potensi Start -->
@endsection

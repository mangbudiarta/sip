@extends('frontend.layouts.main') @section('content')
    <!-- Umkm Start -->
    <div class="container-xxl contact py-5">
        <div class="container">
            <div class="section-title text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <h2 class="display-6">Daftar UMKM</h2>
            </div>
            <div class="row justify-content-center wow fadeInUp" data-wow-delay="0.1s">
                <div class="col-lg-8 justify-content-center">
                    <form action="/umkm" method="get">
                        <div class="row mb-3 justify-content-center">
                            <div class="col-sm-5 mb-3">
                                <input type="text" class="form-control" id="cari" name="keyword"
                                    placeholder="Pencarian">
                            </div>
                            <div class="col-sm-5 mb-3">
                                <select class="form-select form-select" name="id_kategori">
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
            <div class="row wow fadeInUp" data-wow-delay="0.1s">
            {{-- perulangan data umkm --}}
                @forelse ($umkm as $item)
                <div class="col-lg-4 col-md-12 mb-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="store-item position-relative text-center shadow-sm">
                        <img class="img-fluid" src="/storage/umkm_img/{{ $item->gambarcover }}" alt="gambar umkm" />
                        <div class="p-4">
                            <!-- nama umkm -->
                            <h4 class="mb-3">{{ $item->namaumkm }}</h4>
                            <!-- deskripsi umkm -->
                            <p class="deskripsi">
                                {{$item->deskripsi}}
                            </p>
                        </div>
                        <div class="store-overlay">
                            <a href="/umkmdetail/{{ $item->slug }}" class="btn btn-primary rounded-pill py-2 px-4 m-2">Info
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
                        {{ $message }}
                    </div>
                @endforelse
                {{-- akhir perulangan data umkm --}}
            </div>
        </div>
    </div>
    <!-- Umkm End -->
@endsection

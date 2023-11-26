@extends('frontend.layouts.main') @section('content')
    <!-- Fasilitas Start -->
    <div class="container-xxl contact py-5">
        <div class="container">
            <div class="section-title text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <h2 class="display-6">Daftar Fasilitas Wisata</h2>
            </div>
            <div class="row justify-content-center wow fadeInUp" data-wow-delay="0.1s">
                <div class="col-lg-8 justify-content-center">
                    <form action="/fasilitas" method="get">
                        <div class="row mb-3 justify-content-center">
                            <div class="col-sm-5 mb-3">
                                <input type="text" class="form-control" id="cari" name="keyword"
                                    placeholder="Pencarian">
                            </div>
                            <div class="col-sm-5 mb-3">
                                <select class="form-select form-select" name="id_kategori" id="kategori">
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
            <div class="row py-3 justify-content-center wow fadeInUp" data-wow-delay="0.5s">
                <div class="col-lg-12">
                    <div class="row g-5">
                        {{-- perulangan data fasilitas --}}
                        @forelse ($fasilitas as $item)
                            <div class="col-lg-4 col-md-12 mb-4 wow fadeInUp" data-wow-delay="0.1s">
                                <div class="h-100 store-item position-relative text-center shadow-sm">
                                    <div style="max-height:350px;background-size: cover">
                                        {{-- gambar fasilitas --}}
                                        <img class="img-fluid" src="/storage/fasilitas_img/{{ $item->gambar }}"
                                            alt="Gambar Fasilitas" />
                                    </div>
                                    <div class="p-4">
                                        {{-- nama fasilitas --}}
                                        <h4 class="mb-3">{{ $item->namafasilitas }}</h4>
                                        {{-- deskripsi fasilitas --}}
                                        <p class="deskripsi">
                                            {{ $item->deskripsi }}
                                        </p>
                                    </div>
                                    <div class="store-overlay">
                                        {{-- lokasi fasilitas --}}
                                        <a href="{{ $item->lokasi }}" class="btn btn-primary rounded-pill py-2 px-4 m-2"
                                            target="_blank">Lokasi<i class="fa fa-map-marker-alt ms-2"></i></a>
                                        {{-- jika kontak berisi karakter '+' --}}
                                        @if (Str::contains($item->kontak, '+'))
                                            {{-- tambahkan link wa dan no wa --}}
                                            <a href="https://wa.me/{{ $item->kontak }}"
                                                class="btn btn-dark rounded-pill py-2 px-4 m-2" target="_blank">Kontak<i
                                                    class="fa fa-phone-alt ms-2"></i></a>
                                        @else
                                            {{-- jika kontak tidak berisi karakter '+', gunakan isi kontak --}}
                                            <a href="{{ $item->kontak }}" class="btn btn-dark rounded-pill py-2 px-4 m-2"
                                                target="_blank">Kontak<i class="fa fa-phone-alt ms-2"></i></a>
                                        @endif

                                    </div>
                                </div>
                            </div>
                        @empty
                            {{-- jika data fasilitas kosong tampilkan $pesan --}}
                            <div class="text-center">
                                {{ $message }}
                            </div>
                        @endforelse
                        {{-- akhir perulangan data fasilitas --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Fasilitas End -->
@endsection

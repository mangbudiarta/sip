@extends('frontend.layouts.main') @section('content')
    <!-- Berita Start -->
    <div class="container-xxl contact py-5">
        <div class="container">
            <div class="section-title text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <h2 class="display-6">Daftar Berita</h2>
            </div>
            <div class="row justify-content-center wow fadeInUp" data-wow-delay="0.1s">
                <div class="col-lg-8 justify-content-center">
                    <form action="/berita" method="get">
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

            <div class="row wow fadeInUp" data-wow-delay="0.1s">
                {{-- perulangan data berita --}}
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
                                <a href="/beritadetail/{{ $item->slug }}" class="btn btn-outline-primary mt-auto">Baca</a>
                            </div>
                        </div>
                    </div>

                @empty
                    {{-- jika data berita kosong tampilkan $pesan --}}
                    <div class="text-center">
                        {{ $message }}
                    </div>
                @endforelse
                {{-- akhir perulangan data berita --}}
            </div>
        </div>
    </div>
    <!-- Berita End -->
@endsection

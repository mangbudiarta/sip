@extends('frontend.layouts.main') @section('content')
    <!-- Profil Start -->
    <div class="container-xxl contact py-5">
        <div class="container">
            @forelse ($profildetail as $item)
            <div class="section-title text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <h2 class="display-6">{{$item->judul}}</h2>
            </div>
            <div class="row justify-content-center wow fadeInUp" data-wow-delay="0.1s">
                <div class="col-lg-12">
                    <div class="row">
                        <p class="text-justify">
                            {{$item->deskripsi}}
                        </p>
                    </div>
                </div>
            </div>
            @empty
            <div class="text-center">
                <p>data kosong</p>
            </div>
            @endforelse
        </div>
    </div>
    <!-- Profil Start -->
@endsection

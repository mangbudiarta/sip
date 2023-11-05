@extends('frontend.layouts.main') @section('content')
    <!-- Potensi Start -->
    <div class="container-xxl contact py-5">
        <div class="container">
            <div class="section-title text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <h2 class="display-6">Daftar Potensi Desa</h2>
            </div>
            <div class="row justify-content-center wow fadeInUp" data-wow-delay="0.1s">
                <div class="col-lg-8">
                    <div class="row g-5">
                        <form action="/" method="get">
                            <div class="row mb-3 justify-content-center">
                                <div class="col-sm-6 mb-3">
                                    <input type="text" class="form-control" id="cari" name="keyword"
                                        placeholder="Pencarian">
                                </div>
                                <div class="col-sm-2">
                                    <button type="submit" class="btn btn-primary px-4">Cari</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center wow fadeInUp" data-wow-delay="0.5s">
                <div class="col-lg-12">
                    <div class="row g-5">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Potensi Start -->
@endsection

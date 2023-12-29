@extends('frontend.layouts.main') @section('content')
    <!-- Contact Start -->
    <div class="container-xxl contact py-5">
        <div class="container">
            <div class="row justify-content-center wow fadeInUp mb-5" data-wow-delay="0.1s">
                <div class="col-lg-4">
                    <div class="mx-auto wow fadeInUp mb-2" data-wow-delay="0.1s">
                        <h2 class="display-6">{{ $potensidesa->namapotensi }}</h2>
                    </div>
                    <input type="hidden" class="idreview" data-id="{{ $potensidesa->id_potensidesa }}">
                    <div class="my-2">
                        <span class="text-center mb-3 rating-star">
                            @for ($i = 1; $i <= 5; $i++)
                                @if ($i <= $ratarata)
                                    <i class="fa fa-star" style="color: gold;"></i>
                                @else
                                    <i class="fa fa-star" style="color: gray;"></i>
                                @endif
                            @endfor
                            <small>{{ $ratarata }} | {{ $jumlahreview }} ulasan</small>
                        </span>
                    </div>
                    <div class="mb-2">
                        <span class="text-body deskripsi">{{ $potensidesa->deskripsi }}
                        </span>
                        <a href="/potensidetail/{{ $potensidesa->slug }}">Baca selengkapnya</a>
                    </div>
                    @auth
                        <button type="submit" class="btn btn-primary mb-4" name="simpan" data-bs-toggle="modal"
                            data-bs-target="#ReviewTambah">Beri
                            Review</button>
                    @else
                        <span class="text-danger d-block mb-1">*Silahkan login untuk memberi review</span>
                        <button type="submit" class="btn btn-primary mb-4 disabled" name="simpan">Beri
                            Review</button>
                    @endauth
                </div>
                <div class="col-lg-8">
                    <!-- Carousel Start -->
                    <div class="container-fluid px-0 mb-5">
                        <div id="header-carousel" class="carousel slide carousel-fade m-auto" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img class="w-100" src="/storage/potensi_img/{{ $potensidesa->gambarcover }}"
                                        alt="Image" height="400px" />
                                </div>
                                @forelse ($gambarpotensi as $item)
                                    <div class="carousel-item">
                                        <img class="w-100"
                                            src="/storage/potensigambar_img/{{ $item->gambar }}"height="400px"
                                            alt="Image" />
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

                </div>
            </div>
            <div class="row justify-content-center wow fadeInUp" data-wow-delay="0.1s">
                <h3 class="h3 mb-2 text-center">Apa Kata Mereka?</h3>
                <div class="col-lg-8
                                    order-md-1 justify-content-center">
                    <div id="dataPage">
                        <div class="spinner-border" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Tambah Start -->
        <div class="modal fade" id="ReviewTambah" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="ModalTambah">Tambah Review</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Form Layout Start-->
                        <form action="" method="post" id="add_review_form">
                            @csrf
                            <input type="hidden" class="form-control" id="id_potensidesa" name="id_potensidesa"
                                value="{{ $potensidesa->id_potensidesa }}" />
                            @auth
                                <input type="hidden" class="form-control" id="id_wisatawan" name="id_wisatawan"
                                    value="{{ Auth::user()->id }}" />
                            @endauth
                            <div class="form-group">
                                <label for="rating">Rating:</label>
                                <select class="form-control" id="rating" required name="rating">
                                    <option value="">-- Pilih Rating --</option>
                                    <option value="1">1 Bintang</option>
                                    <option value="2">2 Bintang</option>
                                    <option value="3">3 Bintang</option>
                                    <option value="4">4 Bintang</option>
                                    <option value="5">5 Bintang</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="col-form-label" for="review">Ulasan</label>
                                <textarea id="review" class="form-control" name="review" rows="10"
                                    placeholder="ex: Pemandangannya Indah dan Sejuk" required></textarea>
                            </div>
                            <div class="row justify-content-end">
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-primary" name="simpan"
                                        id="add_review_btn">Simpan</button>
                                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                        Close
                                    </button>
                                </div>
                            </div>
                        </form>
                        <!-- Form Layout End-->
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Tambah End -->

    </div>
    <!-- Contact Start -->
    <script>
        $(function() {

            // add ajax request
            // jika form dengan id add_fasilitas_form disubmit
            $("#add_review_form").submit(function(e) {
                // jeda untuk melakukan proses pengecekan
                e.preventDefault();
                // simpan isi form dalam obyek dataForm
                const dataForm = new FormData(this);
                // ganti tulisan button simpan
                $("#add_review_btn").text('Adding ...');
                $.ajax({
                    // panggil route name save.review
                    url: '{{ route('save.review') }}',
                    // method pengiriman data POST
                    method: 'POST',
                    // isi data: obyek dataForm
                    data: dataForm,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    // jika sukses return respon json
                    success: function(response) {
                        // jika respon array key:status = 200
                        if (response.status == 200) {
                            // tampilkan data dengan mengirimkan parameter array key:succes
                            fetch('success', 'Berhasil tambah review');
                            // reset isi formulir tambah
                            $("#add_review_form")[0].reset();
                        } else {
                            // jika respon array key:status selain 200
                            // tampilkan data dengan mengirimkan parameter array key:danger
                            fetch('danger', 'Gagal tambah review');
                        }
                        // kembalikan tulisan button simpan
                        $("#add_review_btn").text('Submit');
                        // tutup tampilan modal fasilitas tambah
                        $("#ReviewTambah").modal('hide');
                    }
                });
            });

            //get record
            fetch('', '');

            // fungsi menampilkan data
            //parameter String type dan message
            function fetch(type = '', message = '') {
                let id = $('.idreview').data('id');
                $.ajax({
                    // panggil route name fetch.review
                    url: '{{ route('fetch.review') }}',
                    // method GET
                    method: 'GET',
                    data: {
                        id_potensidesa: id,
                    },
                    // jika sukses return respons json
                    success: function(response) {
                        // isi id dataPage dengan sintax html berisi response
                        $("#dataPage").html(response);
                        // buat tag table menjadi datatable
                        // jika parameter type dan message tidak kosong
                        if (type && message) {
                            // Buat element alert sesuai parameter
                            const alertHtml =
                                `<div class="alert alert-${type} alert-dismissible fade show" role="alert">
                                ${message}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>`;
                            // tampilkan element alert pada class .alert-notif pada view datafasilitas.blade
                            $(".alert-notif").append(alertHtml);

                        }

                    }
                });
            }
        });
    </script>
@endsection

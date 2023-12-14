{{-- tempat alert notif --}}
<div class="alert-notif"></div>
<table class="table border-top">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Potensi</th>
            <th>Gambar</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($potensidesa as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->namapotensi }}</td>
                <td><img src="/storage/potensi_img/{{ $item->gambarcover }}" alt="Gambar Fasilitas" width="100"
                        height="100" class="img-fluid img-thumbnail"></td>
                <td>
                    <a href="" id='{{ $item->id_potensidesa }}' class="btn btn-info btn-sm detailpotensi"><i
                            class="menu-icon tf-icons bx bx-info-circle m-0" data-bs-toggle="modal"
                            data-bs-target="#PotensiDetail"></i></a>
                    <a href="/potensidetail/{{ $item->slug }}" class="btn btn-primary btn-sm" target="_blank"><i
                            class="menu-icon tf-icons bx bx-show m-0"></i></a>
                    <a href="/admin/potensigambar/{{ $item->id_potensidesa }}" class="btn btn-success btn-sm"><i
                            class="menu-icon tf-icons bx bx-image m-0"></i></a>
                    <a href="#" id='{{ $item->id_potensidesa }}' class="btn btn-warning btn-sm editpotensi"
                        data-bs-toggle="modal" data-bs-target="#PotensiEdit"><i
                            class="menu-icon tf-icons bx bx-edit m-0"></i></a>
                    <a href="" id='{{ $item->id_potensidesa }}' class="btn btn-danger btn-sm deletepotensi"><i
                            class="menu-icon tf-icons bx bx-trash m-0"></i></a>
                </td>
            </tr>
        @empty
        @endforelse
    </tbody>
</table>

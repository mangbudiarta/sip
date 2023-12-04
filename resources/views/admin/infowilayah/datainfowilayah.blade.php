{{-- tempat alert notif --}}
<div class="alert-notif"></div>
<table class="table border-top">
    {{-- // Jika Data kosong maka tombol tambah akan tampil --}}
    @if (count($infowilayah) == 0)
        <button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#InfoWilayahTambah">
            <i class="menu-icon tf-icons bx bx-plus m-0"></i>Tambah
        </button>
    @endif
    <thead>
        <tr>
            <th>No</th>
            <th>Judul</th>
            <th>Deskripsi</th>
            <th>Gambar</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($infowilayah as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->judul }}</td>
                <td>{{ $item->deskripsi }}</td>
                <td><img src="/storage/infowilayah_img/{{ $item->gambarcover }}" alt="Gambar Fasilitas" width="100"
                        height="100" class="img-fluid img-thumbnail"></td>
                <td>
                    <a href="#" id='{{ $item->id_infowilayah }}' class="btn btn-info btn-sm detailInfoWilayah"
                        data-bs-toggle="modal" data-bs-target="#InfoWilayahDetail"><i
                            class="menu-icon tf-icons bx bx-info-circle m-0"></i></a>
                    <a href="#" id='{{ $item->id_infowilayah }}' class="btn btn-warning btn-sm editInfoWilayah"
                        data-bs-toggle="modal" data-bs-target="#InfoWilayahEdit"><i
                            class="menu-icon tf-icons bx bx-edit m-0"></i></a>
                    <a href="#" id='{{ $item->id_infowilayah }}'
                        class="btn btn-danger btn-sm deleteInfoWilayah"><i
                            class="menu-icon tf-icons bx bx-trash m-0"></i></a>
                </td>
            </tr>
        @empty
        @endforelse
    </tbody>
</table>

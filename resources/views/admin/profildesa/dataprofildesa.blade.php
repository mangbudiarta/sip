{{-- tempat alert notif --}}
<div class="alert-notif"></div>
<table class="table border-top">
    @if (count($profildesa) == 0)
    <button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#ProfilDesaTambah">
        <i class="menu-icon tf-icons bx bx-plus m-0"></i>Tambah
    </button>
    @endif
    <thead>
        <tr>
            <th>No</th>
            <th>judul</th>
            <th>gambar</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($profildesa as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->judul }}</td>
            <td><img src="/storage/profildesa_img/{{ $item->gambarcover }}" alt="Gambar Profil Desa" width="100"
                    height="100" class="img-fluid img-thumbnail"></td>
            <td>
                <a href="#" id='{{ $item->id_profildesa}}' class="btn btn-info btn-sm detailProfilDesa"
                    data-bs-toggle="modal" data-bs-target="#ProfilDesaDetail"><i
                        class="menu-icon tf-icons bx bx-info-circle m-0"></i></a>
                <a href="#" id='{{ $item->id_profildesa}}' class="btn btn-warning btn-sm editProfilDesa"
                    data-bs-toggle="modal" data-bs-target="#ProfilDesaEdit"><i
                        class="menu-icon tf-icons bx bx-edit m-0"></i></a>
                <a href="#" id='{{ $item->id_profildesa}}' class="btn btn-danger btn-sm deleteProfilDesa"><i
                        class="menu-icon tf-icons bx bx-trash m-0"></i></a>
            </td>
        </tr>
        @empty
        @endforelse
    </tbody>
</table>
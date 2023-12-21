{{-- tempat alert notif --}}
<div class="alert-notif"></div>
<table class="table border-top">
    <thead>
        <tr>
            <th>No</th>
            <th>Gambar</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($umkmgambar as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td><img src="/storage/umkmgambar_img/{{ $item->gambar }}" alt="Gambar UMKM" width="100"
                        height="100" class="img-fluid img-thumbnail"></td>
                <td>
                    <a href="#" id='{{ $item->id_gambar }}' class="btn btn-warning btn-sm editgambar"
                        data-bs-toggle="modal" data-bs-target="#GambarEdit"><i
                            class="menu-icon tf-icons bx bx-edit m-0"></i></a>
                    <a href="#" id='{{ $item->id_gambar }}' class="btn btn-danger btn-sm deletegambar"><i
                            class="menu-icon tf-icons bx bx-trash m-0"></i></a>
                </td>
            </tr>
        @empty
        @endforelse
    </tbody>
</table>

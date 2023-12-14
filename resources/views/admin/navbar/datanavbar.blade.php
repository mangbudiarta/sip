{{-- tempat alert notif --}}
<div class="alert-notif"></div>
<table class="table border-top">
    {{-- Jika jumlah navbar == 0, tampilkan tombol navbar lainnya --}}
            @if (count($navbar) == 0)
                <button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal"
                    data-bs-target="#NavbarTambah">
                    <i class="menu-icon tf-icons bx bx-plus m-0"></i>Tambah
                </button>
            @endif
    <thead>
        <tr>
            <th>No</th>
            <th>Gambar</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($navbar as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td><img src="/storage/navbar_img/{{ $item->gambarnav }}" alt="Gambar Navbar" width="100"
                        height="100" class="img-fluid img-thumbnail"></td>
                <td>
                    <a href="#" id='{{ $item->id_navbar }}' class="btn btn-warning btn-sm editnavbar"
                        data-bs-toggle="modal" data-bs-target="#NavbarEdit"><i
                            class="menu-icon tf-icons bx bx-edit m-0"></i></a>
                    <a href="#" id='{{ $item->id_navbar }}' class="btn btn-danger btn-sm deletenavbar"><i
                            class="menu-icon tf-icons bx bx-trash m-0"></i></a>
                </td>
            </tr>
        @empty
        @endforelse
    </tbody>
</table>

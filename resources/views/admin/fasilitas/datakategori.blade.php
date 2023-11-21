<div class="alert-notif"></div>
<table class="table border-top">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Kategori</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($kategorifasilitas as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->namakategori }}</td>
                <td>
                    <a href="#" id='{{ $item->id_kategori }}' class="btn btn-warning btn-sm editkategori"
                        data-bs-toggle="modal" data-bs-target="#KategoriEdit"><i
                            class="menu-icon tf-icons bx bx-edit m-0"></i></a>
                    <a href="#" id='{{ $item->id_kategori }}' class="btn btn-danger btn-sm deletekategori"><i
                            class="menu-icon tf-icons bx bx-trash m-0"></i></a>
                </td>
            </tr>
        @empty
        @endforelse
    </tbody>
</table>

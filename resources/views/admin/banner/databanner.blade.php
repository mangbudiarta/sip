{{-- tempat alert notif --}}
<div class="alert-notif"></div>
<table class="table border-top">
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
        @forelse ($banner as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->judul }}</td>
                <td>{{ $item->deskripsi }}</td>
                <td><img src="/storage/banner_img/{{ $item->gambar }}" alt="Gambar Banner" width="100"
                        height="100" class="img-fluid img-thumbnail"></td>
                <td>
                    <a href="#" id='{{ $item->id_banner }}' class="btn btn-warning btn-sm editbanner"
                        data-bs-toggle="modal" data-bs-target="#BannerEdit"><i
                            class="menu-icon tf-icons bx bx-edit m-0"></i></a>
                    <a href="#" id='{{ $item->id_banner }}' class="btn btn-danger btn-sm deletebanner"><i
                            class="menu-icon tf-icons bx bx-trash m-0"></i></a>
                </td>
            </tr>
        @empty
        @endforelse
    </tbody>
</table>

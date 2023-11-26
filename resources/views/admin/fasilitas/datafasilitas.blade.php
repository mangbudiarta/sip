{{-- tempat alert notif --}}
<div class="alert-notif"></div>
<table class="table border-top">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Gambar</th>
            <th>Lokasi</th>
            <th>Kategori</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($fasilitas as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->namafasilitas }}</td>
                <td><img src="/storage/fasilitas_img/{{ $item->gambar }}" alt="Gambar Fasilitas" width="100"
                        height="100" class="img-fluid img-thumbnail"></td>
                <td><a href="{{ $item->lokasi }}" class="btn btn-info btn-sm" target="_blank">Maps</a></td>
                <td>{{ $item->kategorifasilitas->namakategori }}</td>
                <td>
                    <a href="#" id='{{ $item->id_fasilitas }}' class="btn btn-info btn-sm detailFasilitas"
                        data-bs-toggle="modal" data-bs-target="#FasilitasDetail"><i
                            class="menu-icon tf-icons bx bx-info-circle m-0"></i></a>
                    <a href="#" id='{{ $item->id_fasilitas }}' class="btn btn-warning btn-sm editfasilitas"
                        data-bs-toggle="modal" data-bs-target="#FasilitasEdit"><i
                            class="menu-icon tf-icons bx bx-edit m-0"></i></a>
                    <a href="#" id='{{ $item->id_fasilitas }}' class="btn btn-danger btn-sm deletefasilitas"><i
                            class="menu-icon tf-icons bx bx-trash m-0"></i></a>
                </td>
            </tr>
        @empty
        @endforelse
    </tbody>
</table>

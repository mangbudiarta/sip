{{-- tempat alert notif --}}
<div class="alert-notif"></div>
<table class="table border-top">
    <thead>
        <tr>
            <th>No</th>
            <th>Judul Berita</th>
            <th>Penulis</th>
            <th>Tgl Posting</th>
            <th>Kategori</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($berita as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->judulberita }}</td>
                <td>{{ $item->penulis }}</td>
                <td>{{ $item->tanggalposting }}</td>
                <td>{{ $item->kategoriberita->namakategori }}</td>
                <td>
                    <a href="#" id='{{ $item->id_berita }}' class="btn btn-info btn-sm detailBerita"
                        data-bs-toggle="modal" data-bs-target="#BeritaDetail"><i
                            class="menu-icon tf-icons bx bx-info-circle m-0"></i></a>
                    <a href="/beritadetail/{{ $item->slug }}" class="btn btn-primary btn-sm" target="_blank"><i
                            class="menu-icon tf-icons bx bx-show m-0"></i></a>
                    <a href="#" id='{{ $item->id_berita }}' class="btn btn-warning btn-sm editBerita"
                        data-bs-toggle="modal" data-bs-target="#BeritaEdit"><i
                            class="menu-icon tf-icons bx bx-edit m-0"></i></a>
                    <a href="#" id='{{ $item->id_berita }}' class="btn btn-danger btn-sm deleteBerita"><i
                            class="menu-icon tf-icons bx bx-trash m-0"></i></a>
                </td>
            </tr>
        @empty
        @endforelse
    </tbody>
</table>

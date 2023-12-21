{{-- tempat alert notif --}}
<div class="alert-notif"></div>
<table class="table border-top">
    <thead>
        <tr>
            <th>No</th>
            <th>Deskripsi</th>
            <th>Peta</th>
            <th>Gambar</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($footer as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->deskripsi }}</td>
                <td>{{ $item->peta }}</td>
                <td>
                    <img src="/storage/footer_img/{{ $item->gambar }}" alt="Gambar Footer" width="100"
                        height="100" class="img-fluid img-thumbnail">
                </td>
                <td>
                    <a href="#" id='{{ $item->id_footer }}' class="btn btn-warning btn-sm editfooter"
                        data-bs-toggle="modal" data-bs-target="#footerEdit"><i
                            class="menu-icon tf-icons bx bx-edit m-0"></i></a>
                    <a href="#" id='{{ $item->id_footer }}' class="btn btn-danger btn-sm deletefooter"><i
                            class="menu-icon tf-icons bx bx-trash m-0"></i></a>
                </td>
            </tr>
        @empty
        @endforelse
    </tbody>
</table>

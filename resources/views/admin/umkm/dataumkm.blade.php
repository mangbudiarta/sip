{{-- tempat alert notif --}}
<div class="alert-notif"></div>
<table class="table border-top">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama UMKM</th>
            <th>Gambar</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($umkm as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->namaumkm }}</td>
                <td><img src="/storage/umkm_img/{{ $item->gambarcover }}" alt="Gambar UMKM" width="100" height="100"
                        class="img-fluid img-thumbnail"></td>
                <td>
                    <a href="#" id='{{ $item->id_umkm }}' class="btn btn-info btn-sm detailUmkm"
                        data-bs-toggle="modal" data-bs-target="#UmkmDetail"><i
                            class="menu-icon tf-icons bx bx-info-circle m-0"></i></a>
                    <a href="/umkmdetail/{{ $item->slug }}" class="btn btn-primary btn-sm"><i
                            class="menu-icon tf-icons bx bx-show m-0"></i></a>
                    <a href="/admin/umkmgambar/{{ $item->id_umkm }}" id='{{ $item->id_umkm }}'
                        class="btn btn-success btn-sm"><i class="menu-icon tf-icons bx bx-image m-0"></i></a>
                    <a href="#" id='{{ $item->id_umkm }}' class="btn btn-warning btn-sm editumkm"
                        data-bs-toggle="modal" data-bs-target="#UmkmEdit"><i
                            class="menu-icon tf-icons bx bx-edit m-0"></i></a>
                    <a href="" id='{{ $item->id_umkm }}' class="btn btn-danger btn-sm deleteumkm"><i
                            class="menu-icon tf-icons bx bx-trash m-0"></i></a>
                </td>
            </tr>
        @empty
        @endforelse
    </tbody>
</table>

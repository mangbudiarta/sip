{{-- tempat alert notif --}}
<div class="alert-notif"></div>
<table class="table border-top">

    <thead>
        <tr>
            <th>No</th>
            <th>Kode Petugas</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Tempat Lahir</th>
            <th>Tanggal Lahir</th>
            <th>Email</th>
            <th>Alamat</th>
            <th>Foto</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($petugas as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->kode_petugas }}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->jeniskelamin }}</td>
                <td>{{ $item->tempatlahir }}</td>
                <td>{{ $item->tanggallahir }}</td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->alamat }}</td>
                <td><img src="/storage/petugas_img/{{ $item->foto }}" alt="gambar" width="100" height="100"
                        class="img-fluid img-thumbnail"></td>
                <td>
                    <a href="#" id='{{ $item->id_petugas }}' class="btn btn-warning btn-sm editpetugas m-1"
                        data-bs-toggle="modal" data-bs-target="#petugasEdit"><i
                            class="menu-icon tf-icons bx bx-edit m-0"></i></a>
                    <a href="#" id='{{ $item->id_petugas }}' class="btn btn-danger btn-sm deletepetugas m-1"><i
                            class="menu-icon tf-icons bx bx-trash m-0"></i></a>
                </td>
            </tr>
        @empty
        @endforelse
    </tbody>
</table>

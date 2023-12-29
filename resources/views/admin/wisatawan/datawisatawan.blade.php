{{-- tempat alert notif --}}
<div class="alert-notif"></div>
<table class="table border-top">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($wisatawan as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->email }}</td>
                <td>
                    <a href="#" id='{{ $item->id_wisatawan }}' class="btn btn-warning btn-sm editwisatawan"
                        data-bs-toggle="modal" data-bs-target="#WisatawanEdit"><i
                            class="menu-icon tf-icons bx bx-edit m-0"></i></a>
                    <a href="#" id='{{ $item->id_wisatawan }}' class="btn btn-danger btn-sm deletewisatawan"><i
                            class="menu-icon tf-icons bx bx-trash m-0"></i></a>
                </td>
            </tr>
        @empty
        @endforelse
    </tbody>
</table>

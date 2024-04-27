@extends('menuAdmin.main')

@section('content')
    <div class="content">
        <div class="d-flex fs-4 align-items-center">
            <i class="fas fa-user me-2"></i>
            <span>Petugas</span>
        </div>
        <div class="head-content my-4 d-flex justify-content-between align-items-center">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahUserModal">
                <i class="fas fa-plus-circle me-2"></i>
                <span>Tambah Data</span>
            </button>
            {{-- <div class="input-group" style="width: 230px">
                <input type="search" id="searchInput" class="form-control rounded" placeholder="Search" aria-label="Search"
                    aria-describedby="search-addon" />
                <button id="searchButton" class="btn btn-success"><i class="fas fa-search"></i></button>
            </div> --}}
        </div>
        <div class="table-responsive">
            <table class="table table-striped shadow">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->level }}</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="User Actions">
                                    <button type="button" class="btn btn-outline-warning rounded me-2"
                                        data-bs-toggle="modal" data-bs-target="#editUserModal{{ $user->id }}">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger delete-btn"
                                            data-id="{{ $user->id }}">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="pagination-links">
            {{ $users->links('pagination::bootstrap-5') }}
        </div>
    </div>

    <!-- Modal Tambah User -->
    <div class="modal fade" id="tambahUserModal" tabindex="-1" aria-labelledby="tambahUserModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahUserModalLabel">Tambah User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('users.store') }}" method="POST" class="border p-4 rounded shadow">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label font-weight-bold">Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ old('name') }}" placeholder="Masukkan Name" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label font-weight-bold">Email</label>
                            <input type="email" class="form-control" id="email" name="email"
                                value="{{ old('email') }}" placeholder="Masukkan Email" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label font-weight-bold">Password</label>
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="Masukkan Password" required>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary me-2">Simpan</button>
                            <button type="reset" class="btn btn-warning">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Edit User -->
    @foreach ($users as $user)
        <div class="modal fade" id="editUserModal{{ $user->id }}" tabindex="-1"
            aria-labelledby="editUserModalLabel{{ $user->id }}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editUserModalLabel{{ $user->id }}">Edit User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('users.update', $user->id) }}" method="POST"
                            class="border p-4 rounded shadow">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="name{{ $user->id }}" class="form-label font-weight-bold">Name</label>
                                <input type="text" class="form-control" id="name{{ $user->id }}" name="name"
                                    value="{{ $user->name }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="email{{ $user->id }}" class="form-label font-weight-bold">Email</label>
                                <input type="email" class="form-control" id="email{{ $user->id }}" name="email"
                                    value="{{ $user->email }}" placeholder="Masukkan Email" required>
                            </div>
                            <div class="mb-3">
                                <label for="password{{ $user->id }}" class="form-label font-weight-bold">New
                                    Password</label>
                                <input type="password" class="form-control" id="password{{ $user->id }}"
                                    name="password">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <script>
        // Delete confirmation with SweetAlert2
        document.querySelectorAll('.delete-btn').forEach(item => {
            item.addEventListener('click', function(e) {
                e.preventDefault();
                const form = this.closest('form');
                const userId = this.getAttribute('data-id');
                Swal.fire({
                    title: 'Apa anda yakin?',
                    text: 'Data yang sudah dihapus tidak bisa dikembalikan!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Ya, Hapus saja!',
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });

        // document.getElementById('searchButton').addEventListener('click', function() {
        //     const searchInput = document.getElementById('searchInput').value;
        // });
    </script>
@endsection

@extends('menuAdmin.main')

@section('content')
    <div class="content">
        <div class="d-flex fs-4">
            <i class="fas fa-users me-2"></i>
            <span>Member</span>
        </div>
        <div class="head-content my-4 d-flex justify-content-between align-items-center">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahMemberModal">
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
            <table class="table table-striped shadow ">
                <thead>
                    <tr class="table">
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Nomor Telepon</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($members as $member)
                        <tr>
                            <th>{{ $loop->iteration }}</th>
                            <td>{{ $member->member_name }}</td>
                            <td>{{ $member->alamat }}</td>
                            <td>{{ $member->no_telepon }}</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="member Actions">
                                    <button type="button" class="btn btn-outline-warning rounded me-2"
                                        data-bs-toggle="modal" data-bs-target="#editmemberModal{{ $member->id }}">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <form action="{{ route('members.destroy', $member->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger delete-btn"
                                            data-id="{{ $member->id }}">
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
            {{ $members->links('pagination::bootstrap-5') }}
        </div>
    </div>

    <!-- Modal Tambah member -->
    <div class="modal fade" id="tambahMemberModal" tabindex="-1" aria-labelledby="tambahMemberModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahMemberModalLabel">Tambah member</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('members.store') }}" method="POST" class="border p-4 rounded">
                        @csrf
                        <div class="mb-3">
                            <label for="member_name" class="form-label font-weight-bold">Name</label>
                            <input type="text" class="form-control" id="member_name" name="member_name"
                                value="{{ old('member_name') }}" placeholder="Masukkan Name" required>
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label font-weight-bold">alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat"
                                value="{{ old('alamat') }}" placeholder="Masukkan alamat">
                        </div>
                        <div class="mb-3">
                            <label for="no_telepon" class="form-label font-weight-bold">No.Telepon</label>
                            <input type="number" class="form-control" id="no_telepon" name="no_telepon"
                                value="{{ old('no_telepon') }}" placeholder="Masukkan No.Telepon">
                        </div>
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary col-3">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modals Edit member -->
    @foreach ($members as $member)
        <div class="modal fade" id="editmemberModal{{ $member->id }}" tabindex="-1"
            aria-labelledby="editmemberModal{{ $member->id }}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editmemberModalLabel{{ $member->id }}">Edit member</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('members.update', $member->id) }}" method="POST"
                            class="border p-4 rounded shadow">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="member_name{{ $member->id }}"
                                    class="form-label font-weight-bold">Name</label>
                                <input type="text" class="form-control" id="member_name{{ $member->id }}"
                                    name="member_name" value="{{ $member->member_name }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="alamat{{ $member->id }}" class="form-label font-weight-bold">alamat</label>
                                <input type="text" class="form-control" id="alamat{{ $member->id }}"
                                    name="alamat" value="{{ $member->alamat }}" placeholder="Masukkan alamat">
                            </div>
                            <div class="mb-3">
                                <label for="no_telepon{{ $member->id }}"
                                    class="form-label font-weight-bold">No.Telepon</label>
                                <input type="number" class="form-control" id="no_telepon{{ $member->id }}"
                                    name="no_telepon" value="{{ $member->no_telepon }}"
                                    placeholder="Masukkan No.Telepon">
                            </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
        </div>
    @endforeach

    <!-- SweetAlert2 Delete Confirmation -->
    <script>
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
    </script>
@endsection

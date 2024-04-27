@extends('menuAdmin.main')

@section('content')
    <div class="content">
        <div class="d-flex fs-4">
            <i class="fas fa-box me-2"></i>
            <span>Produk</span>
        </div>
        <div class="head-content my-4 d-flex justify-content-between align-items-center">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahProdukModal">
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
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Produk Name</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Stok</th>
                        <th scope="col">Diskon</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($produks as $produk)
                        <tr>
                            <th>{{ $loop->iteration }}</th>
                            <td>{{ $produk->produk_name }}</td>
                            <td>Rp. {{ $produk->harga }}</td>
                            <td>{{ $produk->stok }}</td>
                            <td>{{ $produk->diskon }}%</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Produk Actions">
                                    <button type="button" class="btn btn-outline-warning rounded me-2"
                                        data-bs-toggle="modal" data-bs-target="#editProdukModal{{ $produk->id }}">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <form action="{{ route('produk.destroy', $produk->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger delete-btn"
                                            data-id="{{ $produk->id }}">
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
            {{ $produks->links('pagination::bootstrap-5') }}
        </div>
    </div>

    <!-- Modal Tambah Produk -->
    <div class="modal fade" id="tambahProdukModal" tabindex="-1" aria-labelledby="tambahProdukModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahProdukModalLabel">Tambah Produk</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('produk.store') }}" method="POST" class="border p-4 rounded">
                        @csrf
                        <div class="mb-3">
                            <label for="produk_name" class="form-label font-weight-bold">Produk Name</label>
                            <input type="text" class="form-control" id="produk_name" name="produk_name"
                                value="{{ old('produk_name') }}" placeholder="Masukkan Produk Name" required>
                        </div>
                        <div class="mb-3">
                            <label for="harga" class="form-label font-weight-bold">Harga</label>
                            <input type="number" class="form-control" id="harga" name="harga"
                                value="{{ old('harga') }}" placeholder="Masukkan Harga">
                        </div>
                        <div class="mb-3">
                            <label for="stok" class="form-label font-weight-bold">Stok</label>
                            <input type="number" class="form-control" id="stok" name="stok"
                                value="{{ old('stok') }}" placeholder="Masukkan Stok">
                        </div>
                        <div class="mb-3">
                            <label for="diskon" class="form-label font-weight-bold">Diskon</label>
                            <input type="number" class="form-control" id="diskon" name="diskon"
                                value="{{ old('diskon') }}" placeholder="Masukkan Diskon">
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

    <!-- Modals Edit Produk -->
    @foreach ($produks as $produk)
        <div class="modal fade" id="editProdukModal{{ $produk->id }}" tabindex="-1"
            aria-labelledby="editProdukModal{{ $produk->id }}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editProdukModalLabel{{ $produk->id }}">Edit produk</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('produk.update', $produk->id) }}" method="POST"
                            class="border p-4 rounded shadow">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="produk_name{{ $produk->id }}" class="form-label font-weight-bold">Produk
                                    Name</label>
                                <input type="text" class="form-control" id="produk_name{{ $produk->id }}"
                                    name="produk_name" value="{{ $produk->produk_name }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="harga{{ $produk->id }}" class="form-label font-weight-bold">Harga</label>
                                <input type="number" class="form-control" id="harga{{ $produk->id }}" name="harga"
                                    value="{{ $produk->harga }}" placeholder="Masukkan harga">
                            </div>
                            <div class="mb-3">
                                <label for="stok_tambahan{{ $produk->id }}" class="form-label font-weight-bold">Stok
                                    Tambahan</label>
                                <input type="number" class="form-control" id="stok_tambahan{{ $produk->id }}"
                                    name="stok_tambahan" placeholder="Masukkan Stok Tambahan">
                            </div>
                            <div class="mb-3">
                                <label for="diskon{{ $produk->id }}" class="form-label font-weight-bold">Diskon</label>
                                <input type="number" class="form-control" id="diskon{{ $produk->id }}"
                                    name="diskon" value="{{ $produk->diskon }}" placeholder="Masukkan Diskon">
                            </div>
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
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

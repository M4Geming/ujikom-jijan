@extends('menuAdmin.main')

@section('content')
    <div class="content">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="fs-4"><i class="fas fa-gauge-high me-2"></i></i>Dashboard</h4>
        </div>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
            <div class="col">
                <div class="card text-center">
                    <div class="card-body">
                        <i class="fas fa-user fa-5x mb-3"></i>
                        <h5 class="card-title">User</h5>
                    </div>
                    <div class="card-footer">
                        <span class="badge bg-primary">Jumlah: {{ $user }}</span>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card text-center">
                    <div class="card-body">
                        <i class="fas fa-box fa-5x mb-3"></i>
                        <h5 class="card-title">Produk</h5>
                    </div>
                    <div class="card-footer">
                        <span class="badge bg-primary">Jumlah: {{ $produk }}</span>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card text-center">
                    <div class="card-body">
                        <i class="fas fa-users fa-5x mb-3"></i>
                        <h5 class="card-title">Member</h5>
                    </div>
                    <div class="card-footer">
                        <span class="badge bg-primary">Jumlah: {{ $member }}</span>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card text-center">
                    <div class="card-body">
                        <i class="fas fa-cart-shopping fa-5x mb-3"></i>
                        <h5 class="card-title">Transaksi</h5>
                    </div>
                    <div class="card-footer">
                        <span class="badge bg-primary">Jumlah: -</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Bootstrap CSS via CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome CSS via CDN -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <!-- SweetAlert2 CSS via CDN -->
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.16/dist/sweetalert2.min.css" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('style.css')}}">
    <title>Kasir | BY Azizan</title>
</head>

<body>
    <div class="sidebar d-flex flex-column flex-shrink-0 p-3 text-white shadow" id="sidebar">
        <a href="/" class=" text-white text-decoration-none w-full text-center ">
            <i class="fas fa-cash-register fs-4 me-2"></i>
            <span class="fs-4">Sidebar</span>
        </a>
        <hr>
        <ul class="nav nav-pills h-100 d-flex justify-content-between flex-column mb-auto">
            <div>
                <li class="nav-item">
                    <a href="/" class="nav-link text-white" aria-current="page">
                        <i class="fas fa-gauge-high me-2"></i>
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="{{ route('users.index') }}" class="nav-link text-white">
                        <i class="fas fa-user me-2"></i>
                        User
                    </a>
                </li>
                <li>
                    <a href="{{ route('members.index') }}" class="nav-link text-white">
                        <i class="fas fa-users me-1"></i>
                        Member
                    </a>
                </li>
                <li>
                    <a href="{{ route('produk.index') }}" class="nav-link text-white">
                        <i class="fas fa-box me-2"></i>
                        Produk
                    </a>
                </li>
                <li class="has-submenu">
                    <a href="#" class="nav-link text-white">
                        <i class="fas fa-history me-2"></i>
                        History
                    </a>
                    <ul class="submenu">
                        <li><a href="#" class="nav-link text-white">Barang</a></li>
                        <li><a href="#" class="nav-link text-white">Transaksi</a></li>
                    </ul>
                </li>
            </div>
            <li class="logout">
                <a href="#" class="nav-link text-white ">
                    <i class="fas fa-right-from-bracket me-2 "></i>
                    Logout
                </a>
            </li>
        </ul>
    </div>

    <div class="d-flex flex-column flex-grow-1">
        <div class="navbar shadow ">
            <i onclick="toggleSidebar()" class="fas fa-bars fs-3 text-white"></i>
            <div class="profile mx-2">
                <a href="#" class="text-white text-decoration-none">
                    <img src="{{ asset('galery/pp.jpeg') }}" alt="" width="32" height="32"
                        class="rounded-circle me-2">
                </a>
            </div>
        </div>

        @yield('content')
    </div>

    <!-- Bootstrap JavaScript Bundle (Bootstrap + Popper.js) via CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- SweetAlert2 JavaScript via CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.16/dist/sweetalert2.min.js"></script>

    <script>
        function toggleSidebar() {
            document.querySelector('.sidebar').classList.toggle('d-none');
        }
    </script>
</body>

</html>

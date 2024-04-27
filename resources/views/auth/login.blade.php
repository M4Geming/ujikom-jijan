<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login Page</title>
        <!-- Bootstrap CSS via CDN -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- Font Awesome CSS via CDN -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

        <!-- SweetAlert2 CSS via CDN -->
        <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.16/dist/sweetalert2.min.css" rel="stylesheet">

        <link rel="stylesheet" href="{{ asset('style.css') }}">
    </head>

    <body>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="card card_login w-25 position-absolute top-50 start-50 translate-middle">
            <div class="card-header">
                <h3 class="text-center my-4">Login</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('login') }}" method="POST">
                    @csrf
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
                    <div class="d-flex align-items-center justify-content-end mt-4 mb-0">
                        <button class="btn btn-primary" type="submit">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </body>

    </html>

</body>
<!-- Bootstrap JavaScript Bundle (Bootstrap + Popper.js) via CDN -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

<!-- SweetAlert2 JavaScript via CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.16/dist/sweetalert2.min.js"></script>

@if ($message = Session::get('gagal'))
    <script>
        Swal.fire("{{ $message }}");
    </script>
@endif

</html>

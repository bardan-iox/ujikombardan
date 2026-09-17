<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin | Sekolah Kita</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; background: linear-gradient(135deg,#0b2545,#081b34); min-height:100vh; display:flex; align-items:center; }
        .btn-navy { background:#0b2545; color:#fff; border:none; }
        .btn-navy:hover { background:#081b34; color:#fff; }
    </style>
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card border-0 shadow-lg p-4">
                <div class="text-center mb-3">
                    <i class="bi bi-mortarboard-fill fs-1" style="color:#0b2545;"></i>
                    <h4 class="fw-bold mt-2">Login Admin</h4>
                    <p class="text-muted small">Sekolah Kita &mdash; Sistem Manajemen</p>
                </div>

                @if(session('error'))
                    <div class="alert alert-warning small">{{ session('error') }}</div>
                @endif
                @if($errors->any())
                    <div class="alert alert-danger small">
                        @foreach($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                @endif

                <form action="{{ route('admin.login.attempt') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label small fw-semibold">Email</label>
                        <input type="email" name="email" value="{{ old('email') }}" class="form-control" required autofocus>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-semibold">Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <div class="form-check mb-3">
                        <input type="checkbox" name="remember" class="form-check-input" id="remember">
                        <label class="form-check-label small" for="remember">Ingat saya</label>
                    </div>
                    <button type="submit" class="btn btn-navy w-100">Login</button>
                </form>
                <div class="text-center mt-3">
                    <a href="{{ route('home') }}" class="small text-decoration-none text-muted"><i class="bi bi-arrow-left"></i> Kembali ke situs</a>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>

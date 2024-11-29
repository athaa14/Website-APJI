<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modern Login & Register</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">
</head>

<body>
    <div class="container">
        <div class="form-container" id="formContainer">
            <div class="login-form">
                <h2>Selamat Datang</h2>

                <!-- Menampilkan pesan error jika ada -->
                @if (session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif

                <form action="{{ route('authenticate') }}" method="POST">
                    @csrf
                    <div class="input-group">
                        <input type="email" name="email" placeholder="Email" required value="{{ old('email') }}">
                        <i class="fas fa-envelope"></i>
                    </div>
                    @error('email')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror

                    <div class="input-group">
                        <input type="password" name="password" placeholder="Password" required>
                        <i class="fas fa-lock"></i>
                    </div>
                    @error('password')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror

                    <button type="submit" class="btn">Login</button>
                </form>

                <div class="toggle-text">
                    Anggota Baru? <a href="{{ route('registerForm') }}">Daftar</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

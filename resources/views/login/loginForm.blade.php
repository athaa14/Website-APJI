<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modern Login & Register</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

</head>

<body>

    <div class="login-container">
        <div class="form-container" id="formContainer">
            <div class="login-header">
                <img src="{{ asset('assets/img/logoapjifix.png') }}" alt="Logo" class="logo">
                <p>Sign in untuk melanjutkan</p>
            </div>

            <div class="login-form">
                <!-- Login Form -->
                <form action="{{ route('authenticate') }}" method="POST">
                    @csrf
                    <div class="input-group">
                        <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
                        <i class="fas fa-envelope"></i>
                    </div>
                    @error('email')
                        <div class="text-danger" style="font-size: 12px;">{{ $message }}</div>
                    @enderror

                    <div class="input-group">
                        <input type="password" name="password" placeholder="Password" required>
                        <i class="fas fa-lock"></i> <!-- Lock icon on the left -->
                        <!-- Toggle password button will be dynamically added to the right -->
                    </div>                    
                    @error('password')
                        <div class="text-danger" style="font-size: 12px;">{{ $message }}</div>
                    @enderror

                    <button type="submit" class="login-btn">Login</button>
                </form>

                <div class="register-link">
                    Anggota Baru? <a href="{{ route('registerShow') }}">Daftar</a>
                </div>
            </div>
        </div>
    </div>


    <script src="{{ asset('assets/js/register.js') }}"></script> <!-- Pastikan ini diakhiri dengan </script> -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

    <script>
        // Menampilkan Toastify saat ada pesan flash
        @if (Session::has('success'))
            Toastify({
                text: "{{ Session::get('success') }}",
                duration: 3000,
                gravity: "top",
                position: "right",
                backgroundColor: "#28a745",
                stopOnFocus: true,
            }).showToast();
        @endif

        @if (Session::has('error'))
            Toastify({
                text: "{{ Session::get('error') }}",
                duration: 3000,
                gravity: "top",
                position: "right",
                backgroundColor: "#dc3545",
                stopOnFocus: true,
            }).showToast();
        @endif
    </script>
    
</body>


</html>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
</head>
<body>
    <header>
        <h1>Selamat datang, Admin!</h1>
        <p>Anda berhasil login sebagai Admin.</p>
    </header>
    <nav>
        <form action="{{ route('logout') }}" method="POST">
            @csrf  <!-- Token CSRF untuk proteksi -->
            <button type="submit">Logout</button>
        </form>
    </nav>
</body>
</html>

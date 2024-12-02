<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Anggota</title>
</head>
<body>
    <header>
        <h1>Selamat datang, Anggota!</h1>
        <p>Anda berhasil login sebagai Anggota.</p>
    </header>
    <form action="{{ route('logout') }}" method="POST">
        @csrf  <!-- Token CSRF untuk proteksi -->
        <button type="submit">Logout</button>
    </form>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modern Registration</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset ('assets/css/register.css') }}">
</head>
<body>
    <div class="container">
        <div class="registration-form">
            <div class="progress-bar">
                <div class="progress-step active">1</div>
                <div class="progress-step">2</div>
                <div class="progress-step">3</div>
                <div class="progress-step">4</div>
            </div>

            <form id="multi-step-form">
                <!-- Step 1: Tipe Member dan Informasi Dasar -->
                <div class="step active" id="step-1">
                    <h2>Informasi Dasar</h2>
                    <div class="input-group">
                        <select id="member-type" required>
                            <option value="">Pilih Tipe Member</option>
                            <option value="biasa">Biasa</option>
                            <option value="terdaftar">Terdaftar</option>
                        </select>
                    </div>
                    <div class="input-group">
                        <input type="email" placeholder="Email" required>
                        <i class="fas fa-envelope"></i>
                    </div>
                    <div class="input-group">
                        <input type="text" placeholder="Nama Perusahaan" required>
                        <i class="fas fa-building"></i>
                    </div>
                    <div class="input-group">
                        <input type="password" placeholder="Password" required>
                        <i class="fas fa-lock"></i>
                    </div>
                    <div class="input-group">
                        <input type="password" placeholder="Konfirmasi Password" required>
                        <i class="fas fa-lock"></i>
                    </div>
                    <div class="navigation-buttons">
                        <button type="button" class="btn" onclick="nextStep()">Selanjutnya</button>
                        <div class="toggle-text">
                            Bagian dari kami? <a href="{{ route('loginForm')}}">Sign In</a>
                        </div>
                    </div>
                </div>

                <!-- Step 2: Alamat -->
                <div class="step" id="step-2">
                    <h2>Informasi Alamat</h2>
                    <div class="input-group">
                        <input type="text" placeholder="Alamat Lengkap" required>
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <div class="input-group">
                        <input type="text" placeholder="Provinsi" required>
                        <i class="fas fa-globe"></i>
                    </div>
                    <div class="input-group">
                        <input type="text" placeholder="Kota" required>
                        <i class="fas fa-city"></i>
                    </div>
                    <div class="input-group">
                        <input type="text" placeholder="Kecamatan" required>
                        <i class="fas fa-map-signs"></i>
                    </div>
                    <div class="input-group">
                        <input type="text" placeholder="Kode Pos" required>
                        <i class="fas fa-mail-bulk"></i>
                    </div>
                    <div class="input-group">
                        <input type="tel" placeholder="Nomor Telepon" required>
                        <i class="fas fa-phone"></i>
                    </div>
                    <div class="navigation-buttons">
                        <button type="button" class="btn btn-secondary" onclick="prevStep()">Kembali</button>
                        <button type="button" class="btn" onclick="nextStep()">Selanjutnya</button>
                    </div>
                </div>

                <!-- Step 3: Informasi Pemilik -->
                <div class="step" id="step-3">
                    <h2>Informasi Pemilik</h2>
                    <div class="input-group">
                        <input type="text" placeholder="Nama Pemilik" required>
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="input-group">
                        <input type="text" placeholder="Nomor KTP/NIK" required>
                        <i class="fas fa-id-card"></i>
                    </div>
                    <div class="input-group">
                        <input type="text" placeholder="Nomor SKU/PIRT">
                        <i class="fas fa-receipt"></i>
                    </div>
                    <div class="input-group">
                        <input type="text" placeholder="Nomor NPWP Pemilik">
                        <i class="fas fa-file-invoice"></i>
                    </div>
                    <div class="navigation-buttons">
                        <button type="button" class="btn btn-secondary" onclick="prevStep()">Kembali</button>
                        <button type="button" class="btn" onclick="nextStep()">Selanjutnya</button>
                    </div>
                </div>

                <!-- Step 4: Upload Dokumen dan Kualifikasi -->
                <div class="step" id="step-4">
                    <h2>Dokumen dan Kualifikasi</h2>
                    <div class="input-group">
                        <select id="business-qualification" required>
                            <option value="">Pilih Kualifikasi Usaha</option>
                            <option value="mikro">Mikro</option>
                            <option value="kecil">Kecil</option>
                            <option value="menengah">Menengah</option>
                        </select>
                    </div>
                    <div class="input-group">
                        <select id="business-type" required>
                            <option value="">Pilih Jenis Usaha</option>
                            <option value="makanan">Makanan</option>
                            <option value="minuman">Minuman</option>
                            <option value="jasa">Jasa</option>
                        </select>
                    </div>
                    <div class="input-group">
                        <div class="file-upload">
                            <input type="file" id="upload-ktp" accept=".pdf,.jpg,.jpeg,.png">
                            <p>Upload KTP</p>
                        </div>
                    </div>
                    <div class="input-group">
                        <div class="file-upload">
                            <input type="file" id="upload-npwp" accept=".pdf,.jpg,.jpeg,.png">
                            <p>Upload NPWP</p>
                        </div>
                    </div>
                    <div class="input-group">
                        <div class="file-upload">
                            <input type="file" id="upload-sku" accept=".pdf,.jpg,.jpeg,.png">
                            <p>Upload SKU/PIRT</p>
                        </div>
                    </div>
                    <div class="navigation-buttons">
                        <button type="button" class="btn btn-secondary" onclick="prevStep()">Kembali</button>
                        <button type="submit" class="btn">Daftar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="{{ asset ('assets/js/login.js') }}"></script>
</body>
</html>
@extends('layout.dashboard-anggota')
@section('content')
 <!-- Container -->
 <div class="container-fluid">
    <div class="row flex-nowrap">
        <!-- Sidebar -->
        <x-sidebar-user/>

       <!-- Main Content and Footer -->
       <main class="col-md-9 ms-sm-auto col-lg-10 content d-flex flex-column">
        <!-- Header Section -->
        <div class="header-section text-center py-4 bg-gradient">
            <h1 class="fw-bold text-black">Selamat Datang di Dashboard APJI</h1>
            <p class="text-dark">Asosiasi Pengusaha Jasa Boga Indonesia</p>
        </div>
    
        <!-- Statistics Section -->
        <section class="stats-section py-4">
            <div class="container">
                <div class="row g-4 text-center">
                    <!-- Pengajuan Sertifikat Card -->
                    <div class="col-md-6">
                        <div class="card border-0 shadow-lg rounded-4 p-3 d-flex align-items-center justify-content-center" style="transition: transform 0.3s ease-in-out; height: 160px;">
                            <div class="text-center">
                                <!-- Logo Icon for Pengajuan Sertifikat -->
                                <i class="bx bx-award text-primary" style="font-size: 4rem; margin-bottom: 8px;"></i>
                                <!-- Text Below Logo -->
                                <h5 class="mt-0 fw-bold text-dark" style="font-size: 1.20rem;">Pengajuan Sertifikat</h5>
                            </div>
                        </div>
                    </div>
    
                    <!-- Kelayakan Usaha Card -->
                    <div class="col-md-6">
                        <div class="card border-0 shadow-lg rounded-4 p-3 d-flex align-items-center justify-content-center" style="transition: transform 0.3s ease-in-out; height: 160px;">
                            <div class="text-center">
                                <!-- Logo Icon for Kelayakan Usaha -->
                                <i class="bx bx-check-shield text-success" style="font-size: 4rem; margin-bottom: 8px;"></i>
                                <!-- Text Below Logo -->
                                <h5 class="mt-0 fw-bold text-dark" style="font-size: 1.20rem;">Kelayakan Usaha</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    
        <!-- Recent Activities Table -->
        <section class="recent-activities-section container py-4 mt-4">
            <h3 class="fw-bold text-primary mb-3">Event Terbaru</h3>
            <div class="table-responsive">
                <table class="table table-hover align-middle shadow-sm rounded-4 overflow-hidden">
                    <thead class="table-primary text-white">
                        <tr>
                            <th>Event</th>
                            <th>Tanggal</th>
                            <th>Tempat</th>
                            <th>Waktu</th>
                            <th class="text-center">Detail</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Seminar Bisnis Kuliner Indonesia</td>
                            <td>15 Januari 2024</td>
                            <td>Jakarta</td>
                            <td>09:00 - 12:00</td>
                            <td class="text-center">
                                <a class="btn btn-outline-primary btn-sm shadow-sm" style="width: 110px" href="#">
                                    <i class="bi bi-eye me-1"></i> Lihat Detail
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>Workshop Pemasaran Digital</td>
                            <td>18 Januari 2024</td>
                            <td>Bandung</td>
                            <td>13:00 - 16:00</td>
                            <td class="text-center">
                                <a class="btn btn-outline-primary btn-sm shadow-sm" style="width: 110px" href="#">
                                    <i class="bi bi-eye me-1"></i> Lihat Detail
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>Webinar Tren Industri Jasa Boga</td>
                            <td>25 Januari 2024</td>
                            <td>Online</td>
                            <td>10:00 - 11:30</td>
                            <td class="text-center">
                                <a class="btn btn-outline-primary btn-sm shadow-sm" style="width: 110px" href="#">
                                    <i class="bi bi-eye me-1"></i> Lihat Detail 
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>

    </main>
</div>
<!-- Footer -->
@include('components.footer-user')
</div>
@endsection

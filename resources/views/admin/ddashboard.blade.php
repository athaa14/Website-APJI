@extends('layout.dashboard')
@section('content')
<div class="container-fluid">
    <div class="row">

      {{-- <x-sidebar-admin/> --}}

      {{-- <nav class="col-md-3 col-lg-2 d-md-block custom-sidebar">
        <div class="position-sticky pt-3">
          
          <div class="sidebar-label">Dashboard</div>
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="sidebar-link" href="/dashboard"><i class='bx bxs-layout'></i> Dashboard</a>
            </li>
          </ul>

          <div class="sidebar-label">Menu</div>
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="sidebar-link" href=""><i class='bx bx-grid-horizontal'></i> Pengajuan</a>
            </li>
          </ul>
          
      </nav> --}}

      <x-sidebar-admin/>

      <main class="col-md-9 ms-sm-auto col-lg-10 content">
        <h1>Dashboard</h1>

        <div class="card-container">
            <div class="card">
                <div class="card-content">
                    <h2>Total Anggota</h2>
                    <p>100</p>
                </div>
            </div>
            <div class="card">
                <div class="card-content">
                    <h2>Anggota Terverifikasi</h2>
                    <p>89</p>
                </div>
            </div>
            <div class="card menunggu">
                <div class="card-content">
                    <h2>Menunggu Diverifikasi</h2>
                    <p>11</p>
                </div>
            </div>
            <div class="card">
                <div class="card-content">
                    <h2>Pengajuan</h2>
                    <p>71</p>
                </div>
            </div>
        </div>

        <div class="table">
          <div class="tableheader">
              <h6>Aktivitas</h6>
          </div>

          <div class="tablecontent">
              <table>
                  <tbody>
                    <tr>
                      <td>User baru telah login.</td>
                      <td><a class="detail" href="">Lihat Detail</a></td>
                    </tr>
                    <tr>
                      <td>User baru telah login.</td>
                      <td><a class="detail" href="">Lihat Detail</a></td>
                    </tr>
                  </tbody>
              </table>
          </div>
        </div>

      </main>
    </div>
  </div>
  @endsection
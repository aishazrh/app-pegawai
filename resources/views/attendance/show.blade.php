<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <link href='https://cdn.boxicons.com/fonts/basic/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-whatever" crossorigin="anonymous"></script>
    <title>Detail Kehadiran</title>
</head>

<body class="d-flex flex-column min-vh-100">
    <main class="grow">
        <nav class="sidebar close">
            <header>
                <div class="image-text">
                    <span class="image">
                        <img src="{{ asset('images/logo light.png') }}" alt="logo">
                    </span>

                    <div class="text header-text">
                        <span class="name">App Pegawai</span>
                    </div>

                    <i class='bx  bx-chevron-right toggle'></i>
                </div>
            </header>

            <div class="menu-bar">
                <div class="menu">
                    <li class="search-box">
                        <i class='bx bx-search icon'></i>
                        <input type="text" placeholder="Search...">
                    </li>

                    {{-- NAV --}}
                    <li class="nav-link">
                        <a href="/">
                            <i class='bx bx-home-alt icon'></i>
                            <span class="text nav-text">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="/employees">
                            <i class='bx bx-people-diversity icon'></i>
                            <span class="text nav-text">Employees</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="/departments">
                            <i class='bx  bx-department-store icon'></i>
                            <span class="text nav-text">Departments</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="/attendance">
                            <i class='bx bx-fingerprint icon'></i>
                            <span class="text nav-text">Attendances</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="/reports">
                            <i class='bx bx-newspaper icon'></i>
                            <span class="text nav-text">Reports</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="/pengajuans">
                            <i class='bx bx-folder icon'></i>
                            <span class="text nav-text">Requests</span>
                        </a>
                    </li>
                </div>

                <div class="bottom-content">
                    <li class="">
                        <a href="/settings">
                            <i class='bx bx-cog icon'></i>
                            <span class="text nav-text">Settings</span>
                        </a>
                    </li>

                    <li class="mode">
                        <div class="moon-sun"> <i class="bx bx-moon icon moon"></i> <i class="bx bx-sun icon sun"></i>
                        </div> <span class="mode-text text">Dark Mode</span>
                        <div class="toggle-switch"> <span class="switch"></span> </div>
                    </li>
                </div>
            </div>
        </nav>

        <section class="home" style="margin-top: 0.5rem">
            <div class="content-area">
                <div class="text">
                    <div>
                        <h3 style="font-weight: bold;">
                            Detail Laporan Kehadiran
                        </h3>
                    </div>

                    <div class="card-form" style="margin: 5rem 15rem;">
                        <div class="card text-center">
                            <div class="card-body" style="margin-top: 3rem">
                                <table border="0" cellpadding="8" cellspacing="0">
                                    <tr>
                                        <h5 style="padding-bottom: 2rem"><strong>Detail Laporan Kehadiran</strong></h5>
                                    </tr>
                                    <tr>
                                        <th><label for="id">
                                                <h6><strong>ID Kehadiran:</strong></h6>
                                            </label></th>
                                        <td>
                                            <h6>{{ $attendance->id }}</h6>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th><label for="karyawan_id">
                                                <h6><strong>ID Karyawan:</strong></h6>
                                            </label></th>
                                        <td>
                                            <h6>{{ $attendance->karyawan_id }}</h6>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th><label for="karyawan_id">
                                                <h6><strong>Nama Karyawan:</strong></h6>
                                            </label></th>
                                        <td>
                                            <h6>{{ $attendance->karyawan->nama_lengkap }}</h6>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th><label for="department">
                                                <h6><strong>Departemen:</strong></h6>
                                            </label></th>
                                        <td>
                                            <h6>{{ $attendance->karyawan->department->nama_departemen }}</h6>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th><label for="karyawan_id">
                                                <h6><strong>Jabatan:</strong></h6>
                                            </label></th>
                                        <td>
                                            <h6>{{ $attendance->karyawan->position->nama_jabatan }}</h6>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th><label for="tanggal">
                                                <h6><strong>Tanggal:</strong></h6>
                                            </label></th>
                                        <td>
                                            <h6>{{ $attendance->tanggal }}</h6>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th><label for="waktu_masuk">
                                                <h6><strong>Waktu Masuk:</strong></h6>
                                            </label></th>
                                        <td>
                                            <h6>{{ $attendance->waktu_masuk }}</h6>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th><label for="waktu_keluar">
                                                <h6><strong>Waktu Keluar:</strong></h6>
                                            </label></th>
                                        <td>
                                            <h6>{{ $attendance->waktu_keluar }}</h6>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th><label for="created_at">
                                                <h6><strong>Created At:</strong></h6>
                                            </label></th>
                                        <td>
                                            <h6>{{ $attendance->created_at }}</h6>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th><label for="updated_at">
                                                <h6><strong>Updated At:</strong></h6>
                                            </label></th>
                                        <td>
                                            <h6>{{ $attendance->updated_at }}</h6>
                                        </td>
                                    </tr>
                                </table>

                                <div style="text-align: center; width: 100%; margin-top: 2rem;">
                                    <table style="border-collapse: separate;">
                                        <tr>
                                            <td>
                                                <a href="{{ url('/attendance') }}" class="btn btn-cancel"
                                                    style="width: 100%">
                                                    Kembali
                                                </a>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <footer class="footer text-center">
                    <div class="container">
                        <p class="mb-0">&copy; {{ date('Y') }} <strong>App Pegawai</strong>. All rights reserved.</p>
                        <small>Developed by Aisha Zarrah </small>
                    </div>
                </footer>
        </section>
    </main>
    
    <script src="{{ asset('js/script.js') }}"></script>

</body>

</html>
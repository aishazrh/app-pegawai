<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <link href='https://cdn.boxicons.com/fonts/basic/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-whatever" crossorigin="anonymous"></script>
    <title>Form Edit Kehadiran</title>
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
            <div class="text">
                <div>
                    <h3 style="font-weight: bold;">
                        Update Laporan Kehadiran
                    </h3>
                </div>

                <div class="card-form" style="margin: 3rem 15rem">
                    <div class="card">
                        <div class="card-body">
                            <h4 style="font-weight: bold; text-align: center; padding-bottom: 2rem; padding-top: 1rem;">
                                Edit Data Kehadiran
                            </h4>
                            <form action="{{ route('attendance.update', $attendance->id) }}" method="POST"
                                class="card-text">
                                @csrf
                                @method('PUT')
                                <table>
                                    <tr>
                                        <td><label for="karyawan_id"><h6>ID Karyawan:</h6></label></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" name="karyawan_id"
                                                value="{{ old('karyawan_id', $attendance->karyawan_id) }}"
                                                class="form-control form-control-card" style="width: 48rem">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><label for="tanggal"><h6>Tanggal:</h6></label></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="date" name="tanggal"
                                                value="{{ old('tanggal', $attendance->tanggal) }}" class="form-control form-control-card"
                                                style="width: 48rem">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><label for="waktu_masuk"><h6>Waktu Masuk:</h6></label></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="time" name="waktu_masuk"
                                                value="{{ old('waktu_masuk', $attendance->waktu_masuk) }}"
                                                class="form-control form-control-card" style="width: 48rem">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><label for="waktu_keluar"><h6>Waktu Keluar:</h6></label></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="time" name="waktu_keluar"
                                                value="{{ old('waktu_keluar', $attendance->waktu_keluar) }}"
                                                class="form-control form-control-card" style="width: 48rem">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><label for="status_absensi"><h6>Status Absensi:</h6></label></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <select id="status_absensi" name="status_absensi" class="form-control form-control-card"
                                                style="width: 48rem">
                                                <option value="">-- Pilih Status --</option>
                                                <option value="Hadir" {{ old('status_absensi', $attendance->status_absensi) == 'Hadir' ? 'selected' : '' }}>Hadir
                                                </option>
                                                <option value="Izin" {{ old('status_absensi', $attendance->status_absensi) == 'Izin' ? 'selected' : '' }}>Izin
                                                </option>
                                                <option value="Sakit" {{ old('status_absensi', $attendance->status_absensi) == 'Sakit' ? 'selected' : '' }}>Sakit
                                                </option>
                                                <option value="Alfa" {{ old('status_absensi', $attendance->status_absensi) == 'Alfa' ? 'selected' : '' }}>Alfa
                                                </option>
                                            </select>
                                        </td>
                                    </tr>
                                </table>

                                <div style="text-align: center; width: 100%; margin-top: 1rem;">
                                    <table style="border-collapse: separate;">
                                        <tr>
                                            <td>
                                                <a href="{{ url('/attendance') }}" class="btn btn-cancel"
                                                    style="width: 100%">
                                                    Batal
                                                </a>
                                            </td>
                                            <td>
                                                <button type="submit" class="btn btn-primary" style="width: 100%;">
                                                    Update
                                                </button>
                                            </td>
                                        </tr>
                                    </table>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <footer style="padding: 3rem;">
                <div class="container text-center">
                    <p class="mb-0">&copy; {{ date('Y') }} <strong>App Pegawai</strong>. All rights reserved.</p>
                    <small>Developed by Aisha Zarrah </small>
                </div>
            </footer>
        </section>
    </main>

    <script src="{{ asset(path: 'js/script.js') }}"></script>
</body>

</html>
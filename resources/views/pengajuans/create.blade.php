<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <link href='https://cdn.boxicons.com/fonts/basic/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-whatever" crossorigin="anonymous"></script>
    <title>Form Input Pengajuan</title>

    <script>
        window.employees = @json($employees);
    </script>
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
                            Tambahkan Pengajuan Baru
                        </h3>

                        <div class="card-form" style="margin: 3rem 15rem">
                            <div class="card">
                                <div class="card-body">
                                    <h5
                                        style="font-weight: bold; text-align: center; padding-bottom: 2rem; padding-top: 1rem;">
                                        Form Pengajuan
                                    </h5>

                                    @if ($errors->any())
                                        <div style="color: red;">
                                            <ul>
                                                <h5>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </h5>
                                            </ul>
                                        </div>
                                    @endif

                                    <form action="{{ route('pengajuans.store') }}" method="POST" class="card-text"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <table>
                                            <tr>
                                                <td><label for="karyawan_id">
                                                        <h6>ID Karyawan:</h6>
                                                    </label></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <select name="karyawan_id" id="karyawan_id" class="form-control"
                                                        required onchange="updateEmployeeInfo()">
                                                        <option value="" disabled selected>Pilih ID Karyawan</option>
                                                        @foreach($employees as $employee)
                                                            <option value="{{ $employee->id }}">{{ $employee->id }}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><label for="nama_karyawan">
                                                        <h6>Nama Karyawan:</h6>
                                                    </label></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="text" id="employee_name" name="employee_name"
                                                        class="form-control" readonly>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><label for="department">
                                                        <h6>Departemen:</h6>
                                                    </label></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="text" id="department" name="department"
                                                        class="form-control" readonly>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><label for="position">
                                                        <h6>Jabatan:</h6>
                                                    </label></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="text" id="position" name="position"
                                                        class="form-control" readonly>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><label for="tipe_pengajuan">
                                                        <h6>Tipe Pengajuan:</h6>
                                                    </label></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <select id="tipe_pengajuan" name="tipe_pengajuan"
                                                        class="form-control form-control-card" style="width: 48rem">
                                                        <option value="">-- Pilih Tipe Pengajuan --</option>
                                                        <option value="sakit">Sakit</option>
                                                        <option value="izin">Izin</option>
                                                        <option value="cuti">Cuti</option>
                                                        <option value="peningkatan_gaji">Peningkatan Gaji</option>
                                                        <option value="pengunduran_diri">Pengunduran Diri</option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><label for="tanggal_pengajuan">
                                                        <h6>Tanggal Pengajuan:</h6>
                                                    </label></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="date" id="tanggal_pengajuan" name="tanggal_pengajuan"
                                                        class="form-control form-control-card" style="width: 48rem">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><label for="dokumen">
                                                        <h6>Upload Dokumen Pendukung:</h6>
                                                    </label></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="file" id="dokumen" name="dokumen"
                                                        class="form-control form-control-card" style="width: 48rem">
                                                </td>
                                            </tr>
                                        </table>

                                        <div style="text-align: center; width: 100%; margin-top: 1rem;">
                                            <table style="border-collapse: separate;">
                                                <tr>
                                                    <td>
                                                        <a href="{{ url('/pengajuans') }}" class="btn btn-cancel"
                                                            style="width: 100%">
                                                            Batal
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <button type="submit" class="btn btn-primary"
                                                            style="width: 100%;">
                                                            Simpan
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
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <link href='https://cdn.boxicons.com/fonts/basic/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-whatever" crossorigin="anonymous"></script>
    <title>Form Input Laporan</title>

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
                            Daftarkan Laporan Baru
                        </h3>
                    </div>

                    <div class="card-form" style="margin-left: 15rem">
                        <div class="card">
                            <div class="card-body">
                                <h5
                                    style="font-weight: bold; text-align: center; padding-bottom: 2rem; padding-top: 1rem;">
                                    Form Laporan
                                </h5>
                                <form action="{{ route('reports.store') }}" method="POST" class="card-text">
                                    @csrf
                                    <table>
                                        <tr>
                                            <td><label for="employee_id">
                                                    <h6>ID Karyawan:</h6>
                                                </label></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <select name="employee_id" id="karyawan_id" class="form-control"
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
                                                    class="form-control" readonly required>
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
                                                    class="form-control" readonly required>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label for="position">
                                                    <h6>Jabatan:</h6>
                                                </label></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input type="text" id="position" name="position" class="form-control"
                                                    readonly required>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label for="bulan">
                                                    <h6>Bulan:</h6>
                                                </label></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input type="month" id="bulan" name="bulan"
                                                    class="form-control form-control-card" style="width: 48rem">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label for="rating_kinerja">
                                                    <h6>Rating Kinerja:</h6>
                                                </label></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input type="range" id="rating_kinerja" name="rating_kinerja" min="1"
                                                    max="10" value="5" class="form-range" style="width: 48rem;"
                                                    oninput="document.getElementById('rating_value').innerText = this.value"
                                                    required>
                                                <div style="font-weight: bold; margin-top: 0.5rem;">
                                                    <h6>
                                                        Rating: <span id="rating_value">5</span>
                                                    </h6>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>

                                    <div style="text-align: center; width: 100%; margin-top: 1rem;">
                                        <table style="border-collapse: separate;">
                                            <tr>
                                                <td>
                                                    <a href="{{ url('/reports') }}" class="btn btn-cancel"
                                                        style="width: 100%">
                                                        Batal
                                                    </a>
                                                </td>
                                                <td>
                                                    <button type="submit" class="btn btn-primary" style="width: 100%;">
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

            <footer class="footer text-center" style="margin-top: 3rem;">
                <div class="container">
                    <p class="mb-0">&copy; {{ date('Y') }} <strong>App Pegawai</strong>. All rights reserved.</p>
                    <small>Developed by Aisha Zarrah </small>
                </div>
            </footer>
        </section>

        <script src="{{ asset('js/script.js') }}"></script>
    </main>
</body>

</html>
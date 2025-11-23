<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <link href='https://cdn.boxicons.com/fonts/basic/boxicons.min.css' rel='stylesheet'>
    <title>Attendance</title>
</head>

<body>
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
                        Daftar Kehadiran
                    </h3>
                </div>

                <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center"
                    style="padding-top: 0.5rem; padding-bottom: 1rem;">

                    <div class="d-flex flex-column flex-md-row align-items-md-center">
                        <form action="{{ route('attendance.index') }}" method="GET" class="me-md-2 mb-2 mb-md-0">
                            <input type="text" name="search" placeholder="Search" value="{{ $search ?? '' }}"
                                class="form-control" style="width: 68rem;">
                        </form>

                        <div>
                            <a href="{{ url(path: '/attendance/create') }}" class="btn btn-primary">
                                Add Attendance
                            </a>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <table cellpadding="5" style="text-align: center; table-layout: auto;">
                            <thead>
                                <tr>
                                    <th>
                                        <h6><strong>ID</strong></h6>
                                    </th>
                                    <th>
                                        <h6><strong>ID Karyawan</strong></h6>
                                    </th>
                                    <th>
                                        <h6><strong>Tanggal</strong></h6>
                                    </th>
                                    <th>
                                        <h6><strong>Waktu Masuk</strong></h6>
                                    </th>
                                    <th>
                                        <h6><strong>Waktu Keluar</strong></h6>
                                    </th>
                                    <th>
                                        <h6><strong>Status Absensi</strong></h6>
                                    </th>
                                    <th>
                                        <h6><strong>Created At</strong></h6>
                                    </th>
                                    <th>
                                        <h6><strong>Updated At</strong></h6>
                                    </th>
                                    <th>
                                        <h6><strong>Aksi</strong></h6>
                                    </th>
                            </thead>
                            <tbody>
                                @foreach ($attendances as $attendance)
                                    <tr>
                                        <td>
                                            <h6>{{ $attendance->id }}</h6>
                                        </td>
                                        <td>
                                            <h6>{{ $attendance->karyawan_id }}</h6>
                                        </td>
                                        <td>
                                            <h6>{{ $attendance->tanggal }}</h6>
                                        </td>
                                        <td>
                                            <h6>{{ $attendance->waktu_masuk }}</h6>
                                        </td>
                                        <td>
                                            <h6>{{ $attendance->waktu_keluar }}</h6>
                                        </td>
                                        <td>
                                            <h6>{{ $attendance->status_absensi }}</h6>
                                        </td>
                                        <td>
                                            <h6>{{ $attendance->created_at }}</h6>
                                        </td>
                                        <td>
                                            <h6>{{ $attendance->updated_at }}</h6>
                                        </td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-primary dropdown-toggle" type="button"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    More
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a class="dropdown-item"
                                                            href="{{ route('attendance.show', $attendance->id) }}">
                                                            Detail
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item"
                                                            href="{{ route('attendance.edit', $attendance->id) }}">
                                                            Edit
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <form action="{{ route('attendance.destroy', $attendance->id) }}"
                                                            method="POST"
                                                            onsubmit="return confirm('Yakin ingin menghapus data ini?')"
                                                            style="display: block; padding: 0;">

                                                            @csrf
                                                            @method('DELETE')

                                                            <button type="submit"
                                                                class="dropdown-item text-danger dropdown-item-delete"
                                                                style="width: 100%; border: none; text-align: left; background: none; cursor: pointer;">
                                                                Delete
                                                            </button>
                                                        </form>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <footer class="footer text-center" style="margin-top: 19rem">
                <div class="container">
                    <p class="mb-0">&copy; {{ date('Y') }} <strong>App Pegawai</strong>. All rights reserved.</p>
                    <small>Developed by Aisha Zarrah </small>
                </div>
            </footer>

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
                crossorigin="anonymous"></script>
        </section>

        <script src="{{ asset(path: 'js/script.js') }}"></script>
    </main>

</body>

</html>
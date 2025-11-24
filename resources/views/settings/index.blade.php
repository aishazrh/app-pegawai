<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <link href='https://cdn.boxicons.com/fonts/basic/boxicons.min.css' rel='stylesheet'>
    <title>Settings</title>
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
            <div class="container" style="padding: 2rem;">
                <h3 style="font-weight: bold;">Pengaturan Aplikasi</h3>

                <!-- Theme Setting -->
                <div class="card mb-3">
                    <div class="card-body">
                        <h5>Theme</h5>
                        <form action="{{ route('settings.updateTheme') }}" method="POST">
                            @csrf
                            <select name="theme" class="form-control" onchange="this.form.submit()">
                                <option value="light" {{ $theme == 'light' ? 'selected' : '' }}>Light Mode</option>
                                <option value="dark" {{ $theme == 'dark' ? 'selected' : '' }}>Dark Mode</option>
                            </select>
                        </form>
                    </div>
                </div>

                <!-- Language Setting -->
                <div class="card mb-3">
                    <div class="card-body">
                        <h5>Bahasa</h5>
                        <form action="{{ route('settings.updateLanguage') }}" method="POST">
                            @csrf
                            <select name="language" class="form-control" onchange="this.form.submit()">
                                <option value="id" {{ $language == 'id' ? 'selected' : '' }}>Indonesia</option>
                                <option value="en" {{ $language == 'en' ? 'selected' : '' }}>English</option>
                            </select>
                        </form>
                    </div>
                </div>

                <!-- App Info -->
                <div class="card mb-3">
                    <div class="card-body">
                        <h5>Info Aplikasi</h5>
                        <p><strong>Nama Aplikasi:</strong> App Pegawai</p>
                        <p><strong>Versi:</strong> 1.0.0</p>
                        <p><strong>Developer:</strong> Aisha Zarrah</p>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <script src="{{ asset('js/script.js') }}"></script>
</body>

</html>
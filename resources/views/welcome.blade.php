<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <link href='https://cdn.boxicons.com/fonts/basic/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="..."
        crossorigin="anonymous"></script>
    <title>@yield('title', 'App Pegawai')</title>
</head>

<body>
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
            <h3><strong>Dashboard</strong></h3>
            <div class="card">
                <div class="card-body">
                    <table>
                        <th>
                            <h5><strong>Welcome!</strong></h5>
                            <h6 class="card-text" style="text-align: justify">
                                Tired of scattered HR tools? Revolutionize the way you run your business. Manage your
                                start-up company from end-to-end with this comprehensive App Pegawai! Everything you
                                need is right here: from overseeing individual employee profiles and structuring complex
                                departments, to generating insightful, real-time management reports.
                            </h6>
                        </th>
                    </table>
                </div>
            </div>

            <h4 style="margin: 1rem 0rem"><strong>Manage Your Company</strong></h4>
            <div>
                <table style="border-collapse: separate;">
                    <tr>
                        <th>
                            {{-- CARD EMPLOYEES --}}
                            <div class="card" style="margin-right: 2px">
                                <img src="{{ asset('images/employees.png') }}" class="card-img-top" alt="employees">
                                <div class="card-body">
                                    <h5 class="card-title">Employees</h5>
                                    <h6 class="card-text">
                                        The complete workforce hub. Centralize all employee data,
                                        from profiles and personal details to attendance records
                                        and time-off management. Streamline HR tasks and empower
                                        staff with self-service features.
                                    </h6>
                                    <a href="{{ url('/employees') }}" class="btn btn-primary" style="width: 100%">Manage
                                        Employees</a>
                                </div>
                            </div>
                        </th>
                        <th>
                            {{-- CARD DEPARTMENT --}}
                            <div class="card">
                                <img src="{{ asset('images/departments.png') }}" class="card-img-top" alt="departments">
                                <div class="card-body">
                                    <h5 class="card-title">Departments</h5>
                                    <h6 class="card-text">
                                        Organize for optimal efficiency. Visually structure
                                        your entire company. Easily set up, manage, and scale
                                        departments, define hierarchies, and ensure clear role
                                        allocation across the organization.
                                    </h6>
                                    <a href="{{ url(path: '/departments') }}" class="btn btn-primary"
                                        style="width: 100%">Manage Departments</a>
                                </div>
                            </div>
                        </th>

                    </tr>
                    <tr>
                        <th>
                            {{-- CARD ATTENDANCE --}}
                            <div class="card" style="margin-right: 2px">
                                <img src="{{ asset('images/attendance.png') }}" class="card-img-top" alt="reports">
                                <div class="card-body">
                                    <h5 class="card-title">Attendance</h5>
                                    <h6 class="card-text">
                                        Workforce presence monitoring. Track and verify employee check-ins,
                                        check-outs, and work hours effortlessly. Review daily status, manage late
                                        arrivals, and generate accurate timekeeping data for payroll processing.
                                    </h6>
                                    <a href="{{ url('/attendance') }}" class="btn btn-primary" style="width: 100%">
                                        See Attendance List
                                    </a>
                                </div>
                            </div>
                        </th>
                        <th>
                            {{-- CARD REPORTS --}}
                            <div class="card">
                                <img src="{{ asset('images/reports.png') }}" class="card-img-top" alt="reports">
                                <div class="card-body">
                                    <h5 class="card-title">Reports</h5>
                                    <h6 class="card-text">
                                        Insights for strategic growth. Instantly generate crucial, real-time reports
                                        on
                                        attendance, payroll, and performance. Track key HR metrics, analyze
                                        important
                                        trends, and make smarter, data-driven decisions swiftly.
                                    </h6>
                                    <a href="{{ url('/reports') }}" class="btn btn-primary" style="width: 100%">See
                                        Reports</a>
                                </div>
                            </div>
                        </th>
                    </tr>
                </table>
            </div>
        </div>

        <footer style="margin-top: 3rem; padding: 3rem;">
            <div class="container text-center">
                <p class="mb-0">&copy; {{ date('Y') }} <strong>App Pegawai</strong>. All rights reserved.</p>
                <small>Developed by Aisha Zarrah </small>
            </div>
        </footer>
    </section>

    <script src="{{ asset(path: 'js/script.js') }}"></script>
</body>

</html>
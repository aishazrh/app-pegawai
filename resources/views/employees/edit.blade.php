<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <link href='https://cdn.boxicons.com/fonts/basic/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-whatever" crossorigin="anonymous"></script>
    <title>Form Edit Pegawai</title>
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
            <div>
                <h3 style="font-weight: bold;">
                    Update Data Pegawai
                </h3>
            </div>

            <div class="card-form" style="margin-left: 15rem">
                <div class="card">
                    <div class="card-body">
                        <h4 style="font-weight: bold; text-align: center; padding-bottom: 2rem; padding-top: 1rem;">
                            Form Pegawai
                        </h4>
                        <form action="{{ route('employees.update', $employee->id) }}" method="POST" class="card-text">
                            @csrf
                            @method('PUT')
                            <table>
                                <tr>
                                    <td><label for="nama_lengkap">
                                            <h6>Nama Lengkap:</h6>
                                        </label></td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="text" name="nama_lengkap"
                                            value="{{ old('nama_lengkap', $employee->nama_lengkap) }}"
                                            class="form-control form-control-card" style="width: 48rem">
                                    </td>
                                </tr>

                                <tr>
                                    <td><label for="email">
                                            <h6>Email:</h6>
                                        </label></td>
                                </tr>
                                <tr>
                                    <td><input type="email" name="email" value="{{ old('email', $employee->email) }}"
                                            class="form-control form-control-card" style="width: 48rem"></td>
                                </tr>

                                <tr>
                                    <td><label for="nomor_telepon">
                                            <h6>Nomor Telepon:</h6>
                                        </label></td>
                                </tr>
                                <tr>
                                    <td><input type="text" name="nomor_telepon"
                                            value="{{ old('nomor_telepon', $employee->nomor_telepon) }}"
                                            class="form-control form-control-card" style="width: 48rem"></td>
                                </tr>

                                <tr>
                                    <td><label for="tanggal_lahir">
                                            <h6>Tanggal Lahir:</h6>
                                        </label></td>
                                </tr>
                                <tr>
                                    <td><input type="date" name="tanggal_lahir"
                                            value="{{ old('tanggal_lahir', $employee->tanggal_lahir) }}"
                                            class="form-control form-control-card" style="width: 48rem"></td>
                                </tr>

                                <tr>
                                    <td><label for="alamat">
                                            <h6>Alamat:</h6>
                                        </label></td>
                                </tr>
                                <tr>
                                    <td><input type="text" name="alamat" value="{{ old('alamat', $employee->alamat) }}"
                                            class="form-control form-control-card" style="width: 48rem">
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <label for="tanggal_masuk">
                                            <h6>Tanggal Masuk:</h6>
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td><input type="date" name="tanggal_masuk"
                                            value="{{ old('tanggal_masuk', $employee->tanggal_masuk) }}"
                                            class="form-control form-control-card" style="width: 48rem"></td>
                                </tr>

                                <tr>
                                    <td>
                                        <label for="department_id">
                                            <h6>Departemen:</h6>
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <select name="department_id" class="form-control" required>
                                            <option value="" disabled selected>Pilih Departemen</option>
                                            @foreach($departments as $department)
                                                <option value="{{ $department->id }}" 
                                                    @if(old('department_id', $employee->department_id) == $department->id) selected @endif>
                                                    {{ $department->nama_departemen }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="position_id">
                                            <h6>Jabatan:</h6>
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <select name="position_id" class="form-control" required>
                                            <option value="" disabled selected>Pilih Jabatan</option>
                                            @foreach($positions as $position)
                                                <option value="{{ $position->id }}" 
                                                    @if(old('position_id', $employee->jabatan_id) == $position->id) selected @endif>
                                                    {{ $position->nama_jabatan }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td>
                                        <label for="status">
                                            <h6>Status:</h6>
                                        </label>
                                    </td>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <select name="status" class="form-control form-control-card"
                                            style="width: 48rem">
                                            <option value="aktif" {{ old('status', $employee->status) == 'aktif' ? 'selected' : '' }}>
                                                <h6>Aktif</h6>
                                            </option>
                                            <option value="nonaktif" {{ old('status', $employee->status) == 'nonaktif' ? 'selected' : '' }}>
                                                <h6>Nonaktif</h6>
                                            </option>
                                        </select>
                                    </td>
                                </tr>
                            </table>

                            <div style="text-align: center; width: 100%; margin-top: 1rem;">
                                <table style="border-collapse: separate;">
                                    <tr>
                                        <td>
                                            <a href="{{ url('/employees') }}" class="btn btn-cancel"
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
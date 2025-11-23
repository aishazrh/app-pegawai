<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="..."
        crossorigin="anonymous"></script>
    <title>Employees</title>
</head>

@extends('master')
@section('title', 'Daftar Pegawai')

@section('content')
    <main>
        <div>
            <h3 style="font-weight: bold;">
                Daftar Pegawai
            </h3>
        </div>

        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center"
            style="padding-top: 0.5rem; padding-bottom: 1rem;">

            <div class="d-flex flex-column flex-md-row align-items-md-center">
                <form action="{{ route('employees.index') }}" method="GET" class="me-md-2 mb-2 mb-md-0">
                    <input type="text" name="search" placeholder="Search" value="{{ $search ?? '' }}" class="form-control"
                        style="width: 56rem;">
                </form>

                <div style="margin-right: 0.5rem">
                    <a href="{{ url('/positions') }}" class="btn btn-primary">
                        Positions
                    </a>
                </div>

                <div style="margin-right: 0.5rem">
                    <a href="{{ url('/salaries') }}" class="btn btn-primary">
                        Salaries
                    </a>
                </div>

                <div>
                    <a href="{{ url(path: '/employees/create') }}" class="btn btn-primary">
                        Add Employee
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
                                <h6><strong>Nama Lengkap</strong></h6>
                            </th>
                            <th>
                                <h6><strong>Email</strong></h6>
                            </th>
                            <th>
                                <h6><strong>Alamat</strong></h6>
                            </th>
                            <th>
                                <h6><strong>Departemen</strong></h6>
                            </th>
                            <th>
                                <h6><strong>Jabatan</strong></h6>
                            </th>
                            <th>
                                <h6><strong>Status</strong></h6>
                            </th>
                            <th>
                                <h6><strong>Aksi</strong></h6>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($employees as $employee)
                            <tr>
                                <td>
                                    <h6>{{ $employee->id }}</h6>
                                </td>
                                <td>
                                    <h6>{{ $employee->nama_lengkap }}</h6>
                                </td>
                                <td>
                                    <h6>{{ $employee->email }}</h6>
                                </td>
                                <td>
                                    <h6>{{ $employee->alamat }}</h6>
                                </td>
                                <td>
                                    <h6>{{ $employee->department?->nama_departemen ?? 'N/A' }}</h6>
                                </td>
                                <td>
                                    <h6>{{ $employee->position?->nama_jabatan ?? 'N/A' }}</h6>
                                </td>
                                <td>
                                    <h6>{{ $employee->status }}</h6>
                                </td>
                                <td>
                                    <div class="dropdown position-static">
                                        <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                            More
                                        </button>

                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li><a class="dropdown-item"
                                                    href="{{ route('employees.show', $employee->id) }}">Detail</a></li>
                                            <li><a class="dropdown-item"
                                                    href="{{ route('employees.edit', $employee->id) }}">Edit</a></li>
                                            <li>
                                                <form action="{{ route('employees.destroy', $employee->id) }}" method="POST"
                                                    onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="dropdown-item dropdown-item-delete text-danger">Delete</button>
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
    </main>
@endsection

</html>
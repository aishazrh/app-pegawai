<x-app-layout>
    <x-slot name="title">Employee</x-slot>

    <main>
        <div class="pt-8 pb-10">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <div x-data="{ open: false }">
                            <button @click="open = !open" class="w-full flex justify-between items-center p-4">
                                <span class="font-semibold">Manage your employees</span>
                                <span x-text="open ? '↑' : '↓'" class="text-xl"></span>
                            </button>

                            <div x-show="open" x-transition
                                class="text-gray-600 transition-all duration-300 ease-in-out">
                                <form action="{{ route('employees.index') }}" method="GET"
                                    class="overflow-hidden sm:rounded-lg flex items-center gap-3 p-4">

                                    <input type="text" name="search" placeholder="Search employee"
                                        value="{{ $search ?? '' }}" class="flex-1 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 
                                        focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 
                                        dark:focus:ring-indigo-600 rounded-xl shadow-sm">

                                    <button type="submit"
                                        class="px-4 py-2 bg-blue-900 text-white rounded-xl transition ease-in-out duration-150">
                                        Go
                                    </button>
                                </form>
                            </div>
                            <div x-show="open" x-transition
                                class="p-4 text-gray-600 transition-all duration-300 ease-in-out">
                                <a href="{{ url(path: '/employees/create') }}" class="btn btn-primary">
                                    Add Employee
                                </a>
                            </div>
                            <div x-show="open" x-transition
                                class="p-4 text-gray-600 transition-all duration-300 ease-in-out">
                                <a href="{{ url('/positions') }}" class="btn btn-primary">
                                    Positions List
                                </a>
                            </div>
                            <div x-show="open" x-transition
                                class="p-4 text-gray-600 transition-all duration-300 ease-in-out">
                                <a href="{{ url('/salaries') }}" class="btn btn-primary">
                                    Salaries List
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="py-1">
            <div class="w-full px-[6.5rem] overflow-visible">
                <table class="w-full table-auto bg-white rounded-xl overflow-visible">
                    <thead>
                        <tr class="bg-blue-900 text-white">
                            <th class="p-6 rounded-tl-xl">ID</th>
                            <th class="p-6">Full Name</th>
                            <th class="p-6">Email</th>
                            <th class="p-6">Address</th>
                            <th class="p-6">Department</th>
                            <th class="p-6">Position</th>
                            <th class="p-6">Total Salary</th>
                            <th class="p-6">Status</th>
                            <th class="p-6 rounded-tr-xl">Action</th>
                        </tr>
                    </thead>
                    <tbody class="overflow-visible">
                        <tr>
                            <hr>
                        </tr>
                        @foreach ($employees as $employee)
                            <tr class="text-center">
                                <td class="p-4">
                                    <h6>{{ $employee->id }}</h6>
                                </td>
                                <td class="p-4">
                                    <h6>{{ $employee->nama_lengkap }}</h6>
                                </td>
                                <td class="p-4">
                                    <h6>{{ $employee->email }}</h6>
                                </td>
                                <td class="p-4">
                                    <h6>{{ $employee->alamat }}</h6>
                                </td>
                                <td class="p-4">
                                    <h6>{{ $employee->department?->nama_departemen ?? 'N/A' }}</h6>
                                </td>
                                <td class="p-4">
                                    <h6>{{ $employee->position?->nama_jabatan ?? 'N/A' }}</h6>
                                </td>
                                <td class="p-4">
                                    <h6>Rp
                                        {{ number_format(optional($employee->salary->first())->total_gaji ?? 0, 0, ',', '.') }}
                                    </h6>
                                </td>
                                <td class="p-4">
                                    <h6>{{ $employee->status }}</h6>
                                </td>
                                <td class="relative p-4 overflow-visible">
                                    <div class="flex gap-2">
                                        <a href="{{ route('employees.show', $employee->id) }}"
                                            class="p-2 hover:bg-gray-200 rounded">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M11 11h2v6h-2zM11 7h2v2h-2z"></path>
                                                <path
                                                    d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2m0 16H5V5h14z">
                                                </path>
                                            </svg>
                                        </a>

                                        <a href="{{ route('employees.edit', $employee->id) }}"
                                            class="p-2 hover:bg-gray-200 rounded">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                fill="currentColor" viewBox="0 0 24 24">
                                                <path
                                                    d="M5 21h14c1.1 0 2-.9 2-2v-7h-2v7H5V5h7V3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2">
                                                </path>
                                                <path
                                                    d="M7 13v3c0 .55.45 1 1 1h3c.27 0 .52-.11.71-.29l9-9a.996.996 0 0 0 0-1.41l-3-3a.996.996 0 0 0-1.41 0l-9.01 8.99A1 1 0 0 0 7 13">
                                                </path>
                                            </svg>
                                        </a>

                                        <form action="{{ route('employees.destroy', $employee->id) }}" method="POST"
                                            onsubmit="return confirm('Yakin mau hapus data ini?')" class="inline">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="p-2 hover:bg-red-200 rounded">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="red"
                                                    viewBox="0 0 24 24">
                                                    <path
                                                        d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2M5 19V5h14v14z">
                                                    </path>
                                                    <path
                                                        d="M14.83 7.76 12 10.59 9.17 7.76 7.76 9.17 10.59 12l-2.83 2.83 1.41 1.41L12 13.41l2.83 2.83 1.41-1.41L13.41 12l2.83-2.83z">
                                                    </path>
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</x-app-layout>
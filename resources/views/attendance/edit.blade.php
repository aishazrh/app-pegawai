<x-app-layout>
    <x-slot name="title">Edit Attendance's Data</x-slot>

    <main>
        <div class="pt-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100 text-center">
                        <div class="py-4">
                            <p class="font-black text-2xl">Edit Attendance's Data</p>
                        </div>

                        <div class="pt-2">
                            <form action="{{ route('attendance.update', $attendance->id) }}" method="POST"
                                class="card-text">
                                @csrf
                                @method('PUT')
                                <div class="flex items-center gap-4 mb-4">
                                    <label for="karyawan_id" class="w-40 font-medium">
                                        Employee ID:
                                    </label>

                                    <select name="karyawan_id" id="karyawan_id"
                                        class="flex-1 border border-gray-300 rounded-md p-2 focus:ring-indigo-500 focus:border-indigo-500"
                                        required onchange="updateEmployeeInfo()">
                                        <option value="" disabled selected>Choose Employee ID</option>
                                        @foreach($employees as $employee)
                                            <option value="{{ $employee->id }}" {{ old('karyawan_id', $attendance->karyawan_id) == $employee->id ? 'selected' : '' }}>
                                                {{ $employee->id }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="flex items-center gap-4 mb-4">
                                    <label for="nama_karyawan" class="w-40 font-medium">
                                        Full Name:
                                    </label>

                                    <input type="text" id="employee_name" name="employee_name"
                                        class="flex-1 border border-gray-300 rounded-md p-2 focus:ring-indigo-500 focus:border-indigo-500"
                                        readonly required>
                                </div>

                                <div class="flex items-center gap-4 mb-4">
                                    <label for="department" class="w-40 font-medium">
                                        Department:
                                    </label>

                                    <input type="text" id="department" name="department"
                                        class="flex-1 border border-gray-300 rounded-md p-2 focus:ring-indigo-500 focus:border-indigo-500"
                                        readonly required>
                                </div>

                                <div class="flex items-center gap-4 mb-4">
                                    <label for="tanggal" class="w-40 font-medium">
                                        Date:
                                    </label>

                                    <input type="date" id="tanggal" name="tanggal"
                                        value="{{ old('tanggal', $attendance->tanggal) }}"
                                        class="flex-1 border border-gray-300 rounded-md p-2 focus:ring-indigo-500 focus:border-indigo-500"
                                        style="width: 48rem">
                                </div>

                                <div class="flex items-center gap-4 mb-4">
                                    <label for="waktu_masuk" class="w-40 font-medium">
                                        Check In:
                                    </label>

                                    <input type="time" id="waktu_masuk" name="waktu_masuk"
                                        value="{{ old('waktu_masuk', $attendance->waktu_masuk) }}"
                                        class="flex-1 border border-gray-300 rounded-md p-2 focus:ring-indigo-500 focus:border-indigo-500"
                                        style="width: 48rem">
                                </div>

                                <div class="flex items-center gap-4 mb-4">
                                    <label for="waktu_keluar" class="w-40 font-medium">
                                        Check Out:
                                    </label>

                                    <input type="time" id="waktu_keluar" name="waktu_keluar"
                                        value="{{ old('waktu_keluar', $attendance->waktu_keluar) }}"
                                        class="flex-1 border border-gray-300 rounded-md p-2 focus:ring-indigo-500 focus:border-indigo-500"
                                        style="width: 48rem">
                                </div>

                                <div class="flex items-center gap-4 mb-4">
                                    <label for="status_absensi" class="w-40 font-medium">
                                        Status:
                                    </label>

                                    <select id="status_absensi" name="status_absensi"
                                        class="flex-1 border border-gray-300 rounded-md p-2 focus:ring-indigo-500 focus:border-indigo-500">

                                        <option value="">-- Pilih Status --</option>

                                        @php
                                            $currentStatus = old('status_absensi', $attendance->status_absensi);
                                        @endphp

                                        <option value="Hadir" {{ $currentStatus == 'Hadir' ? 'selected' : '' }}>Hadir
                                        </option>
                                        <option value="Izin" {{ $currentStatus == 'Izin' ? 'selected' : '' }}>Izin
                                        </option>
                                        <option value="Sakit" {{ $currentStatus == 'Sakit' ? 'selected' : '' }}>Sakit
                                        </option>
                                        <option value="Alfa" {{ $currentStatus == 'Alfa' ? 'selected' : '' }}>Alfa
                                        </option>

                                    </select>
                                </div>

                                <div class="flex justify-end gap-2 items-center mt-6">
                                    <a href="{{ url('/attendance') }}"
                                        class="px-6 py-2 bg-gray-400 text-white rounded-lg hover:bg-gray-500 transition">
                                        Cancel
                                    </a>

                                    <button type="submit"
                                        class="px-6 py-2 bg-blue-900 text-white rounded-lg hover:bg-gray-200 hover:text-black transition">
                                        Update
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            window.employees = @json($employees);
        </script>
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                updateEmployeeInfo();
            });
        </script>
        <script src="{{ asset(path: 'js/script.js') }}"></script>
    </main>
</x-app-layout>
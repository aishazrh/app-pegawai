<x-app-layout>
    <x-slot name="title">Create New Request</x-slot>

    <main>
        <div class="pt-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100 text-center">
                        <div class="py-4">
                            <p class="font-black text-2xl">Add New Report</p>
                        </div>

                        <div class="pt-2">
                            <form action="{{ route('pengajuans.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="flex items-center gap-4 mb-4">
                                    <label for="karyawan_id" class="w-40 font-medium">
                                        Employee ID:
                                    </label>

                                    <select name="karyawan_id" id="karyawan_id"
                                        class="flex-1 border border-gray-300 rounded-md p-2 focus:ring-indigo-500 focus:border-indigo-500"
                                        required onchange="updateEmployeeInfo()">
                                        <option value="" disabled selected>Choose Employee ID</option>
                                        @foreach($employees as $employee)
                                            <option value="{{ $employee->id }}">{{ $employee->id }}</option>
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
                                        Position:
                                    </label>

                                    <input type="text" id="position" name="position"
                                        class="flex-1 border border-gray-300 rounded-md p-2 focus:ring-indigo-500 focus:border-indigo-500"
                                        readonly required>
                                </div>

                                <div class="flex items-center gap-4 mb-4">
                                    <label for="tipe_pengajuan" class="w-40 font-medium">
                                        Request Type:
                                    </label>

                                    <select id="tipe_pengajuan" name="tipe_pengajuan"
                                        class="flex-1 border border-gray-300 rounded-md p-2 focus:ring-indigo-500 focus:border-indigo-500">
                                        <option value="">Pilih Tipe Pengajuan</option>
                                        <option value="sakit">Sakit</option>
                                        <option value="izin">Izin</option>
                                        <option value="cuti">Cuti</option>
                                        <option value="peningkatan_gaji">Peningkatan Gaji</option>
                                        <option value="pengunduran_diri">Pengunduran Diri</option>
                                    </select>
                                </div>

                                <div class="flex items-center gap-4 mb-4">
                                    <label for="tanggal_pengajuan" class="w-40 font-medium">
                                        Request Date:
                                    </label>

                                    <input type="date" id="tanggal_pengajuan" name="tanggal_pengajuan"
                                        class="flex-1 border border-gray-300 rounded-md p-2 focus:ring-indigo-500 focus:border-indigo-500">
                                </div>

                                <div class="flex items-center gap-4 mb-4">
                                    <label for="dokumen" class="w-40 font-medium">
                                        Document:
                                    </label>

                                    <input type="file" id="dokumen" name="dokumen"
                                        class="flex-1 border border-gray-300 rounded-md p-2 focus:ring-indigo-500 focus:border-indigo-500">
                                </div>

                                <div class="font-black">
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
                                </div>

                                <div class="flex justify-end gap-2 items-center mt-6">
                                    <a href="{{ url('/reports') }}"
                                        class="px-6 py-2 bg-gray-400 text-white rounded-lg hover:bg-gray-500 transition">
                                        Cancel
                                    </a>

                                    <button type="submit"
                                        class="px-6 py-2 bg-blue-900 text-white rounded-lg hover:bg-gray-200 hover:text-black transition">
                                        Submit
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
        <script src="{{ asset('js/script.js') }}"></script>
    </main>
</x-app-layout>
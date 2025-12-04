<x-app-layout>
    <x-slot name="title">Create New Employee</x-slot>

    <main>
        <div class="pt-8">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100 text-center">
                        <div class="py-4">
                            <p class="font-black text-2xl">Create New Employee</p>
                        </div>

                        <div class="pt-2">
                            <form action="{{ route('employees.store') }}" method="POST">
                                @csrf
                                <div class="flex items-center gap-4 mb-4">
                                    <label for="nama_lengkap" class="w-40 font-medium">
                                        Full Name:
                                    </label>

                                    <input type="text" id="nama_lengkap" name="nama_lengkap"
                                        class="flex-1 border border-gray-300 rounded-md p-2 focus:ring-indigo-500 focus:border-indigo-500">
                                </div>

                                <div class="flex items-center gap-4 mb-4">
                                    <label for="email" class="w-40 font-medium">
                                        Email:
                                    </label>

                                    <input type="email" id="email" name="email"
                                        class="flex-1 border border-gray-300 rounded-md p-2 focus:ring-indigo-500 focus:border-indigo-500">
                                </div>

                                <div class="flex items-center gap-4 mb-4">
                                    <label for="nomor_telepon" class="w-40 font-medium">
                                        Phone Number:
                                    </label>

                                    <input type="text" id="nomor_telepon" name="nomor_telepon"
                                        class="flex-1 border border-gray-300 rounded-md p-2 focus:ring-indigo-500 focus:border-indigo-500">
                                </div>

                                <div class="flex items-center gap-4 mb-4">
                                    <label for="tanggal_lahir" class="w-40 font-medium">
                                        Date of Birth:
                                    </label>

                                    <input type="date" id="tanggal_lahir" name="tanggal_lahir"
                                        class="flex-1 border border-gray-300 rounded-md p-2 focus:ring-indigo-500 focus:border-indigo-500">
                                </div>

                                <div class="flex items-center gap-4 mb-4">
                                    <label for="alamat" class="w-40 font-medium">
                                        Address:
                                    </label>

                                    <input id="alamat" name="alamat" class="flex-1 border border-gray-300 rounded-md p-2
                                        focus:ring-indigo-500 focus:border-indigo-500">
                                </div>

                                <div class="flex items-center gap-4 mb-4">
                                    <label for="tanggal_masuk" class="w-40 font-medium">
                                        Entry Date:
                                    </label>

                                    <input type="date" id="tanggal_masuk" name="tanggal_masuk"
                                        class="flex-1 border border-gray-300 rounded-md p-2 focus:ring-indigo-500 focus:border-indigo-500">
                                </div>

                                <div class="flex items-center gap-4 mb-4">
                                    <label for="department_id" class="w-40 font-medium">
                                        Department:
                                    </label>

                                    <select name="department_id"
                                        class="flex-1 border border-gray-300 rounded-md p-2 focus:ring-indigo-500 focus:border-indigo-500"
                                        required>
                                        <option value="" disabled selected>Pilih Departemen</option>
                                        @foreach($departments as $department)
                                            <option value="{{ $department->id }}">
                                                {{ $department->nama_departemen }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="flex items-center gap-4 mb-4">
                                    <label for="jabatan_id" class="w-40 font-medium">
                                        Position:
                                    </label>

                                    <select name="jabatan_id"
                                        class="flex-1 border border-gray-300 rounded-md p-2 focus:ring-indigo-500 focus:border-indigo-500"
                                        required onchange="updateSalary()">
                                        <option value="" disabled selected>Pilih Posisi</option>
                                        @foreach($positions as $position)
                                            <option value="{{ $position->id }}" data-salary="{{ $position->gaji_pokok }}">
                                                {{ $position->nama_jabatan }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="flex items-center gap-4 mb-4">
                                    <label for="status" class="w-40 font-medium">
                                        Status:
                                    </label>

                                    <select id="status" name="status"
                                        class="flex-1 border border-gray-300 rounded-md p-2 focus:ring-indigo-500 focus:border-indigo-500"
                                        style="width: 48rem">
                                        <option value="Aktif">
                                            <h6>Aktif</h6>
                                        </option>
                                        <option value="nonaktif">
                                            <h6>Nonaktif</h6>
                                        </option>
                                    </select>
                                </div>

                                <div class="flex justify-end gap-2 items-center mt-6">
                                    <a href="{{ url('/employees') }}"
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
    </main>
</x-app-layout>
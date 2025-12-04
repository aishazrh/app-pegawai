<x-app-layout>
    <x-slot name="title">Employee Detail</x-slot>

    <main>
        <div class="pt-8">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <div class="py-4 text-center">
                            <p class="font-black text-3xl">Employee Info</p>
                        </div>

                        <div class="pb-4">
                            <p class="font-black text-2xl">Personal</p>

                            <div class="flex items-center gap-4 mb-2">
                                <label for="id" class="w-40 font-medium">
                                    Employee ID:
                                </label>

                                <input type="text" name="nama_lengkap" readonly value="{{ $employee->id }}"
                                    class="flex-1 border border-gray-300 rounded-md p-2 focus:ring-indigo-500 focus:border-indigo-500">
                            </div>

                            <div class="flex items-center gap-4 mb-2">
                                <label for="nama_lengkap" class="w-40 font-medium">
                                    Full Name:
                                </label>

                                <input type="text" name="nama_lengkap" readonly value="{{ $employee->nama_lengkap }}"
                                    class="flex-1 border border-gray-300 rounded-md p-2 focus:ring-indigo-500 focus:border-indigo-500">
                            </div>

                            <div class="flex items-center gap-4 mb-2">
                                <label for="email" class="w-40 font-medium">
                                    Email:
                                </label>

                                <input type="email" name="email" readonly value="{{ $employee->email }}"
                                    class="flex-1 border border-gray-300 rounded-md p-2 focus:ring-indigo-500 focus:border-indigo-500">
                            </div>

                            <div class="flex items-center gap-4 mb-2">
                                <label for="nomor_telepon" class="w-40 font-medium">
                                    Phone Number:
                                </label>

                                <input type="number" name="nomor_telepon" readonly
                                    value="{{ $employee->nomor_telepon }}"
                                    class="flex-1 border border-gray-300 rounded-md p-2 focus:ring-indigo-500 focus:border-indigo-500">
                            </div>

                            <div class="flex items-center gap-4 mb-2">
                                <label for="tanggal_lahir" class="w-40 font-medium">
                                    Date of Birth:
                                </label>

                                <input type="date" name="tanggal_lahir" readonly value="{{ $employee->tanggal_lahir }}"
                                    class="flex-1 border border-gray-300 rounded-md p-2 focus:ring-indigo-500 focus:border-indigo-500">
                            </div>

                            <div class="flex items-center gap-4 mb-2">
                                <label for="alamat" class="w-40 font-medium">
                                    Address:
                                </label>

                                <input type="text" name="alamat" readonly value="{{ $employee->alamat }}"
                                    class="flex-1 border border-gray-300 rounded-md p-2 focus:ring-indigo-500 focus:border-indigo-500">
                            </div>
                        </div>

                        <div class="pb-4">
                            <p class="font-black text-2xl">Work</p>

                            <div class="flex items-center gap-4 mb-2">
                                <label for="tanggal_masuk" class="w-40 font-medium">
                                    Entry Date:
                                </label>

                                <input type="date" name="tanggal_masuk" readonly value="{{ $employee->tanggal_masuk }}"
                                    class="flex-1 border border-gray-300 rounded-md p-2 focus:ring-indigo-500 focus:border-indigo-500">
                            </div>

                            <div class="flex items-center gap-4 mb-2">
                                <label for="department_id" class="w-40 font-medium">
                                    Department:
                                </label>

                                <input type="text" name="department_id" readonly
                                    value="{{ $employee->department->nama_departemen }}"
                                    class="flex-1 border border-gray-300 rounded-md p-2 focus:ring-indigo-500 focus:border-indigo-500">
                            </div>

                            <div class="flex items-center gap-4 mb-2">
                                <label for="position_id" class="w-40 font-medium">
                                    Position:
                                </label>

                                <input type="text" name="position_id" readonly
                                    value="{{ $employee->position->nama_jabatan }}"
                                    class="flex-1 border border-gray-300 rounded-md p-2 focus:ring-indigo-500 focus:border-indigo-500">
                            </div>

                            <div class="flex items-center gap-4 mb-2">
                                <label for="status" class="w-40 font-medium">
                                    Status:
                                </label>

                                <input type="text" name="status" readonly value="{{ $employee->status }}"
                                    class="flex-1 border border-gray-300 rounded-md p-2 focus:ring-indigo-500 focus:border-indigo-500">
                            </div>
                        </div>

                        <div class="pb-4">
                            <p class="font-black text-2xl">Salary</p>

                            <div class="flex items-center gap-4 my-4">
                                <label for="salary" class="w-40 font-medium">
                                    Basic Salary:
                                </label>

                                @php
                                    $salaryData = $employee->salary->first();
                                    $gajiPokok = $salaryData->gaji_pokok ?? 0;
                                @endphp

                                Rp {{ number_format($gajiPokok, 0, ',', '.') }}
                            </div>

                            <div class="flex items-center gap-4 my-4">
                                <label for="tunjangan" class="w-40 font-medium">
                                    Allowance:
                                </label>

                                @php
                                    $tunjangan = $salaryData->tunjangan ?? 0;
                                @endphp

                                Rp {{ number_format($tunjangan, 0, ',', '.') }}

                            </div>

                            <div class="flex items-center gap-4 my-4">
                                <label for="potongan" class="w-40 font-medium">
                                    Cut:
                                </label>

                                @php
                                    $potongan = $salaryData->potongan ?? 0;
                                @endphp

                                Rp {{ number_format($potongan, 0, ',', '.') }}
                            </div>

                            <div class="flex items-center gap-4 mt-4">
                                <label for="total_gaji" class="w-40 font-medium">
                                    Total Salary:
                                </label>

                                @php
                                    $salaryData = $employee->salary->first();

                                    $gaji_pokok = $salaryData->gaji_pokok ?? 0;
                                    $tunjangan = $salaryData->tunjangan ?? 0;
                                    $potongan = $salaryData->potongan ?? 0;

                                    $total_gaji = $gaji_pokok + $tunjangan - $potongan;
                                @endphp

                                Rp {{ number_format($total_gaji, 0, ',', '.') }}
                            </div>
                        </div>

                        <div class="py-4">
                            <p class="font-black text-2xl">Data Info</p>

                            <div class="flex items-center gap-4 my-4">
                                <label for="created_at" class="w-40 font-medium">
                                    Created At:
                                </label>

                                <p>{{ $employee->created_at }}</p>
                            </div>

                            <div class="flex items-center gap-4 my-4">
                                <label for="updated_at" class="w-40 font-medium">
                                    Updated At:
                                </label>

                                <p>{{ $employee->updated_at }}</p>
                            </div>
                        </div>

                        <div class="justify-center">
                            <a href="{{ url('/employees') }}"
                                class="px-[35rem] py-2 bg-gray-400 text-white rounded-lg hover:bg-gray-500 transition">
                                Cancel
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="{{ asset('js/script.js') }}"></script>
    </main>
</x-app-layout>
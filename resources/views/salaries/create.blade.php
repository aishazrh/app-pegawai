<x-app-layout>
    <x-slot name="title">Create New Salary</x-slot>

    <main>
        <div class="py-24">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100 text-center">
                        <div class="py-4">
                            <p class="font-black text-2xl">Set New Salary</p>
                        </div>

                        <div class="pt-2">
                            <form action="{{ route('salaries.store') }}" method="POST">
                                @csrf
                                <div class="flex items-center gap-4 mb-4">
                                    <label for="karyawan_id" class="w-40 font-medium">
                                        Employee ID:
                                    </label>

                                    <select name="karyawan_id" id="karyawan_id"
                                        class="flex-1 border border-gray-300 rounded-md p-2 focus:ring-indigo-500 focus:border-indigo-500"
                                        required onchange="updateEmployeeInfo()">
                                        <option value="" disabled selected>Pilih ID Karyawan</option>
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
                                    <label for="bulan" class="w-40 font-medium">
                                        Month:
                                    </label>

                                    <input type="month" id="bulan" name="bulan"
                                        class="flex-1 border border-gray-300 rounded-md p-2 focus:ring-indigo-500 focus:border-indigo-500"
                                        required>
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
                                    <label for="position" class="w-40 font-medium">
                                        Position:
                                    </label>

                                    <input type="text" id="position" name="position"
                                        class="flex-1 border border-gray-300 rounded-md p-2 focus:ring-indigo-500 focus:border-indigo-500"
                                        readonly required>
                                </div>

                                <div class="flex items-center gap-4 mb-4">
                                    <label for="salary" class="w-40 font-medium">
                                        Basic Salary:
                                    </label>

                                    <input type="text" id="salary" name="gaji_pokok"
                                        class="flex-1 border border-gray-300 rounded-md p-2 focus:ring-indigo-500 focus:border-indigo-500"
                                        readonly required>
                                </div>

                                <div class="flex items-center gap-4 mb-4">
                                    <label for="tunjangan" class="w-40 font-medium">
                                        Allowance:
                                    </label>

                                    <input type="number" id="tunjangan" name="tunjangan"
                                        class="flex-1 border border-gray-300 rounded-md p-2 focus:ring-indigo-500 focus:border-indigo-500">
                                </div>

                                <div class="flex items-center gap-4 mb-4">
                                    <label for="potongan" class="w-40 font-medium">
                                        Cut:
                                    </label>

                                    <input type="number" id="potongan" name="potongan"
                                        class="flex-1 border border-gray-300 rounded-md p-2 focus:ring-indigo-500 focus:border-indigo-500">
                                </div>

                                <div class="flex justify-end gap-2 items-center mt-6">
                                    <a href="{{ url('/salaries') }}"
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
<x-app-layout>
    <x-slot name="title">Create New Report</x-slot>

    <main>
        <div class="pt-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100 text-center">
                        <div class="py-4">
                            <p class="font-black text-2xl">Add New Report</p>
                        </div>

                        <div class="pt-2">
                            <form action="{{ route('reports.store') }}" method="POST">
                                @csrf
                                <div class="flex items-center gap-4 mb-4">
                                    <label for="employee_id" class="w-40 font-medium">
                                        Employee ID:
                                    </label>

                                    <select name="employee_id" id="karyawan_id"
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
                                    <label for="bulan" class="w-40 font-medium">
                                        Month:
                                    </label>

                                    <input type="month" id="bulan" name="bulan"
                                        class="flex-1 border border-gray-300 rounded-md p-2 focus:ring-indigo-500 focus:border-indigo-500">
                                </div>

                                <div class="flex items-center gap-4 mb-4">
                                    <label for="waktu_keluar" class="w-40 font-medium">
                                        Performance Rate:
                                    </label>

                                    <input type="range" id="rating_kinerja" name="rating_kinerja" min="1" max="10"
                                        value="5" style="width: 48rem;"
                                        oninput="document.getElementById('rating_value').innerText = this.value"
                                        required>
                                    <div>
                                        <h6>
                                            Rating: <span id="rating_value">5</span>
                                        </h6>
                                    </div>
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
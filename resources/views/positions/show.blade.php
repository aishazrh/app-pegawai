<x-app-layout>
    <x-slot name="title">Position Detail</x-slot>

    <main>
        <div class="pt-16">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <div class="py-4 text-center">
                            <p class="font-black text-xl">Position Info</p>
                        </div>

                        <div class="pb-4 pt-6">
                            <div class="flex items-center gap-4 mb-2">
                                <label for="id" class="w-40 font-medium">
                                    Position ID:
                                </label>

                                <input type="text" name="position_id" readonly value="{{ $position->id }}"
                                    class="flex-1 border border-gray-300 rounded-md p-2 focus:ring-indigo-500 focus:border-indigo-500">
                            </div>

                            <div class="flex items-center gap-4 mb-2">
                                <label for="nama_jabatan" class="w-40 font-medium">
                                    Position Name:
                                </label>

                                <input type="text" name="nama_jabatan" readonly value="{{ $position->nama_jabatan }}"
                                    class="flex-1 border border-gray-300 rounded-md p-2 focus:ring-indigo-500 focus:border-indigo-500">
                            </div>

                            <div class="flex items-center gap-4 mb-2">
                                <label for="gaji_pokok" class="w-40 font-medium">
                                    Basic Salary:
                                </label>

                                <input type="text" name="gaji_pokok" readonly
                                    value="Rp {{ number_format($position->gaji_pokok, 0, ',', '.') }}"
                                    class="flex-1 border border-gray-300 rounded-md p-2 focus:ring-indigo-500 focus:border-indigo-500">
                            </div>

                            <div class="flex items-center gap-4 mb-2">
                                <label for="created_at" class="w-40 font-medium">
                                    Created At:
                                </label>

                                <input type="text" name="created_at" readonly value="{{ $position->created_at }}"
                                    class="flex-1 border border-gray-300 rounded-md p-2 focus:ring-indigo-500 focus:border-indigo-500">
                            </div>

                            <div class="flex items-center gap-4 mb-2">
                                <label for="updated_at" class="w-40 font-medium">
                                    Updated At:
                                </label>

                                <input type="text" name="updated_at" readonly value="{{ $position->updated_at }}"
                                    class="flex-1 border border-gray-300 rounded-md p-2 focus:ring-indigo-500 focus:border-indigo-500">
                            </div>

                            <div class="justify-center pt-12">
                                <a href="{{ url('/positions') }}"
                                    class="px-[35rem] py-2 bg-gray-400 text-white rounded-lg hover:bg-gray-500 transition">
                                    Cancel
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="{{ asset('js/script.js') }}"></script>
    </main>
</x-app-layout>
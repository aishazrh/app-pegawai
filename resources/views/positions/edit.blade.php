<x-app-layout>
    <x-slot name="title">Edit Position's Data</x-slot>

    <main>
        <div class="pt-8">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100 text-center">
                        <div class="py-4">
                            <p class="font-black text-2xl">Edit Position's Data</p>
                        </div>

                        <div class="pt-2">
                            <form action="{{ route('positions.update', $position->id) }}" method="POST"
                                class="card-text">
                                @csrf
                                @method('PUT')
                                <div class="flex items-center gap-4 mb-4">
                                    <label for="nama_jabatan" class="w-40 font-medium">
                                        Position Name:
                                    </label>

                                    <input type="text" id="nama_jabatan" name="nama_jabatan"
                                        value="{{ old('nama_jabatan', $position->nama_jabatan) }}"
                                        class="flex-1 border border-gray-300 rounded-md p-2 focus:ring-indigo-500 focus:border-indigo-500">
                                </div>

                                <div class="flex items-center gap-4 mb-4">
                                    <label for="gaji_pokok" class="w-40 font-medium">
                                        Basic Salary:
                                    </label>

                                    <input type="number" id="gaji_pokok" name="gaji_pokok"
                                        value="{{ old('gaji_pokok', $position->gaji_pokok) }}"
                                        class="flex-1 border border-gray-300 rounded-md p-2 focus:ring-indigo-500 focus:border-indigo-500">
                                </div>

                                <div class="flex justify-end gap-2 items-center mt-6">
                                    <a href="{{ url('/positions') }}"
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
    </main>
</x-app-layout>
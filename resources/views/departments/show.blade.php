<x-app-layout>
    <x-slot name="title">Department Detail</x-slot>

    <main>
        <div class="pt-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <div class="py-4 text-center">
                            <p class="font-black text-3xl">Department Info</p>
                        </div>

                        <div class="pb-4">
                            <p class="font-black text-2xl">Department</p>

                            <div class="flex items-center gap-4 mb-2">
                                <label for="id" class="w-40 font-medium">
                                    Department ID:
                                </label>

                                <input type="text" name="id" readonly value="{{ $department->id }}"
                                    class="flex-1 border border-gray-300 rounded-md p-2 focus:ring-indigo-500 focus:border-indigo-500">
                            </div>

                            <div class="flex items-center gap-4 mb-2">
                                <label for="nama_departemen" class="w-40 font-medium">
                                    Department Name:
                                </label>

                                <input type="text" name="nama_departemen" readonly
                                    value="{{ $department->nama_departemen }}"
                                    class="flex-1 border border-gray-300 rounded-md p-2 focus:ring-indigo-500 focus:border-indigo-500">
                            </div>

                            <div class="flex items-center gap-4 mb-2">
                                <label for="jumlah_staff" class="w-40 font-medium">
                                    Staffs:
                                </label>

                                <input type="text" name="jumlah_staff" readonly
                                    value="{{ $department->employees->count()  }}"
                                    class="flex-1 border border-gray-300 rounded-md p-2 focus:ring-indigo-500 focus:border-indigo-500">
                            </div>

                            <div class="py-4">
                            <p class="font-black text-2xl">Data Info</p>

                            <div class="flex items-center gap-4 my-4">
                                <label for="created_at" class="w-40 font-medium">
                                    Created At:
                                </label>

                                <p>{{ $department->created_at }}</p>
                            </div>

                            <div class="flex items-center gap-4 my-4">
                                <label for="updated_at" class="w-40 font-medium">
                                    Updated At:
                                </label>

                                <p>{{ $department->updated_at }}</p>
                            </div>

                            <div class="justify-center pt-12">
                                <a href="{{ url('/departments') }}"
                                    class="px-[35rem] py-2 bg-gray-400 text-white rounded-lg hover:bg-gray-500 transition">
                                    Cancel
                                </a>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="{{ asset('js/script.js') }}"></script>
    </main>
</x-app-layout>
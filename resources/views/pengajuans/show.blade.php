<x-app-layout>
    <x-slot name="title">Request Detail</x-slot>

    <main>
        <div class="pt-10">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <div class="py-4 text-center">
                            <p class="font-black text-3xl">Report Info</p>
                        </div>

                        <div class="pb-4">
                            <p class="font-black text-2xl">Personal</p>

                            <div class="flex items-center gap-4 mb-2">
                                <label for="karyawan_id" class="w-40 font-medium">
                                    Employee ID:
                                </label>

                                <input type="text" name="karyawan_id" readonly value="{{ $pengajuan->karyawan->id }}"
                                    class="flex-1 border border-gray-300 rounded-md p-2 focus:ring-indigo-500 focus:border-indigo-500">
                            </div>

                            <div class="flex items-center gap-4 mb-2">
                                <label for="nama_lengkap" class="w-40 font-medium">
                                    Full Name:
                                </label>

                                <input type="text" name="nama_lengkap" readonly
                                    value="{{ $pengajuan->karyawan->nama_lengkap }}"
                                    class="flex-1 border border-gray-300 rounded-md p-2 focus:ring-indigo-500 focus:border-indigo-500">
                            </div>

                            <div class="flex items-center gap-4 mb-2">
                                <label for="department" class="w-40 font-medium">
                                    Department:
                                </label>

                                <input type="text" name="department" readonly
                                    value="{{ $pengajuan->karyawan->department->nama_departemen }}"
                                    class="flex-1 border border-gray-300 rounded-md p-2 focus:ring-indigo-500 focus:border-indigo-500">
                            </div>

                            <div class="flex items-center gap-4 mb-2">
                                <label for="position" class="w-40 font-medium">
                                    Position:
                                </label>

                                <input type="text" name="position" readonly
                                    value="{{ $pengajuan->karyawan->position->nama_jabatan }}"
                                    class="flex-1 border border-gray-300 rounded-md p-2 focus:ring-indigo-500 focus:border-indigo-500">
                            </div>
                        </div>

                        <div class="pb-4">
                            <p class="font-black text-2xl">Request</p>

                            <div class="flex items-center gap-4 mb-2">
                                <label for="id" class="w-40 font-medium">
                                    Request ID:
                                </label>

                                <input type="text" name="id" readonly value="{{ $pengajuan->id }}"
                                    class="flex-1 border border-gray-300 rounded-md p-2 focus:ring-indigo-500 focus:border-indigo-500">
                            </div>

                            <div class="flex items-center gap-4 mb-2">
                                <label for="tanggal_pengajuan" class="w-40 font-medium">
                                    Date:
                                </label>

                                <input type="date" name="tanggal_pengajuan" readonly
                                    value="{{ $pengajuan->tanggal_pengajuan }}"
                                    class="flex-1 border border-gray-300 rounded-md p-2 focus:ring-indigo-500 focus:border-indigo-500">
                            </div>

                            <div class="flex items-center gap-4 mb-2">
                                <label for="tipe_pengajuan" class="w-40 font-medium">
                                    Request Type:
                                </label>

                                <input type="text" name="tipe_pengajuan" readonly
                                    value="{{ $pengajuan->tipe_pengajuan }}"
                                    class="flex-1 border border-gray-300 rounded-md p-2 focus:ring-indigo-500 focus:border-indigo-500">
                            </div>

                            <div class="flex items-center gap-4 my-4">
                                <label for="dokumen" class="w-40 font-medium">
                                    Document:
                                </label>

                                @if($pengajuan->dokumen)
                                    <a href="{{ Storage::url($pengajuan->dokumen) }}" target="_blank"
                                        style="font-size: medium">
                                        See Document
                                    </a>
                                @else
                                    -
                                @endif
                            </div>
                        </div>

                        <div class="py-4">
                            <p class="font-black text-2xl">Data Info</p>

                            <div class="flex items-center gap-4 my-4">
                                <label for="created_at" class="w-40 font-medium">
                                    Created At:
                                </label>

                                <p>{{ $pengajuan->created_at }}</p>
                            </div>

                            <div class="flex items-center gap-4 my-4">
                                <label for="updated_at" class="w-40 font-medium">
                                    Updated At:
                                </label>

                                <p>{{ $pengajuan->updated_at }}</p>
                            </div>
                        </div>

                        <div class="justify-center">
                            <a href="{{ url('/pengajuans') }}"
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
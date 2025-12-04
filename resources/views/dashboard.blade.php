<x-app-layout>
    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div>
                        <p class="font-black text-2xl">Welcome, {{ Auth::user()->name }}!</p>
                    </div>
                    <div class="pt-2">
                        <p>
                            Manage your start-up company from end-to-end with this comprehensive App Pegawai!
                            Everything you need is right here: from overseeing individual employee profiles and
                            structuring complex departments, to generating insightful, real-time management reports.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="pb-3">
                <p class="font-black text-xl">Start managing your company!</p>
            </div>

            <div class="grid grid-cols-6 gap-4">

                <div class="col-span-3">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900 dark:text-gray-100 text-center">
                            <img src="{{ asset('images/employees.png') }}" class="w-auto h-20 mx-auto" alt="employees">
                            <div class="bg-blue-900 mt-3 py-2 sm:rounded-lg transition duration-150 hover:bg-gray-200">
                                <a href="{{ url('/employees') }}" class="text-white hover:text-black">
                                    Manage Employees
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-span-3">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900 dark:text-gray-100 text-center">
                            <img src="{{ asset('images/departments.png') }}" class="w-auto h-20 mx-auto"
                                alt="departments">
                            <div class="bg-blue-900 mt-3 py-2 sm:rounded-lg transition duration-150 hover:bg-gray-200">
                                <a href="{{ url('/departments') }}" class="text-white hover:text-black">
                                    Manage Departments
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-span-2">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900 dark:text-gray-100 text-center">
                            <img src="{{ asset('images/attendance.png') }}" class="w-auto h-20 mx-auto"
                                alt="attendance">
                            <div class="bg-blue-900 mt-3 py-2 sm:rounded-lg transition duration-150 hover:bg-gray-200">
                                <a href="{{ url('/attendance') }}" class="text-white hover:text-black">
                                    See Attendance List
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-span-2">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900 dark:text-gray-100 text-center">
                            <img src="{{ asset('images/reports.png') }}" class="w-auto h-20 mx-auto" alt="reports">
                            <div class="bg-blue-900 mt-3 py-2 sm:rounded-lg transition duration-150 hover:bg-gray-200">
                                <a href="{{ url('/reports') }}" class="text-white hover:text-black">
                                    See Report List
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-span-2">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900 dark:text-gray-100 text-center">
                            <img src="{{ asset('images/requests.png') }}" class="w-auto h-20 mx-auto" alt="requests">
                            <div class="bg-blue-900 mt-3 py-2 sm:rounded-lg transition duration-150 hover:bg-gray-200">
                                <a href="{{ url('/pengajuans') }}" class="text-white hover:text-black">
                                    See Request List
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>
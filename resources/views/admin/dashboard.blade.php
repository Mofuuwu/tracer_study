@include('components.start-html')

<div class="flex bg-gray-100 min-h-screen">
    @include('components.admin.sidebar')
    
    <div class="w-full flex-1 p-6 min-h-screen">
        <h1 class="text-2xl font-bold text-gray-800 mb-4">Dashboard Admin</h1>
        <div class="mt-6 flex justify-end">
            <a href="{{ route('logout') }}" class="bg-red-600 text-white px-5 py-3 rounded-lg shadow-md hover:bg-red-700 transition">
                Logout
            </a>
        </div>

        <!-- Ringkasan Data -->
        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-4">
            <div class="bg-white p-6 rounded-lg shadow-md border border-gray-200">
                <h2 class="text-lg font-semibold text-gray-700">Total Alumni</h2>
                <p class="text-2xl font-bold text-blue-600">150</p>

            </div>
            <div class="bg-white p-6 rounded-lg shadow-md border border-gray-200">
                <h2 class="text-lg font-semibold text-gray-700">Menunggu Verifikasi</h2>
                <p class="text-2xl font-bold text-red-600">5</p>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-md border border-gray-200">
                <h2 class="text-lg font-semibold text-gray-700">Total Kuisioner</h2>
                <p class="text-2xl font-bold text-blue-600">30</p>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-md border border-gray-200">
                <h2 class="text-lg font-semibold text-gray-700">Kuisioner Diisi</h2>
                <p class="text-2xl font-bold text-green-600">22</p>
            </div>

        </div>

        <!-- Log Aktivitas -->
        <div class="mt-6 bg-white p-6 rounded-lg shadow-md border border-gray-200">
            <h2 class="text-lg font-semibold text-gray-700 mb-4">Log Pengisian Kuisioner</h2>

            <!-- Container Scroll untuk Mobile -->
            <div class="overflow-x-auto">
                <table class="w-full border-collapse min-w-[500px]">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="text-left p-2 border">Waktu</th>
                            <th class="text-left p-2 border">User</th>
                            <th class="text-left p-2 border">Kuisioner Diisi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-t">
                            <td class="p-2 border">2025-03-07 10:30</td>
                            <td class="p-2 border">John Doe Willingsmith</td>
                            <td class="p-2 border">Hfhudsfufy fhyyfgvbygfr bfbyfr</td>
                        </tr>
                        <tr class="border-t">
                            <td class="p-2 border">2025-03-07 09:45</td>
                            <td class="p-2 border">Jane Smith</td>
                            <td class="p-2 border">Mendaftar akun</td>
                        </tr>
                        <tr class="border-t">
                            <td class="p-2 border">2025-03-07 08:20</td>
                            <td class="p-2 border">Admin</td>
                            <td class="p-2 border">Verifikasi alumni</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>


    </div>
</div>

@include('components.end-html')
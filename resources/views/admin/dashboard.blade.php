@include('components.start-html')

<div class="flex bg-gray-100 min-h-screen md:justify-end">
    @include('components.admin.sidebar')

    <div class="px-6 py-6 w-full md:w-[70%] lg:w-[80%] bg-gray-100 min-h-screen ">
        <h1 class="text-2xl font-bold text-gray-800 mb-4">Dashboard Admin</h1>
        <div class="mt-6 flex justify-end">
            <a href="{{ route('logout') }}" class="bg-red-600 text-white px-5 py-3 rounded-lg shadow-md hover:bg-red-700 transition">
                Logout
            </a>
        </div>

        <!-- Ringkasan Data -->
        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-4">
            <div class="bg-white p-6 rounded-lg shadow-md border border-gray-200">
                <h2 class="text-lg font-semibold text-gray-700">Total Mahasiswa</h2>
                <p class="text-2xl font-bold text-blue-600">{{ $total_mahasiswa }}</p>

            </div>
            <div class="bg-white p-6 rounded-lg shadow-md border border-gray-200">
                <h2 class="text-lg font-semibold text-gray-700">Mahasiswa Aktif</h2>
                <p class="text-2xl font-bold text-blue-600">{{ $mahasiswa_aktif }}</p>

            </div>
            <div class="bg-white p-6 rounded-lg shadow-md border border-gray-200">
                <h2 class="text-lg font-semibold text-gray-700">Alumni</h2>
                <p class="text-2xl font-bold text-blue-600">{{ $alumni }}</p>

            </div>
            <div class="bg-white p-6 rounded-lg shadow-md border border-gray-200">
                <h2 class="text-lg font-semibold text-gray-700">Menunggu Verifikasi</h2>
                <p class="text-2xl font-bold text-red-600">{{ $mahasiswa_menunggu_verifikasi }}</p>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-md border border-gray-200">
                <h2 class="text-lg font-semibold text-gray-700">Total Kuisioner</h2>
                <p class="text-2xl font-bold text-blue-600">{{ $total_kuisioner }}</p>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-md border border-gray-200">
                <h2 class="text-lg font-semibold text-gray-700">Kuisioner Diisi</h2>
                <p class="text-2xl font-bold text-green-600">{{ $kuisioner_diisi }}</p>
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
                        @foreach ($log_aktivitas as $log)
                        <tr class="border-t">
                            <td class="p-2 border">{{ $log->created_at->translatedFormat('l, d F Y | H:i') }}</td>
                            <td class="p-2 border">{{ $log->mahasiswa->nama ?? 'Tidak Diketahui' }}</td>
                            <td class="p-2 border">{{ $log->kuisioner->judul ?? 'Tanpa Judul' }}</td>
                        </tr> 
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div>

@include('components.end-html')
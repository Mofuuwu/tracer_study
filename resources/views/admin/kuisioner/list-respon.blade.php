@include('components.start-html')

<div class="flex bg-gray-100 min-h-screen">
    @include('components.admin.sidebar')

    <section class="w-full flex-1 p-6">
        <h1 class="text-2xl font-bold">Respon Kuisioner</h1>
        <p class="text-gray-600 mb-6">Klik mahasiswa untuk melihat jawaban kuisioner mereka.</p>

        <!-- Tombol Lihat Statistik -->
        <div class="mb-6">
            <a href="/admin/respon-kuisioner/id/statistik"
                class="block bg-blue-600 text-white text-center font-semibold py-3 px-6 rounded-lg shadow-md hover:bg-blue-700 transition">
                📊 Lihat Statistik
            </a>
        </div>

        <!-- Daftar Mahasiswa Statis -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            <a href="/admin/respon-kuisioner/id/siswa"
                class="block bg-white shadow-md p-4 rounded-lg border-l-4 border-blue-500 hover:bg-blue-50 transition">
                <div class="flex items-center space-x-4">
                    <div class="bg-blue-500 text-white w-12 h-12 flex items-center justify-center rounded-full text-lg font-bold">
                        A
                    </div>
                    <div>
                        <h2 class="text-lg font-semibold text-gray-900">Andi Wijaya</h2>
                        <p class="text-gray-500">NIM: 202101001</p>
                    </div>
                </div>
            </a>

            <a href="/admin/jawaban-kuisioner/2"
                class="block bg-white shadow-md p-4 rounded-lg border-l-4 border-blue-500 hover:bg-blue-50 transition">
                <div class="flex items-center space-x-4">
                    <div class="bg-blue-500 text-white w-12 h-12 flex items-center justify-center rounded-full text-lg font-bold">
                        B
                    </div>
                    <div>
                        <h2 class="text-lg font-semibold text-gray-900">Budi Santoso</h2>
                        <p class="text-gray-500">NIM: 202101002</p>
                    </div>
                </div>
            </a>

            <a href="/admin/jawaban-kuisioner/3"
                class="block bg-white shadow-md p-4 rounded-lg border-l-4 border-blue-500 hover:bg-blue-50 transition">
                <div class="flex items-center space-x-4">
                    <div class="bg-blue-500 text-white w-12 h-12 flex items-center justify-center rounded-full text-lg font-bold">
                        C
                    </div>
                    <div>
                        <h2 class="text-lg font-semibold text-gray-900">Citra Lestari</h2>
                        <p class="text-gray-500">NIM: 202101003</p>
                    </div>
                </div>
            </a>

            <a href="/admin/jawaban-kuisioner/3"
                class="block bg-white shadow-md p-4 rounded-lg border-l-4 border-blue-500 hover:bg-blue-50 transition">
                <div class="flex items-center space-x-4">
                    <div class="bg-blue-500 text-white w-12 h-12 flex items-center justify-center rounded-full text-lg font-bold">
                        C
                    </div>
                    <div>
                        <h2 class="text-lg font-semibold text-gray-900">Citra Lestari</h2>
                        <p class="text-gray-500">NIM: 202101003</p>
                    </div>
                </div>
            </a>
        </div>

    </section>
</div>

@include('components.end-html')

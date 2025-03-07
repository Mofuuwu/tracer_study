@include('components.start-html')

<div class="flex">
    @include('components.user.sidebar')

    <section class="w-full bg-gray-100 ">
        <div class="flex-1 p-6">
            <h1 class="text-2xl font-bold">Selamat Datang</h1>
            <p class="text-gray-600">Pilih menu di sidebar untuk mengelola data.</p>
        </div>
        <div class="flex-1 px-6 py-3 w-full min-h-screen">

            <!-- Statistik -->
            <div class="grid md:grid-cols-3 gap-2 md:gap-6 grid-cols-1">
                <!-- Total Kuisioner Belum Dijawab -->
                <div class="bg-white shadow-lg rounded-lg px-6 py-3 border border-gray-300">
                    <h2 class="text-lg font-semibold text-gray-700">Kuisioner Belum Dijawab</h2>
                    <p class="text-4xl font-bold text-blue-600 mt-2">3</p>
                </div>

                <!-- Total Kuisioner Sudah Dijawab -->
                <div class="bg-white shadow-lg rounded-lg p-6 border border-gray-300">
                    <h2 class="text-lg font-semibold text-gray-700">Kuisioner Sudah Dijawab</h2>
                    <p class="text-4xl font-bold text-green-600 mt-2">5</p>
                </div>

                <!-- Total Kuisioner Keseluruhan -->
                <div class="bg-white shadow-lg rounded-lg p-6 border border-gray-300">
                    <h2 class="text-lg font-semibold text-gray-700">Total Kuisioner</h2>
                    <p class="text-4xl font-bold text-gray-800 mt-2">8</p>
                </div>
            </div>

            <!-- Daftar Kuisioner Belum Dijawab -->
            <div class="mt-8 bg-white shadow-lg rounded-lg p-6 border border-gray-300">
    <h2 class="text-xl font-semibold text-gray-700 mb-4">Kuisioner yang Belum Dijawab</h2>

    <!-- Wrapper untuk scroll di layar kecil -->
    <div class="overflow-x-auto">
        <table class="w-full border-collapse border border-gray-300 min-w-[600px]">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border border-gray-300 px-4 py-2 text-left">No</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Judul Kuisioner</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Tanggal Dibuat</th>
                    <th class="border border-gray-300 px-4 py-2 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="border border-gray-300 px-4 py-2">1</td>
                    <td class="border border-gray-300 px-4 py-2">Kuisioner Kepuasan Alumni</td>
                    <td class="border border-gray-300 px-4 py-2">01 Maret 2025</td>
                    <td class="border border-gray-300 px-4 py-2 text-center">
                        <a href="#" class="bg-blue-600 text-white px-3 py-2 rounded-lg shadow-md hover:bg-blue-700 transition">
                            Jawab
                        </a>
                    </td>
                </tr>
                <tr>
                    <td class="border border-gray-300 px-4 py-2">2</td>
                    <td class="border border-gray-300 px-4 py-2">Kuisioner Status Pekerjaan</td>
                    <td class="border border-gray-300 px-4 py-2">15 Februari 2025</td>
                    <td class="border border-gray-300 px-4 py-2 text-center">
                        <a href="#" class="bg-blue-600 text-white px-3 py-2 rounded-lg shadow-md hover:bg-blue-700 transition">
                            Jawab
                        </a>
                    </td>
                </tr>
                <tr>
                    <td class="border border-gray-300 px-4 py-2">3</td>
                    <td class="border border-gray-300 px-4 py-2">Kuisioner Tracer Study</td>
                    <td class="border border-gray-300 px-4 py-2">10 Januari 2025</td>
                    <td class="border border-gray-300 px-4 py-2 text-center">
                        <a href="#" class="bg-blue-600 text-white px-3 py-2 rounded-lg shadow-md hover:bg-blue-700 transition">
                            Jawab
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

        </div>
    </section>
</div>
@include('components.end-html')
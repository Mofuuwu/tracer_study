@include('components.start-html')

<div class="w-full flex bg-gray-100 min-h-screen">
    @include('components.admin.sidebar')

    <section class="flex-1 p-6 w-full">
        <h1 class="text-2xl font-bold">Daftar Kuisioner</h1>
        <p class="text-gray-600 mb-4">Pilih menu di sidebar untuk mengelola data.</p>

        <div class="overflow-x-auto bg-white p-6 rounded-lg shadow-md">
            <table class="w-full border-collapse border border-gray-300">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="border border-gray-300 p-2 text-left">No</th>
                        <th class="border border-gray-300 p-2 text-left">Judul Kuisioner</th>
                        <th class="border border-gray-300 p-2 text-left">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border border-gray-300">
                        <td class="border border-gray-300 p-2">1</td>
                        <td class="border border-gray-300 p-2">Survey Kepuasan Pelanggan</td>
                        <td class="border border-gray-300 p-2">
                            <a href="/admin/respon-kuisioner/id" class="text-blue-600 hover:underline">Lihat Respon</a>
                        </td>
                    </tr>
                    <tr class="border border-gray-300">
                        <td class="border border-gray-300 p-2">2</td>
                        <td class="border border-gray-300 p-2">Evaluasi Kinerja Dosen</td>
                        <td class="border border-gray-300 p-2">
                            <a href="#" class="text-blue-600 hover:underline">Lihat Respon</a>
                        </td>
                    </tr>
                    <tr class="border border-gray-300">
                        <td class="border border-gray-300 p-2">3</td>
                        <td class="border border-gray-300 p-2">Kepuasan Mahasiswa terhadap Fasilitas</td>
                        <td class="border border-gray-300 p-2">
                            <a href="#" class="text-blue-600 hover:underline">Lihat Respon</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>
</div>

@include('components.end-html')

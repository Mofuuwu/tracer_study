@include('components.start-html')

<div class="flex bg-gray-100 min-h-screen">
    @include('components.admin.sidebar')

    <section class="w-full flex-1 p-6">
        <h1 class="text-2xl font-bold">Verifikasi Alumni</h1>
        <p class="text-gray-600 mb-6">Tinjau dan verifikasi data alumni berikut.</p>

        <!-- Container Tabel -->
        <div class="bg-white p-6 rounded-lg shadow-md overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="text-left text-gray-600 font-semibold border-gray-200">
                        <th class="pb-3 px-4">Nama</th>
                        <th class="pb-3 px-4">Jurusan</th>
                        <th class="pb-3 px-4">Tahun Lulus</th>
                        <th class="pb-3 px-4">Aksi</th>
                        <tr class="border-b border-gray-200"></tr>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b border-gray-200">
                        <td class="py-2 px-4">John Doe</td>
                        <td class="py-2 px-4">Teknik Informatika</td>
                        <td class="py-2 px-4">2022</td>
                        <td class="py-2 px-4">
                            <button class="bg-green-500 text-white px-4 py-1 rounded-md hover:bg-green-600 transition">Verifikasi</button>
                        </td>
                    </tr>
                    <tr class="border-b border-gray-200">
                        <td class="py-2 px-4">Jane Willingsmith</td>
                        <td class="py-2 px-4">Manajemen</td>
                        <td class="py-2 px-4">2021</td>
                        <td class="py-2 px-4">
                            <button class="bg-green-500 text-white px-4 py-1 rounded-md hover:bg-green-600 transition">Verifikasi</button>
                        </td>
                    </tr>
                    <tr class="border-b border-gray-200">
                        <td class="py-2 px-4">Michael Lee</td>
                        <td class="py-2 px-4">Akuntansi</td>
                        <td class="py-2 px-4">2023</td>
                        <td class="py-2 px-4">
                            <button class="bg-green-500 text-white px-4 py-1 rounded-md hover:bg-green-600 transition">Verifikasi</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>
</div>

@include('components.end-html')

@include('components.start-html')

<div class="flex">
    @include('components.admin.sidebar')

    <section class="flex-1 p-6">
        <h1 class="text-2xl font-bold mb-4">Verifikasi Alumni</h1>
        <p class="text-gray-600 mb-6">Tinjau dan verifikasi data alumni berikut.</p>

        <!-- Container Tabel -->
        <div class="bg-white p-6 rounded-lg shadow-md">
            <table class="w-full">
                <thead>
                    <tr class="text-left text-gray-600 font-semibold border-gray-200">
                        <th class="pb-3">Nama</th>
                        <th class="pb-3">Jurusan</th>
                        <th class="pb-3">Tahun Lulus</th>
                        <th class="pb-3">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b border-gray-200">
                        <td class="py-2">John Doe</td>
                        <td class="py-2">Teknik Informatika</td>
                        <td class="py-2">2022</td>
                        <td class="py-2">
                            <button class="bg-green-500 text-white px-4 py-1 rounded-md hover:bg-green-600 transition">Verifikasi</button>
                        </td>
                    </tr>
                    <tr class="border-b border-gray-200">
                        <td class="py-2">Jane Smith</td>
                        <td class="py-2">Manajemen</td>
                        <td class="py-2">2021</td>
                        <td class="py-2">
                            <button class="bg-green-500 text-white px-4 py-1 rounded-md hover:bg-green-600 transition">Verifikasi</button>
                        </td>
                    </tr>
                    <tr class="border-b border-gray-200">
                        <td class="py-2">Michael Lee</td>
                        <td class="py-2">Akuntansi</td>
                        <td class="py-2">2023</td>
                        <td class="py-2">
                            <button class="bg-green-500 text-white px-4 py-1 rounded-md hover:bg-green-600 transition">Verifikasi</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>
</div>

@include('components.end-html')

@include('components.start-html')

<div class="flex bg-gray-100 min-h-screen">
    @include('components.admin.sidebar')

    <section class="w-full flex-1 p-6">
        <h1 class="text-2xl font-bold">Data Alumni</h1>
        <p class="text-gray-600 mb-6">Berikut adalah daftar alumni yang terdaftar.</p>

        <!-- Container Tabel dengan Scroll Horizontal -->
        <div class="bg-white p-6 rounded-lg shadow-md">
            <div class="overflow-x-auto">
                <table class="w-full border-collapse min-w-[600px]">
                    <thead>
                        <tr class="bg-gray-200 text-center">
                            <th class="px-4 py-2 ">No</th>
                            <th class="px-4 py-2 ">Nama</th>
                            <th class="px-4 py-2 ">Jurusan</th>
                            <th class="px-4 py-2 ">Tahun Lulus</th>
                            <th class="px-4 py-2 ">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <tr class="border-b border-gray-200 text-center">
                            <td class="px-4 py-2">1</td>
                            <td class="px-4 py-2">John Doe</td>
                            <td class="px-4 py-2">Teknik Informatika</td>
                            <td class="px-4 py-2">2022</td>
                            <td class="px-4 py-2 text-center flex flex-row gap-1 justify-center">
                                <button class="bg-yellow-600 text-white px-3 py-1 rounded-md hover:bg-yellow-700 transition">
                                    Edit
                                </button>
                                <button class="bg-blue-600 text-white px-3 py-1 rounded-md hover:bg-blue-700 transition">
                                    Lihat
                                </button>
                                <button class="bg-red-600 text-white px-3 py-1 rounded-md hover:bg-red-700 transition">
                                    Hapus
                                </button>
                            </td>
                        </tr>
                        <tr class="border-b border-gray-200 text-center">
                            <td class="px-4 py-2">2</td>
                            <td class="px-4 py-2">Jane Smith</td>
                            <td class="px-4 py-2">Manajemen</td>
                            <td class="px-4 py-2">2021</td>
                            <td class="px-4 py-2 text-center flex flex-row gap-1 justify-center">
                                <button class="bg-yellow-600 text-white px-3 py-1 rounded-md hover:bg-yellow-700 transition">
                                    Edit
                                </button>
                                <button class="bg-blue-600 text-white px-3 py-1 rounded-md hover:bg-blue-700 transition">
                                    Lihat
                                </button>
                                <button class="bg-red-600 text-white px-3 py-1 rounded-md hover:bg-red-700 transition">
                                    Hapus
                                </button>
                            </td>
                        </tr>
                        <tr class="border-b border-gray-200 text-center">
                            <td class="px-4 py-2">3</td>
                            <td class="px-4 py-2">Michael Lee</td>
                            <td class="px-4 py-2">Akuntansi</td>
                            <td class="px-4 py-2">2023</td>
                            <td class="px-4 py-2 text-center flex flex-row gap-1 justify-center">
                                <button class="bg-yellow-600 text-white px-3 py-1 rounded-md hover:bg-yellow-700 transition">
                                    Edit
                                </button>
                                <button class="bg-blue-600 text-white px-3 py-1 rounded-md hover:bg-blue-700 transition">
                                    Lihat
                                </button>
                                <button class="bg-red-600 text-white px-3 py-1 rounded-md hover:bg-red-700 transition">
                                    Hapus
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>

@include('components.end-html')

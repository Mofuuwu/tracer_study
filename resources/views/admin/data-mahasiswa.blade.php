@include('components.start-html')

<div class="flex bg-gray-100 min-h-screen">
    @include('components.admin.sidebar')

    <section class="w-full flex-1 p-6">
        <h1 class="text-2xl font-bold">Data Mahasiswa</h1>
        <p class="text-gray-600 mb-6">Berikut adalah daftar Mahasiswa yang terdaftar.</p>

        <!-- Container Tabel dengan Scroll Horizontal -->
        <div class="bg-white p-6 rounded-lg shadow-md">
            <div class="overflow-x-auto">
                <table class="w-full border-collapse min-w-[600px]">
                    <thead>
                        <tr class="bg-gray-200 text-center">
                            <th class="px-4 py-2 ">NIM</th>
                            <th class="px-4 py-2 ">Nama</th>
                            <th class="px-4 py-2 ">Program Studi</th>
                            <th class="px-4 py-2 ">Angkatan</th>
                            <th class="px-4 py-2 ">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($mahasiswa->isEmpty())
                        <td colspan="7" class="text-center border border-gray-300 px-4 py-4">Tidak ada data Mahasiswa.</td>
                        @else
                        @foreach ($mahasiswa as $m)
                        <tr class="border-b border-gray-200 text-center">
                            <td class="px-4 py-2">{{ $m->nim }}</td>
                            <td class="px-4 py-2">{{ $m->nama }}</td>
                            <td class="px-4 py-2">{{ $m->prodi }}</td>
                            <td class="px-4 py-2">{{ $m->angkatan }}</td>
                            <td class="px-4 py-2 text-center flex flex-row gap-1 justify-center">
                                <!-- <button class="bg-yellow-600 text-white px-3 py-1 rounded-md hover:bg-yellow-700 transition">
                                    Edit
                                </button> -->
                                <a href="{{ route('admin.data-mahasiswa.detail', $m->nim) }}" class="bg-blue-600 text-white px-3 py-1 rounded-md hover:bg-blue-700 transition">
                                    Lihat
                                </a>
                                <!-- <button class="bg-red-600 text-white px-3 py-1 rounded-md hover:bg-red-700 transition">
                                    Hapus
                                </button> -->
                            </td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>

@include('components.end-html')
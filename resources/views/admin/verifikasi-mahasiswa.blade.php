@include('components.start-html')

<div class="flex bg-gray-100 min-h-screen">
    @include('components.admin.sidebar')

    <section class="w-full flex-1 p-6">
        <h1 class="text-2xl font-bold">Verifikasi Mahasiswa</h1>
        <p class="text-gray-600 mb-6">Tinjau dan verifikasi data Mahasiswa berikut.</p>
        @if(session('success'))
        <div class="w-full">
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <strong>Sukses!</strong> {{ session('success') }}
            </div>
        </div>
        @endif

        <!-- Container Tabel -->
        <div class="bg-white p-6 rounded-lg shadow-md overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="text-left text-gray-600 font-semibold border-gray-200">
                        <th class="pb-3 px-4">Nama</th>
                        <th class="pb-3 px-4">Program Studi</th>
                        <th class="pb-3 px-4">Angkatan</th>
                        <th class="pb-3 px-4">Aksi</th>
                    <tr class="border-b border-gray-200"></tr>
                    </tr>
                </thead>
                <tbody>
                    @if ($mahasiswa_menunggu_verifikasi->isEmpty())
                    <td colspan="7" class="text-center border border-gray-300 px-4 py-4">Tidak ada data Mahasiswa yang menunggu verifikasi.</td>
                    @else
                    @foreach ($mahasiswa_menunggu_verifikasi as $mahasiswa)
                    <tr class="border-b border-gray-200">
                        <td class="py-2 px-4">{{ $mahasiswa->nama }}</td>
                        <td class="py-2 px-4">{{ $mahasiswa->prodi }}</td>
                        <td class="py-2 px-4">{{ $mahasiswa->angkatan }}</td>
                        <td class="py-2 px-4">
                            <a href="{{ route('admin.verifikasi-mahasiswa.detail-mahasiswa', $mahasiswa->nim) }}" class="bg-green-500 text-white px-4 py-1 rounded-md hover:bg-green-600 transition">Verifikasi</a>
                        </td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </section>
</div>

@include('components.end-html')
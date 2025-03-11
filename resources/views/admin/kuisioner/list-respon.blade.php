@include('components.start-html')

<div class="flex bg-gray-100 min-h-screen md:justify-end">
    @include('components.admin.sidebar')

    <section class="px-6 py-6 w-full md:w-[70%] lg:w-[80%] bg-gray-100 min-h-screen ">

        <div class="flex justify-between items-center">
            <div>
                <h1 class="text-2xl font-bold">Respon Kuisioner</h1>
                <p class="text-gray-600 mb-6">Klik mahasiswa untuk melihat jawaban kuisioner mereka.</p>
            </div>
            <button onclick="window.history.back()"
                class="cursor-pointer h-fit mb-4 bg-red-400 text-white px-4 py-2 rounded-lg shadow-md hover:bg-gray-500 transition">
                Kembali
            </button>
        </div>


        <!-- Tombol Lihat Statistik -->
        <div class="mb-6">
            <a href=""
                class="block bg-blue-600 text-white text-center font-semibold py-3 px-6 rounded-lg shadow-md hover:bg-blue-700 transition">
                📊 Lihat Statistik
            </a>
        </div>

        <!-- Daftar Mahasiswa Dinamis -->
        @if ($mahasiswa_respon->isEmpty())
        <p class="text-gray-500 text-center py-4">Belum ada mahasiswa yang mengisi kuisioner.</p>
        @else
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach ($mahasiswa_respon as $mahasiswa)
            <a href="{{ route('admin.respon-kuisioner.siswa.lihat', ['id' => $kuisioner->id, 'id_mahasiswa' => $mahasiswa->id]) }}"
                class="block bg-white shadow-md p-4 rounded-lg border-l-4 border-blue-500 hover:bg-blue-50 transition">
                <div class="flex items-center space-x-4">
                    <div class="bg-blue-500 text-white w-12 h-12 flex items-center justify-center rounded-full text-lg font-bold">
                        {{ strtoupper(substr($mahasiswa->nama, 0, 1)) }}
                    </div>
                    <div>
                        <h2 class="text-lg font-semibold text-gray-900">{{ $mahasiswa->nama }}</h2>
                        <p class="text-gray-500">NIM: {{ $mahasiswa->nim }}</p>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
        @endif
    </section>
</div>

@include('components.end-html')
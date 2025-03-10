@include('components.start-html')

<div class="flex bg-gray-100 min-h-screen">
    @include('components.admin.sidebar')

    <section class="w-full">
        <div class="p-6">
        <h1 class="text-2xl font-bold">Verifikasi Mahasiswa</h1>
        <p class="text-gray-600 mb-3">Tinjau dan verifikasi data Mahasiswa berikut.</p>
            <a href="./" class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600 transition cursor-pointer">
                Kembali
            </a>
            <!-- Informasi Akun -->
            <div id="infoAkun" class="bg-white shadow-lg rounded-lg p-6 border border-gray-300 mt-4">
                <!-- Informasi Diri -->
                <h3 class="text-lg font-semibold text-gray-700 mb-2 flex items-center">
                    <!-- Ikon Profil (SVG) -->
                    <svg class="w-6 h-6 text-blue-600 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A8 8 0 0112 4a8 8 0 016.879 13.804M12 14v6m-4-2h8" />
                    </svg>
                    Informasi Diri
                </h3>
                <hr class="border-gray-300 mb-4">

                <div class="grid md:grid-cols-2 gap-4 text-gray-600">
                    <div>
                        <p class="text-gray-500">Nama</p>
                        <p class="text-lg font-semibold text-gray-800">{{ $mahasiswa->nama ?? '-' }}</p>
                    </div>
                    <div>
                        <p class="text-gray-500">Email</p>
                        <p class="text-lg font-semibold text-gray-800">{{ $mahasiswa->email ?? '-' }}</p>
                    </div>
                    <div>
                        <p class="text-gray-500">Nomor HP</p>
                        <p class="text-lg font-semibold text-gray-800">{{ $mahasiswa->no_hp ?? '-' }}</p>
                    </div>
                    <div>
                        <p class="text-gray-500">Jenis Kelamin</p>
                        <p class="text-lg font-semibold text-gray-800">{{ $mahasiswa->jenis_kelamin ?? '-' }}</p>
                    </div>
                    <div>
                        <p class="text-gray-500">Tanggal Lahir</p>
                        <p class="text-lg font-semibold text-gray-800">
                            {{ $mahasiswa->tgl_lahir ? \Carbon\Carbon::parse($mahasiswa->tgl_lahir)->translatedFormat('d F Y') : '-' }}
                        </p>
                    </div>
                    <div>
                        <p class="text-gray-500">Pekerjaan</p>
                        <p class="text-lg font-semibold text-gray-800">{{ $mahasiswa->pekerjaan ?? '-' }}</p>
                    </div>
                    <div class="md:col-span-2">
                        <p class="text-gray-500">Alamat</p>
                        <p class="text-lg font-semibold text-gray-800">{{ $mahasiswa->alamat ?? '-' }}</p>
                    </div>
                </div>

                <hr class="my-6 border-gray-300">

                <h3 class="text-lg font-semibold text-gray-700 mb-2 mt-6 flex items-center">
                    <!-- Ikon Akademik (SVG) -->
                    <svg class="w-6 h-6 text-blue-600 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l-9-5 9-5 9 5-9 5zm0 7v-6m0 6H5m7 0h7" />
                    </svg>
                    Informasi Akademik
                </h3>
                <div class="grid md:grid-cols-2 gap-4 text-gray-600">
                    <div>
                        <p class="text-gray-500">NIM</p>
                        <p class="text-lg font-semibold text-gray-800">{{ $mahasiswa->nim ?? '-' }}</p>
                    </div>
                    <div>
                        <p class="text-gray-500">Angkatan</p>
                        <p class="text-lg font-semibold text-gray-800">{{ $mahasiswa->angkatan ?? '-' }}</p>
                    </div>
                    <div>
                        <p class="text-gray-500">Prodi</p>
                        <p class="text-lg font-semibold text-gray-800">{{ $mahasiswa->prodi ?? '-' }}</p>
                    </div>
                    <div>
                        <p class="text-gray-500">Fakultas</p>
                        <p class="text-lg font-semibold text-gray-800">{{ $mahasiswa->fakultas ?? '-' }}</p>
                    </div>
                    <div>
                        <p class="text-gray-500">Semester</p>
                        <p class="text-lg font-semibold text-gray-800">{{ $mahasiswa->semester ?? '-' }}</p>
                    </div>
                    <div>
                        <p class="text-gray-500">Status Mahasiswa</p>
                        <p class="text-lg font-semibold text-gray-800">{{ ucfirst($mahasiswa->status) ?? '-' }}</p>
                    </div>
                </div>

                <hr class="my-6 border-gray-300">

                <div class="flex justify-between items-center">
                    <div>
                        <p class="text-gray-500">Verifikasi Akun</p>
                        <p class="text-lg font-semibold text-gray-800">
                            {{ $mahasiswa->verified ? '✔️ Terverifikasi' : '❌ Belum Verifikasi' }}
                        </p>
                    </div>
                    <form action="{{ route('admin.verifikasi-mahasiswa.konfirmasi') }}" method="post">
                        @csrf
                        <input type="hidden" name="nim" value="{{ $mahasiswa->nim }}">
                        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600 transition cursor-pointer">
                            Verifikasi
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>

@include('components.end-html')

<!-- jQuery untuk Toggle Form -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>

</script>
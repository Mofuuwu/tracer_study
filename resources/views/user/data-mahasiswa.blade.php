@include('components.start-html')

<div class="flex bg-gray-100 min-h-screen md:justify-end">
    @include('components.user.sidebar')

    <section class="px-6 py-6 w-full md:w-[70%] lg:w-[80%] bg-gray-100 min-h-screen ">
        <div class="p-6">
            <h1 class="text-2xl font-bold text-gray-800">Data Mahasiswa</h1>
            <p class="text-gray-600">Berikut adalah informasi seputar Anda.</p>
            <p class="text-gray-600 mb-4 text-sm opacity-70 italic">N.B : Silahkan lengkapi data diri kemudian tunggu sampai admin memverifikasi akun Anda untuk bisa mengisi Kuisioner.</p>
            @if(session('success'))
            <div class="w-full">
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <strong>Sukses!</strong> {{ session('success') }}
                </div>
            </div>
            @endif
            @if(session('error'))
            <div class="w-full px-6">
                <div class="bg-green-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <strong>Sukses!</strong> {{ session('success') }}
                </div>
            </div>
            @endif
            @if ($errors->any())
            Error Memperbarui Data :
            <div class="text-red-500 text-sm w-full mb-6">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            @if (session('error'))
            <div class="alert alert-danger text-red-500 text-sm">
                {{ session('error') }}
            </div>
            @endif
            <!-- Tombol Edit -->
            <div class="flex space-x-4">
                <button id="btnEdit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                    Edit Data
                </button>

                <button id="btnKembali" class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600 transition hidden">
                    Kembali
                </button>
            </div>
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

                <div>
                    <p class="text-gray-500">Verifikasi Akun</p>
                    <p class="text-lg font-semibold text-gray-800">
                        {{ $mahasiswa->verified ? '✔️ Terverifikasi' : '❌ Belum Verifikasi' }}
                    </p>
                </div>
            </div>

            <!-- Form Edit (Tersembunyi) -->
            <div id="formEdit" class="bg-white shadow-lg rounded-lg p-6 border border-gray-300 mt-4 hidden">
                <h2 class="text-xl font-semibold text-gray-700 mb-4">Edit Data Akun</h2>
                <form action="{{ route('user.edit.data-mahasiswa') }}" method="POST">
                    @csrf

                    <!-- Informasi Diri -->
                    <h3 class="text-lg font-semibold text-gray-700 mb-2 flex items-center">
                        <!-- Ikon Profil (SVG) -->
                        <svg class="w-6 h-6 text-blue-600 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A8 8 0 0112 4a8 8 0 016.879 13.804M12 14v6m-4-2h8" />
                        </svg>
                        Informasi Diri
                    </h3>
                    <hr class="border-gray-300 mb-4">

                    <hr class="border-gray-300 mb-4">
                    <div class="grid md:grid-cols-2 gap-6">
                        <!-- Nama -->
                        <div class="w-full">
                            <label class="block text-gray-600 font-medium">Nama<span class="text-red-500">*</span></label>
                            <input required type="text" name="nama" value="{{ $mahasiswa->nama ?? '' }}"
                                class="w-full p-3 mt-1 border border-gray-300 rounded-lg focus:ring-blue-400 focus:outline-none">
                        </div>

                        <!-- Email -->
                        <div class="w-full">
                            <label class="block text-gray-600 font-medium">Email<span class="text-red-500">*</span></label>
                            <input required type="email" name="email" value="{{ $mahasiswa->email ?? '' }}"
                                class="w-full p-3 mt-1 border border-gray-300 rounded-lg focus:ring-blue-400 focus:outline-none">
                        </div>

                        <!-- Nomor HP -->
                        <div class="w-full">
                            <label class="block text-gray-600 font-medium">Nomor HP<span class="text-red-500">*</span></label>
                            <input required type="text" name="no_hp" value="{{ $mahasiswa->no_hp ?? '' }}"
                                class="w-full p-3 mt-1 border border-gray-300 rounded-lg focus:ring-blue-400 focus:outline-none">
                        </div>

                        <!-- Jenis Kelamin -->
                        <div class="w-full">
                            <label class="block text-gray-600 font-medium">Jenis Kelamin<span class="text-red-500">*</span></label>
                            <select required name="jenis_kelamin"
                                class="w-full p-3 mt-1 border border-gray-300 rounded-lg focus:ring-blue-400 focus:outline-none">
                                <option value="Laki-laki" {{ $mahasiswa->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                <option value="Perempuan" {{ $mahasiswa->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                        </div>

                        <!-- Tanggal Lahir -->
                        <div class="w-full">
                            <label class="block text-gray-600 font-medium">Tanggal Lahir<span class="text-red-500">*</span></label>
                            <input required type="date" name="tgl_lahir" value="{{ $mahasiswa->tgl_lahir ?? '' }}"
                                class="w-full p-3 mt-1 border border-gray-300 rounded-lg focus:ring-blue-400 focus:outline-none">
                        </div>

                        <!-- Pekerjaan -->
                        <div class="w-full">
                            <label class="block text-gray-600 font-medium">Pekerjaan<span class="text-red-500">*</span></label>
                            <input required type="text" name="pekerjaan" value="{{ $mahasiswa->pekerjaan ?? '' }}"
                                class="w-full p-3 mt-1 border border-gray-300 rounded-lg focus:ring-blue-400 focus:outline-none">
                        </div>

                        <!-- Alamat -->
                        <div class="w-full md:col-span-2">
                            <label class="block text-gray-600 font-medium">Alamat<span class="text-red-500">*</span></label>
                            <textarea required name="alamat"
                                class="w-full p-3 mt-1 border border-gray-300 rounded-lg focus:ring-blue-400 focus:outline-none">{{ $mahasiswa->alamat ?? '' }}</textarea>
                        </div>
                    </div>

                    <!-- Informasi Akademik -->
                    <h3 class="text-lg font-semibold text-gray-700 mb-2 mt-6 flex items-center">
                        <!-- Ikon Akademik (SVG) -->
                        <svg class="w-6 h-6 text-blue-600 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l-9-5 9-5 9 5-9 5zm0 7v-6m0 6H5m7 0h7" />
                        </svg>
                        Informasi Akademik
                    </h3>
                    <hr class="border-gray-300 mb-4">

                    <hr class="border-gray-300 mb-4">
                    <div class="grid md:grid-cols-2 gap-6">
                        <!-- NIM -->
                        <div class="w-full">
                            <label class="block text-gray-600 font-medium">NIM<span class="text-red-500">*</span></label>
                            <input required type="number" name="nim" value="{{ $mahasiswa->nim ?? '' }}"
                                class="w-full p-3 mt-1 border border-gray-300 rounded-lg focus:ring-blue-400 focus:outline-none">
                        </div>

                        <!-- Angkatan -->
                        <div class="w-full">
                            <label class="block text-gray-600 font-medium">Angkatan<span class="text-red-500">*</span></label>
                            <input required type="number" name="angkatan" value="{{ $mahasiswa->angkatan ?? '' }}"
                                class="w-full p-3 mt-1 border border-gray-300 rounded-lg focus:ring-blue-400 focus:outline-none">
                        </div>

                        <!-- Program Studi -->
                        <div class="w-full">
                            <label class="block text-gray-600 font-medium">Program Studi<span class="text-red-500">*</span></label>
                            <input required type="text" name="prodi" value="{{ $mahasiswa->prodi ?? '' }}"
                                class="w-full p-3 mt-1 border border-gray-300 rounded-lg focus:ring-blue-400 focus:outline-none">
                        </div>

                        <!-- Fakultas -->
                        <div class="w-full">
                            <label class="block text-gray-600 font-medium">Fakultas<span class="text-red-500">*</span></label>
                            <input required type="text" name="fakultas" value="{{ $mahasiswa->fakultas ?? '' }}"
                                class="w-full p-3 mt-1 border border-gray-300 rounded-lg focus:ring-blue-400 focus:outline-none">
                        </div>

                        <!-- Semester -->
                        <div class="w-full">
                            <label class="block text-gray-600 font-medium">Semester<span class="text-red-500">*</span></label>
                            <input required type="number" max="14" name="semester" value="{{ $mahasiswa->semester ?? '' }}"
                                class="w-full p-3 mt-1 border border-gray-300 rounded-lg focus:ring-blue-400 focus:outline-none">
                        </div>

                        <!-- Status Mahasiswa -->
                        <div class="w-full">
                            <label class="block text-gray-600 font-medium">Status Mahasiswa<span class="text-red-500">*</span></label>
                            <select required name="status"
                                class="w-full p-3 mt-1 border border-gray-300 rounded-lg focus:ring-blue-400 focus:outline-none">
                                <option value="aktif" {{ $mahasiswa->status == 'aktif' ? 'selected' : '' }}>Aktif</option>
                                <option value="lulus" {{ $mahasiswa->status == 'lulus' ? 'selected' : '' }}>Lulus</option>
                                <option value="dropout" {{ $mahasiswa->status == 'dropout' ? 'selected' : '' }}>Dropout</option>
                            </select>
                        </div>
                    </div>

                    <!-- Tombol Simpan -->
                    <div class="w-full md:col-span-2 mt-4">
                        <button type="submit"
                            class="w-full bg-blue-600 text-white px-4 py-3 rounded-lg hover:bg-blue-700 transition">
                            Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </section>
</div>

@include('components.end-html')

<!-- jQuery untuk Toggle Form -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $("#btnEdit").click(function() {
            $("#infoAkun").toggle();
            $("#formEdit").toggle();
            $("#btnEdit").toggle();
            $("#btnKembali").toggle();
        });

        $("#btnKembali").click(function() {
            $("#infoAkun").toggle();
            $("#formEdit").toggle();
            $("#btnEdit").toggle();
            $("#btnKembali").toggle();
        });
    });
</script>
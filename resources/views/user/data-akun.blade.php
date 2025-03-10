@php
use Carbon\Carbon;
@endphp

@include('components.start-html')

<div class="flex bg-gray-100">
    @include('components.user.sidebar')

    <section class="w-full">
        <div class="flex-1 p-6">
            <h1 class="text-2xl font-bold">Data Akun</h1>
            <p class="text-gray-600">Berikut Data Untuk Akun Anda</p>
        </div>
        @if(session('success'))
        <div class="w-full px-6">
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <strong>Sukses!</strong> {{ session('success') }}
            </div>
        </div>
        @endif
        <!-- Konten Utama -->
        <div class="flex-1 px-6 py-3 w-full min-h-screen">

            <!-- Grid 2 Kolom -->
            <div class="w-full grid md:grid-cols-2 gap-6 grid-cols-1">
                <!-- Kotak Kiri: Informasi Akun -->
                <div class="bg-white shadow-lg rounded-lg p-6 border border-gray-300">
                    <h2 class="text-xl font-semibold mb-4 text-gray-700">Informasi Akun</h2>
                    <div class="grid gap-4 text-gray-600">
                        <div>
                            <p class="text-gray-500">Nama</p>
                            <p class="text-lg font-semibold text-gray-800">{{ $user->mahasiswa->nama }}</p>
                            <p class="text-gray-600 text-sm italic opacity-70">Untuk kolom nama bisa diedit pada halaman data Mahasiswa.</p>
                        </div>
                        <div>
                            <p class="text-gray-500">Email</p>
                            <p class="text-lg font-semibold text-gray-800">{{ $user->email }}</p>
                        </div>
                        <div>
                            <p class="text-gray-500">Kata Sandi</p>
                            <p class="text-lg font-semibold text-gray-800"> {{ str_repeat('*', 8) }} </p>
                        </div>
                        <div>
                            <p class="text-gray-500">Tanggal Registrasi</p>
                            <p class="text-lg font-semibold text-gray-800">
                                {{ Carbon::parse($user->created_at)->translatedFormat('l, d F Y | H:i') }}
                                <p class="text-gray-600 text-sm italic opacity-70">Terakhir diedit pada : {{ Carbon::parse($user->updated_at)->translatedFormat('l, d F Y | H:i') }}</p>
                            </p>
                        </div>
                        <div>
                            <p class="text-gray-500">Status</p>
                            <p class="text-lg font-semibold {{ $user->mahasiswa->verified? 'text-green-500' : 'text-red-500' }}">{{ $user->mahasiswa->verified ? '✔️ Terverifikasi' : '❌ Belum Verifikasi' }}</p>
                            <p class="text-gray-600 text-sm italic opacity-70">Silahkan isi data diri kemudian tunggu hingga akun terverifikasi untuk bisa mengisi kuisioner.</p>
                        </div>
                    </div>
                </div>

                <!-- Kotak Kanan: Form Edit Akun -->
                <div class="bg-white shadow-lg rounded-lg p-6 border border-gray-300">
                    <h2 class="text-xl font-semibold mb-4 text-gray-700">Edit Data Akun</h2>
                    @if ($errors->any())
                    <div class="text-red-500 text-sm text-center w-full">
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
                    <form method="post" action="{{ route('user.edit.data-akun') }}">
                        @csrf
                        <div class="mb-4">
                            <label class="block text-gray-600 font-medium">Email</label>
                            <input type="email"
                                class="w-full p-3 mt-1 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none shadow-sm"
                                value="{{ $user->email }}"
                                name="email">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-600 font-medium">Kata Sandi</label>
                            <input type="password"
                                class="w-full p-3 mt-1 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none shadow-sm"
                                placeholder="Masukkan Kata Sandi Baru"
                                name="password">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-600 font-medium">Konfirmasi Kata Sandi</label>
                            <input type="password"
                                class="w-full p-3 mt-1 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none shadow-sm"
                                placeholder="Konfirmasi Kata Sandi Baru"
                                name="password_confirmation">
                        </div>
                        <button
                            class="w-full bg-blue-600 text-white px-4 py-3 rounded-lg shadow-md hover:bg-blue-700 transition"
                            type="submit">
                            Simpan Perubahan
                        </button>
                    </form>
                </div>
            </div>
        </div>



    </section>

</div>
@include('components.end-html')
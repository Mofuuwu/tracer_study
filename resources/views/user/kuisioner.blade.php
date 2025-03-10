@include('components.start-html')

<div class="flex bg-gray-100">
    @include('components.user.sidebar')

    <section class="w-full">
        <div class="flex-1 p-6">
            <h1 class="text-2xl font-bold">Kuisioner</h1>
            <p class="text-gray-600">Berikut beberapa data kuisioner</p>
        </div>
        @if ($mahasiswa->verified === 0)
        <div class="px-6">
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4" role="alert">
                <div class="flex">
                    <!-- Ikon Peringatan -->
                    <svg class="w-6 h-6 text-red-600 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.29 3.86a1 1 0 011.42 0l7.29 7.29a1 1 0 010 1.42l-7.29 7.29a1 1 0 01-1.42 0l-7.29-7.29a1 1 0 010-1.42l7.29-7.29z" />
                    </svg>

                    <div>
                        <p class="font-bold">Akun Belum Terverifikasi</p>
                        <p>Silahkan isi data Mahasiswa atau tunggu akun diverifikasi oleh Admin sebelum mengisi kuisioner.</p>
                    </div>
                </div>
            </div>
        </div>
        @else
        <div class="flex-1 px-6 py-6 w-full min-h-screen">

            <!-- Kuisioner yang BELUM diisi -->
            <div class="bg-white shadow-lg rounded-lg p-6 border border-gray-300 w-full mb-6">
                <h2 class="text-xl font-semibold text-gray-700 mb-4">Kuisioner yang Belum Diisi</h2>

                <div class="space-y-4">
                    <!-- Contoh 1 Kuisioner Belum Diisi -->
                    <div class="bg-gray-100 p-4 rounded-lg flex flex-col md:flex-row md:justify-between md:items-center border">
                        <div>
                            <p class="text-lg font-semibold text-gray-800">Tracer Study 2024</p>
                            <p class="text-gray-600">Dibuka sampai 30 April 2025</p>
                        </div>
                        <a href="/kuisioner/jawab" class="bg-blue-600 text-white px-4 py-2 rounded-lg shadow-md hover:bg-blue-700 transition mt-2 md:mt-0 w-full md:w-auto text-center">
                            Isi Kuisioner
                        </a>
                    </div>

                    <!-- Contoh Kuisioner Lainnya -->
                    <div class="bg-gray-100 p-4 rounded-lg flex flex-col md:flex-row md:justify-between md:items-center border">
                        <div>
                            <p class="text-lg font-semibold text-gray-800">Survey Kepuasan Alumni</p>
                            <p class="text-gray-600">Dibuka sampai 1 Juni 2025</p>
                        </div>
                        <a href="#" class="bg-blue-600 text-white px-4 py-2 rounded-lg shadow-md hover:bg-blue-700 transition mt-2 md:mt-0 w-full md:w-auto text-center">
                            Isi Kuisioner
                        </a>
                    </div>
                </div>
            </div>

            <!-- Kuisioner yang SUDAH diisi -->
            <div class="bg-white shadow-lg rounded-lg p-6 border border-gray-300 w-full">
                <h2 class="text-xl font-semibold text-gray-700 mb-4">Kuisioner yang Sudah Diisi</h2>

                <div class="space-y-4">
                    <!-- Contoh 1 Kuisioner Sudah Diisi -->
                    <div class="bg-green-100 p-4 rounded-lg flex flex-col md:flex-row md:justify-between md:items-center border">
                        <div>
                            <p class="text-lg font-semibold text-gray-800">Tracer Study 2023</p>
                            <p class="text-gray-600">Diisi pada 10 Februari 2024</p>
                        </div>
                        <a href="#" class="bg-green-600 text-white px-4 py-2 rounded-lg shadow-md hover:bg-green-700 transition mt-2 md:mt-0 w-full md:w-auto text-center">
                            Lihat Jawaban
                        </a>
                    </div>

                    <!-- Contoh Kuisioner Lainnya -->
                    <div class="bg-green-100 p-4 rounded-lg flex flex-col md:flex-row md:justify-between md:items-center border">
                        <div>
                            <p class="text-lg font-semibold text-gray-800">Survey Karir Alumni</p>
                            <p class="text-gray-600">Diisi pada 25 Januari 2024</p>
                        </div>
                        <a href="#" class="bg-green-600 text-white px-4 py-2 rounded-lg shadow-md hover:bg-green-700 transition mt-2 md:mt-0 w-full md:w-auto text-center">
                            Lihat Jawaban
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </section>
</div>
@include('components.end-html')
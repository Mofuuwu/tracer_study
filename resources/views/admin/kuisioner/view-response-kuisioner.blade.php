@include('components.start-html')

<div class="flex bg-gray-100 min-h-screen">
    @include('components.admin.sidebar')

    <section class="w-full flex-1 p-6">
        <h1 class="text-2xl font-bold">Jawaban Kuisioner</h1>
        <p class="text-gray-600 mb-6">Berikut adalah jawaban yang diberikan oleh mahasiswa.</p>

        <!-- Card Informasi Mahasiswa -->
        <div class="bg-white shadow-md rounded-lg p-4 border-l-4 border-blue-500 mb-6">
            <h2 class="text-lg font-semibold text-gray-900">Nama: Andi Wijaya</h2>
            <p class="text-gray-500">NIM: 202101001</p>
        </div>

        <!-- Form Jawaban Kuisioner -->
        <div class="bg-white shadow-md rounded-lg p-6">
            <!-- Soal Isian -->
            <div class="mb-4">
                <label class="text-gray-700 font-semibold">1. Apa pendapat Anda tentang fasilitas kampus?</label>
                <textarea class="w-full mt-2 p-3 border border-gray-300 rounded-lg bg-gray-100 text-gray-700" readonly>
Fasilitas kampus sudah cukup baik, tetapi perlu perbaikan di area parkir dan laboratorium.
                </textarea>
            </div>

            <!-- Soal Pilihan Ganda -->
            <div class="mb-4">
                <label class="text-gray-700 font-semibold">2. Seberapa puas Anda dengan pelayanan akademik?</label>
                <div class="mt-2">
                    <div class="flex items-center mb-2">
                        <input type="radio" class="mr-2" checked disabled>
                        <span class="text-gray-700">Sangat Puas</span>
                    </div>
                    <div class="flex items-center mb-2">
                        <input type="radio" class="mr-2" disabled>
                        <span class="text-gray-700">Puas</span>
                    </div>
                    <div class="flex items-center mb-2">
                        <input type="radio" class="mr-2" disabled>
                        <span class="text-gray-700">Cukup Puas</span>
                    </div>
                    <div class="flex items-center">
                        <input type="radio" class="mr-2" disabled>
                        <span class="text-gray-700">Tidak Puas</span>
                    </div>
                </div>
            </div>
        </div>

        <a href="/admin/respon-kuisioner" 
            class="mt-6 inline-block bg-blue-600 text-white px-4 py-2 rounded-lg shadow-md hover:bg-blue-700 transition">
            Kembali
        </a>

    </section>
</div>

@include('components.end-html')

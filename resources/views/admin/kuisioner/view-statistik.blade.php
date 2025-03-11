@include('components.start-html')

<div class="flex bg-gray-100 min-h-screen md:justify-end">
    @include('components.admin.sidebar')

    <section class="px-6 py-6 w-full md:w-[70%] lg:w-[80%] bg-gray-100 min-h-screen ">
        <h1 class="text-2xl font-bold">📊 Statistik Kuisioner</h1>
        <p class="text-gray-600 ">Analisis hasil kuisioner yang telah dijawab oleh mahasiswa.</p>
        <a href="./" 
            class=" mb-6 mt-6 inline-block bg-blue-600 text-white px-4 py-2 rounded-lg shadow-md hover:bg-blue-700 transition">
            Kembali
        </a>

        <!-- Total Siswa yang Menjawab -->
        <div class="bg-white shadow-md p-6 rounded-lg border-l-4 border-blue-500 mb-6">
            <h2 class="text-xl font-semibold text-gray-900">Total Siswa Menjawab</h2>
            <p class="text-gray-700 text-lg font-bold mt-2">25 Mahasiswa</p>
        </div>

        <!-- Statistik Pilihan Ganda -->
        <div class="bg-white shadow-md p-6 rounded-lg border-l-4 border-green-500 mb-6">
            <h2 class="text-xl font-semibold text-gray-900">📌 Statistik Pilihan Ganda</h2>
            
            <div class="mt-4 space-y-4">
                <div>
                    <h3 class="text-lg font-medium text-gray-800">1. Apa warna favorit Anda?</h3>
                    <ul class="mt-2 space-y-2">
                        <li class="flex justify-between bg-gray-100 p-3 rounded-md">
                            <span class="text-gray-700">🔵 Biru</span>
                            <span class="font-semibold text-blue-600">10 orang</span>
                        </li>
                        <li class="flex justify-between bg-gray-100 p-3 rounded-md">
                            <span class="text-gray-700">🔴 Merah</span>
                            <span class="font-semibold text-red-600">8 orang</span>
                        </li>
                        <li class="flex justify-between bg-gray-100 p-3 rounded-md">
                            <span class="text-gray-700">🟢 Hijau</span>
                            <span class="font-semibold text-green-600">7 orang</span>
                        </li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-lg font-medium text-gray-800">2. Apa makanan favorit Anda?</h3>
                    <ul class="mt-2 space-y-2">
                        <li class="flex justify-between bg-gray-100 p-3 rounded-md">
                            <span class="text-gray-700">🍕 Pizza</span>
                            <span class="font-semibold text-blue-600">12 orang</span>
                        </li>
                        <li class="flex justify-between bg-gray-100 p-3 rounded-md">
                            <span class="text-gray-700">🍔 Burger</span>
                            <span class="font-semibold text-red-600">6 orang</span>
                        </li>
                        <li class="flex justify-between bg-gray-100 p-3 rounded-md">
                            <span class="text-gray-700">🍣 Sushi</span>
                            <span class="font-semibold text-green-600">7 orang</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Jawaban Soal Isian -->
        <div class="bg-white shadow-md p-6 rounded-lg border-l-4 border-yellow-500">
            <h2 class="text-xl font-semibold text-gray-900">📝 Jawaban Soal Isian</h2>
            
            <div class="mt-4 space-y-4">
                <div>
                    <h3 class="text-lg font-medium text-gray-800">1. Apa pendapat Anda tentang layanan kampus?</h3>
                    <ul class="mt-2 space-y-2">
                        <li class="bg-gray-100 p-3 rounded-md">"Layanan kampus sangat membantu, tetapi perlu perbaikan dalam sistem administrasi."</li>
                        <li class="bg-gray-100 p-3 rounded-md">"Saya suka fasilitas kampus, terutama perpustakaan yang nyaman."</li>
                        <li class="bg-gray-100 p-3 rounded-md">"Pelayanan cukup baik, tetapi perlu peningkatan dalam layanan akademik."</li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-lg font-medium text-gray-800">2. Saran untuk meningkatkan kualitas pembelajaran?</h3>
                    <ul class="mt-2 space-y-2">
                        <li class="bg-gray-100 p-3 rounded-md">"Dosen perlu lebih banyak menggunakan teknologi dalam pembelajaran."</li>
                        <li class="bg-gray-100 p-3 rounded-md">"Lebih banyak diskusi interaktif daripada hanya ceramah."</li>
                        <li class="bg-gray-100 p-3 rounded-md">"Kurangi tugas yang terlalu banyak dan lebih fokus pada praktik."</li>
                    </ul>
                </div>
            </div>
        </div>

    </section>
</div>

@include('components.end-html')

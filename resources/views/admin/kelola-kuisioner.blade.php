@include('components.start-html')

<div class="flex bg-gray-100 min-h-screen">
    @include('components.admin.sidebar')

    <section class="w-full flex-1 p-6">
        <h1 class="text-2xl font-bold">Kelola Kuisioner</h1>
        <p class="text-gray-600 mb-6">Pilih kuisioner untuk melihat dan mengelola data.</p>
        
        <!-- Tombol Buat Kuisioner -->
        <button onclick="toggleModal(true)" 
            class="bg-green-600 text-white px-3 py-2 rounded-lg shadow-md hover:bg-green-700 transition">
            Buat Kuisioner
        </button>

        <!-- Popup Modal -->
        <div id="modalKuisioner" class="flex fixed inset-0 bg-black/50 items-center justify-center hidden">
            <div class="bg-white p-6 rounded-lg shadow-lg w-96">
                <h2 class="text-xl font-bold mb-4">Buat Kuisioner Baru</h2>
                <form action="/admin/kuisioner/store" method="POST">
                    @csrf
                    <label for="judul" class="block mb-2">Judul Kuisioner</label>
                    <input type="text" name="judul" id="judul" 
                        class="w-full border border-gray-300 p-2 rounded mb-4" required>
                    
                    <div class="flex justify-end space-x-2">
                        <button type="button" onclick="toggleModal(false)" 
                            class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">
                            Batal
                        </button>
                        <button type="submit" 
                            class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Tabel Daftar Kuisioner -->
        <div class="overflow-x-auto bg-white shadow-md rounded-lg p-4 mt-6">
            <table class="w-full border-collapse border border-gray-300">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="border border-gray-300 px-4 py-2 text-left">No</th>
                        <th class="border border-gray-300 px-4 py-2 text-left">Judul Kuisioner</th>
                        <th class="border border-gray-300 px-4 py-2 text-left">Tanggal Dibuat</th>
                        <th class="border border-gray-300 px-4 py-2 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="hover:bg-gray-100">
                        <td class="border border-gray-300 px-4 py-2">1</td>
                        <td class="border border-gray-300 px-4 py-2">Kuisioner Kepuasan Alumni</td>
                        <td class="border border-gray-300 px-4 py-2">01 Maret 2025</td>
                        <td class="border border-gray-300 px-4 py-2 text-center">
                            <a href="/admin/kelola-kuisioner/1"
                                class="bg-blue-600 text-white px-3 py-2 rounded-lg shadow-md hover:bg-blue-700 transition">
                                Lihat Kuisioner
                            </a>
                        </td>
                    </tr>
                    <tr class="hover:bg-gray-100">
                        <td class="border border-gray-300 px-4 py-2">2</td>
                        <td class="border border-gray-300 px-4 py-2">Kuisioner Status Pekerjaan</td>
                        <td class="border border-gray-300 px-4 py-2">15 Februari 2025</td>
                        <td class="border border-gray-300 px-4 py-2 text-center">
                            <a href="/kuisioner/2"
                                class="bg-blue-600 text-white px-3 py-2 rounded-lg shadow-md hover:bg-blue-700 transition">
                                Lihat Kuisioner
                            </a>
                        </td>
                    </tr>
                    <tr class="hover:bg-gray-100">
                        <td class="border border-gray-300 px-4 py-2">3</td>
                        <td class="border border-gray-300 px-4 py-2">Kuisioner Tracer Study</td>
                        <td class="border border-gray-300 px-4 py-2">10 Januari 2025</td>
                        <td class="border border-gray-300 px-4 py-2 text-center">
                            <a href="/kuisioner/3"
                                class="bg-blue-600 text-white px-3 py-2 rounded-lg shadow-md hover:bg-blue-700 transition">
                                Lihat Kuisioner
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>
</div>

<!-- Script untuk menampilkan dan menyembunyikan modal -->
<script>
    function toggleModal(show) {
        document.getElementById('modalKuisioner').style.display = show ? 'flex' : 'none';
    }
</script>

@include('components.end-html')

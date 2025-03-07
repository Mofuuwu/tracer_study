@include('components.start-html')

<div class="flex">
    @include('components.user.sidebar')

    <section class="w-full bg-gray-100">
        <div class="flex-1 p-6">
            <h1 class="text-2xl font-bold">Data Mahasiswa</h1>
            <p class="text-gray-600">Berikut data mahasiswa anda</p>
        </div>
        <div class="flex-1 px-6 py-x w-full min-h-screen">

            <!-- Card Data Diri (Tampil Default) -->
            <div id="card-info" class="bg-white shadow-lg rounded-lg p-6 border border-gray-300 w-full">
                <h2 class="text-xl font-semibold text-gray-700 mb-4">Informasi Data Diri</h2>
                <div class="grid gap-4">
                    <div>
                        <p class="text-gray-600">Nama Lengkap</p>
                        <p class="text-lg font-semibold">John Doe</p>
                    </div>
                    <div>
                        <p class="text-gray-600">NIM</p>
                        <p class="text-lg font-semibold">123456789</p>
                    </div>
                    <div>
                        <p class="text-gray-600">Program Studi</p>
                        <p class="text-lg font-semibold">Teknik Informatika</p>
                    </div>
                    <div>
                        <p class="text-gray-600">Angkatan</p>
                        <p class="text-lg font-semibold">2021</p>
                    </div>
                    <div>
                        <p class="text-gray-600">Email</p>
                        <p class="text-lg font-semibold">johndoe@example.com</p>
                    </div>
                </div>
                <!-- Tombol Edit -->
                <button onclick="toggleEdit()" class="bg-blue-600 text-white px-4 py-2 mt-4 rounded-lg shadow-md hover:bg-blue-700 transition">
                    Edit Data
                </button>
            </div>

            <!-- Card Form Edit Data (Disembunyikan Default) -->
            <div id="card-edit" class="hidden bg-white shadow-lg rounded-lg p-6 border border-gray-300 w-full">
                <h2 class="text-xl font-semibold text-gray-700 mb-4">Edit Data Diri</h2>
                <form>
                    <div class="mb-4">
                        <label class="block text-gray-700">Nama Lengkap</label>
                        <input type="text" class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" value="John Doe">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700">NIM</label>
                        <input type="text" class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" value="123456789">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700">Program Studi</label>
                        <input type="text" class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" value="Teknik Informatika">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700">Angkatan</label>
                        <input type="text" class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" value="2021">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700">Email</label>
                        <input type="email" class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" value="johndoe@example.com">
                    </div>
                    <div class="flex gap-4">
                        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded-lg shadow-md hover:bg-green-700 transition">
                            Simpan Perubahan
                        </button>
                        <button type="button" onclick="toggleEdit()" class="bg-gray-500 text-white px-4 py-2 rounded-lg shadow-md hover:bg-gray-600 transition">
                            Batal
                        </button>
                    </div>
                </form>
            </div>
        </div>



    </section>
</div>
<!-- Script untuk Toggle Edit -->
<script>
    function toggleEdit() {
        document.getElementById('card-info').classList.toggle('hidden');
        document.getElementById('card-edit').classList.toggle('hidden');
    }
</script>
@include('components.end-html')
@include('components.start-html')

<div class="flex bg-gray-100">
    @include('components.user.sidebar')

    <section class="w-full">
        <div class="flex-1 p-6">
            <h1 class="text-2xl font-bold">Data Akun</h1>
            <p class="text-gray-600">Berikut Data Untuk Akun Anda</p>
        </div>
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
                    <p class="text-lg font-semibold text-gray-800">John Doe</p>
                </div>
                <div>
                    <p class="text-gray-500">Email</p>
                    <p class="text-lg font-semibold text-gray-800">johndoe@example.com</p>
                </div>
                <div>
                    <p class="text-gray-500">NIM</p>
                    <p class="text-lg font-semibold text-gray-800">123456789</p>
                </div>
                <div>
                    <p class="text-gray-500">Status</p>
                    <p class="text-lg font-semibold text-green-500">Terverifikasi</p>
                </div>
            </div>
        </div>

        <!-- Kotak Kanan: Form Edit Akun -->
        <div class="bg-white shadow-lg rounded-lg p-6 border border-gray-300">
            <h2 class="text-xl font-semibold mb-4 text-gray-700">Edit Data Akun</h2>
            <form>
                <div class="mb-4">
                    <label class="block text-gray-600 font-medium">Nama</label>
                    <input type="text"
                        class="w-full p-3 mt-1 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none shadow-sm"
                        value="John Doe">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-600 font-medium">Email</label>
                    <input type="email"
                        class="w-full p-3 mt-1 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none shadow-sm"
                        value="johndoe@example.com">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-600 font-medium">NIM</label>
                    <input type="text"
                        class="w-full p-3 mt-1 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none shadow-sm"
                        value="123456789">
                </div>
                <button
                    class="w-full bg-blue-600 text-white px-4 py-3 rounded-lg shadow-md hover:bg-blue-700 transition">
                    Simpan Perubahan
                </button>
            </form>
        </div>
    </div>
</div>



    </section>

</div>
@include('components.end-html')
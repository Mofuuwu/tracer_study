@include('components.start-html')

<div class="flex bg-gray-100 min-h-screen md:justify-end">
    @include('components.admin.sidebar')

    <section class="px-6 py-6 w-full md:w-[70%] lg:w-[80%] bg-gray-100 min-h-screen ">
        <h1 class="text-2xl font-bold">Kelola Kuisioner</h1>
        <p class="text-gray-600 mb-6">Pilih kuisioner untuk melihat dan mengelola data.</p>
        @if(session('success'))
        <div class="w-full">
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <strong>Sukses!</strong> {{ session('success') }}
            </div>
        </div>
        @endif
        <!-- Tombol Buat Kuisioner -->
        <button onclick="toggleModal(true)"
            class="bg-green-600 text-white px-3 py-2 rounded-lg shadow-md hover:bg-green-700 transition cursor-pointer">
            Buat Kuisioner
        </button>

        <!-- Popup Modal -->
        <div id="modalKuisioner" class="flex fixed inset-0 bg-black/50 items-center justify-center hidden">
            <div class="bg-white p-6 rounded-lg shadow-lg w-96">
                <h2 class="text-xl font-bold mb-4">Buat Kuisioner Baru</h2>
                <form action="{{ route('admin.kuisioner.store') }}" method="POST">
                    @csrf
                    <label for="judul" class="block mb-2">Judul Kuisioner</label>
                    <input type="text" name="judul" id="judul"
                        class="w-full border border-gray-300 p-2 rounded mb-4" required>
                    <label for="deskripsi" class="block mb-2">Deskripsi Kuisioner</label>
                    <input type="text" name="deskripsi" id="deskripsi"
                        class="w-full border border-gray-300 p-2 rounded mb-4" required>
                    <label for="dibuka_pada" class="block mb-2">Dibuka Mulai</label>
                    <input type="date" name="dibuka_pada" id="dibuka_pada"
                        class="w-full border border-gray-300 p-2 rounded mb-4" required>
                    <label for="ditutup_pada" class="block mb-2">Ditutup Pada</label>
                    <input type="date" name="ditutup_pada" id="ditutup_pada"
                        class="w-full border border-gray-300 p-2 rounded mb-4" required>
                    <div class="flex justify-end space-x-2">
                        <button type="button" onclick="toggleModal(false)"
                            class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400 cursor-pointer">
                            Batal
                        </button>
                        <button type="submit"
                            class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700 cursor-pointer">
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
                        <th class="border border-gray-300 px-4 py-2 text-left">Status</th>
                        <th class="border border-gray-300 px-4 py-2 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($kuisioner->isEmpty())
                    <td colspan="7" class="text-center border border-gray-300 px-4 py-4">Tidak ada data Kuisioner.</td>
                    @else
                    @foreach ($kuisioner as $k)
                    <tr class="hover:bg-gray-100">
                        <td class="border border-gray-300 px-4 py-2">{{ $loop->iteration }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $k->judul }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ \Carbon\Carbon::parse($k->created_at)->translatedFormat('l, d F Y | H:i')}}</td>
                        <td class="border border-gray-300 px-4 py-2">
                            <span class="
                    @if ($k->status === 'Dibuka') text-green-600 
                    @elseif ($k->status === 'Belum Dibuka') text-yellow-600 
                    @else text-red-600 
                    @endif">
                                {{ $k->status }}
                            </span>
                        </td>
                        <td class="border border-gray-300 px-4 py-2 text-center gap-2 flex justify-center">
                            <a href="{{ route('admin.kuisioner.edit', $k->id) }}"
                                class="bg-blue-600 text-white px-3 py-2 rounded-lg shadow-md hover:bg-blue-700 transition cursor-pointer">
                                Kelola
                            </a>
                            <form action="{{ route('admin.kuisioner.hapus', $k->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus Kuisioner ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-600 text-white px-3 py-2 rounded-lg shadow-md hover:bg-red-700 transition cursor-pointer">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    @endif
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
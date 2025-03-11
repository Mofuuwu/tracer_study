@include('components.start-html')

<div class="flex bg-gray-100 w-full min-h-screen">
    @include('components.admin.sidebar')

    <section class="w-full flex-1 p-6">
        <h1 class="text-2xl font-bold mb-4">Edit Kuisioner</h1>
        <a href="./" class="bg-blue-500 text-white px-4 py-2 rounded-lg shadow-md hover:bg-blue-700 transition">Kembali</a>
        @if(session('success'))
        <div class="w-full">
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4 mt-6" role="alert">
                <strong>Sukses!</strong> {{ session('success') }}
            </div>
        </div>
        @endif

        <div id="kuisioner-view" class="bg-white p-6 rounded-lg shadow-md mt-6">
            <h1 class="text-xl font-bold text-sky-600">{{ $kuisioner->judul }}</h1>
            <p class="text-gray-600 mb-3">Deskripsi : {{ $kuisioner->deskripsi ? $kuisioner->deskripsi : 'Tidak ada deskripsi' }}</p>
            <p class="text-sm italic text-gray-800 opacity-70">Dibuka Pada : {{ \Carbon\Carbon::parse($kuisioner->dibuka_pada)->translatedFormat('l, d F Y')}}</p>
            <p class="text-sm italic text-gray-800 opacity-70">Ditutup Pada : {{ $kuisioner->ditutup_pada ? \Carbon\Carbon::parse($kuisioner->ditutup_pada)->translatedFormat('l, d F Y') : '-'}}</p>

            <!-- Tombol Edit -->
            <button id="edit-btn" class=" cursor-pointer mt-4 px-4 py-2 bg-blue-500 text-white rounded-lg shadow hover:bg-blue-700 transition">
                Edit
            </button>
        </div>

        <!-- FORM EDIT (DIPAKSA HIDDEN AWALNYA) -->
        <form id="kuisioner-form" action="{{ route('admin.kuisioner.edit_header', $kuisioner->id) }}" method="POST" class="hidden bg-white p-6 rounded-lg shadow-md mt-6">
            @csrf
            @method('PUT')

            <label class="block text-gray-700 font-semibold">Judul</label>
            <input type="text" name="judul" value="{{ $kuisioner->judul }}" class="w-full border border-gray-300 p-2 rounded-lg mb-3" required>

            <label class="block text-gray-700 font-semibold">Deskripsi</label>
            <textarea name="deskripsi" class="w-full border border-gray-300 p-2 rounded-lg mb-3">{{ $kuisioner->deskripsi }}</textarea>
            <input type="date" name="dibuka_pada"
                value="{{ $kuisioner->dibuka_pada ? \Carbon\Carbon::parse($kuisioner->dibuka_pada)->format('Y-m-d') : '' }}"
                class="w-full border border-gray-300 p-2 rounded-lg mb-3" required>

            <input type="date" name="ditutup_pada"
                value="{{ $kuisioner->ditutup_pada ? \Carbon\Carbon::parse($kuisioner->ditutup_pada)->format('Y-m-d') : '' }}"
                class="w-full border border-gray-300 p-2 rounded-lg mb-4">

            <!-- Tombol Batal & Simpan -->
            <div class="flex gap-4">
                <button type="button" id="cancel-btn" class=" cursor-pointer px-4 py-2 bg-gray-500 text-white rounded-lg shadow hover:bg-gray-700 transition">
                    Batal
                </button>
                <button type="submit" class=" cursor-pointer px-4 py-2 bg-green-500 text-white rounded-lg shadow hover:bg-green-700 transition">
                    Simpan
                </button>
            </div>
        </form>

        <form action="{{ route('admin.kuisioner.edit_isi', $kuisioner->id) }}" method="POST" class="bg-white p-6 rounded-lg shadow-md mt-6">
            @csrf
            @method('PUT')
            <h1 class="text-xl font-bold mb-4 text-sky-600">Tambah Soal</h1>
            <!-- Form Tambah Soal -->
            <div id="soal-container">
                <div class="mb-4 soal-item">
                    <label class="block text-gray-700 font-semibold">Pertanyaan 1</label>
                    <input type="text" name="soal[]" class="w-full border border-gray-300 p-2 rounded-lg" placeholder="Tulis pertanyaan" required>

                    <!-- Pilihan tipe soal -->
                    <select name="tipe_soal[]" class="w-full border border-gray-300 p-2 rounded-lg mt-2 tipe-soal">
                        <option value="isian">Isian</option>
                        <option value="pilihan_ganda">Pilihan Ganda</option>
                    </select>

                    <!-- Container untuk Pilihan Ganda -->
                    <div class="hidden mt-2 pilihan-container">
                        <p class="text-gray-700 font-semibold">Opsi Jawaban:</p>
                        <div class="space-y-2 pilihan-list">
                            <input required type="text" name="pilihan[0][]" class="w-full border border-gray-300 p-2 rounded-lg" placeholder="Pilihan 1">
                            <input required type="text" name="pilihan[0][]" class="w-full border border-gray-300 p-2 rounded-lg" placeholder="Pilihan 2">
                        </div>
                        <button type="button" class="mt-2 text-blue-600 hover:underline tambah-pilihan">+ Tambah Pilihan</button>
                    </div>

                    <!-- Tombol Hapus -->
                    <button type="button" class="cursor-pointer text-red-600 hover:underline mt-2 hapus-soal">Hapus Pertanyaan</button>
                </div>
            </div>

            <!-- Tombol -->
            <div class="flex gap-4 mt-4 justify-between">
                <button type="submit" id="save-button" class="bg-green-600 text-white px-4 py-2 rounded-lg shadow-md hover:bg-green-700 transition cursor-pointer">Simpan</button>
                <button type="button" id="tambah-soal" class="bg-blue-500 text-white px-4 py-2 rounded-lg shadow-md hover:bg-blue-700 transition cursor-pointer">Tambah Soal</button>
            </div>
        </form>

        <div class="mt-8 bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-xl font-bold mb-4 text-sky-600">Preview Kuisioner</h2>

            @if($soal->count() > 0)
            <div class="space-y-6">
                @foreach($soal as $s)
                <div class="flex items-center justify-between py-2">
                    <div>
                        <p class="font-medium text-gray-800">{{ $loop->iteration }}. {{ $s->pertanyaan }}</p>
                        <p class="text-sm text-gray-500">{{ str_replace('_', ' ', ucfirst($s->tipe)) }}</p>

                        @if($s->tipe == 'pilihan_ganda' && $s->pilihan_jawaban->count() > 0)
                        <div class="mt-1">
                            <p class="text-sm font-medium text-gray-700">Opsi Jawaban:</p>
                            <ul class="list-none pl-0 text-sm text-gray-600">
                                @foreach($s->pilihan_jawaban as $p)
                                <li>- {{ $p->opsi }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                    </div>

                    <!-- Tombol Hapus -->
                    <form action="{{ route('admin.kuisioner.soal.hapus', ['id' => $kuisioner->id, 'soal_id' => $s->id]) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus soal ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 hover:text-red-700 transition font-medium cursor-pointer">
                            Hapus
                        </button>
                    </form>
                </div>
                @if(!$loop->last)
                <hr class="border-gray-300">
                @endif
                @endforeach
            </div>
            @else
            <p class="text-gray-600">Belum ada soal yang dibuat.</p>
            @endif
        </div>


    </section>
</div>

@include('components.end-html')


<!-- Script -->
<script>
    document.getElementById("tambah-soal").addEventListener("click", function() {
        let soalContainer = document.getElementById("soal-container");
        let soalCount = document.querySelectorAll(".soal-item").length + 1;

        let newSoal = document.createElement("div");
        newSoal.classList.add("mb-4", "soal-item");
        newSoal.innerHTML = `
            <label class="block text-gray-700 font-semibold">Pertanyaan ${soalCount}</label>
            <input type="text" name="soal[]" class="w-full border border-gray-300 p-2 rounded-lg" placeholder="Tulis pertanyaan">

            <select name="tipe_soal[]" class="w-full border border-gray-300 p-2 rounded-lg mt-2 tipe-soal">
                <option value="isian">Isian</option>
                <option value="pilihan_ganda">Pilihan Ganda</option>
            </select>

            <div class="hidden mt-2 pilihan-container">
                <p class="text-gray-700 font-semibold">Opsi Jawaban:</p>
                <div class="space-y-2 pilihan-list">
                    <input required type="text" name="pilihan[]" class="w-full border border-gray-300 p-2 rounded-lg" placeholder="Pilihan 1">
                    <input required type="text" name="pilihan[]" class="w-full border border-gray-300 p-2 rounded-lg" placeholder="Pilihan 2">
                </div>
                <button type="button" class="mt-2 text-blue-600 hover:underline tambah-pilihan">+ Tambah Pilihan</button>
            </div>

            <button type="button" class="text-red-600 hover:underline mt-2 hapus-soal">Hapus Pertanyaan</button>
        `;

        soalContainer.appendChild(newSoal);
    });

    document.addEventListener("change", function(event) {
        if (event.target.classList.contains("tipe-soal")) {
            let pilihanContainer = event.target.closest(".soal-item").querySelector(".pilihan-container");
            if (event.target.value === "pilihan_ganda") {
                pilihanContainer.classList.remove("hidden");
            } else {
                pilihanContainer.classList.add("hidden");
            }
        }
    });

    document.addEventListener("click", function(event) {
    // Tambah Pilihan Jawaban
    if (event.target.classList.contains("tambah-pilihan")) {
        let soalItem = event.target.closest(".soal-item");
        let index = Array.from(document.querySelectorAll(".soal-item")).indexOf(soalItem);
        let list = soalItem.querySelector(".pilihan-list");

        let pilihanWrapper = document.createElement("div");
        pilihanWrapper.classList.add("flex", "items-center", "gap-2");

        let input = document.createElement("input");
        input.type = "text";
        input.name = `pilihan[${index}][]`;
        input.classList.add("w-full", "border", "border-gray-300", "p-2", "rounded-lg");
        input.placeholder = "Pilihan " + (list.children.length + 1);
        input.required = true;

        let hapusBtn = document.createElement("button");
        hapusBtn.type = "button";
        hapusBtn.classList.add("text-red-600", "hover:underline", "hapus-pilihan");
        hapusBtn.innerText = "Hapus";

        pilihanWrapper.appendChild(input);
        pilihanWrapper.appendChild(hapusBtn);
        list.appendChild(pilihanWrapper);
    }

    // Hapus Pilihan Jawaban
    if (event.target.classList.contains("hapus-pilihan")) {
        event.target.parentElement.remove();
    }

    // Hapus Soal
    if (event.target.classList.contains("hapus-soal")) {
        event.target.closest(".soal-item").remove();
    }
});


    document.getElementById("edit-btn").addEventListener("click", function() {
        document.getElementById("kuisioner-view").classList.add("hidden");
        document.getElementById("kuisioner-form").classList.remove("hidden");
    });

    document.getElementById("cancel-btn").addEventListener("click", function() {
        document.getElementById("kuisioner-view").classList.remove("hidden");
        document.getElementById("kuisioner-form").classList.add("hidden");
    });
</script>
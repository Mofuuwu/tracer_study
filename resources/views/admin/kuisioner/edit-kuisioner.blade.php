@include('components.start-html')

<div class="flex bg-gray-100 w-full min-h-screen">
    @include('components.admin.sidebar')

    <section class="w-full flex-1 p-6">
        <h1 class="text-2xl font-bold mb-4">Edit Kuisioner</h1>
        <a href="./" class="bg-blue-500 text-white px-4 py-2 rounded-lg shadow-md hover:bg-blue-700 transition">Kembali</a>

        <!-- Notifikasi Mode Edit -->
        <!-- <p id="edit-mode-text" class="hidden text-red-600 font-semibold mb-4">Mode Edit Aktif</p> -->

        <!-- Form untuk mengedit kuisioner -->
        <form action="/kuisioner/update" method="POST" class="bg-white p-6 rounded-lg shadow-md mt-6">
            @csrf
            @method('PUT')

            <div id="soal-container">
                <!-- Pertanyaan Default -->
                <div class="mb-4 soal-item">
                    <label class="block text-gray-700 font-semibold">Pertanyaan</label>
                    <input type="text" name="soal[]" class="w-full border border-gray-300 p-2 rounded-lg" placeholder="Tulis pertanyaan">

                    <!-- Pilihan tipe soal -->
                    <select name="tipe_soal[]" class="w-full border border-gray-300 p-2 rounded-lg mt-2 tipe-soal">
                        <option value="isian">Isian</option>
                        <option value="pilihan_ganda">Pilihan Ganda</option>
                    </select>

                    <!-- Container untuk Pilihan Ganda -->
                    <div class="hidden mt-2 pilihan-container">
                        <p class="text-gray-700 font-semibold">Opsi Jawaban:</p>
                        <div class="space-y-2 pilihan-list">
                            <input type="text" name="pilihan[]" class="w-full border border-gray-300 p-2 rounded-lg" placeholder="Pilihan 1">
                            <input type="text" name="pilihan[]" class="w-full border border-gray-300 p-2 rounded-lg" placeholder="Pilihan 2">
                        </div>
                        <button type="button" class="mt-2 text-blue-600 hover:underline tambah-pilihan">+ Tambah Pilihan</button>
                    </div>

                    <!-- Tombol Hapus -->
                    <button type="button" class="text-red-600 hover:underline mt-2 hapus-soal">Hapus Pertanyaan</button>
                </div>
            </div>

            <!-- Tombol -->
            <div class="flex gap-4 mt-4 justify-between">
                <button type="submit" id="save-button" class="bg-green-600 text-white px-4 py-2 rounded-lg shadow-md hover:bg-green-700 transition">Simpan</button>
                <button type="button" id="tambah-soal" class="bg-blue-500 text-white px-4 py-2 rounded-lg shadow-md hover:bg-blue-700 transition">Tambah Soal</button>
            </div>
        </form>
    </section>
</div>

@include('components.end-html')

<!-- Script -->
<script>
    document.getElementById("tambah-soal").addEventListener("click", function () {
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
                    <input type="text" name="pilihan[]" class="w-full border border-gray-300 p-2 rounded-lg" placeholder="Pilihan 1">
                    <input type="text" name="pilihan[]" class="w-full border border-gray-300 p-2 rounded-lg" placeholder="Pilihan 2">
                </div>
                <button type="button" class="mt-2 text-blue-600 hover:underline tambah-pilihan">+ Tambah Pilihan</button>
            </div>

            <button type="button" class="text-red-600 hover:underline mt-2 hapus-soal">Hapus Pertanyaan</button>
        `;

        soalContainer.appendChild(newSoal);
    });

    document.addEventListener("change", function (event) {
        if (event.target.classList.contains("tipe-soal")) {
            let pilihanContainer = event.target.closest(".soal-item").querySelector(".pilihan-container");
            if (event.target.value === "pilihan_ganda") {
                pilihanContainer.classList.remove("hidden");
            } else {
                pilihanContainer.classList.add("hidden");
            }
        }
    });

    document.addEventListener("click", function (event) {
        if (event.target.classList.contains("hapus-soal")) {
            event.target.closest(".soal-item").remove();
        }

        if (event.target.classList.contains("tambah-pilihan")) {
            let list = event.target.closest(".soal-item").querySelector(".pilihan-list");
            let input = document.createElement("input");
            input.type = "text";
            input.name = "pilihan[]";
            input.classList.add("w-full", "border", "border-gray-300", "p-2", "rounded-lg");
            input.placeholder = "Pilihan " + (list.children.length + 1);
            list.appendChild(input);
        }
    });
</script>

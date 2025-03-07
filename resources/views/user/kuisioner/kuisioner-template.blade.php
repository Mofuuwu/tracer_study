@include('components.start-html')

<div class="flex">
    @include('components.user.sidebar')

    <div class="flex-1 px-6 py-6 w-full bg-gray-100 min-h-screen flex gap-6 md:gap-0 md:flex-row flex-col md:justify-center">
        <div class="w-full max-w-4xl bg-white shadow-lg rounded-lg p-6 border border-gray-300">
            <div class="flex justify-between">
                <h1 class="text-3xl font-bold text-gray-800 mb-4">Isi Kuisioner</h1>
            <a href="{{ route('user.kuisioner') }}" class="cursor-pointer md:block hidden mb-4 bg-red-400 text-white px-4 py-2 rounded-lg shadow-md hover:bg-gray-500 transition">
                Kembali Ke Beranda
            </a>
            </div>
            
            <p class="text-gray-600 mb-4">Jawablah semua pertanyaan dengan jujur.</p>

            <!-- Container Soal -->
            <div id="soal-container">
                @foreach($pertanyaan as $index => $soal)
                    <div class="soal hidden" data-index="{{ $index }}">
                        <label class="block text-gray-700 font-semibold mb-2">{{ $index + 1 }}. {{ $soal }}</label>
                        <textarea class="w-full p-3 border rounded-lg focus:ring focus:ring-blue-200 jawaban" data-index="{{ $index }}" rows="3"></textarea>
                    </div>
                @endforeach
            </div>

            <!-- Navigasi Soal -->
            <div class="flex justify-between items-center mt-6">
                <button id="prevBtn" class="bg-gray-400 text-white px-4 py-2 rounded-lg shadow-md hover:bg-gray-500 transition" disabled>
                    Back
                </button>

                <button id="nextBtn" class="bg-blue-600 text-white px-4 py-2 rounded-lg shadow-md hover:bg-blue-700 transition">
                    Next
                </button>
            </div>
        </div>

        <!-- Kotak Daftar Soal -->
        <div class="lg:w-80 md:w-100 w-full md:ml-6 ml-0 bg-gray-200 p-4 rounded-lg shadow-md">
            <h2 class="text-lg font-semibold text-gray-800 mb-4">Nomor Soal</h2>
            <div id="nomor-container" class="grid md:grid-cols-5 sm:grid-cols-10 grid-cols-6 gap-2">
                @foreach($pertanyaan as $index => $soal)
                    <button class="nomor w-10 h-10 rounded bg-gray-300 hover:bg-gray-400 transition" data-index="{{ $index }}">
                        {{ $index + 1 }}
                    </button>
                @endforeach
            </div>
        </div>
        <a href="{{ route('user.kuisioner') }}" class="cursor-pointer block md:hidden mb-4 bg-red-400 text-white px-4 py-2 rounded-lg shadow-md hover:bg-gray-500 transition" disabled>
            Kembali Ke Beranda
        </a>
    </div>
</div>

@include('components.end-html')

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        let totalSoal = $(".soal").length;
        let currentSoal = 0;
        let jawaban = {}; // Menyimpan jawaban pengguna

        function updateSoal() {
            $(".soal").addClass("hidden");
            $(".soal[data-index='" + currentSoal + "']").removeClass("hidden");

            $("#prevBtn").prop("disabled", currentSoal === 0);
            $("#nextBtn").text(currentSoal === totalSoal - 1 ? "Submit" : "Next");

            $(".nomor").removeClass("bg-blue-500 text-white"); // Reset warna nomor soal
            $(".nomor[data-index='" + currentSoal + "']").addClass("bg-blue-500 text-white");
        }

        function updateStatusNomor() {
            $(".jawaban").each(function() {
                let index = $(this).data("index");
                if ($(this).val().trim() !== "") {
                    $(".nomor[data-index='" + index + "']").addClass("bg-green-400").removeClass("bg-gray-300");
                } else {
                    $(".nomor[data-index='" + index + "']").addClass("bg-gray-300").removeClass("bg-green-400");
                }
            });
        }

        $(".nomor").click(function() {
            currentSoal = $(this).data("index");
            updateSoal();
        });

        $("#nextBtn").click(function() {
            if (currentSoal < totalSoal - 1) {
                currentSoal++;
                updateSoal();
            } else {
                alert("Kuisioner telah disubmit!");
            }
        });

        $("#prevBtn").click(function() {
            if (currentSoal > 0) {
                currentSoal--;
                updateSoal();
            }
        });

        $(".jawaban").on("input", function() {
            updateStatusNomor();
        });

        updateSoal();
    });
</script>

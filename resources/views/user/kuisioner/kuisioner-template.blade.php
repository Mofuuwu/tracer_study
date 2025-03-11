@include('components.start-html')

<div class="flex md:justify-end">
    @include('components.user.sidebar')
    <div class="px-6 py-6 w-full md:w-[70%] lg:w-[80%] bg-gray-100 min-h-screen ">
        <div class="flex justify-between flex-col md:flex-row">
            <div>
                <h1 class="text-3xl font-bold text-gray-800">{{ $kuisioner->judul }}</h1>
                <p class="text-gray-600 mb-3">{{ $kuisioner->deskripsi ? $kuisioner->deskripsi : 'Tidak ada deskripsi' }}</p>
                <p class="text-sm italic text-gray-600">Dibuka Pada: {{ \Carbon\Carbon::parse($kuisioner->dibuka_pada)->translatedFormat('l, d F Y') }}</p>
                <p class="text-sm italic text-gray-600 mb-6">Ditutup Pada: {{ $kuisioner->ditutup_pada ? \Carbon\Carbon::parse($kuisioner->ditutup_pada)->translatedFormat('l, d F Y') : '-' }}</p>
            </div>
            <button
                onclick="confirmExit()"
                class="cursor-pointer h-fit mb-4 bg-red-400 text-white px-4 py-2 rounded-lg shadow-md hover:bg-gray-500 transition">
                Kembali Ke Beranda
            </button>
        </div>
            @if ($errors->any())
            Error Memperbarui Data :
            <div class="text-red-500 text-sm w-full mb-6">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            @if (session('error'))
            <div class="alert alert-danger text-red-500 text-sm">
                {{ session('error') }}
            </div>
            @endif

        <!-- Form Kuisioner -->
        <div class="w-full">
            <form id="kuisionerForm" action="{{ route('user.kuisioner.submit') }}" method="POST">
                @csrf
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                <input type="hidden" name="kuisioner_id" value="{{ $kuisioner->id }}">

                <!-- Loop Semua Soal dalam Satu Halaman -->
                @foreach($soal as $index => $s)
                <div class="mb-3 w-full bg-white shadow-lg rounded-lg p-6 border border-gray-300">
                    <label class="block text-gray-700 font-semibold mb-2">{{ $index + 1 }}. {{ $s->pertanyaan }}</label>

                    @if($s->tipe === 'isian')
                    <textarea required name="jawaban[{{ $s->id }}]" class="w-full p-3 border rounded-lg focus:ring focus:ring-blue-200" rows="3"></textarea>
                    @elseif($s->tipe === 'pilihan_ganda')
                    @foreach($s->pilihan_jawaban as $opsi)
                    <div class="flex items-center mb-2">
                        <input required type="radio" id="jawaban-{{ $s->id }}-{{ $loop->index }}" name="jawaban[{{ $s->id }}]" class="mr-2" value="{{ $opsi->id }}">
                        <label for="jawaban-{{ $s->id }}-{{ $loop->index }}" class="text-gray-700 cursor-pointer">{{ $opsi->opsi }}</label>
                    </div>
                    @endforeach
                    @endif
                </div>
                @endforeach

                <!-- Tombol Submit -->
                <div class="flex justify-center mt-6">
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg shadow-md hover:bg-blue-700 transition w-full">
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@include('components.end-html')

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    function confirmExit() {
        if (confirm("Apakah Anda yakin ingin kembali ke beranda? Semua jawaban yang belum disimpan akan hilang.")) {
            window.location.href = "{{ route('user.kuisioner') }}";
        }
    }

</script>

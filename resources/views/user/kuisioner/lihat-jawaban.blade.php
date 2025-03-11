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
            <button onclick="window.history.back()"
                class="cursor-pointer h-fit mb-4 bg-red-400 text-white px-4 py-2 rounded-lg shadow-md hover:bg-gray-500 transition">
                Kembali Ke Beranda
            </button>
        </div>

        <div class="w-full">
            @foreach($kuisioner->soal as $index => $s)
            <div class="mb-3 w-full bg-white shadow-lg rounded-lg p-6 border border-gray-300">
                <label class="block text-gray-700 font-semibold mb-2">{{ $index + 1 }}. {{ $s->pertanyaan }}</label>

                @if($s->tipe === 'isian')
                    <textarea disabled class="w-full p-3 border rounded-lg focus:ring focus:ring-blue-200 bg-gray-200" rows="3">{{ $jawabanUser[$s->id] ?? 'Belum dijawab' }}</textarea>
                @elseif($s->tipe === 'pilihan_ganda')
                    @foreach($s->pilihan_jawaban as $opsi)
                    <div class="flex items-center mb-2">
                        <input type="radio" disabled 
                            class="mr-2"
                            {{ isset($jawabanUser[$s->id]) && $jawabanUser[$s->id] == $opsi->id ? 'checked' : '' }}>
                        <label class="text-gray-700">{{ $opsi->opsi }}</label>
                    </div>
                    @endforeach
                @endif
            </div>
            @endforeach
        </div>
    </div>
</div>

@include('components.end-html')

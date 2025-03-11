@include('components.start-html')

<div class="flex bg-gray-100 min-h-screen md:justify-end">
    @include('components.admin.sidebar')

    <section class="px-6 py-6 w-full md:w-[70%] lg:w-[80%] bg-gray-100 min-h-screen ">
        <!-- Form Jawaban Kuisioner -->
        <div class="flex justify-between flex-col md:flex-row">
            <div>
                <h1 class="text-3xl font-bold text-gray-800">{{ $kuisioner->judul }}</h1>
                <p class="text-gray-600 mb-3">{{ $kuisioner->deskripsi ? $kuisioner->deskripsi : 'Tidak ada deskripsi' }}</p>
                <p class="text-sm italic text-gray-600 ml-4">Dibuka Pada: {{ \Carbon\Carbon::parse($kuisioner->dibuka_pada)->translatedFormat('l, d F Y') }}</p>
                <p class="text-sm italic text-gray-600 mb-6 ml-4">Ditutup Pada: {{ $kuisioner->ditutup_pada ? \Carbon\Carbon::parse($kuisioner->ditutup_pada)->translatedFormat('l, d F Y') : '-' }}</p>
            </div>
            <button onclick="window.history.back()"
                class="cursor-pointer h-fit mb-4 bg-red-400 text-white px-4 py-2 rounded-lg shadow-md hover:bg-gray-500 transition">
                Kembali
            </button>
        </div>
        <h1 class="text-2xl font-bold">Data Mahasiswa</h1>
        <p class="text-gray-600 mb-6">Berikut adalah data mahasiswa yang mengisi.</p>
        <!-- Card Informasi Mahasiswa -->
        <div class="bg-white shadow-md rounded-lg p-4 border-l-4 border-blue-500 mb-6">
            <h2 class="text-lg font-semibold text-gray-900">Nama : {{ $mahasiswa->nama }}</h2>
            <p class="text-gray-500">NIM : {{ $mahasiswa->nim }}</p>
            <p class="text-gray-500">Program Studi : {{ $mahasiswa->prodi }}</p>
            <div class=" min-h-[1.5px] w-full bg-gray-200 my-2"></div>
            <p class="text-gray-500">Fakultas : {{ $mahasiswa->fakultas }}</p>
            <p class="text-gray-500">Angkatan : {{ $mahasiswa->angkatan }}</p>
            <p class="text-gray-500">Semester : {{ $mahasiswa->semester }}</p>
            <p class="text-gray-500">Status : {{ $mahasiswa->status }}</p>
            <div class=" min-h-[1.5px] w-full bg-gray-200 my-2"></div>
            <p class="text-gray-500">Email : {{ $mahasiswa->email }}</p>
            <p class="text-gray-500">No. Handphone : {{ $mahasiswa->no_hp }}</p>
            <p class="text-gray-500">Alamat : {{ $mahasiswa->alamat }}</p>
        </div>

        <h1 class="text-2xl font-bold">Jawaban Kuisioner</h1>
        <p class="text-gray-600 mb-6">Berikut adalah jawaban yang diberikan oleh mahasiswa.</p>

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
    </section>
</div>

@include('components.end-html')
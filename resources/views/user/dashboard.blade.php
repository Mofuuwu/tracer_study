@include('components.start-html')

<div class="flex md:justify-end">
    @include('components.user.sidebar')
    <section class="px-6 py-6 w-full md:w-[70%] lg:w-[80%] bg-gray-100 min-h-screen">
        <div class="flex-1 md:flex p-6 justify-between">
            <div>
                <h1 class="text-2xl font-bold">Selamat Datang</h1>
                <p class="text-gray-600">Pilih menu di sidebar untuk mengelola data.</p>
            </div>
            <div class="flex md:justify-end items-center">
                <a href="{{ route('logout') }}" class="bg-red-600 text-white px-5 py-3 rounded-lg shadow-md hover:bg-red-700 transition h-fit">
                    Logout
                </a>
            </div>
        </div>

        <div class="flex-1 px-6 py-3 w-full min-h-screen">

            <!-- Statistik -->
            <div class="grid md:grid-cols-3 gap-2 md:gap-6 grid-cols-1">
                <div class="bg-white shadow-lg rounded-lg px-6 py-3 border border-gray-300">
                    <h2 class="text-lg font-semibold text-gray-700">Kuisioner Belum Dijawab</h2>
                    <p class="text-4xl font-bold text-blue-600 mt-2">{{ $kuisionerBelumDijawab->count() }}</p>
                </div>

                <div class="bg-white shadow-lg rounded-lg p-6 border border-gray-300">
                    <h2 class="text-lg font-semibold text-gray-700">Kuisioner Sudah Dijawab</h2>
                    <p class="text-4xl font-bold text-green-600 mt-2">{{ $kuisionerSudahDijawab->count() }}</p>
                </div>

                <div class="bg-white shadow-lg rounded-lg p-6 border border-gray-300">
                    <h2 class="text-lg font-semibold text-gray-700">Total Kuisioner</h2>
                    <p class="text-4xl font-bold text-gray-800 mt-2">{{ $totalKuisioner }}</p>
                </div>
            </div>

            <!-- Daftar Kuisioner Belum Dijawab -->
            <div class="mt-8 bg-white shadow-lg rounded-lg p-6 border border-gray-300">
                <h2 class="text-xl font-semibold text-gray-700 mb-4">Kuisioner yang Belum Dijawab</h2>

                @if($kuisionerBelumDijawab->isEmpty())
                    <p class="text-gray-600">Semua kuisioner sudah dijawab.</p>
                @else
                    <div class="overflow-x-auto">
                        <table class="w-full border-collapse border border-gray-300 min-w-[600px]">
                            <thead>
                                <tr class="bg-gray-200">
                                    <th class="border border-gray-300 px-4 py-2 text-left">No</th>
                                    <th class="border border-gray-300 px-4 py-2 text-left">Judul Kuisioner</th>
                                    <th class="border border-gray-300 px-4 py-2 text-left">Tanggal Dibuat</th>
                                    <th class="border border-gray-300 px-4 py-2 text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($kuisionerBelumDijawab as $index => $kuisioner)
                                <tr>
                                    <td class="border border-gray-300 px-4 py-2">{{ $index + 1 }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $kuisioner->judul }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ \Carbon\Carbon::parse($kuisioner->created_at)->format('d M Y') }}</td>
                                    <td class="border border-gray-300 px-4 py-2 text-center">
                                        <a href="{{ route('user.kuisioner.isi', $kuisioner->id) }}" class="bg-blue-600 text-white px-3 py-2 rounded-lg shadow-md hover:bg-blue-700 transition">
                                            Jawab
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>

        </div>
    </section>
</div>

@include('components.end-html')

@include('components.start-html')

<div class="flex bg-gray-100 min-h-screen md:justify-end">
    @include('components.admin.sidebar')

    <section class="px-6 py-6 w-full md:w-[70%] lg:w-[80%] bg-gray-100 min-h-screen ">
        <h1 class="text-2xl font-bold">Daftar Kuisioner</h1>
        <p class="text-gray-600 mb-4">Pilih menu di sidebar untuk mengelola data.</p>

        <div class="overflow-x-auto bg-white p-6 rounded-lg shadow-md">
            <table class="w-full border-collapse border border-gray-300">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="border border-gray-300 p-2 text-left">No</th>
                        <th class="border border-gray-300 p-2 text-left">Judul Kuisioner</th>
                        <th class="border border-gray-300 p-2 text-left">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kuisioners as $index => $kuisioner)
                    <tr class="border border-gray-300">
                        <td class="border border-gray-300 p-2">{{ $index + 1 }}</td>
                        <td class="border border-gray-300 p-2">{{ $kuisioner->judul }}</td>
                        <td class="border border-gray-300 p-2">
                            <a href="{{ route('admin.respon-kuisioner.kuisioner.lihat', $kuisioner->id) }}" class="text-blue-600 hover:underline">Lihat Respon</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </section>
</div>

@include('components.end-html')
@include('components.start-html')

<div class="flex">
    @include('components.user.sidebar')

    <section>
        <div class="flex-1 p-6">
            <h1 class="text-2xl font-bold">Data Mahasiswa</h1>
            <p class="text-gray-600">Berikut data mahasiswa anda</p>
        </div>
    </section>
</div>
@include('components.end-html')
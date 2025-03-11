@include('components.start-html')

<div class="flex fixed top-0 left-0 md:w-[30%] lg:w-[20%]">
    <button id="menu-toggle" class="fixed top-4 right-4 z-50 bg-blue-900 text-white px-6 py-3 rounded-lg md:hidden">
        ☰
    </button>
    <!-- Sidebar -->
    <div id="sidebar" class="w-full fixed md:relative w-64 bg-blue-900 text-white min-h-screen p-5 transform -translate-x-full md:translate-x-0 transition-transform">
        <h2 class="text-xl font-bold mb-6">Tracer Study</h2>
        <ul>
            <li class="mb-4">
                <a href="/admin" class="{{ Request::is('admin') ? 'text-yellow-300 underline' : '' }} font-semibold block px-4 py-2 rounded hover:bg-blue-700">Beranda</a>
            </li>
            <li class="mb-4">
                <a href="/admin/verifikasi-mahasiswa" class="{{ Request::is('admin/verifikasi-mahasiswa*') ? 'text-yellow-300 underline' : '' }} font-semibold block px-4 py-2 rounded hover:bg-blue-700">Verifikasi Mahasiswa</a>
            </li>
            <li class="mb-4">
                <a href="/admin/data-mahasiswa" class="{{ Request::is('admin/data-mahasiswa*') ? 'text-yellow-300 underline' : '' }} font-semibold block px-4 py-2 rounded hover:bg-blue-700">Data Mahasiswa</a>
            </li>
            <li class="mb-4">
                <a href="/admin/kelola-kuisioner" class="{{ Request::is('admin/kelola-kuisioner*') ? 'text-yellow-300 underline' : '' }} font-semibold block px-4 py-2 rounded hover:bg-blue-700">Kelola Kuisioner</a>
            </li>
            <li class="mb-4">
                <a href="/admin/respon-kuisioner" class="{{ Request::is('admin/respon-kuisioner*') ? 'text-yellow-300 underline' : '' }} font-semibold block px-4 py-2 rounded hover:bg-blue-700">Respon Kuisioner</a>
            </li>
        </ul>
    </div>
</div>

@include('components.end-html')

<!-- jQuery untuk Toggle Sidebar -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $("#menu-toggle").click(function() {
            $("#sidebar").toggleClass("-translate-x-full");
        });
    });
</script>
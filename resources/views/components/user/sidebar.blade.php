@include('components.start-html')

<div class="flex">
    <!-- Tombol Menu (Hamburger) -->
    <button id="menu-toggle" class="fixed top-4 right-4 z-50 bg-blue-900 text-white px-6 py-3 rounded-lg md:hidden">
        ☰
    </button>

    <!-- Sidebar -->
    <div id="sidebar" class="fixed md:relative w-64 bg-blue-900 text-white min-h-screen p-5 transform -translate-x-full md:translate-x-0 transition-transform">
        <h2 class="text-base md:text-xl font-bold mb-6">Tracer Study</h2>
        <ul>
            <li class="mb-4">
                <a href="/" class="{{ Request::is('/') ? 'text-yellow-300 underline' : '' }} font-semibold block px-4 py-2 rounded hover:bg-blue-700">Beranda</a>
            </li>
            <li class="mb-4">
                <a href="/data-akun" class="{{ Request::is('data-akun') ? 'text-yellow-300 underline' : '' }} block px-4 py-2 font-semibold rounded hover:bg-blue-700">Data Akun</a>
            </li>
            <li class="mb-4">
                <a href="/data-mahasiswa" class="{{ Request::is('data-mahasiswa') ? 'text-yellow-300 underline' : '' }} block px-4 py-2 font-semibold rounded hover:bg-blue-700">Data Diri Mahasiswa</a>
            </li>
            <li>
                <a href="/kuisioner" class="{{ Request::is('kuisioner') ? 'text-yellow-300 underline' : '' }} block px-4 py-2 font-semibold rounded hover:bg-blue-700">Data Kuisioner</a>
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

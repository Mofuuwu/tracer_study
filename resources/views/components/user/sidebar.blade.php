<div class="flex">
        <!-- Sidebar -->
        <div class="w-64 bg-blue-900 text-white min-h-screen p-5">
            <h2 class="text-xl font-bold mb-6">Tracer Study</h2>
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
<div class="flex">
        <!-- Sidebar -->
        <div class="w-64 bg-blue-900 text-white min-h-screen p-5">
            <h2 class="text-xl font-bold mb-6">Tracer Study</h2>
            <ul>
                <li class="mb-4">
                    <a href="/admin" class="{{ Request::is('admin') ? 'text-yellow-300 underline' : '' }} font-semibold block px-4 py-2 rounded hover:bg-blue-700">Beranda</a>
                </li>
                <li class="mb-4">
                    <a href="/admin/verifikasi-alumni" class="{{ Request::is('admin/verifikasi-alumni') ? 'text-yellow-300 underline' : '' }} font-semibold block px-4 py-2 rounded hover:bg-blue-700">Verifikasi Alumni</a>
                </li>
                <li class="mb-4">
                    <a href="/admin/data-alumni" class="{{ Request::is('admin/data-alumni') ? 'text-yellow-300 underline' : '' }} font-semibold block px-4 py-2 rounded hover:bg-blue-700">Data Alumni</a>
                </li>
                <li class="mb-4">
                    <a href="/admin/kelola-kuisioner" class="{{ Request::is('admin/kelola-kuisioner') ? 'text-yellow-300 underline' : '' }} font-semibold block px-4 py-2 rounded hover:bg-blue-700">Kelola Kuisioner</a>
                </li>
                <li class="mb-4">
                    <a href="/admin/respon-kuisioner" class="{{ Request::is('admin/respon-kuisioner') ? 'text-yellow-300 underline' : '' }} font-semibold block px-4 py-2 rounded hover:bg-blue-700">Respon Kuisioner</a>
                </li>
            </ul>
        </div>
    </div>
@include('components.start-html')

<div class="flex min-h-screen items-center justify-center bg-gray-100">
    <div class="w-full max-w-md bg-white p-8 shadow-md rounded-lg">
        <h2 class="text-2xl font-bold text-center">Register</h2>
        <h2 class="text-lg font-bold text-center mb-6 text-sky-600">Study Tracer</h2>
        @if ($errors->any())
        <div class="text-red-500 text-sm text-center w-full">
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
        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700">Nama</label>
                <input type="text" name="nama" required class="w-full p-2 border rounded">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Email</label>
                <input type="email" name="email" required class="w-full p-2 border rounded">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Password</label>
                <input type="password" name="password" required class="w-full p-2 border rounded">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" required class="w-full p-2 border rounded">
            </div>
            <button type="submit" class="w-full bg-green-500 text-white py-2 rounded">Daftar</button>
        </form>
        <p class="text-center text-sm mt-4">Sudah punya akun? <a href="{{ route('login') }}" class="text-blue-500">Login</a></p>
    </div>
</div>

@include('components.end-html')
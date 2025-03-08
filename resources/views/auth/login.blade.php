@include('components.start-html')

<div class="flex flex-col min-h-screen items-center justify-center bg-gray-100">
@if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
        <strong>Sukses!</strong> {{ session('success') }}
    </div>
@endif

    <div class="w-full max-w-md bg-white p-8 shadow-md rounded-lg">
        <h2 class="text-2xl font-bold text-center ">Login</h2>
        <h2 class="text-lg font-bold text-center mb-6 text-sky-600">Study Tracer</h2>
        @if(session('error'))
            <p class="text-red-500 text-sm text-center">{{ session('error') }}</p>
        @endif
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700">Email</label>
                <input type="email" name="email" required class="w-full p-2 border rounded">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Password</label>
                <input type="password" name="password" required class="w-full p-2 border rounded">
            </div>
            <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded">Login</button>
        </form>
        <p class="text-center text-sm mt-4">Belum punya akun? <a href="{{ route('register') }}" class="text-blue-500">Daftar</a></p>
    </div>
</div>

@include('components.end-html')

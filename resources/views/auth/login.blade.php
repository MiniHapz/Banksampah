<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Bank Sampah</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="bg-green-50 min-h-screen flex items-center justify-center">
    <div class="bg-white p-8 rounded shadow-md w-full max-w-md">
        <h1 class="text-2xl font-bold text-center text-green-700 mb-6">Masuk ke Bank Sampah</h1>

        {{-- Session Status --}}
        @if (session('status'))
            <div class="mb-4 text-green-600 font-semibold text-sm">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            {{-- Email --}}
            <div class="mb-4">
                <label for="email" class="block text-sm text-gray-700">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}"
                    required autofocus
                    class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-green-500">
                @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Password --}}
            <div class="mb-4">
                <label for="password" class="block text-sm text-gray-700">Password</label>
                <input id="password" type="password" name="password" required
                    class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-green-500">
                @error('password')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Remember Me --}}
            <div class="flex items-center mb-4">
                <input type="checkbox" name="remember" id="remember"
                    class="mr-2 text-green-600 focus:ring-green-500">
                <label for="remember" class="text-sm text-gray-600">Ingat saya</label>
            </div>

            {{-- Forgot Password & Submit --}}
            <div class="flex justify-between items-center mb-4">
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-sm text-green-600 hover:underline">
                        Lupa password?
                    </a>
                @endif
            </div>

            <button type="submit"
                class="w-full bg-green-600 text-white py-2 rounded hover:bg-green-700 transition">
                Masuk
            </button>
        </form>

        <p class="text-center text-sm text-gray-600 mt-6">
            Belum punya akun?
            <a href="{{ route('register') }}" class="text-green-600 hover:underline">Daftar sekarang</a>
        </p>
    </div>
</body>
</html>

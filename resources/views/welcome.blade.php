<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bank Sampah Mlinjo Bersih</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="bg-green-50 min-h-screen flex flex-col">
    <!-- Navbar -->
    <header class="bg-white shadow-md">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            <h1 class="text-2xl font-bold text-green-700">Bank Sampah Mlinjo Bersih</h1>
            <a href="{{ route('login') }}" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition">Masuk</a>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="flex-1 flex items-center justify-center px-6">
        <div class="max-w-4xl text-center">
            <h2 class="text-4xl md:text-5xl font-bold text-green-800 mb-6 leading-tight">Ubah Sampah Jadi Tabungan</h2>
            <p class="text-lg text-gray-700 mb-8">
                Bergabunglah bersama Bank Sampah Mlinjo Bersih untuk lingkungan yang lebih sehat dan masa depan yang lebih cerah. Setorkan sampah anorganikmu dan dapatkan saldo tabungan!
            </p>
            <!-- <a href="{{ route('register') }}" class="bg-green-600 text-white px-6 py-3 rounded-lg text-lg hover:bg-green-700 transition">
                Daftar Sekarang
            </a> -->
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-white text-center text-gray-600 py-4 shadow-inner">
        &copy; {{ date('Y') }} Bank Sampah Mlinjo Bersih. Semua hak gatau dilindungi ga.
    </footer>
</body>
</html>

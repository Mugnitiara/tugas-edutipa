<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda - Selamat Datang</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .hero-bg {
            background: linear-gradient(135deg, #8b5cf6 0%, #a78bfa 50%, #c084fc 100%);
        }
    </style>
</head>
<body class="hero-bg flex items-center justify-center min-h-screen py-10">
    <div class="text-center p-10 bg-white rounded-2xl shadow-xl max-w-2xl mx-auto border border-white/20">
        <!-- Ikon Selamat Datang -->
        <div class="mb-6">
            <i class="fas fa-home text-6xl text-purple-600 opacity-90"></i>
        </div>
        
        <!-- Judul Utama -->
        <h1 class="text-4xl md:text-5xl font-bold text-purple-600 mb-4 leading-tight">
            Selamat Datang di <span class="text-purple-800">Halaman Beranda</span>
        </h1>
        
        <!-- Deskripsi -->
        <p class="text-gray-700 mb-8 text-lg leading-relaxed">
            Selamat datang! Ini adalah aplikasi <b>Perpustakaan</b>. 
            Silahkan nikmati semua buku yang Anda sukai disini
        </p>
        
        <!-- Tombol Satu Saja: Menu -->
        <div class="pt-4">
            <a href="/menu" class="inline-block px-8 py-4 bg-white text-purple-600 font-bold text-lg rounded-full hover:bg-purple-100 hover:text-purple-700 transition duration-300 shadow-lg transform hover:scale-105">
                <i class="fas fa-bars mr-2"></i> Menu
            </a>
        </div>
    </div>
</body>
</html>
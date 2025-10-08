<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda - Buku Best Seller</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .hero-bg {
            background: linear-gradient(135deg, #8b5cf6 0%, #a78bfa 50%, #c084fc 100%);
        }
    </style>
</head>
<body class="hero-bg flex items-center justify-center min-h-screen py-10">

    <div class="text-center p-10 bg-white rounded-2xl shadow-xl max-w-3xl mx-auto border border-white/20">
        
        <!-- Ikon -->
        <div class="mb-6">
            <i class="fas fa-home text-6xl text-purple-600 opacity-90"></i>
        </div>
        
        <!-- Judul -->
        <h1 class="text-4xl md:text-5xl font-bold text-purple-600 mb-4 leading-tight">
            Selamat Datang di 
            <span class="text-purple-800 block">Perpustakaan-Ku</span>
        </h1>
        
        <!-- Deskripsi -->
        <p class="text-gray-700 mb-8 text-lg leading-relaxed">
            Temukan buku-buku terlaris yang sedang populer! 
            Koleksi best seller ini siap memikat hati pembaca setia perpustakaan kami.
        </p>

        <!-- Tabel Buku -->
        <div class="overflow-x-auto mb-6">
            <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-sm">
                <thead class="bg-purple-600 text-white">
                    <tr>
                        <th class="py-3 px-4 border border-gray-300 text-center">No</th>
                        <th class="py-3 px-4 border border-gray-300 text-center">Judul Buku</th>
                        <th class="py-3 px-4 border border-gray-300 text-center">Penulis</th>
                        <th class="py-3 px-4 border border-gray-300 text-center">Tahun Terbit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($books as $index => $book)
                        <tr class="border-t hover:bg-purple-50">
                            <td class="py-3 px-4 border border-gray-300 text-center">{{ $index + 1 }}</td>
                            <td class="py-3 px-4 border border-gray-300 text-center">{{ $book['judul'] }}</td>
                            <td class="py-3 px-4 border border-gray-300 text-center">{{ $book['penulis'] }}</td>
                            <td class="py-3 px-4 border border-gray-300 text-center">{{ $book['tahun'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
@if ($pesan)
    <div class="bg-purple-100 border-l-4 border-purple-500 text-purple-800 p-4 rounded-lg mt-6 text-left">
        <p><strong>Pesan dari:</strong> {{ $pesan['nama'] }}</p>
        <p class="mt-1 italic">"{{ $pesan['pesan'] }}"</p>
    </div>
@endif


        <!-- Tombol -->
        <div class="pt-6 flex flex-col md:flex-row items-center justify-center gap-4">
            <a href="/form"
               class="inline-block px-8 py-4 bg-purple-600 text-white font-bold text-lg rounded-full 
                      hover:bg-purple-700 transition duration-300 shadow-lg transform hover:scale-105">
                <i class="fas fa-comment-dots mr-2"></i> Tambah Pesan
            </a>

            <a href="/menu" 
               class="inline-block px-8 py-4 bg-white text-purple-600 font-bold text-lg rounded-full 
                      hover:bg-purple-100 hover:text-purple-700 transition duration-300 shadow-lg transform hover:scale-105">
                <i class="fas fa-bars mr-2"></i> Selengkapnya
            </a>
        </div>
    </div>

</body>
</html>

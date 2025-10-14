<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Film</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gradient-to-br from-blue-50 to-indigo-100 min-h-screen">
    <div class="max-w-5xl mx-auto mt-8 bg-white shadow-xl rounded-xl overflow-hidden">
        <!-- Header -->
        <div class="bg-gradient-to-r from-blue-600 to-indigo-700 text-white p-6 text-center">
            <h1 class="text-3xl font-bold mb-2">🎬 Daftar Film</h1>
            <p class="text-blue-100">Temukan film favoritmu dan kelola datanya</p>
        </div>

        <!-- Alert Sukses -->
        @if (session('success'))
            <div class="bg-green-100 text-green-800 p-3 m-4 rounded-md text-center">
                {{ session('success') }}
            </div>
        @endif

        <!-- Tombol Tambah & Search -->
        <div class="flex justify-between items-center px-6 py-4 bg-gray-50 border-b border-gray-200">
            <a href="{{ route('movies.create') }}" 
               class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg shadow flex items-center gap-2">
               <i class="fas fa-plus"></i> Tambah Film
            </a>
            <input id="searchInput" type="text" placeholder="Cari film..." 
                   class="border-2 border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-400">
        </div>

        <!-- Tabel -->
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200" id="moviesTable">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Judul</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Genre</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Rating</th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">Aksi</th>
                    </tr>
                </thead>
                <tbody id="moviesBody" class="bg-white divide-y divide-gray-200">
                    @forelse ($movies as $movie)
                        <tr class="hover:bg-gray-50 transition duration-150" 
                            data-judul="{{ strtolower($movie->judul) }}" 
                            data-genre="{{ strtolower($movie->genre) }}">
                            <td class="px-6 py-4 font-semibold text-gray-800">{{ $movie->judul }}</td>
                            <td class="px-6 py-4">{{ $movie->genre }}</td>
                            <td class="px-6 py-4">{{ $movie->rating }}/10</td>
                            <td class="px-6 py-4 text-center flex justify-center gap-2">
                                <!-- Tombol Show -->
                                <a href="{{ route('movies.show', $movie->id) }}" 
                                   class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded-md shadow" 
                                   title="Lihat Detail">
                                   <i class="fas fa-eye"></i>
                                </a>

                                <!-- Tombol Delete -->
                                <form action="{{ route('movies.destroy', $movie->id) }}" method="POST" class="inline" 
                                      onsubmit="return confirm('Yakin ingin menghapus film ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-md shadow" 
                                            title="Hapus Film">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-4 text-center text-gray-500">Belum ada film yang ditambahkan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Footer -->
        <div class="p-4 text-center text-gray-500 text-sm bg-gray-50">
            Total Film: {{ $movies->count() }}
        </div>
    </div>

    <!-- Script Search -->
    <script>
        const searchInput = document.getElementById('searchInput');
        const rows = document.querySelectorAll('#moviesBody tr');
        searchInput.addEventListener('input', function() {
            const term = this.value.toLowerCase();
            rows.forEach(row => {
                const text = row.textContent.toLowerCase();
                row.style.display = text.includes(term) ? '' : 'none';
            });
        });
    </script>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Film</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* Custom styles untuk animasi fade-in (dihapus karena tidak diperlukan) */
    </style>
</head>
<body class="bg-gradient-to-br from-blue-50 to-indigo-100 min-h-screen">
    <div class="max-w-4xl mx-auto mt-8 bg-white shadow-xl rounded-xl overflow-hidden">
        <!-- Header -->
        <div class="bg-gradient-to-r from-blue-600 to-indigo-700 text-white p-6 text-center">
            <h1 class="text-3xl font-bold mb-2">🎬 Daftar Film Terbaik</h1>
            <p class="text-blue-100">Temukan film favoritmu dengan mudah</p>
        </div>

        <!-- Search Bar -->
        <div class="p-6 bg-gray-50 border-b border-gray-200">
            <div class="relative max-w-md mx-auto">
                <input 
                    type="text" 
                    id="searchInput" 
                    placeholder="Cari judul atau genre film..." 
                    class="w-full pl-10 pr-4 py-3 border-2 border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200"
                >
                <i class="fas fa-search absolute left-3 top-3.5 text-gray-400"></i>
                <div id="searchResultsCount" class="mt-2 text-sm text-gray-600 text-center"></div>
            </div>
        </div>

        <!-- Tabel -->
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200" id="moviesTable">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Judul</th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Genre</th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Rating</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200" id="moviesBody">
                    @foreach ($movies as $movie)
                        <tr class="hover:bg-gray-50 transition duration-150" data-judul="{{ strtolower($movie['judul']) }}" data-genre="{{ strtolower($movie['genre']) }}">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                {{ $movie['judul'] }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-800">
                                    {{ $movie['genre'] }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                <div class="flex items-center">
                                    <i class="fas fa-star text-yellow-400 mr-1"></i>
                                    {{ $movie['rating'] }}/10
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Empty State -->
            <div id="emptyState" class="text-center py-12 hidden">
                <i class="fas fa-search text-4xl text-gray-300 mb-4"></i>
                <p class="text-gray-500 text-lg">Tidak ada film yang ditemukan. Coba kata kunci lain!</p>
            </div>
        </div>

        <!-- Footer Info -->
        <div class="p-6 bg-gray-50 text-center text-sm text-gray-500">
            Total Film: <span id="totalMovies">{{ count($movies) }}</span> | Hasil Pencarian: <span id="filteredCount">{{ count($movies) }}</span>
        </div>
    </div>

    <script>
        // JavaScript untuk fungsi search
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('searchInput');
            const tableRows = document.querySelectorAll('#moviesBody tr');
            const emptyState = document.getElementById('emptyState');
            const totalMoviesEl = document.getElementById('totalMovies');
            const filteredCountEl = document.getElementById('filteredCount');
            const searchResultsCount = document.getElementById('searchResultsCount');

            let visibleRows = tableRows.length;

            searchInput.addEventListener('input', function() {
                const searchTerm = this.value.toLowerCase().trim();
                let filteredRows = 0;

                tableRows.forEach(row => {
                    const judul = row.getAttribute('data-judul') || '';
                    const genre = row.getAttribute('data-genre') || '';
                    const text = judul + ' ' + genre;

                    if (text.includes(searchTerm)) {
                        row.style.display = '';
                        filteredRows++;
                    } else {
                        row.style.display = 'none';
                    }
                });

                // Update empty state
                if (filteredRows === 0 && searchTerm !== '') {
                    emptyState.classList.remove('hidden');
                } else {
                    emptyState.classList.add('hidden');
                }

                // Update counters
                visibleRows = filteredRows;
                filteredCountEl.textContent = filteredRows;
                if (searchTerm === '') {
                    searchResultsCount.textContent = '';
                    filteredCountEl.textContent = totalMoviesEl.textContent;
                } else {
                    searchResultsCount.textContent = `Ditemukan ${filteredRows} film`;
                }
            });
        });
    </script>
</body>
</html>

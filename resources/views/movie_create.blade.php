<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Film</title>

    <!-- Ganti Vite dengan Tailwind CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="max-w-lg mx-auto bg-white p-6 mt-10 rounded-xl shadow-lg">
        <h2 class="text-2xl font-bold mb-4 text-center text-indigo-600">Tambah Film Baru</h2>

        <form action="{{ route('movies.store') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label class="block text-sm font-medium text-gray-700">Judul Film</label>
                <input type="text" name="judul" class="w-full mt-1 p-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Genre</label>
                <input type="text" name="genre" class="w-full mt-1 p-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Rating</label>
                <input type="number" name="rating" step="0.1" min="0" max="10" class="w-full mt-1 p-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
            </div>

            <div class="flex justify-between items-center">
                <a href="{{ route('movies.index') }}" class="text-gray-600 hover:text-gray-900">← Kembali</a>
                <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</body>
</html>

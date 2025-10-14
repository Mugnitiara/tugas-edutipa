<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Film</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-blue-50 to-indigo-100 min-h-screen flex items-center justify-center">

    <div class="bg-white p-8 rounded-xl shadow-lg w-full max-w-md">
        <h1 class="text-2xl font-bold mb-6 text-center text-indigo-700">🎥 Detail Film</h1>

        <div class="space-y-3 text-gray-700">
            <p><strong>Judul:</strong> {{ $movie->judul }}</p>
            <p><strong>Genre:</strong> {{ $movie->genre }}</p>
            <p><strong>Rating:</strong> {{ $movie->rating }}/10</p>
        </div>

        <div class="mt-8 flex justify-between">
            <a href="{{ route('movies.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg">Kembali</a>
        </div>
    </div>

</body>
</html>

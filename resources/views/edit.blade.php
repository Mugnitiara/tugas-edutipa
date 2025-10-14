<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Film</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded-lg shadow-md w-96">
        <h1 class="text-2xl font-bold mb-6 text-center">Edit Film</h1>
        <form action="{{ route('movies.update', $movie->id) }}" method="POST">
            @csrf
            @method('PUT')
            <input type="text" name="judul" value="{{ $movie->judul }}" class="w-full mb-4 border p-2 rounded" required>
            <input type="text" name="genre" value="{{ $movie->genre }}" class="w-full mb-4 border p-2 rounded" required>
            <input type="number" step="0.1" name="rating" value="{{ $movie->rating }}" class="w-full mb-4 border p-2 rounded" required>
            <button type="submit" class="bg-yellow-500 text-white w-full py-2 rounded hover:bg-yellow-600">Perbarui</button>
        </form>
        <a href="{{ route('movies.index') }}" class="block text-center mt-4 text-blue-500 hover:underline">← Kembali</a>
    </div>
</body>
</html>

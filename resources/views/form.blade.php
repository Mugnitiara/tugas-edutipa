<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pesan</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-purple-100 flex items-center justify-center min-h-screen">

    <div class="bg-white p-8 rounded-xl shadow-lg w-full max-w-md">
        <h2 class="text-2xl font-bold text-purple-700 mb-4">Kirim Pesan</h2>

        <form action="{{ route('pesan.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label class="block font-semibold mb-1 text-gray-700">Nama</label>
                <input type="text" name="nama" required class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring focus:ring-purple-300">
            </div>

            <div class="mb-4">
                <label class="block font-semibold mb-1 text-gray-700">Pesan</label>
                <textarea name="pesan" required rows="4" class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring focus:ring-purple-300"></textarea>
            </div>

            <button type="submit" class="bg-purple-600 text-white px-6 py-2 rounded-full hover:bg-purple-700 transition duration-300 w-full">
                Kirim Pesan
            </button>
        </form>

        <div class="mt-4 text-center">
            <a href="{{ route('home') }}" class="text-purple-600 hover:underline">Kembali ke Beranda</a>
        </div>
    </div>

</body>
</html>

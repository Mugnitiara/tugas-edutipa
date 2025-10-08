<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        // Data buku best seller
        $books = [
            ['judul' => 'Laskar Pelangi', 'penulis' => 'Andrea Hirata', 'tahun' => 2005],
            ['judul' => 'Negeri 5 Menara', 'penulis' => 'Ahmad Fuadi', 'tahun' => 2009],
            ['judul' => 'Bumi Manusia', 'penulis' => 'Pramoedya Ananta Toer', 'tahun' => 1980],
            ['judul' => 'Pulang', 'penulis' => 'Leila S. Chudori', 'tahun' => 2012],
            ['judul' => 'Hujan', 'penulis' => 'Tere Liye', 'tahun' => 2016],
        ];

        // Ambil pesan dari session (kalau ada)
        $pesan = session('pesan', null);

        // Kirim ke view
        return view('home', compact('books', 'pesan'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'pesan' => 'required|string|max:500',
        ]);

        // Simpan pesan baru (mengganti yang lama)
        session(['pesan' => [
            'nama' => $request->nama,
            'pesan' => $request->pesan,
            'waktu' => now()->format('d-m-Y H:i')
        ]]);

        // Redirect kembali ke home
        return redirect()->route('home')->with('success', 'Pesan berhasil dikirim!');
    }
}

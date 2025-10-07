<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $books = [
            ['judul' => 'Laskar Pelangi', 'penulis' => 'Andrea Hirata', 'tahun' => 2005],
            ['judul' => 'Negeri 5 Menara', 'penulis' => 'Ahmad Fuadi', 'tahun' => 2009],
            ['judul' => 'Bumi Manusia', 'penulis' => 'Pramoedya Ananta Toer', 'tahun' => 1980],
            ['judul' => 'Pulang', 'penulis' => 'Leila S. Chudori', 'tahun' => 2012],
            ['judul' => 'Hujan', 'penulis' => 'Tere Liye', 'tahun' => 2016],
        ];

        return view('home', compact('books'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index()
    {
        // Data film (bisa diganti nanti dengan data dari database)
        $movies = [
            [
                'judul' => 'Kaijuu 8-gou',
                'genre' => 'Action',
                'rating' => 8.7
            ],
            [
                'judul' => 'The Dark Knight',
                'genre' => 'Action',
                'rating' => 9.0
            ],
            [
                'judul' => 'Spirited Away',
                'genre' => 'Animation',
                'rating' => 8.5
            ],
            [
                'judul' => 'Dr.Stone',
                'genre' => 'SHounen',
                'rating' => 8.6
            ]
        ];

        // Kirim data ke view
        return view('movie', compact('movies'));
    }
}

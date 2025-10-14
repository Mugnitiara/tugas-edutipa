<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;

class MovieController extends Controller
{
    // Menampilkan semua film di movie.blade.php
    public function index()
    {
        $movies = Movie::all();
        return view('movie', compact('movies'));
    }

    // Menampilkan form tambah film
    public function create()
    {
        return view('movie_create');
    }

    // Menyimpan data film baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'genre' => 'required|string|max:100',
            'rating' => 'required|numeric|min:0|max:10',
        ]);

        Movie::create($validated);

        // Setelah tambah film, langsung kembali ke movie.blade.php dengan data terbaru
        return view('movie', [
            'movies' => Movie::all()
        ])->with('success', 'Film berhasil ditambahkan!');
    }

    // Menampilkan form edit film
    public function edit($id)
    {
        $movie = Movie::findOrFail($id);
        return view('movie_edit', compact('movie'));
    }

    // Menyimpan perubahan film
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'genre' => 'required|string|max:100',
            'rating' => 'required|numeric|min:0|max:10',
        ]);

        $movie = Movie::findOrFail($id);
        $movie->update($request->all());

        return redirect()->route('movies.index')->with('success', 'Film berhasil diperbarui!');
    }

    // Menghapus film
    public function destroy($id)
    {
        $movie = Movie::findOrFail($id);
        $movie->delete();

        return redirect()->route('movies.index')->with('success', 'Film berhasil dihapus!');
    }
}

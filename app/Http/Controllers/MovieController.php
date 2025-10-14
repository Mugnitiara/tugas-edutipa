<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    // Tampilkan semua film
    public function index()
    {
        $movies = Movie::all();
        return view('movie', compact('movies'));
    }

    // Tampilkan form tambah
    public function create()
    {
        return view('movie_create');
    }

    // Simpan data baru
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'genre' => 'required|string|max:100',
            'rating' => 'required|numeric|min:0|max:10',
        ]);

        Movie::create($request->all());

        return redirect()->route('movies.index')->with('success', 'Film berhasil ditambahkan!');
    }

    // Tampilkan detail film
    public function show($id)
    {
        $movie = Movie::findOrFail($id);
        return view('movie_show', compact('movie'));
    }

    // Tampilkan form edit
    public function edit($id)
    {
        $movie = Movie::findOrFail($id);
        return view('movie_edit', compact('movie'));
    }

    // Update data film
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

    // Hapus data film
    public function destroy($id)
    {
        $movie = Movie::findOrFail($id);
        $movie->delete();

        return redirect()->route('movies.index')->with('success', 'Film berhasil dihapus!');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    // Menampilkan daftar artikel
        $artikels = Artikel::all();
        return view('artikel.index', compact('artikels'));  //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Menampilkan form untuk membuat artikel baru
        return view('artikels.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    // Validasi data
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'konten' => 'required|string',
        ]);

    // Menyimpan artikel ke database
    Artikel::create($validated);

    // Redirect ke halaman daftar artikel
    return redirect()->route('artikel.index')->with('success', 'Artikel berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Artikel $artikel)
    {
        // Menampilkan detail artikel
        return view('artikels.show', compact('artikel'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Artikel $artikel)
    {
         // Menampilkan form untuk mengedit artikel
         return view('artikels.edit', compact('artikel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Artikel $artikel)
    {
    // Validasi data
    $validated = $request->validate([
        'judul' => 'required|string|max:255',
        'konten' => 'required|string',
    ]);

    // Memperbarui artikel
    $artikel->update($validated);

    // Redirect ke halaman daftar artikel
    return redirect()->route('artikel.index')->with('success', 'Artikel berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Artikel $artikel)
    {
    // Menghapus artikel
    $artikel->delete();

    // Redirect ke halaman daftar artikel
    return redirect()->route('artikel.index')->with('success', 'Artikel berhasil dihapus!');
    }
}

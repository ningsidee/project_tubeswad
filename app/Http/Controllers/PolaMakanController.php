<?php

namespace App\Http\Controllers;

use App\Models\PolaMakan;
use App\Models\AktivitasHarian;
use Illuminate\Http\Request;

class PolaMakanController extends Controller
{
    // Method untuk menampilkan daftar pola makan
    public function index()
    {
        $polaMakan = PolaMakan::all();
        return view('aktivitas_harian.index', compact('polaMakan'));
    }

    // Method untuk menampilkan detail pola makan dan aktivitas harian terkait
    public function show($id)
    {
        // Ambil data pola makan berdasarkan ID
        $polaMakan = PolaMakan::findOrFail($id);

        // Ambil data aktivitas harian terkait pola makan
        $aktivitasHarian = $polaMakan->aktivitasHarian;

        // Kembalikan view show dengan data pola makan dan aktivitas harian
        return view('show', compact('polaMakan', 'aktivitasHarian'));
    }

    // Method untuk menampilkan form create pola makan
    public function create()
    {
        $aktivitasHarian = AktivitasHarian::all(); // Mengambil semua data aktivitas harian untuk memilih
        return view('aktivitas_harian.createmakan', compact('aktivitasHarian'));
    }

    // Method untuk menyimpan data pola makan
    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'nama_makanan' => 'required|string|max:255',
            'total' => 'required|integer',
            'calories' => 'required|integer',
        ]);

        // Membuat data pola makan baru
        PolaMakan::create([
            'nama_makanan' => $request->nama_makanan,
            'total' => $request->total,
            'calories' => $request->calories,
            'tanggal' => $request->tanggal,
            'user_id' => auth()->user()->id,
        ]);

        return redirect()->route('aktivitas_harian.index')->with('success', 'Data Pola Makan berhasil ditambahkan.');
    }

    // Method untuk menampilkan form edit pola makan
    public function edit($id)
    {
        $polaMakan = PolaMakan::findOrFail($id);
        return view('aktivitas_harian.editmakan', compact('polaMakan'));
    }

    // Method untuk memperbarui data pola makan
    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'nama_makanan' => 'required|string|max:255',
            'total' => 'required|integer',
            'calories' => 'required|integer',
        ]);

        $polaMakan = PolaMakan::findOrFail($id);
        $polaMakan->update([
            'nama_makanan' => $request->nama_makanan,
            'total' => $request->total,
            'calories' => $request->calories,
            'tanggal' => $request->tanggal,
            'user_id' => auth()->user()->id,
        ]);


        return redirect()->route('aktivitas_harian.index')->with('success', 'Data Pola Makan berhasil diperbarui.');
    }

    // Method untuk menghapus data pola makan
    public function destroy($id)
    {
        $polaMakan = PolaMakan::findOrFail($id);
        $polaMakan->delete();

        return redirect()->route('aktivitas_harian.index')->with('success', 'Data Pola Makan berhasil dihapus.');
    }
}

<?php
namespace App\Http\Controllers;

use App\Models\AktivitasHarian;
use App\Models\PolaMakan;
use Illuminate\Http\Request;

class AktivitasHarianController extends Controller
{
    // Menampilkan daftar aktivitas harian
    public function index()
    {
        $aktivitasHarian = AktivitasHarian::all();
        $polaMakan = PolaMakan::all(); // Jika perlu menampilkan pola makan terkait
        return view('aktivitas_harian.index', compact('aktivitasHarian', 'polaMakan'));
    }

    // Menampilkan form untuk membuat aktivitas harian
    public function create()
    {
        return view('aktivitas_harian.create');
    }

    // Menyimpan data aktivitas harian
    public function store(Request $request)
    {
        // Validasi data yang dikirimkan dari form
        $request->validate([
            'tanggal' => 'required|date',
            'jumlah_langkah' => 'required|integer',
            'waktu_tidur' => 'required|date_format:H:i',
            'waktu_bangun' => 'required|date_format:H:i',
        ]);

        // Menyimpan data aktivitas harian baru
        AktivitasHarian::create([
            'tanggal' => $request->tanggal, 
            'jumlah_langkah' => $request->jumlah_langkah,
            'waktu_tidur' => $request->waktu_tidur,
            'waktu_bangun' => $request->waktu_bangun,
            'user_id' => auth()->user()->id,
        ]);

        // Redirect kembali ke halaman index dengan pesan sukses
        return redirect()->route('aktivitas_harian.index')->with('success', 'Data Aktivitas Harian berhasil ditambahkan.');
    }

    // Menampilkan detail aktivitas harian dan pola makan terkait
    public function show($id)
    {
        // Ambil data aktivitas harian berdasarkan ID
        $aktivitasHarian = AktivitasHarian::findOrFail($id);

        // Ambil data pola makan yang terkait dengan aktivitas harian
        $polaMakan = PolaMakan::where('activity_id', $id)->first();  // Ambil pola makan pertama yang terkait

        // Kembalikan view show dengan data aktivitas harian dan pola makan
        return view('show', compact('aktivitasHarian', 'polaMakan'));
    }

    // Menampilkan form untuk edit aktivitas harian
    public function edit($id)
    {
        $aktivitasHarian = AktivitasHarian::findOrFail($id);
        return view('aktivitas_harian.edit', compact('aktivitasHarian'));
    }

    // Memperbarui data aktivitas harian
    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggal' => 'date',
            'jumlah_langkah' => 'integer',
            'waktu_tidur' => 'date_format:H:i',
            'waktu_bangun' => 'date_format:H:i',
        ]);

        $aktivitasHarian = AktivitasHarian::findOrFail($id);
        $aktivitasHarian->update([
            'tanggal' => $request->tanggal, 
            'jumlah_langkah' => $request->jumlah_langkah,
            'waktu_tidur' => $request->waktu_tidur,
            'waktu_bangun' => $request->waktu_bangun,
            'user_id' => auth()->user()->id,
        ]);

        return redirect()->route('aktivitas_harian.index')->with('success', 'Data Aktivitas Harian berhasil diperbarui.');
    }

    // Menghapus data aktivitas harian
    public function destroy($id)
    {
        $aktivitasHarian = AktivitasHarian::findOrFail($id);
        $aktivitasHarian->delete();

        return redirect()->route('aktivitas_harian.index')->with('success', 'Data Aktivitas Harian berhasil dihapus.');
    }
}

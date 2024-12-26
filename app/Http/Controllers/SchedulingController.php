<?php

namespace App\Http\Controllers;

use App\Models\Scheduling;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SchedulingController extends Controller
{
    // Menampilkan daftar jadwal
    public function index()
    {
        $schedulings = Scheduling::where('user_id', Auth::id())->get();
        return view('schedulings.index', compact('schedulings'));
    }

    // Menampilkan detail jadwal
    public function show(Scheduling $scheduling)
    {
        $this->authorize('view', $scheduling); // Opsional jika menggunakan policy
        return view('schedulings.show', compact('scheduling'));
    }

    // Form untuk membuat jadwal baru
    public function create()
    {
        return view('schedulings.create');
    }

    // Menyimpan jadwal baru
    public function store(Request $request)
    {
        $request->validate([
            'time' => 'required|string',
            'hari' => 'required|string',
            'tanggal' => 'required|date',
            'aktivitas' => 'required|string',
            'repeat' => 'required|boolean',
        ]);

        Scheduling::create([
            'user_id' => Auth::id(),
            'time' => $request->time,
            'hari' => $request->hari,
            'tanggal' => $request->tanggal,
            'aktivitas' => $request->aktivitas,
            'repeat' => $request->repeat,
        ]);

        return redirect()->route('schedulings.index')->with('success', 'Jadwal berhasil dibuat!');
    }

    // Form untuk mengedit jadwal
    public function edit(Scheduling $scheduling)
    {
       // Opsional jika menggunakan policy
        return view('schedulings.edit', compact('scheduling'));
    }

    // Memperbarui jadwal
    public function update(Request $request, Scheduling $scheduling)
    {
        // Opsional jika menggunakan policy

        $request->validate([
            'time' => 'required|string',
            'hari' => 'required|string',
            'tanggal'=> 'required|date',
            'aktivitas' => 'required|string',
            'repeat' => 'required|boolean',
        ]);

        $scheduling->update([
            'time' => $request->time,
            'hari' => $request->hari,
            'tanggal'=> $request->tanggal,
            'aktivitas' => $request->aktivitas,
            'repeat' => $request->repeat,
        ]);

        return redirect()->route('schedulings.index')->with('success', 'Jadwal berhasil diperbarui!');
    }

    // Menghapus jadwal
    public function destroy(Scheduling $scheduling)
    {
        // Opsional jika menggunakan policy
        $scheduling->delete();

        return redirect()->route('schedulings.index')->with('success', 'Jadwal berhasil dihapus!');
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Indikator;
use Illuminate\Support\Facades\Auth;

class IndikatorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = Auth::id(); // Ambil ID user yang sedang login
        $indikatorKesehatan = Indikator::where('user_id', $userId)->orderBy('created_at', 'desc')->get();
    
        // Menambahkan perhitungan BMI untuk setiap indikator
        foreach ($indikatorKesehatan as $indikator) {
            // Pastikan ada data tinggi badan dan berat badan yang valid
            if ($indikator->height && $indikator->weight) {
                // Menghitung BMI: Berat (kg) / (Tinggi (m) * Tinggi (m))
                $heightInMeters = $indikator->height / 100; // Convert cm to meter
                $indikator->bmi = $indikator->weight / ($heightInMeters * $heightInMeters);
            } else {
                $indikator->bmi = null; // Jika data tidak lengkap, BMI tidak dihitung
            }
        }
    
        return view('indikator_kesehatan.index', compact('indikatorKesehatan'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('indikator_kesehatan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $validatedData = $request->validate([
            'height' => 'nullable|integer|min:1',
            'weight' => 'nullable|numeric|min:0',
            'sleep_time' => 'nullable|date_format:H:i',
            'wake_time' => 'nullable|date_format:H:i',
        ]);

        $validatedData['user_id'] = Auth::id();

        Indikator::create($validatedData);

        return redirect()->route('indikator-kesehatan.index')->with('success', 'Data berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $indikator = Indikator::findOrFail($id);

        // Cegah akses jika data bukan milik user yang sedang login
        if ($indikator->user_id !== Auth::id()) {
            abort(403, 'Anda tidak memiliki izin untuk mengakses data ini.');
        }

        return view('indikator_kesehatan.show', compact('indikator'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $indikator = Indikator::findOrFail($id);

        // Cegah akses jika data bukan milik user yang sedang login
        if ($indikator->user_id !== Auth::id()) {
            abort(403, 'Anda tidak memiliki izin untuk mengedit data ini.');
        }

        return view('indikator_kesehatan.edit', compact('indikator'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $indikator = Indikator::findOrFail($id);

        // Cegah akses jika data bukan milik user yang sedang login
        if ($indikator->user_id !== Auth::id()) {
            abort(403, 'Anda tidak memiliki izin untuk memperbarui data ini.');
        }

        $validatedData = $request->validate([
            'height' => 'nullable|integer|min:1',
            'weight' => 'nullable|numeric|min:0',
            'sleep_time' => 'nullable|date_format:H:i',
            'wake_time' => 'nullable|date_format:H:i',
        ]);

        $indikator->update($validatedData);

        return redirect()->route('indikator-kesehatan.index')->with('success', 'Data berhasil diperbarui!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $indikator = Indikator::findOrFail($id);

        // Cegah akses jika data bukan milik user yang sedang login
        if ($indikator->user_id !== Auth::id()) {
            abort(403, 'Anda tidak memiliki izin untuk menghapus data ini.');
        }

        $indikator->delete();

        return redirect()->route('indikator-kesehatan.index')->with('success', 'Data berhasil dihapus!');
    }
}
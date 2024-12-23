<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommunityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $communities = Community::all();
        return response()->json($communities);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $users = User::all(); // Mengambil semua data pengguna
        $communities = Community::all(); // Mengambil semua komunitas

        return response()->json([
            'users' => $users,
            'communities' => $communities
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        {
            // Validasi input data
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'time' => 'required|date',
                'description' => 'required|string',
            ]);
    
            // Membuat komunitas baru
            $community = Community::create([
                'name' => $validated['name'],
                'time' => $validated['time'],
                'description' => $validated['description'],
            ]);
    
            return response()->json($community, 201); // Mengembalikan komunitas yang baru dibuat
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        // Menampilkan komunitas berdasarkan ID
        $community = Community::findOrFail($id);
        return response()->json($community);
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $community = Community::findOrFail($id);
        return response()->json($community);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'time' => 'required|date',
            'description' => 'required|string',
        ]);

        // Mengambil komunitas yang akan diupdate
        $community = Community::findOrFail($id);

        // Melakukan pembaruan data
        $community->update([
            'name' => $validated['name'],
            'time' => $validated['time'],
            'description' => $validated['description'],
        ]);

        return response()->json($community); // Mengembalikan komunitas yang sudah diperbarui
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
          // Mengambil komunitas berdasarkan ID
        $community = Community::findOrFail($id);

          // Menghapus komunitas
        $community->delete();

        return response()->json(['message' => 'Community deleted successfully']);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Participantcommunity;
use App\Models\User;
use App\Models\Community;



class PartisipantcommunityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $participants = Participantcommunity::all();
        return response()->json($participants);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // Validasi input data
        $validated = $request->validate([
            'UserID' => 'required|exists:users,id',
            'CommunityID' => 'required|exists:community,id',
        ]);

        // Menyimpan data partisipasi baru
        $participant = Participantcommunity::create([
            'UserID' => $validated['UserID'],
            'CommunityID' => $validated['CommunityID'],
        ]);

        return response()->json($participant, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    //
        // Menampilkan partisipasi berdasarkan ID
        $participant = Participantcommunity::findOrFail($id);
        return response()->json($participant);
    }

    /**
     * Show the form for editing the specified resource.
     */


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $participant = Participantcommunity::findOrFail($id);
        return response()->json($participant);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        // Validasi input data
        $validated = $request->validate([
            'UserID' => 'required|exists:users,id',
            'CommunityID' => 'required|exists:community,id',
        ]);

        // Mengambil partisipasi yang akan diperbarui
        $participant = Participantcommunity::findOrFail($id);

        // Melakukan pembaruan data
        $participant->update([
            'UserID' => $validated['UserID'],
            'CommunityID' => $validated['CommunityID'],
        ]);

        return response()->json($participant);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $participant = Participantcommunity::findOrFail($id);

        // Menghapus partisipasi
        $participant->delete();

        return response()->json(['message' => 'Participation deleted successfully']);
    }
}

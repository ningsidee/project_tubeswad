<?php

namespace App\Http\Controllers;

use App\Models\Community;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class CommunityController extends Controller
{
    // Display a listing of the communities
    public function index()
    {
        $communities = Community::with('participants')->get();
        return view('communities.index', compact('communities'));
    }

    // Show the form for creating a new community
    public function create()
    {
        return view('communities.create');
    }

    // Store a newly created community in storage
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('community_images', 'public');
            $validated['image'] = $imagePath;
        }

        // Tambahkan 'created_by' ke data validasi
        $validated['created_by'] = auth()->id();

        // Buat komunitas baru
        $community = Community::create($validated);

        // Tambahkan pembuat komunitas sebagai participant dengan role admin
        $community->participants()->create([
            'user_id' => auth()->id(),
            'role' => 'admin',
        ]);

        return redirect()->route('communities.index')->with('success', 'Community created successfully.');
    }

    // Display the specified community
    public function show(Community $community)
    {
        $community->load('participants.user', 'threads');
        return view('communities.show', compact('community'));
    }

    // Show the form for editing the specified community
    public function edit(Community $community)
    {
        return view('communities.edit', compact('community'));
    }

    // Update the specified community in storage
    public function update(Request $request, Community $community)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($community->image) {
                \Storage::disk('public')->delete($community->image);
            }
            $imagePath = $request->file('image')->store('community_images', 'public');
            $validated['image'] = $imagePath;
        }

        $community->update($validated);

        return redirect()->route('communities.index')->with('success', 'Community updated successfully.');
    }

    // Remove the specified community from storage
    public function destroy(Community $community)
    {
        $community->delete();

        return redirect()->route('communities.index')->with('success', 'Community deleted successfully.');
    }

    public function join(Community $community)
    {
        $community->participants()->create([
            'user_id' => auth()->id(),
            'role' => 'member',
        ]);

        return redirect()->route('communities.index')->with('success', 'You have joined the community.');
    }

    public function leave(Community $community)
    {
        $community->participants()->where('user_id', auth()->id())->delete();

        return redirect()->route('communities.index')->with('success', 'You have left the community.');
    }
}

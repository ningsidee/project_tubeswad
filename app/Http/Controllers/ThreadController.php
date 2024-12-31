<?php

namespace App\Http\Controllers;

use App\Models\Thread;
use App\Models\Community;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ThreadController extends Controller
{
    public function create(Community $community)
    {
        return view('threads.create', compact('community'));
    }

    public function store(Request $request, Community $community)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $thread = new Thread($validated);
        $thread->community_id = $community->id;
        $thread->created_by = Auth::id();
        $thread->save();

        return redirect()->route('communities.show', $community)->with('success', 'Thread created successfully.');
    }

    public function edit(Community $community, Thread $thread)
    {
        return view('threads.edit', compact('community', 'thread'));
    }

    public function update(Request $request, Community $community, Thread $thread)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $thread->update($validated);

        return redirect()
            ->route('communities.show', [$community, $thread])
            ->with('success', 'Thread updated successfully!');
    }

    public function destroy(Community $community, Thread $thread)
    {
        if ($thread->created_by !== auth()->id()) {
            return redirect()->route('communities.show', $community)->with('error', 'You are not authorized to delete this thread.');
        }

        $thread->delete();

        return redirect()->route('communities.show', $community)->with('success', 'Thread deleted successfully.');
    }
}

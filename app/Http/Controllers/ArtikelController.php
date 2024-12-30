<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ArtikelController extends Controller
{
    public function dashboard()
    {
        $artikels = Artikel::latest()->take(6)->get(); // Ambil 6 artikel terbaru
        return view('dashboard', compact('artikels'));
    }

    public function index()
    {
        $articles = Artikel::all();
        return view('articles.index', compact('articles'));
    }

    public function create()
    {
        return view('articles.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'link' => 'required|url',
            'tanggal' => 'required|date',
        ]);

        $imagePath = $request->file('image') ? $request->file('image')->store('images', 'public') : null;

        Artikel::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imagePath,
            'link' => $request->link,
            'tanggal' => $request->tanggal,
        ]);

        return redirect()->route('artikel.index')->with('success', 'Article created successfully.');
    }

    public function edit($id)
    {
        $article = Artikel::findOrFail($id);
        return view('articles.edit', compact('article'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'link' => 'required|url',
            'tanggal' => 'required|date',
        ]);

        $article = Artikel::findOrFail($id);
        $imagePath = $article->image;
        if ($request->file('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        }
        // Perbarui data artikel
        $article->update([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imagePath,
            'link' => $request->link,
            'tanggal' => $request->tanggal,
        ]);
        if ($article->wasChanged()) {
            return redirect()->route('artikel.index')->with('success', 'Article updated successfully.');
        } else {
            return redirect()->route('artikel.index')->with('warning', 'No changes detected.');
        }
    }

    public function destroy($id)
    {
        $article = Artikel::findOrFail($id);
        $article->delete();
        return redirect()->route('artikel.index')->with('success', 'Article deleted successfully.');
    }
}

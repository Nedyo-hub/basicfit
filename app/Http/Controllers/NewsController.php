<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::orderBy('published_at', 'desc')->get();
        return view('news.index', compact('news'));
    }

    public function show(News $news)
    {
        return view('news.show', compact('news'));
    }

    public function create()
    {
        return view('news.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'published_at' => 'nullable|date',
        ]);

        if ($request->hasFile('image')) {
            $validated['image_path'] = $request->file('image')->store('news_images', 'public');
        }

        
        $validated['published_at'] = $validated['published_at'] ?? Carbon::now();

        News::create($validated);

        return redirect()->route('news.index')->with('success', 'Nieuwsbericht toegevoegd.');
    }

    public function edit(News $news)
    {
        return view('news.edit', compact('news'));
    }

    public function update(Request $request, News $news)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'published_at' => 'nullable|date',
        ]);

        if ($request->hasFile('image')) {
            if ($news->image_path) {
                Storage::delete($news->image_path);
            }
            $validated['image_path'] = $request->file('image')->store('news_images', 'public');
        }

        $news->published_at = $validated['published_at'] ?? $news->published_at;

        $news->update($validated);

        return redirect()->route('news.index')->with('success', 'Nieuwsbericht bijgewerkt.');
    }

    public function destroy(News $news)
    {
        if ($news->image_path) {
            Storage::delete($news->image_path);
        }

        $news->delete();

        return redirect()->route('news.index')->with('success', 'Nieuwsbericht verwijderd.');
    }
}

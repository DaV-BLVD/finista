<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NewsPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsPostController extends Controller
{
    public function index()
    {
        $items = NewsPost::orderBy('id', 'asc')->get();
        return view('admin.news.index', compact('items'));
    }

    public function create()
    {
        return view('admin.news.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:500',
            'image' => 'nullable|image',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->image->store('news', 'public');
        }

        NewsPost::create($data);

        return redirect()->route('news.index')
            ->with('success', 'News created successfully!');
    }

    public function edit(NewsPost $news)
    {
        return view('admin.news.create', compact('news'));
    }

    public function update(Request $request, NewsPost $news)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:500',
            'image' => 'nullable|image',
        ]);

        if ($request->hasFile('image')) {
            if ($news->image) {
                Storage::disk('public')->delete($news->image);
            }

            $data['image'] = $request->image->store('news', 'public');
        }

        $news->update($data);

        return redirect()->route('news.index')
            ->with('success', 'News updated successfully!');
    }

    public function destroy(NewsPost $news)
    {
        if ($news->image) {
            Storage::disk('public')->delete($news->image);
        }

        $news->delete();

        return redirect()->route('news.index')
            ->with('success', 'News deleted successfully!');
    }
}

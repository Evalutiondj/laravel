<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MovieController extends Controller
{
    public function index()
    {
        $movies = Movie::latest()->get();
        return view('admin.movies.index', compact('movies'));
    }

    public function create()
    {
        return view('admin.movies.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'video' => 'required|mimes:mp4,mov,avi|max:51200', // max 50MB
            'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $videoPath = $request->file('video')->store('videos', 'public');
        $thumbnailPath = $request->file('thumbnail') ? $request->file('thumbnail')->store('thumbnails', 'public') : null;

        Movie::create([
            'title' => $request->title,
            'description' => $request->description,
            'video_path' => $videoPath,
            'thumbnail' => $thumbnailPath,
        ]);

        return redirect()->route('movies.index')->with('success', 'Thêm phim thành công!');
    }

    public function edit(Movie $movie)
    {
        return view('admin.movies.edit', compact('movie'));
    }

    public function update(Request $request, Movie $movie)
    {
        $request->validate([
            'title' => 'required',
            'video' => 'nullable|mimes:mp4,mov,avi|max:51200',
            'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('video')) {
            Storage::disk('public')->delete($movie->video_path);
            $movie->video_path = $request->file('video')->store('videos', 'public');
        }

        if ($request->hasFile('thumbnail')) {
            Storage::disk('public')->delete($movie->thumbnail);
            $movie->thumbnail = $request->file('thumbnail')->store('thumbnails', 'public');
        }

        $movie->title = $request->title;
        $movie->description = $request->description;
        $movie->save();

        return redirect()->route('movies.index')->with('success', 'Cập nhật phim thành công!');
    }

    public function destroy(Movie $movie)
    {
        Storage::disk('public')->delete([$movie->video_path, $movie->thumbnail]);
        $movie->delete();
        return redirect()->route('movies.index')->with('success', 'Đã xóa phim!');
    }
}

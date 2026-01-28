<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MovieController extends Controller
{
    public function index()
    {
        $movies = Movie::all();

        return view('index', [
            'movies' => $movies,
        ]);
    }
    public function showCreateForm()
    {
        return view('movies.create');
    }
    /**
     *  【フォルダの作成機能】
     *
     *  POST /movies/create
     *  @param Request $request （リクエストクラスの$request）
     *  @return \Illuminate\Http\RedirectResponse
     */
    public function create(Request $request)
    {
        $movie = new Movie();
        $movie->title = $request->title;
        $movie->genre = $request->genre;
        $movie->release_year = $request->release_year;
        $movie->rating = $request->rating;
        //テスト用
        $movie->user_id = 1;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $imagePath = $image->storeAs('images', $imageName, 'public');
            $movie->image = $imagePath;
        }
        $movie->save();

        return redirect()->route('movies.index', [
            'id' => $movie->id,
        ]);
    }
    public function showEditForm(Movie $movie)
    {
        return view('movies.edit', [
            'movie' => $movie,
        ]);
    }
    public function edit(Request $request, Movie $movie)
    {
        $movie->title = $request->title;
        $movie->genre = $request->genre;
        $movie->release_year = $request->release_year;
        $movie->rating = $request->rating;
        //テスト用
        $movie->user_id = 1;
        if ($request->hasFile('image')) {
            if ($movie->image) {
                Storage::disk('public')->delete($movie->image);
            }
            $image = $request->file('image');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $imagePath = $image->storeAs('images', $imageName, 'public');
            $movie->image = $imagePath;
        }
        $movie->save();
        return redirect()->route('movies.index');
    }
    public function showDeleteForm(Movie $movie)
    {
        return view('movies.delete', [
            'movie' => $movie,
        ]);
    }
    public function delete(Movie $movie)
    {
        if ($movie->image) {
            Storage::disk('public')->delete($movie->image);
        }
        $movie->delete();

        return redirect()->route('movies.index');
    }
}

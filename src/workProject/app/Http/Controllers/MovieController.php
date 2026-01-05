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
        return view('index');
    }
    public function showCreateForm()
    {
        return view('movies.create');
    }
    public function create()
    {
        return view('index');
    }
    public function showEditForm(Movie $movie)
    {
        return view('movies.edit', [
            'movie' => $movie,
        ]);
    }
    public function edit()
    {
        return view('index');
    }
    public function showDeleteForm()
    {
        return view('index');
    }
    public function delete()
    {
        return view('index');
    }
}

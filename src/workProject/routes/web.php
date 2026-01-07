<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MovieController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/home', [HomeController::class, "index"])->name('home');
Route::get('/', [HomeController::class, "index"])->name('home');
Route::get("movies", [MovieController::class, "index"])->name("movies.index");
Route::get('movies/create', [MovieController::class, "showCreateForm"])->name('movies.create');
Route::post('movies/create', [MovieController::class, "create"]);
Route::get('movies/{movie}/edit', [MovieController::class, "showEditForm"])->name('movies.edit');
Route::post('movies/{movie}/edit', [MovieController::class, "edit"]);
Route::get('movies/{movie}/delete', [MovieController::class, "showDeleteForm"])->name('movies.delete');
Route::post('movies/{movie}/delete', [MovieController::class, "delete"]);

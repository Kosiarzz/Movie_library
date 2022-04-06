<?php
use App\Http\Controllers\{HomeController, ScraperController, GroupController, MovieController};

use Illuminate\Support\Facades\Route;

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

Route::redirect('/', '/home');

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/filmy/{name}', [ScraperController::class, 'getMovies'])->name('scrapMovies');
Route::post('/film/dodawanie', [MovieController::class, 'store'])->name('addMovie');
Route::get('/biblioteka', [GroupController::class, 'index'])->name('library');

Auth::routes();
<?php
use App\Http\Controllers\{HomeController, ScraperController, GroupController, MovieController, FilterController};

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

Route::get('/home', [HomeController::class, 'homeView'])->name('home');
Route::get('/biblioteka', [HomeController::class, 'libraryView'])->name('library');

Route::get('/filmy', [ScraperController::class, 'index'])->name('viewScrapMovies');
Route::get('/filmy/wyszukiwanie', [ScraperController::class, 'getMovies'])->name('scrapMovies');

Route::post('/grupa/dodawanie', [GroupController::class, 'store'])->name('addGroup');
Route::get('/grupa/szczegoly/{id}', [GroupController::class, 'show'])->name('groupShow');
Route::get('/grupa/usuwanie/{id}', [GroupController::class, 'destroy'])->name('groupDestroy');
Route::post('/grupa/update', [GroupController::class, 'update'])->name('groupUpdate');

Route::post('/film/dodawanie', [MovieController::class, 'store'])->name('addMovie');
Route::get('/film/szczegoly/{id}', [MovieController::class, 'show'])->name('movieShow');
Route::get('/film/edycja/{id}', [MovieController::class, 'edit'])->name('editMovie');
Route::post('/film/update', [MovieController::class, 'update'])->name('updateMovie');
Route::get('/film/usun/{id}', [MovieController::class, 'destroy'])->name('deleteMovie');
Route::get('/film/nowy', [MovieController::class, 'create'])->name('createMovie');
Route::post('/film/dodawanie/niestandardowy', [MovieController::class, 'storeCustomMovie'])->name('storeCustomMovie');

Route::get('/home/{id}', [FilterController::class, 'genreFilter'])->name('genreFilter');

Auth::routes();
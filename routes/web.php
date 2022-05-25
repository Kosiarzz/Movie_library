<?php
use App\Http\Controllers\{HomeController, ScraperController, GroupController, MovieController, FilterController, ProfileController};

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
Route::get('/filtry', [HomeController::class, 'filtersView'])->name('filtersView');

Route::get('/profil', [ProfileController::class, 'profileView'])->name('profile');
Route::post('/profil/update', [ProfileController::class, 'updateProfileData'])->name('updateProfileData');
Route::post('/profil/updatePassword', [ProfileController::class, 'updatePassword'])->name('updatePassword');

Route::get('/filmy', [ScraperController::class, 'index'])->name('viewScrapMovies');
Route::get('/filmy/wyszukiwanie', [ScraperController::class, 'getMovies'])->name('scrapMovies');

Route::post('/grupa/dodawanie', [GroupController::class, 'store'])->name('addGroup');
Route::get('/grupa/szczegoly/{id}', [GroupController::class, 'show'])->name('groupShow');
Route::get('/grupa/usuwanie/{id}', [GroupController::class, 'destroy'])->name('groupDestroy');
Route::post('/grupa/update', [GroupController::class, 'update'])->name('groupUpdate');

Route::post('/film/dodawanie', [MovieController::class, 'storeAjaxMovie'])->name('addMovie');
Route::get('/film/szczegoly/{id}', [MovieController::class, 'show'])->name('movieShow');
Route::get('/film/edycja/{id}', [MovieController::class, 'edit'])->name('editMovie');
Route::post('/film/update', [MovieController::class, 'update'])->name('updateMovie');
Route::get('/film/usun/{id}', [MovieController::class, 'destroy'])->name('deleteMovie');
Route::get('/film/filtry/usun/{id}', [MovieController::class, 'destroyFromFilters'])->name('deleteMovieFromFilters');
Route::get('/film/nowy', [MovieController::class, 'create'])->name('createMovie');
Route::post('/film/dodawanie/niestandardowy', [MovieController::class, 'storeCustomMovie'])->name('storeCustomMovie');
Route::post('/film/dodawanie/scrap/niestandardowy', [MovieController::class, 'storeCustomMovie'])->name('storeScrapCustomMovie');

Route::get('/home/{id}', [FilterController::class, 'genreFilter'])->name('genreFilter');
Route::get('/filtryds', [FilterController::class, 'filters'])->name('filters');
Route::get('/filtryds/{title}', [FilterController::class, 'filters'])->name('scrapToFilters');
Route::get('/filtrydsd/{category}', [FilterController::class, 'filters'])->name('searchByCategory');
Route::get('/filtrydsw/{group}', [FilterController::class, 'filters'])->name('searchByGroup');

Auth::routes();
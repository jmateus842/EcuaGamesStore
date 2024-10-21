<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\LibraryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'showLoginForm'])->name('home');
Route::get('/home', [HomeController::class, 'index']); // Add this line

Route::get('/games', [GameController::class, 'index'])->name('games.index');
Route::get('/games/{id}', [GameController::class, 'show'])->name('games.show');
Route::post('/games', [GameController::class, 'store'])->name('games.store');
Route::post('/games/{id}/reviews', [GameController::class, 'createReview'])->name('games.createReview');
Route::get('/games/{id}/reviews', [GameController::class, 'showReviews'])->name('games.reviews');

Route::get('/forums', [ForumController::class, 'index'])->name('forums.index');
Route::post('/forums', [ForumController::class, 'store'])->name('forums.store');
Route::get('/forums/{id}', [ForumController::class, 'show'])->name('forums.show');
Route::post('/forums/{id}/posts', [ForumController::class, 'createPost'])->name('forums.createPost');

Route::middleware(['auth'])->group(function () {
    Route::get('/library', [LibraryController::class, 'index'])->name('library.index');
    Route::post('/library/add/{game}', [LibraryController::class, 'addToLibrary'])->name('library.add');
    Route::delete('/library/remove/{game}', [LibraryController::class, 'removeFromLibrary'])->name('library.remove');
});

// Authentication routes
Auth::routes();

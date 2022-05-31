<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::post('/favorites', [App\Http\Controllers\MovieController::class, 'addToFavorites'])->middleware(['auth'])->name('addFavorite');
Route::get('/favorites', [App\Http\Controllers\MovieController::class, 'showFavorites'])->middleware(['auth'])->name('favorites');
Route::delete('/favorite', [App\Http\Controllers\MovieController::class, 'deleteFavorite'])->middleware(['auth'])->name('deleteFavorite');

require __DIR__.'/auth.php';

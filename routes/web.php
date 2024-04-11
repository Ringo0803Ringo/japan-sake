<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TopController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\RankingController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UserController;

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

Route::get('/', [TopController::class, 'get_top'])->name('top');

Route::get('/search', [SearchController::class, 'search'])->name('search');
Route::get('/search/area', [SearchController::class, 'search_area'])->name('search_area');
Route::get('/search/area/{areaId}', [SearchController::class, 'area_search'])->name('area_search');
Route::get('/search/brewery/{breweryId}', [SearchController::class, 'brewery_search'])->name('brewery_search');
Route::get('/search/flavor/{flavorId?}', [SearchController::class, 'flavor_search'])->name('flavor_search');

Route::get('/ranking', [RankingController::class, 'index'])->name('ranking');

Route::get('/brand/{brand}', [BrandController::class, 'show'])->name('brand.show');

Auth::routes();

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/user/{user}', [UserController::class, 'user'])->name('user');
    Route::get('/user/{user}/edit', [UserController::class, 'user_edit'])->name('user_edit');
    Route::put('/user/{user}/update', [UserController::class, 'user_update'])->name('user_update');

    Route::post('/review/{brand}', [ReviewController::class, 'review_store'])->name('review_store');
    Route::delete('/review/{review}/destroy', [ReviewController::class, 'destroy'])->name('review_destroy');
});
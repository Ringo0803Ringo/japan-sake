<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TopController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\BrandController;

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
Route::get('/', [TopController::class, 'brands'])->name('brands');
Route::get('/brand/{brand}', [BrandController::class, 'show'])->name('brand.show');

Auth::routes();

Route::middleware(['auth', 'verified'])->group(function () {

});
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;

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
Route::get('/filter', [CarController::class, 'filter']);
Route::get('/search', [CarController::class, 'search']);
Route::put('/Cars/{Car}/PriceUpdate', [CarController::class, 'updatePrice'])->name('Cars.updatePrice');
Route::get('/Cars/{Car}/PriceUpdate', [CarController::class, 'editPrice'])->name('Cars.editPrice');
Route::resource('Cars', CarController::class);

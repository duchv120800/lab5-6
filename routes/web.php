<?php

use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [MovieController::class, 'index'])->name('index');

Route::get('/show/{id}', [MovieController::class, 'show'])->name('show');

Route::get('/create', [MovieController::class, 'create'])->name('create');

Route::post('/create', [MovieController::class, 'store'])->name('store');

Route::get('/edit/{id}', [MovieController::class, 'edit'])->name('edit');

Route::put('/edit/{id}', [MovieController::class, 'update'])->name('update');

Route::delete('/delete/{id}', [MovieController::class, 'destroy'])->name('destroy');

Route::get('/trash', [MovieController::class, 'trash'])->name('trash');

Route::get('/search', [MovieController::class, 'search'])->name('search');

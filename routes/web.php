<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GeneratorController;

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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', [GeneratorController::class, 'generate'])->name('main-page');
Route::get('/text-list', [GeneratorController::class, 'index'])->name('text.index');
Route::get('/add-text', [GeneratorController::class,'create'])->name('text.create');
Route::post('/add-text', [GeneratorController::class, 'store'])->name('text.store');
Route::delete('/text-list/{id}', [GeneratorController::class,'destroy'])->name('text.destroy');


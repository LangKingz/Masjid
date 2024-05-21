<?php

use App\Livewire\Distext;
use App\Livewire\Keuangan;
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
Route::get('/', function () {
    return view('dashboard');
});

Route::get('/admin', [Distext::class , 'index']);

Route::middleware('is_admin')->group(function () {
    Route::get('/dashboard', [Keuangan::class , 'index'])->name('admin');
});

Route::get('/testdb', function () {
    return view('admin.index');
});
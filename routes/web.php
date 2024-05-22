<?php

use App\Http\Controllers\postController;
use Illuminate\Support\Facades\Route;

use App\Livewire\Distext;
use App\Livewire\Keuangan;
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

Route::view('/', 'home');

Route::get('/dashboard', [postController::class, 'index'])->name('dashboard');



Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::middleware('auth')->group(function () {
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
    Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
    Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
    Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
});


// Route::get('/admin', [Distext::class , 'index']);

// Route::middleware('is_admin')->group(function () {
//     Route::get('/dashboard', [Keuangan::class , 'index'])->name('admin');
// });

// Route::get('/testdb', function () {
//     return view('admin.index');
// });

require __DIR__ . '/auth.php';

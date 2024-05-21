<?php

// <<<<<<< baru
// use App\Http\Controllers\PostController;
// use App\Http\Controllers\ProfileController;
// =======
use App\Livewire\Distext;
use App\Livewire\Keuangan;
// >>>>>>> main
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
    return view('welcome');
});

Route::get('/dashboard', [PostController::class, 'index'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
    Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
    Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
    Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

});

// <<<<<<< baru
// require __DIR__.'/auth.php';
// =======
Route::get('/admin', [Distext::class , 'index']);

Route::middleware('is_admin')->group(function () {
    Route::get('/dashboard', [Keuangan::class , 'index'])->name('admin');
});

Route::get('/testdb', function () {
    return view('admin.index');
});
// >>>>>>> main

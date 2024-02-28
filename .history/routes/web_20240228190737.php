<?php

use App\Livewire\Counter;
use App\Livewire\PostComp;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

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

Auth::routes();




Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get("/posts", PostComp::class)->name("posts");

Route::middleware('auth')->group(function () {
    Route::view('about', 'about')->name('about');
    Route::get('/posts', Counter::class);
    Route::get('/posts', Counter::class);
    Route::get('users', [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');

    Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
});



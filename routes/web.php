<?php

use App\Models\Commune;
use App\Livewire\Counter;
use App\Livewire\PostComp;
use App\Livewire\ZoneComp;
use App\Livewire\ColisComp;
use App\Livewire\ClientComp;
use App\Livewire\CommuneComp;
use App\Livewire\CoursierComp;
use App\Livewire\CategorieComp;
use App\Livewire\TarificationComp;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;

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
// Route::get("/posts", PostComp::class)->name("posts");

Route::middleware('auth')->group(function () {
    Route::view('about', 'about')->name('about');
    // Route::get('/posts', PostComp::class)->name('posts');
    Route::get('/commune', CommuneComp::class)->name('communes');
    Route::get('/colis', ColisComp::class)->name('colis');
    Route::get('/coursier', CoursierComp ::class)->name('coursiers');
    Route::get('/tarification', TarificationComp::class)->name('tarifications');
    Route::get('/client', ClientComp ::class)->name('clients');
    Route::get('/categorie', CategorieComp ::class)->name('categories');
    Route::get('/zone', ZoneComp::class)->name('zones');

    Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
});

Route::middleware('auth')->group(function () {

    Route::get('users', [UserController::class, 'espace'])->name('espace');
    Route::get('/user.index', [UserController::class,'index'])->name('index');
    Route::get('/user/create', [UserController::class,'create'])->name('create');
    Route::get('/user/{id}', [UserController::class,'show'])->name('show');
    Route::get('/user/{id}/edit', [UserController::class,'edit'])->name('user.edit');


    Route::post('/user', [UserController::class,'store'])->name('store');
    Route::patch('/user/{id}', [UserController::class,'update'])->name('update');
    Route::delete('/user/{id}', [UserController::class,'destroy'])->name('users.destroy');

});


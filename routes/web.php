<?php

use App\Models\User;
use App\Models\Commune;
use App\Livewire\Counter;
use App\Livewire\PostComp;
use App\Livewire\UserComp;
use App\Livewire\ZoneComp;
use App\Livewire\ColisComp;
use App\Livewire\ClientComp;
use App\Livewire\StatutComp;
use App\Livewire\CommuneComp;
use App\Livewire\CoursierComp;
use App\Livewire\VehiculeComp;
use App\Livewire\CategorieComp;
use App\Livewire\TarificationComp;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EspaceController;

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

    Route::get('espace', [EspaceController::class, 'index'])->name('espace.index');
    Route::get('/commune', CommuneComp::class)->name('communes');
    Route::get('/colis', ColisComp::class)->name('colis');
    Route::get('/coursier', CoursierComp ::class)->name('coursiers');
    Route::get('/tarification', TarificationComp::class)->name('tarifications');
    Route::get('/client', ClientComp ::class)->name('clients');
    Route::get('/categorie', CategorieComp ::class)->name('categories');
    Route::get('/zone', ZoneComp::class)->name('zones');
    Route::get('/user', UserComp::class)->name('users');
    Route::get('/statut', StatutComp::class)->name('statuts');
    Route::get('/vehicule', VehiculeComp::class)->name('vehicules');

    Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
});




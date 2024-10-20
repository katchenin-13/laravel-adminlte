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
use App\Livewire\DossierComp;
use App\Livewire\ManagerComp;
use App\Livewire\ManuserComp;
use App\Livewire\ContenudComp;
use App\Livewire\CoursierComp;
use App\Livewire\EmployerComp;
use App\Livewire\PaiementComp;
use App\Livewire\VehiculeComp;
use App\Livewire\BordereauComp;
use App\Livewire\CategorieComp;
use App\Livewire\CoursuserComp;
use App\Livewire\LivraisonComp;
use App\Livewire\TarificationComp;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;;
use Spatie\Permission\Models\Permission;
use App\Http\Controllers\NotificationCon;
use App\Http\Controllers\StatsController;
use App\Http\Controllers\Configcontroller;
use App\Http\Controllers\EspaceController;
use App\Http\Controllers\ProfileController;


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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/colis', ColisComp::class)->name('colis');
Route::get('/livraison', LivraisonComp::class)->name('livraison');

// Routes Authentifiées
// Route::middleware(['auth', 'role:oursier'])->group(function () {
//     Route::view('about', 'about')->name('about');
//     // Route::get('/colis', ColisComp::class)->name('colis');
//     // Route::get('/livraison', LivraisonComp::class)->name('livraison');
//     Route::get('espace', [EspaceController::class, 'index'])->name('espace.index');
// });

Route::middleware(['auth', 'role:manager'])->group(function () {
    // Route::get('/colis', ColisComp::class)->name('colis');
    // Route::get('/livraison', LivraisonComp::class)->name('livraison');
    Route::get('espace', [EspaceController::class, 'index'])->name('espace.index');
    Route::get('/client', ClientComp::class)->name('clients');
    Route::get('/contenu/{id}', ContenudComp::class)->name('contenu');
    Route::get('stat', [StatsController::class, 'index'])->name('stat.index');
    Route::get('/tarification', TarificationComp::class)->name('tarifications');
    Route::get('/statut', StatutComp::class)->name('statuts');
    Route::get('/paye', PaiementComp::class)->name('payer');
    Route::get('/dossier', DossierComp::class)->name('dossiers');
    Route::get('/bordereau/{livraison}', [BordereauComp::class, 'generatePDF'])->name('bordereau');
    Route::get('/vehicule', VehiculeComp::class)->name('vehicules');
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::put('/profile/photo/update', [ProfileController::class, 'updatePhoto'])->name('profile.photo.update');
    Route::put('/profile/information/update', [ProfileController::class, 'updateInformation'])->name('profile.information.update');
});


// Routes pour Super Administrateurs
Route::middleware(['auth', 'role:superadmin'])->group(function () {
    Route::get('espace', [EspaceController::class, 'index'])->name('espace.index');
    Route::get('config', [Configcontroller::class, 'index'])->name('config');
    Route::get('/paye', PaiementComp::class)->name('payer');
    Route::get('/contenu/{id}', ContenudComp::class)->name('contenu');
    Route::get('/commune', CommuneComp::class)->name('communes');
    Route::get('/manuser', ManuserComp::class)->name('comptesm');
    Route::get('/client', ClientComp::class)->name('clients');
    Route::get('stat', [StatsController::class, 'index'])->name('stat.index');
    Route::get('/tarification', TarificationComp::class)->name('tarifications');
    Route::get('/employer', EmployerComp::class)->name('employers');
    Route::get('/categorie', CategorieComp::class)->name('categories');
    Route::get('/zone', ZoneComp::class)->name('zones');
    Route::get('/dossier', DossierComp::class)->name('dossiers');
    Route::get('/coursier', CoursierComp::class)->name('coursiers');
    Route::get('/coursier_user', CoursuserComp::class)->name('comptes');
    Route::get('/Manager', ManagerComp::class)->name('managers');
    Route::get('/user', UserComp::class)->name('users');
    Route::get('/statut', StatutComp::class)->name('statuts');
    // Route::get('/colis', ColisComp::class)->name('colis');
    // Route::get('/livraison', LivraisonComp::class)->name('livraison');
    Route::get('/bordereau/{livraison}', [BordereauComp::class, 'generatePDF'])->name('bordereau');
    Route::get('/vehicule', VehiculeComp::class)->name('vehicules');
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::put('/profile/photo/update', [ProfileController::class, 'updatePhoto'])->name('profile.photo.update');
    Route::put('/profile/information/update', [ProfileController::class, 'updateInformation'])->name('profile.information.update');
});




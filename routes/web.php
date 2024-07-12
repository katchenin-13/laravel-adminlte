<?php

use App\Http\Controllers\Configcontroller;
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
use App\Livewire\ContenudComp;
use App\Livewire\CoursierComp;
use App\Livewire\VehiculeComp;
use App\Livewire\BordereauComp;
use App\Livewire\CategorieComp;
use App\Livewire\LivraisonComp;
use App\Livewire\TarificationComp;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Spatie\Permission\Models\Permission;
use App\Http\Controllers\StatsController;
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




Route::get('/', [HomeController::class, 'index'])->name('home');

// $createSuperadmin = Role::create(['name'=> 'Super Administrateur']);
// $createAdmin = Role::create(['name'=> 'Administrateur']);
// $createCour = Role::create(['name'=> 'Coursier']);

// $PermHelloword = Permission ::create(['name'=>'See Hello word']);
// $PermGoodbye = Permission ::create(['name'=>'See Good bye']);

// dump($PermHelloword);
// dump($PermGoodbye);

// $roleSuperadmin = Role::find(1);
// $roleSuperadmin->givePermissionTo('See Hello word','See Good bye');

// $roleAdmin = Role::find(2);
// $roleAdmin->givePermissionTo('See Hello word');

// $roleCour = Role::find(3);
// $roleCour->givePermissionTo('See Hello word');

// dump($roleSuperadmin);
// dump($roleAdmin);
// dump($roleCour);


// Route::get("/posts", PostComp::class)->name("posts");

Route::middleware('auth')->group(function () {

     Route::view('about', 'about')->name('about');

    // Route::get('espace', [EspaceController::class, 'index'])->name('espace.index');
    Route::get('stat', [StatsController::class, 'index'])->name('stat.index');
    // Route::get('config', [Configcontroller::class, 'index'])->name('config');
    // Route::get('/commune', CommuneComp::class)->name('communes');
    Route::get('/colis', ColisComp::class)->name('colis');
    // Route::get('/coursier', CoursierComp ::class)->name('coursiers');
    // Route::get('/tarification', TarificationComp::class)->name('tarifications');
    // Route::get('/client', ClientComp ::class)->name('clients');
    // Route::get('/categorie', CategorieComp ::class)->name('categories');
    // Route::get('/zone', ZoneComp::class)->name('zones');
    Route::get('/bordereau', BordereauComp::class)->name('pdf');
    // Route::get('/user', UserComp::class)->name('users');
    Route::get('/pdf/{livraison}', [PDFController::class, 'generatePDF'])->name('bordereau');
    Route::get('/dossier', DossierComp::class)->name('dossiers');
    Route::get('/contenu/{id}', ContenudComp::class)->name('contenu');
    Route::get('/userInfo', 'UserRequette@userInfo')->name('userInfo');
    Route::post('/send', 'FactureController@send');



    // Route::get('/statut', StatutComp::class)->name('statuts');
    // Route::get('/vehicule', VehiculeComp::class)->name('vehicules');
    Route::get('/livraison', LivraisonComp::class)->name('livraison');

    Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
});


//route pour mes superadmin
Route::group(['middleware' => ['role:superadmin']], function () {
    Route::view('about', 'about')->name('about');

    Route::get('espace', [EspaceController::class, 'index'])->name('espace.index');
    Route::get('stat', [StatsController::class, 'index'])->name('stat.index');
    Route::get('config', [Configcontroller::class, 'index'])->name('config');
    Route::get('/commune', CommuneComp::class)->name('communes');
    Route::get('/colis', ColisComp::class)->name('colis');
    Route::get('/coursier', CoursierComp ::class)->name('coursiers');
    Route::get('/tarification', TarificationComp::class)->name('tarifications');
    Route::get('/client', ClientComp ::class)->name('clients');
    Route::get('/categorie', CategorieComp ::class)->name('categories');
    Route::get('/zone', ZoneComp::class)->name('zones');
    Route::get('/bordereau', BordereauComp::class)->name('pdf');
    Route::get('/user', UserComp::class)->name('users');
    Route::get('/pdf/{livraison}', [PDFController::class, 'generatePDF'])->name('bordereau');
    // Route::get('/dossier', DossierComp::class)->name('dossiers');
    // Route::get('/contenu/{id}', ContenudComp::class)->name('contenu');
    Route::get('/userInfo', 'UserRequette@userInfo')->name('userInfo');



    Route::get('/statut', StatutComp::class)->name('statuts');
    Route::get('/vehicule', VehiculeComp::class)->name('vehicules');
    Route::get('/livraison', LivraisonComp::class)->name('livraison');

    Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
});


// Route::middleware('role:admin')->group(function () {
//         Route::get('/home', function () {
//             return view('home');
//         })->name('admin.home');
// });

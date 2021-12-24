<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Back\{AdminController, MagsoController, CooperativeController, 
									   TypepController, SpecController, PlantController, UserController
							};

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth/login');
});


// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('back/index');
// })->name('dashboard');
//User
Route::name('front.home')->get('/home', [UserController::class, 'index']);
Route::view('/datatable1', 'datatable');

//, 'admin', 'edit' on redirige les users sur la route front.index
Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {  
	 Route::name('dashboard')->get('/dashboard', [AdminController::class, 'index']);
});
 
//Admin
Route::middleware('admin')->group(function () {
	//Mag Sociétale 
	Route::prefix('mag-societariat')->group(function () {
		//Utilisateurs
		Route::name('index.magso')->get('/', [UserController::class, 'index']);
	    Route::name('magso_user_list')->get('/listes-utilisateur', [UserController::class, 'list_user']);
	    Route::name('magso_add_list')->get('/users/ajouter-utilisateur', [UserController::class, 'create']);
	    Route::name('magso_add_list.store')->post('/users/ajouter-utilisateur', [UserController::class, 'store']);
	    Route::name('magso_mod_list.show')->get('/users/modifier-utilisateur/{id}', [UserController::class, 'show']);
	    Route::name('magso_add_list.update')->put('/users/modifier-utilisateur/{id}', [UserController::class, 'update']);
	    Route::get('/delete/{id}', [UserController::class, 'destroy'])->name('users.delete');
		//Membre ou planteur
	    Route::name('index.magso')->get('/', [MagsoController::class, 'index']);
	    Route::name('magso_member_list')->get('/listes-membre', [MagsoController::class, 'list_user']);
	    Route::name('magso_add_member')->get('/users/ajouter-membre', [MagsoController::class, 'create']);
	    Route::name('magso_add_member.store')->post('/users/ajouter-membre', [MagsoController::class, 'store']);
	    Route::name('magso_mod_member.show')->get('/users/modifier-membre/{id}', [MagsoController::class, 'show']);
	    Route::name('magso_add_member.update')->put('/users/modifier-membre/{id}', [MagsoController::class, 'update']);
	    Route::get('/delete/{id}', [MagsoController::class, 'destroy'])->name('users.delete');
	    //Coopérative
	    Route::name('magso_coop_list')->get('/listes-cooperative', [CooperativeController::class, 'index']);
	    Route::name('magso_add_coop')->get('/ajouter-cooperative', [CooperativeController::class, 'create']);
	    Route::name('magso_add_coop.store')->post('/ajouter-cooperative', [CooperativeController::class, 'store']);
	    Route::name('magso_mod_coop.show')->get('/modifier-cooperative/{id}', [CooperativeController::class, 'show']);
	    Route::name('magso_mod_coop.update')->put('/modifier-cooperative/{id}', [CooperativeController::class, 'update']);
	    Route::get('/deletes/{id}', [CooperativeController::class, 'destroy'])->name('coop.delete');
	    //TYPE DE PIECE
	    Route::name('magso_typep_list')->get('/listes-types-pieces', [TypepController::class, 'index']);
	    Route::name('magso_add_typep')->get('/ajouter-types-pieces', [TypepController::class, 'create']);
	    Route::name('magso_add_typep.store')->post('/ajouter-types-pieces', [TypepController::class, 'store']);
	    Route::name('magso_mod_typep.show')->get('/modifier-types-pieces/{id}', [TypepController::class, 'show']);
	    Route::name('magso_mod_typep.update')->put('/modifier-types-pieces/{id}', [TypepController::class, 'update']);
	    Route::get('/supprimer-typepiece/{id}', [TypepController::class, 'destroy'])->name('typep.delete');
	    //SPECULATION
	    Route::name('magso_spec_list')->get('/listes-speculation', [SpecController::class, 'index']);
	    Route::name('magso_add_spec')->get('/ajouter-speculation', [SpecController::class, 'create']);
	    Route::name('magso_add_spec.store')->post('/ajouter-speculation', [SpecController::class, 'store']);
	    Route::name('magso_mod_spec.show')->get('/modifier-speculation/{id}', [SpecController::class, 'show']);
	    Route::name('magso_mod_spec.update')->put('/modifier-speculation/{id}', [SpecController::class, 'update']);
	    Route::get('/supprimer-speculation/{id}', [SpecController::class, 'destroy'])->name('spec.delete');
	    //PLANTATION
	     Route::name('magso_plant_list')->get('/listes-plantation', [PlantController::class, 'index']); // null
	    Route::name('magso_add_plant')->get('/ajouter-plantation', [PlantController::class, 'create']);
	    Route::name('magso_add_plant.store')->post('/ajouter-plantation', [PlantController::class, 'store']);
	    Route::name('magso_mod_plant.show')->get('/modifier-plantation/{id}', [PlantController::class, 'show']);
	    Route::name('magso_mod_plant.update')->put('/modifier-plantation/{id}', [PlantController::class, 'update']);
	    Route::name('map')->get('/listes-plantation/{id}', [PlantController::class, 'map']);
	    Route::get('/supprimer-plantation/{id}', [PlantController::class, 'destroy'])->name('plant.delete');
	});


});


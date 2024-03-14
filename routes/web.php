<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    CvtechqueController,
    CompetenceController,
    MetierController,
    ProfessionnelController
};

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
//
//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', [CvtechqueController::class, 'index'])->name('accueil');

Route::resource('competences', CompetenceController::class);
Route::get('/metiers/predelete/{metier}', [MetierController::class, 'predelete'] )->name('metiers.predelete');
Route::resource('metiers', MetierController::class);
Route::get('/metiers/{slug}/professionnels', [ProfessionnelController::class, 'index'])->name('professionnels.metiers');
Route::get('/professionnels/predelete/{professionnel}', [ProfessionnelController::class, 'predelete'] )->name('professionnels.predelete');
Route::resource('professionnels', ProfessionnelController::class);

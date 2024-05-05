<?php

use App\Http\Controllers\StageOffreController;
use App\Http\Controllers\entrepriseController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\OffreStageController;
use App\Http\Controllers\CondidatureController;
use App\Http\Controllers\EvaluationController;
use App\Http\Controllers\WishlistController;




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


// Route::get('/condidature', function () {
//     return view('GestionCondidate');
// })->name('condidature.index');

Route::get('/dashboard', function () {
    return view('welcome');
})->name('home');
Route::get('/', function () {
    return view('homepage');
})->name('homepage');

Route::get('/login', function () {
    return view('login');
})->name('login');
Route::post('/login', [UserController::class, 'loginpost'])->name('login.post');


Route::middleware(['auth'])->group(function () {

    Route::group(['middleware' => 'admin'], function () {
        // routes accessible only to admin users
        Route::get('/users', [UserController::class, 'index'])->name('users.index')->middleware('admin');
        Route::get('/users/ajouter', [UserController::class, 'ajouter'])->name('users.store')->middleware('admin');
        Route::get('/users/update/{id}', [UserController::class, 'modifier'])->name('users.update')->middleware('admin');
        Route::get('/users/delete/{id}', [UserController::class, 'supp'])->name('users.update')->middleware('admin');

        Route::post('/users', [UserController::class, 'store'])->name('users.store');
        Route::put('/users/update/{id}', [UserController::class, 'update'])->name('users.update');
        Route::delete('/users/delete/{id}', [UserController::class, 'delete'])->name('users.delete');

        // Route::get('/condidature', function () {
        //     return view('condidature.index');
        // })->middleware('admin');
        Route::get('/condidature', [CondidatureController::class, 'index'])->name('condidature.index');

        // Assuming you want to use a URL like '/condidatures/create/{offreStageId}'


    });

    Route::get('/condidatures/create/{offreStageId}', [CondidatureController::class, 'create'])
        ->name('condidature.create'); // Ensure the user is logged in
    Route::post('/condidatures/create/{offreStageId}', [CondidatureController::class, 'store'])
        ->name('condidature.store'); // Ensure the user is logged in

    Route::get('/search', [SearchController::class, 'index'])->name('search');
    Route::get('/stage', [OffreStageController::class, 'all'])->name('stage');

    Route::get('/entreprises', [EntrepriseController::class, 'index'])->name('entreprises.index');
    Route::get('/entreprises/create', [EntrepriseController::class, 'create'])->name('entreprises.create');
    Route::post('/entreprises', [EntrepriseController::class, 'store'])->name('entreprises.store');
    Route::get('/entreprises/{id}/edit', [EntrepriseController::class, 'edit'])->name('entreprises.edit');
    Route::put('/entreprises/{id}', [EntrepriseController::class, 'update'])->name('entreprises.update');
    Route::delete('/entreprises/{id}', [EntrepriseController::class, 'destroy'])->name('entreprises.destroy');
    Route::get('/entreprises/{id}/delete', [EntrepriseController::class, 'delete'])->name('entreprises.delete');
    Route::get('/entreprises/{id}', [EntrepriseController::class, 'show'])->name('entreprises.show');


    Route::get('/offrestage', [OffreStageController::class, 'index'])->name('offrestage.index');
    Route::get('/offrestages/create', [OffreStageController::class, 'create'])->name('offrestages.create');
    Route::post('/offrestages', [OffreStageController::class, 'store'])->name('offrestage.store');
    Route::get('/offrestages/edit/{id}', [OffreStageController::class, 'edit'])->name('offrestages.edit');
    Route::put('/offrestages/{id}', [OffreStageController::class, 'update'])->name('offrestage.update');

    Route::resource('evaluations', EvaluationController::class);


    Route::post('/wishlist/add/{offreStageId}', [WishlistController::class, 'addToWishlist'])->name('wishlist.add');
    Route::post('/wishlist/remove/{offreStageId}', [WishlistController::class, 'removeFromWishlist'])->name('wishlist.remove');
    Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist.index');
});

Route::post('/logout', [UserController::class, 'logout'])->name('logout');
